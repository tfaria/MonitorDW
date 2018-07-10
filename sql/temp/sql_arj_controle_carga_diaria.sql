USE BUICTRDBS

DECLARE @DATAINI DATETIME
DECLARE @DATAFIM DATETIME
SET @DATAINI = '20161208' 
SET @DATAFIM = '20161209' --@DATAINI+1

/*
SELECT (HorarioInicio),(HorarioFim),USUARIOEXEC
FROM AUDIT_LOGEXECUCAOPACOTE 
--WHERE NomePacote = 'BI_Carga_Staging_Csmmovloja'
--AND USUARIOEXEC = 'ARAUJOCORP\svc_sqlclbi'
--where HorarioInicio >='20161129' and HorarioFim <='20161129'
*/

/********************************TEMPO DE PROCESSAMENTO DO ETL - DIA ANTERIOR X HOJE*******************************/
IF OBJECT_ID ('TEMPDB..#TEMP01') IS NOT NULL
	DROP TABLE TEMPDB..#TEMP01

IF OBJECT_ID ('TEMPDB..#TEMP02') IS NOT NULL
	DROP TABLE TEMPDB..#TEMP02

IF OBJECT_ID ('TEMPDB..#TEMP03') IS NOT NULL
	DROP TABLE TEMPDB..#TEMP03

SELECT  
DISTINCT NOMEPACOTE
INTO #TEMP01
FROM DBO.AUDIT_LOGEXECUCAOPACOTE
WHERE (HORARIOINICIO >= (@DATAINI)-10 AND HORARIOINICIO <=@DATAFIM) AND (NOMEPACOTE NOT LIKE '%NRT%')
ORDER BY 1

SELECT  
CONVERT(VARCHAR(8),HORARIOINICIO,112) DIAMES, 
NOMEPACOTE, 
HORARIOINICIO, 
HORARIOFIM, 
DATEDIFF(MI,HORARIOINICIO,HORARIOFIM) AS DIFMINUTOS, 
STATUSPACOTE, 
ERROTAREFA,       
MENSAGEMERRO
INTO #TEMP02 
FROM DBO.AUDIT_LOGEXECUCAOPACOTE
WHERE (HORARIOINICIO > @DATAINI AND HORARIOFIM <@DATAFIM) AND (NOMEPACOTE NOT LIKE '%NRT%')
AND USUARIOEXEC = 'ARAUJOCORP\svc_sqlclbi'
ORDER BY HORARIOINICIO

SELECT  
CONVERT(VARCHAR(8),HORARIOINICIO,112) DIAMES, 
NOMEPACOTE, 
HORARIOINICIO, 
HORARIOFIM, 
DATEDIFF(MI,HORARIOINICIO,HORARIOFIM) AS DIFMINUTOS, 
STATUSPACOTE, 
ERROTAREFA,       
MENSAGEMERRO
INTO #TEMP03 
FROM DBO.AUDIT_LOGEXECUCAOPACOTE
WHERE (HORARIOINICIO >= CONVERT(VARCHAR(8), GETDATE(), 112)) AND (NOMEPACOTE NOT LIKE '%NRT%')
AND USUARIOEXEC = 'ARAUJOCORP\svc_sqlclbi'
ORDER BY HORARIOINICIO


SELECT A.NOMEPACOTE,
B.DIFMINUTOS-C.DIFMINUTOS DIFMIN_ANT,
B.DIAMES, 
B.HORARIOINICIO, 
B.HORARIOFIM, 
B.DIFMINUTOS, 
B.STATUSPACOTE, 
B.ERROTAREFA,       
B.MENSAGEMERRO,
C.DIAMES, 
C.HORARIOINICIO, 
C.HORARIOFIM, 
C.DIFMINUTOS, 
C.STATUSPACOTE, 
C.ERROTAREFA,       
C.MENSAGEMERRO
FROM #TEMP01 A
	LEFT JOIN #TEMP02 B
		ON A.NOMEPACOTE = B.NOMEPACOTE
	LEFT JOIN #TEMP03 C 
		ON A.NOMEPACOTE = C.NOMEPACOTE
WHERE A.NOMEPACOTE NOT IN ('BUI_SEQ_MAXIMO','BUI_DIM_CHAMADO_STATUS_MAXIMO')
--ORDER BY C.HORARIOINICIO
ORDER BY ISNULL(B.DIFMINUTOS-C.DIFMINUTOS,0)


