<?php
  $page_title = 'Lista de processos';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
  $processos = ListaProcessos();
?>

<?php include_once('layouts/header.php'); ?>

<script type="text/javascript" language="javascript" class="init">    
$(document).ready(function() {
    $('#tblprocesso').dataTable({
        "aaSorting": [[ 0, "asc" ]],
        "bPaginate": true,
        "bFilter": true,
        "sType": "brazilian", 
        "aoColumns": [
        { "sType": 'numeric' },
        { "sType": 'text' },
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
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading clearfix">
           <div class="pull-right">
             <a href="add_product.php" class="btn btn-primary">Cadastrar processo</a>
           </div>
          </div>
          <div id="collapseThree" class="collapse show" aria-labelledby="headingThree" data-parent="#accordion">
          <div class="card-body">
            <div class="panel-body">
              <table id="tblprocesso" class="display" cellspacing="0" width="100%" style="font-size: 12px;">
                <thead>
                  <tr>
                  <th style="width: 1%;">Seq</th>
                  <th style="width: 10%;"> Nome processo </th>
                  <th style="width: 20%;"> Descrição completa </th>
                  <th style="width: 7%;"> Tipo de processo </th>
                  <th style="width: 7%;"> Horário de carga </th>
                  <th style="width: 10%;"> Data do últ. exec. </th>
                </tr>
              </thead>
               <?php 
                echo "<tbody>\n";
                $rows = ListaProcessos(); 
                  foreach ($processos as $processo):
                    echo "<tr>\n";
                    echo "<td>" . intval($processo['PRC_SEQ']) . "</td> \n";
                    echo "<td>" . $processo['PRC_NOM'] . "</td> \n";
                    echo "<td>" . $processo['PRC_DES_CMPPRC'] . "</td> \n";
                    echo "<td>" . $processo['PRC_TIP_PRC'] . "</td> \n";
                    echo "<td>" . $processo['PRC_NOM_HORCGA'] . "</td> \n";
                    echo "<td>" . $processo['PRC_DAT_ULTEXE'] . "</td> \n";
                  endforeach; ?>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include_once('layouts/footer.php'); ?>
