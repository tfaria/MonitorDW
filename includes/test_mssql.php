<?php
   //define('DB_HOST'        , "WINMTZSQLDHT20.ARAUJO.CORP");
   //define('DB_USER'        , "usr_cognos");
   //define('DB_PASSWORD'    , "20@cognos16");
   //define('DB_NAME'        , "BUICTRDBS");
   //define('DB_DRIVER'      , "sqlsrv");
  
   require_once "conecta_mssql.php";
  
   try{
  
       $conecta_mssql    = conecta_mssql::getConnection();
       $query      = $conecta_mssql->query("SELECT @@version teste");
  
   }catch(Exception $e){
       echo $e->getMessage();
       exit;
   }
  
?>

<?php
for($i=0; $row = $query->fetch(); $i++){
        echo $row['teste']."<br/>";
      }  
?>