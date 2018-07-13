<?php $user = current_user(); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title><?php if (!empty($page_title))
           echo remove_junk($page_title);
            elseif(!empty($user))
           echo ucfirst($user['name']);
            else echo "Painel Monitoramento DW";?>
    </title>

    <link rel="stylesheet" type="text/css" href="libs/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="libs/css/style3.css">
    <link rel="stylesheet" type="text/css" href="libs/css/sb-admin-2.css">
    <link rel="stylesheet" type="text/css" href="libs/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="libs/css/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" type="text/css" href="libs/css/jquery.dataTables.css"/>

    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.js"></script>
  </head>

  <body>

    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div id="dismiss">
                <i class="fas fa-arrow-left"></i>
            </div>

            <div class="sidebar-header">
                <h3>Data Warehouse Monitoring</h3>
            </div>

            <ul class="list-unstyled components">
                <p>Bem Vindo</p>
                <li class="active">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false">Carga diária</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="#">Monitoramento diário</a>
                        </li>
                        <li>
                            <a href="#">Histórico de carga</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false">Cadastros</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="#">Cadastro de processos de carga</a>
                        </li>
                        <li>
                            <a href="#">Cadastro de dependências</a>
                        </li>
                        <li>
                            <a href="#">Cadastro de novo objeto</a>
                        </li>
                        <li>
                            <a href="#">Agendamento de processos</a>
                        </li>
                        <li>
                            <a href="#">Cadastro de assuntos</a>
                        </li>
                    </ul>
                </li>
            </ul>

            <ul class="list-unstyled CTAs">
                <li>
                </li>
                <li>
                </li>
            </ul>
        </nav>

        <!-- Page Content  -->
        <div id="content">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                        <span>Exibir barra</span>
                    </button>
                </div>
            </nav>