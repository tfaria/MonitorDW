        <?php
          $page_title = 'Painel de Monitoramento DW';
          require_once('includes/load.php');
          if (!$session->isUserLoggedIn(true)) { redirect('index.php', false);}
        ?>

        <?php include_once('layouts/header.php'); ?>

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
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-yellow">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-refresh"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"><?php QtdPacotesEmExecucao()?></div>
                                <div>Processos em Execução</div>
                            </div>
                        </div>
                    </div>
                    <a href="#">
                        <div class="panel-footer">
                            <span class="pull-left">Detalhes</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-red">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-support fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"><?php QtdPacotesErro()?></div>
                                <div>Execuções com Falha</div>
                            </div>
                        </div>
                    </div>
                    <a href="#">
                        <div class="panel-footer">
                            <span class="pull-left">Detalhes</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-green">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-tasks fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"><?php QtdPacotesSucesso()?>/999</div>
                                <div>Sucesso x Total</div>
                            </div>
                        </div>
                    </div>
                    <a href="#">
                        <div class="panel-footer">
                            <span class="pull-left">Detalhes</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-gray">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-shopping-cart fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">0</div>
                                <div>Execução demorada</div>
                            </div>
                        </div>
                    </div>
                    <a href="#">
                        <div class="panel-footer">
                            <span class="pull-left">Detalhes</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-black">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-shopping-cart fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">0</div>
                                <div>Processos não executados</div>
                            </div>
                        </div>
                    </div>
                    <a href="#">
                        <div class="panel-footer">
                            <span class="pull-left">Detalhes</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        
        <!--Cards-->
        <div class="row">
          <div class="col-md-12">
            <?php echo display_msg($msg); ?>
          </div>
        </div>
        <div id="accordion">
          <div class="card">
            <div class="card-header" id="headingOne">
              <h5 class="mb-0">
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
                     <th>Pacote</th>
                     <th>Job</th>
                     <th>Step</th>
                     <th>Início</th>
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
                            echo "<td>" . $row['DESCRICAOPACOTE'] . "</td> \n";
                            echo "<td>" . $row['JOB'] . "</td> \n";
                            echo "<td>" . $row['STEP'] . "</td> \n";
                            echo "<td>" . $row['HORARIOINICIO'] . "</td> \n";
                            echo "<td>" . $row['USUARIOEXEC'] . "</td> \n";
                            echo "<td>" . $row['SERVIDOREXEC'] . "</td> \n";
                            echo "<td>" . $row['TEMPO_EM_EXECUCAO'] . "</td> \n";
                      endforeach; ?>
                      </tr>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>Pacote</th>
                        <th>Job</th>
                        <th>Step</th>
                        <th>Início</th>
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
              <h5 class="mb-0">
                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                   <span>Pacotes executados com erro</span>
                </button>
              </h5>
            </div>
            <div id="collapseTwo" class="collapse collapsed" aria-labelledby="headingTwo" data-parent="#accordion">
            <div class="card-body">
              <div class="panel-body">
                <table id="tblpctexecerro" class="display" cellspacing="0" width="100%" style="font-size: 12px;">
                  <thead>
                    <tr>
                     <th>Pacote</th>
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
                      <th>Pacote</th>
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
              <h5 class="mb-0">
                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                   <span>Pacotes executados no dia</span>
                </button>
              </h5>
            </div>
            <div id="collapseThree" class="collapse collapsed" aria-labelledby="headingThree" data-parent="#accordion">
            <div class="card-body">
              <div class="panel-body">
                <table id="tblpctexesuc" class="display" cellspacing="0" width="100%" style="font-size: 12px;">
                  <thead>
                    <tr>
                      <th>Pacote</th>
                      <th>Tm. Min.</th>
                      <th>Tm. Hr.</th>
                      <th>Dt. Ult. Exec. 6meses</th>
                      <th>St. Atual</th>
                      <th>Hor. Ini Atual</th>
                      <th>Hor. Fim Atual</th>
                      <th>Tpo Min. Atual</th>
                      <th>Tpo Hr. Atual</th>
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
                              <th>Pacote</th>
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
      <?php
        require_once('layouts/footer.php');
      ?>