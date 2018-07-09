<?php
  $page_title = 'Painel de Monitoramento DW';
  require_once('includes/load.php');
  if (!$session->isUserLoggedIn(true)) { redirect('index.php', false);}
?>
<?php include_once('layouts/header.php'); ?>

<script type="text/javascript" language="javascript" class="init">    
$(document).ready(function() {
    $('#example').dataTable({
        "aaSorting": [[ 1, "asc" ]],
        "bPaginate": true,
        "bFilter": true,
        "sType": "brazilian", 
        "aoColumns": [
        { "sType": 'text' },
        { "sType": 'text' },
        { "sType": 'text' },
        { "sType": 'text' },
        ]            
    });
    
});
</script>


<div class="row">
  <div class="col-md-12">
    <?php echo display_msg($msg); ?>
  </div>
      <div class="col-md-3">
         <div class="panel panel-box clearfix">
           <div class="panel-icon pull-left bg-yellow">
            <i class="glyphicon glyphicon-minus-sign"></i>
          </div>
          <div class="panel-value pull-right">
            <h2 class="margin-top"> <?php QtdPacotesEmExecucao()?> </h2>
            <a href="#PctExecucao">Qtde Pacotes Execução</a>
          </div>
        </div>   
      </div>
      <div class="col-md-3">
         <div class="panel panel-box clearfix">
           <div class="panel-icon pull-left bg-red">
            <i class="glyphicon glyphicon-remove-sign"></i>
          </div>
          <div class="panel-value pull-right">
            <h2 class="margin-top"> <?php QtdPacotesErro()?> </h2>
            <a href="#PctErro">Qtde Pacotes Erro</a>
          </div>
        </div>   
      </div>
      <div class="col-md-3">
         <div class="panel panel-box clearfix">
           <div class="panel-icon pull-left bg-green">
            <i class="glyphicon glyphicon-ok-sign"></i>
          </div>
          <div class="panel-value pull-right">
            <h2 class="margin-top"> <?php QtdPacotesSucesso()?> </h2>
            <a href="#PctSucesso">Qtde Pacotes Sucesso</a>
          </div>
        </div>   
      </div>
      <div class="col-md-3">
         <div class="panel panel-box clearfix">
           <div class="panel-icon pull-left bg-info">
            <i class="glyphicon glyphicon-question-sign"></i>
          </div>
          <div class="panel-value pull-right">
            <h2 class="margin-top"> <?php QtdPacotesErro()?> </h2>
            <p class="text-muted">Qtde Pacotes Execução demorada</p>
          </div>
        </div>   
      </div>
      </div>
      <div class="col-md-12" id="PctExecucao">
       <div class="panel panel-default">
         <div class="panel-heading">
           <strong>
             <span class="glyphicon glyphicon-th"></span>
             <span>Pacotes em Execução</span>
           </strong>
         </div>
         <div class="panel-body">
           <table class="table table-striped table-bordered table-condensed">
            <thead>
             <tr>
               <th>Pacote</th>
               <th>Início</th>
               <th>Usuário</th>
               <th>Tempo em exec</th>
             <tr>
            </thead>
            <tbody>
              <?php $rows = ListaPacotesEmExecucao(); 
                foreach ($rows as $row): ?>
                <tr>
                  <td><?php echo $row['DESCRICAOPACOTE'];?></td>
                  <td><?php echo $row['HORARIOINICIO'];?></td>
                  <td><?php echo $row['USUARIOEXEC'];?></td>
                  <td><?php echo $row['TEMPO_EM_EXECUCAO'];?></td>
                </tr>
              <?php endforeach; ?>
            <tbody>
           </table>
         </div>
       </div>
      </div>
      <div class="col-md-12" id="PctErro">
       <div class="panel panel-default">
         <div class="panel-heading">
           <strong>
             <span class="glyphicon glyphicon-th"></span>
             <span>Pacotes executados com Erro</span>
           </strong>
         </div>
         <div class="panel-body">
           <table class="table table-striped table-bordered table-condensed">
            <thead>
             <tr>
               <th>Pacote</th>
               <th>Início</th>
               <th>Usuário</th>
               <th>Tempo em exec</th>
             <tr>
            </thead>
            <tbody>
              <?php $rows = ListaPacotesErro(); 
                foreach ($rows as $row): ?>
                <tr>
                  <td><?php echo $row['DESCRICAOPACOTE'];?></td>
                  <td><?php echo $row['HORARIOINICIO'];?></td>
                  <td><?php echo $row['USUARIOEXEC'];?></td>
                  <td><?php echo $row['TEMPO_EM_EXECUCAO'];?></td>
                </tr>
              <?php endforeach; ?>
            <tbody>
           </table>
         </div>
       </div>
      </div>
      <div class="col-md-12" id="PctSucesso">
      <div class="panel panel-default">
       <div class="panel-heading">
         <strong>
           <span class="glyphicon glyphicon-th"></span>
           <span>Pacotes executados com sucesso</span>
         </strong>
       </div>
       <div class="panel-body">
        <table id="example" class="display" cellspacing="0" width="80%" style="font-size: 1em;">
          <thead>
           <tr>
             <th>Pacote</th>
             <th>Início</th>
             <th>Usuário</th>
             <th>Tempo em exec</th>
           <tr>
          </thead>
          <?php 
          echo "<tbody>\n";
              $rows = ListaPacotesSucesso(); 
                foreach ($rows as $row):
                  echo "<tr>\n";
                  echo "<td>" . $row['DESCRICAOPACOTE'] . "</td> \n";
                  echo "<td>" . $row['HORARIOINICIO'] . "</td> \n";
                  echo "<td>" . $row['USUARIOEXEC'] . "</td> \n";
                  echo "<td>" . $row['TEMPO_EM_EXECUCAO'] . "</td> \n";
                endforeach; ?>
              </tr>
              </tbody>
          <tfoot>
              <tr>
                  <th>Pacote</th>
                  <th>Início</th>
                  <th>Usuário</th>
                  <th>Tempo em exec</th>
              </tr>
          </tfoot>                
        </table>
       </div>
      </div>
      </div>
<?php include_once('layouts/footer.php'); ?>