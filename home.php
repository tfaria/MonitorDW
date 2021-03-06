        <?php
          $page_title = 'Painel de Monitoramento DW';
          require_once('includes/load.php');
          if (!$session->isUserLoggedIn(true)) { redirect('index.php', false);}
        ?>

        <?php include_once('layouts/header.php'); ?>

        <div class="row">
          <div class="col-md-10">
            <?php echo display_msg($msg); ?>
          </div>
        </div>

        <script type="text/javascript" language="javascript" class="init">   
        setTimeout(function(){
           window.location.reload(1);
        }, 100000);
        </script>

        <script type="text/javascript" language="javascript" class="init">    
        $(document).ready(function() {
            $('#tblpctexe').dataTable({
                "aaSorting": [[ 3, "desc" ]],
                "bPaginate": true,
                "bFilter": true,
                "sType": "brazilian", 
                "aoColumns": [
                { "sType": 'text' },
                { "sType": 'text' },
                { "sType": 'text' },
                { "sType": 'text' },
                { "sType": 'text' },
                { "sType": 'text' },
                { "sType": 'numeric' },
                ]            
            });
        });
        </script>

        <script type="text/javascript" language="javascript" class="init">    
        $(document).ready(function() {
            $('#tblpctexecerro').dataTable({
                "aaSorting": [[ 1, "desc" ]],
                "bPaginate": true,
                "bFilter": true,
                "sType": "brazilian", 
                "aoColumns": [
                { "sType": 'text' },
                { "sType": 'text' },
                { "sType": 'text' },
                { "sType": 'numeric' },
                { "sType": 'text' },
                { "sType": 'text' },
                ]            
            });
        });
        </script>

        <script type="text/javascript" language="javascript" class="init">    
        $(document).ready(function() {
            $('#tblpctexesuc').dataTable({
                "aaSorting": [[ 6, "desc" ]],
                "bPaginate": true,
                "bFilter": true,
                "sType": "brazilian", 
                "aoColumns": [
                { "sType": 'text' },
                { "sType": 'numeric' },
                { "sType": 'numeric' },
                { "sType": 'text' },
                { "sType": 'text' },
                { "sType": 'text' },
                { "sType": 'text' },
                { "sType": 'numeric' },
                { "sType": 'numeric' },
                { "sType": 'text' },
                ]            
            });
        });
        </script>

          <div class="row">
            <div class="col-md-2">
                <div class="panel panel-yellow">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa fa-cogs fa-5x" style="font-size:40px"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"><?php QtdpacotesemExecucao()?></div>
                                <div style="height: 40px;">Processos em Execução</div>
                            </div>
                        </div>
                    </div>
                    <a href="#">
                        <a href="#PctExecucao"> <div class="panel-footer">
                            <span class="pull-left">Detalhes</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div></a>
                    </a>
                </div>
            </div>
            <div class="col-md-2">
                <div class="panel panel-red">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-support" style="font-size:40px"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"><?php QtdPacotesErro()?></div>
                                <div style="height: 40px;">Execuções com falha</div>
                            </div>
                        </div>
                    </div>
                    <a href="#">
                        <a href="#PctExecucaoFalha"> <div class="panel-footer">
                            <span class="pull-left">Detalhes</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div></a>
                    </a>
                </div>
            </div>
            <div class="col-md-2">
                <div class="panel panel-gray">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-ellipsis-h" style="font-size:40px"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">0</div>
                                <div style="height: 40px;">Execução demorada</div>
                            </div>
                        </div>
                    </div>
                    <a href="#">
                        <a href="#PctExecucaoDemorada"> <div class="panel-footer">
                            <span class="pull-left">Detalhes</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div></a>
                    </a>
                </div>
            </div>
            <div class="col-md-2">
                <div class="panel panel-black">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-bomb fa-5x" style="font-size:40px"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">0</div>
                                <div style="height: 40px;">Processos não executados</div>
                            </div>
                        </div>
                    </div>
                    <a href="#">
                        <a href="#PctProcessoNaoExecutado"> <div class="panel-footer">
                            <span class="pull-left">Detalhes</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div></a>
                    </a>
                </div>
            </div>
            <div class="col-md-2">
                <div class="panel panel-black">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fas fa-cubes" style="font-size:40px"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">0</div>
                                <div style="height: 40px;">Cubos não atualizados</div>
                            </div>
                        </div>
                    </div>
                    <a href="#">
                        <a href="#PctExecutadosDia"> <div class="panel-footer">
                            <span class="pull-left">Detalhes</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div></a>
                    </a>
                </div>
            </div>
            <div class="col-md-2">
                <div class="panel panel-green">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-tasks" style="font-size:40px"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"><?php QtdPacotesSucesso()?></div>
                                <div style="height: 40px;">Execuções com Sucesso</div>
                            </div>
                        </div>
                    </div>
                    <a href="#">
                        <a href="#PctExecutadosDia"> <div class="panel-footer">
                            <span class="pull-left">Detalhes</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div></a>
                    </a>
                </div>
            </div>
        </div>

      <div class="col-lg-4">
        <div class="panel panel-default">
          <div class="panel-heading">
            <i class="fa fa-clock" style="font-size:20px"></i><strong style="font-size:15px"> Horário ETL</strong>
          </div>
          <div class="panel-body">
            <table class="table bootstrap-datatable countries">
                <?php $rows = RecuperaDataIncioFimCarga(); 
                  foreach ($rows as $row): ?>
                  <tr>
                    <td height="5px" style="font-size:14px"><?php echo $row['HORARIO'];?></td>
                    <td height="5px" style="font-size:14px"><?php echo $row['DATA_CARGA'];?></td>
                  </tr>
                <?php endforeach; ?>
              <tbody>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <div class="col-lg-7">
        <div class="panel panel-default">
          <div class="panel-heading">
            <i class="fa fa-bell" style="font-size:20px"></i><strong style="font-size:15px"> Grupos prioritários </strong>
          </div>
          <div class="panel-body">
            <table class="table bootstrap-datatable countries">
              <thead>
                <tr>
                  <th>Grupo</th>
                  <th>Horário Fim</th>
                  <th>Descrição completa</th>
                </tr>
              </thead>
              <tbody>
              <tbody>
                <?php $rows = RecuperaDataGrupoCargaDiario(); 
                  foreach ($rows as $row): ?>
                  <tr>
                    <td height="2px" style="font-size:14px"><?php echo $row['ASSUNTO'];?></td>
                    <td height="2px" style="font-size:14px"><?php echo $row['HORARIO_FIM'];?></td>
                    <td height="2px" style="font-size:14px"><?php echo $row['DESCRICAO_COMPLETA'];?></td>
                  </tr>
                <?php endforeach; ?>
              <tbody>
              </tbody>
            </table>
          </div>
        </div>
      </div>


      <!--Cards-->
      <div id="accordion">
        <div class="card">
          <div class="card-header" id="headingOne">
            <h5 class="mb-0" id="PctExecucao">
              <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                 <span>Pacotes em execução no momento</span>
              </button>
            </h5>
          </div>
          <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
          <div class="card-body">
             <div class="panel-body">
              <table id="tblpctexe" class="display" cellspacing="0" width="100%" style="font-size: 12px;">
                <thead>
                  <tr>
                   <th>Job</th>
                   <th>Step</th>
                   <th>Início</th>
                   <th>Processo</th>
                   <th>Usuário</th>
                   <th>Servidor exec</th>
                   <th>Tempo em exec</th>
                  </tr>
                </thead>
                <?php 
                  echo "<tbody>\n";
                      $rows = ListaPacotesEmExecucao(); 
                        foreach ($rows as $row):
                          echo "<tr>\n";
                          echo '<td class="blinkorange">' . $row['JOB'] . "</td> \n";
                          echo '<td class="blinkorange">' . $row['STEP_NAME'] . "</td> \n";
                          echo '<td class="blinkorange">' . $row['HORARIOINICIO'] . "</td> \n";
                          echo '<td class="blinkorange">' . $row['DESCRICAOPACOTE'] . "</td> \n";
                          echo '<td class="blinkorange">' . $row['USUARIOEXEC'] . "</td> \n";
                          echo '<td class="blinkorange">' . $row['SERVIDOREXEC'] . "</td> \n";
                          echo '<td class="blinkorange">' . $row['TEMPO_EM_EXECUCAO'] . "</td> \n";
                    endforeach; ?>
                    </tr>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Job</th>
                      <th>Step</th>
                      <th>Início</th>
                      <th>Processo</th>
                      <th>Usuário</th>
                      <th>Servidor exec</th>
                      <th>Tempo em exec</th>
                   </tr>
                  </tfoot> 
               </table>
            </div>
          </div>
        </div>
       </div>
      </div>

      <div id="accordion">
        <div class="card">
          <div class="card-header" id="headingOne">
            <h5 class="mb-0" id="PctExecucaoFalha">
              <button class="btn btn-link" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                 <span>Pacotes executados com falha</span>
              </button>
            </h5>
          </div>
          <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordion">
          <div class="card-body">
            <div class="panel-body">
              <table id="tblpctexecerro" class="display" cellspacing="0" width="100%" style="font-size: 12px;">
                <thead>
                  <tr>
                   <th>Processo</th>
                   <th>Início</th>
                   <th>Usuário</th>
                   <th>Tempo em exec</th>
                   <th>Tarefa com erro</th>
                   <th>Mensagem erro</th>
                  </tr>
                </thead>
                <?php 
                  echo "<tbody>\n";
                      $rows = ListaPacotesErro(); 
                        foreach ($rows as $row):
                          echo "<tr>\n";
                          echo "<td>" . $row['DESCRICAOPACOTE'] . "</td> \n";
                          echo "<td>" . $row['HORARIOINICIO'] . "</td> \n";
                          echo "<td>" . $row['USUARIOEXEC'] . "</td> \n";
                          echo "<td>" . $row['TEMPO_EM_EXECUCAO'] . "</td> \n";
                          echo "<td>" . $row['ERRO_TAREFA'] . "</td> \n";
                          echo "<td>" . $row['MENSAGEM_ERRO'] . "</td> \n";
                    endforeach; ?>
                    </tr>
                  </tbody>
                  <tfoot>
                   <tr>
                    <th>Processo</th>
                    <th>Início</th>
                    <th>Usuário</th>
                    <th>Tempo em exec</th>
                    <th>Tarefa com erro</th>
                    <th>Mensagem erro</th>
                   </tr>
                   </tr>
                  </tfoot> 
               </table>
            </div>
          </div>
        </div>
       </div>
      </div>

      <div id="accordion">
        <div class="card">
          <div class="card-header" id="headingThree">
            <h5 class="mb-0" id="PctExecutadosDia">
              <button class="btn btn-link" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                 <span>Pacotes executados no dia</span>
              </button>
            </h5>
          </div>
          <div id="collapseThree" class="collapse show" aria-labelledby="headingThree" data-parent="#accordion">
          <div class="card-body">
            <div class="panel-body">
              <table id="tblpctexesuc" class="display" cellspacing="0" width="100%" style="font-size: 12px;">
                <thead>
                  <tr>
                    <th>Processo</th>
                    <th>TM. Min.</th>
                    <th>TM. Hor.</th>
                    <th>Dt. Ult. Exec. 6meses</th>
                    <th>St. Atual</th>
                    <th>Hor. Ini Atual</th>
                    <th>Hor. Fim Atual</th>
                    <th>Tpo Min. Atual</th>
                    <th>Tpo Hor. Atual</th>
                    <th>Usu. Exec.</th>
                  </tr>
                </thead>
                  <?php 
                  echo "<tbody>\n";
                      $rows = ListaPacotesExecutadosDia(); 
                        foreach ($rows as $row):
                          echo "<tr>\n";
                          echo "<td>" . $row['NOM_PACOTE'] . "</td> \n";
                          echo "<td>" . $row['TEMPO_MEDIO_MIN'] . "</td> \n";
                          echo "<td>" . $row['TEMPO_MEDIO_HOR'] . "</td> \n";
                          echo "<td>" . $row['DAT_ULT_EXECUCAO_6MESES'] . "</td> \n";
                          echo "<td>" . $row['NOM_STATUS_ATUAL'] . "</td> \n";
                          echo "<td>" . $row['HOR_INI_ATUAL'] . "</td> \n";
                          echo "<td>" . $row['HOR_FIM_ATUAL'] . "</td> \n";
                          echo "<td>" . $row['TEMPO_MEDIO_MIN_ATUAL'] . "</td> \n";
                          echo "<td>" . $row['TEMPO_MEDIO_HOR_ATUAL'] . "</td> \n";
                          echo "<td>" . $row['USU_EXEC_ATUAL'] . "</td> \n";
                        endforeach; ?>
                      </tr>
                      </tbody>
                      <tfoot>
                          <tr>
                            <th>Processo</th>
                            <th>Tempo Médio MIN</th>
                            <th>Tempo Médio HOR</th>
                            <th>Data Ult. Exec. 6meses</th>
                            <th>Status Atual</th>
                            <th>Horário Ini Atual</th>
                            <th>Horário Fim Atual</th>
                            <th>Tempo Min Atual</th>
                            <th>Tempo Hor Atual</th>
                            <th>Usuário Exec.</th>
                          </tr>
                    </tfoot> 
                 </table>
            </div>
          </div>
        </div>
       </div>
      </div>
<?php include_once('layouts/footer.php'); ?>