--/********************************TEMPO DE PROCESSAMENTO DOS CUBOS - DIA ANTERIOR X HOJE*******************************/
--IF OBJECT_ID ('TEMPDB..#TMP_CUBOS_HOJE') IS NOT NULL
--	DROP TABLE TEMPDB..#TMP_CUBOS_HOJE
--
--IF OBJECT_ID ('TEMPDB..#TMP_CUBOS_ONTEM') IS NOT NULL
--	DROP TABLE TEMPDB..#TMP_CUBOS_ONTEM
--
--DECLARE @EXEC_PCT_CUBOS DATETIME
--DECLARE @EXEC_PCT_FATOS DATETIME
--DECLARE @EXEC_PCT_CUBOS_ONTEM DATETIME
--DECLARE @EXEC_PCT_FATOS_ONTEM DATETIME
--DECLARE @EXEC_STATUS_CARGA_CUBOS INT
--DECLARE @TEMP_ANT_PCT TABLE (SOURCE VARCHAR(200), DATA DATETIME, ORDEM INT IDENTITY(1,1))
--DECLARE @TEMP_INI TABLE (SOURCE VARCHAR(200), EVENT VARCHAR(20), DATA_INI DATETIME, ORDEM INT, UNIQUE CLUSTERED (SOURCE))
--DECLARE @TEMP_FINAL TABLE (Nome_Cubo VARCHAR(200), Data_Inicial DATETIME, Data_Final DATETIME, ORDEM INT, UNIQUE CLUSTERED (Nome_Cubo))
--
--SET @EXEC_PCT_CUBOS = (SELECT MAX(STARTTIME) STATUS_CUBOS
--						FROM SYSDTSLOG90 A  WITH (NOLOCK)
--							WHERE STARTTIME >= CONVERT(VARCHAR(8),GETDATE(),112)
--							AND SOURCE = 'BI_ETL_Sequencia_Carga_Cubos'
--							AND OPERATOR = 'ARAUJOCORP\svc_sqlclbi')
--
--SET @EXEC_PCT_FATOS = (SELECT MAX(STARTTIME) STATUS_FATOS
--						FROM SYSDTSLOG90 B  WITH (NOLOCK)
--							WHERE STARTTIME >= CONVERT(VARCHAR(8),GETDATE(),112)
--							AND SOURCE = 'BI_ETL_Sequencia_Carga_Fato'
--							AND OPERATOR = 'ARAUJOCORP\svc_sqlclbi')
--
--SET @EXEC_PCT_CUBOS_ONTEM = (SELECT MAX(STARTTIME) STATUS_CUBOS
--						FROM SYSDTSLOG90 A  WITH (NOLOCK)
--							WHERE STARTTIME >= CONVERT(VARCHAR(8),GETDATE()-1,112)
--							AND SOURCE = 'BI_ETL_Sequencia_Carga_Cubos'
--							AND OPERATOR = 'ARAUJOCORP\svc_sqlclbi')
--
--SET @EXEC_PCT_FATOS_ONTEM = (SELECT MAX(STARTTIME) STATUS_FATOS
--						FROM SYSDTSLOG90 B  WITH (NOLOCK)
--							WHERE STARTTIME >= CONVERT(VARCHAR(8),GETDATE()-1,112)
--							AND SOURCE = 'BI_ETL_Sequencia_Carga_Fato'
--							AND OPERATOR = 'ARAUJOCORP\svc_sqlclbi')
--
--SET @EXEC_STATUS_CARGA_CUBOS = (SELECT SCG_STA_EXE STATUS_CARGA
--									FROM CTR_SCG_STACGA C  WITH (NOLOCK)
--										WHERE SCG_DES_SIS = 'Cubos OLAP')
--/*HOJE*/
--INSERT INTO @TEMP_ANT_PCT 
--SELECT SOURCE, MAX(STARTTIME)STARTTIME
--FROM SYSDTSLOG90 A1 (NOLOCK)
--WHERE CONVERT(VARCHAR(8),STARTTIME,112) >=CONVERT(VARCHAR(8),GETDATE()-4,112) 
--AND CONVERT(VARCHAR(8),STARTTIME,112) <=CONVERT(VARCHAR(8),GETDATE(),112)
--AND SOURCE LIKE '%ASP%'
--AND EVENT = 'OnPreExecute'
--AND OPERATOR = 'ARAUJOCORP\svc_sqlclbi'
--GROUP BY SOURCE
--ORDER BY MIN(STARTTIME)
--
--
--INSERT INTO @TEMP_INI 
--SELECT A0.SOURCE,
--ISNULL(EVENT,NULL)EVENT,
--ISNULL(MAX(STARTTIME),NULL)DATA_INI,
--A0.ORDEM
--FROM @TEMP_ANT_PCT A0
--	LEFT JOIN SYSDTSLOG90 A1 (NOLOCK)
--		ON A0.SOURCE = A1.SOURCE
--		AND STARTTIME >=CONVERT(VARCHAR(8),GETDATE(),112)
--		AND OPERATOR = 'ARAUJOCORP\svc_sqlclbi'
--		AND EVENT = 'OnPreExecute'
--WHERE A0.SOURCE LIKE '%ASP%'
--GROUP BY EVENT,A0.SOURCE,ORDEM
--
--INSERT INTO @TEMP_FINAL
--SELECT REPLACE(A2.SOURCE,'ASP ','')Nome_Cubo, 
--A2.DATA_INI Data_Inicial,
--MAX(A1.STARTTIME)Data_Final,
--ORDEM
--FROM @TEMP_INI A2 
--	LEFT join SYSDTSLOG90 A1 (NOLOCK)
--		on A1.SOURCE = A2.SOURCE
--		AND A1.SOURCE LIKE '%ASP%'
--		AND A1.EVENT = 'OnPostExecute'
--		AND A1.OPERATOR = 'ARAUJOCORP\svc_sqlclbi'
--		AND A1.STARTTIME >=CONVERT(VARCHAR(8),GETDATE(),112)
--GROUP BY A2.SOURCE,A2.DATA_INI,ORDEM
--
--SELECT Nome_Cubo,
--CASE WHEN 
--		@EXEC_PCT_FATOS >= Data_Inicial THEN NULL
--ELSE Data_Inicial END AS Data_Inicial, 
--CASE WHEN 
--		@EXEC_PCT_FATOS >= Data_Final THEN NULL
--ELSE Data_Final END AS Data_Final,
--Ordem,
--CASE WHEN @EXEC_PCT_CUBOS IS NOT NULL AND @EXEC_PCT_FATOS <= Data_Inicial AND Data_Inicial IS NOT NULL AND Data_Final IS NULL THEN 0 
--	WHEN (@EXEC_PCT_CUBOS IS NOT NULL AND @EXEC_PCT_FATOS <= Data_Final) AND (Data_Final IS NOT NULL OR Data_Final <=Data_Inicial) THEN 1
--	ELSE 4 END 'Status'
--INTO #TMP_CUBOS_HOJE
--FROM @TEMP_FINAL
--WHERE @EXEC_PCT_CUBOS >= @EXEC_PCT_FATOS AND @EXEC_STATUS_CARGA_CUBOS <> 4
--ORDER BY ORDEM
--
--DELETE FROM @TEMP_ANT_PCT
--DELETE FROM @TEMP_INI
--DELETE FROM @TEMP_FINAL

