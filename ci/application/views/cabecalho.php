<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Consumo de Materiais</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>vendor/css/scroll.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>vendor/css/cabecalho.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="icon" type="imagem/png" href="../../img/logo-claro-512.png" />
</head>

<body>
    <?php $nome = $this->session->userdata('usuario', "nome"); ?>
    <nav class="navbar navbar-dark bg-danger flex-md-nowrap p-0 shadow">
        <a href="#" class="navbar-brand col-sm-3 col-md-2 mr-0">Consumo de Materiais SPI</a>
        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
                <?= anchor('autenticar/logout', 'Sair', array('class' => 'nav-link')) ?>
            </li>
        </ul>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <nav id="menu-lateral" class="navbar col-md-2 d-none d-md-block bg-dark sidebar" style="min-height:840px;">
                <div class="sidebar-sticky">

                    <div class="row">
                        <div class="sidebar text-center border-bottom border-secondary">

                            <img class="img-circle" src="../../img/avatar.jpg" style="width: 40%; margin-top:10%;">
                            <h3 style="color:white;"><?= $nome['nome'] ?></h3>
                        </div>
                        </ul>
                        <ul>
                            <h4 class="text-center" style="margin-top: 10%; color:white">Consumo</h4>
                        </ul>
                        <ul class="nav flex-column">

                            <li class="nav-item border-bottom border-secondary"">
                                <a href=<?= site_url("home/index") ?> class=" nav-link text-info">
                                <span class="fa fa-home"></span>
                                Visão Geral
                                <span class="sr-only">(current)</span>
                                </a>
                            </li>
                            <li class="nav-item border-bottom border-secondary">
                                <a href=<?= site_url("graficos/juntaGraficos") ?> class="nav-link text-info">
                                    <span class="fas fa-chart-bar"></span>
                                    Segmento & DDD
                                </a>
                            </li>
                            <li class="nav-item border-bottom border-secondary">
                                <a href=<?= site_url("cidades/juntaCidades") ?> class="nav-link text-info">
                                    <span class="fa fa-city"></span>
                                    <!--echo anchor(base_url('produtos/$produto['id']), $produto['nome']); testar -->
                                    Cidades
                                </a>
                            </li>
                            <li class="nav-item border-bottom border-secondary">
                                <a href=<?= site_url("tecnicos/juntaTecnicos") ?> class="nav-link text-info">
                                    <span class="fa fa-user"></span>
                                    <!--echo anchor(base_url('produtos/$produto['id']), $produto['nome']); testar -->
                                    Técnicos
                                </a>
                            </li>

                            <li class="nav-item border-bottom border-secondary">
                                <a href=<?= site_url("analitico/buscaDadosAnalitico") ?> class="nav-link text-info">
                                    <span class="fa fa-book"></span>
                                    <!--echo anchor(base_url('produtos/$produto['id']), $produto['nome']); testar -->
                                    Analítico
                                </a>
                            </li>                      

                        </ul>
                        <ul>
                            <h4 class="text-center" style="margin-top: 40%; color:white">Estoque</h4>
                        </ul>

                        <ul class="nav flex-column">

                            <li class="nav-item border-bottom border-secondary">
                                <a href=<?= site_url("estoque/consolidado") ?> class="nav-link text-info">
                                    <span class="fa fa-database"></span>
                                    <!--echo anchor(base_url('produtos/$produto['id']), $produto['nome']); testar -->
                                    Consolidado
                                </a>
                            </li>
                        </ul>
                    </div>
            </nav>
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">