--/*ONTEM*/
--INSERT INTO @TEMP_INI 
--SELECT A0.SOURCE,
--ISNULL(EVENT,NULL)EVENT,
--ISNULL(MAX(STARTTIME),NULL)DATA_INI,
--A0.ORDEM
--FROM @TEMP_ANT_PCT A0
--	LEFT JOIN SYSDTSLOG90 A1 (NOLOCK)
--		ON A0.SOURCE = A1.SOURCE
--		AND STARTTIME >=CONVERT(VARCHAR(8),GETDATE()-1,112)
--		AND OPERATOR = 'ARAUJOCORP\svc_sqlclbi'
--		AND EVENT = 'OnPreExecute'
--WHERE A0.SOURCE LIKE '%ASP%'
--GROUP BY EVENT,A0.SOURCE,ORDEM

--INSERT INTO @TEMP_FINAL
--SELECT REPLACE(A2.SOURCE,'ASP ','')Nome_Cubo, 
--A2.DATA_INI Data_Inicial,
--MAX(A1.STARTTIME)Data_Final,
--ORDEM
--FROM @TEMP_INI A2 
--	LEFT join SYSDTSLOG90 A1 (NOLOCK)
--		on A1.SOURCE = A2.SOURCE
--		AND A1.SOURCE LIKE '%ASP%'
--		AND A1.EVENT = 'OnPostExecute'
--		AND A1.SOURCE <> 'ASP Todas as Dimens�es (Update)'
--		AND A1.OPERATOR = 'ARAUJOCORP\svc_sqlclbi'
--		AND A1.STARTTIME >=CONVERT(VARCHAR(8),GETDATE()-1,112)
--GROUP BY A2.SOURCE,A2.DATA_INI,ORDEM
--
--SELECT Nome_Cubo,
--CASE WHEN 
--		@EXEC_PCT_FATOS_ONTEM >= Data_Inicial THEN NULL
--ELSE Data_Inicial END AS Data_Inicial, 
--CASE WHEN 
--		@EXEC_PCT_FATOS_ONTEM >= Data_Final THEN NULL
--ELSE Data_Final END AS Data_Final,
--Ordem,
--CASE WHEN @EXEC_PCT_CUBOS_ONTEM IS NOT NULL AND @EXEC_PCT_FATOS_ONTEM <= Data_Inicial AND Data_Inicial IS NOT NULL AND Data_Final IS NULL THEN 0 
--	WHEN (@EXEC_PCT_CUBOS_ONTEM IS NOT NULL AND @EXEC_PCT_FATOS_ONTEM <= Data_Final) AND (Data_Final IS NOT NULL OR Data_Final <=Data_Inicial) THEN 1
--	ELSE 4 END 'Status'
--INTO #TMP_CUBOS_ONTEM
--FROM @TEMP_FINAL
--WHERE @EXEC_PCT_CUBOS >= @EXEC_PCT_FATOS AND @EXEC_STATUS_CARGA_CUBOS <> 4
--ORDER BY ORDEM


--SELECT * FROM #TMP_CUBOS_HOJE
--SELECT * FROM #TMP_CUBOS_ONTEM

/*
SELECT * 
FROM DBO.AUDIT_LOGEXECUCAOPACOTE 
WHERE NOMEPACOTE LIKE '%BI_FATOS%'
*/