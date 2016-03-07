<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <title>Encuestas</title>
    <meta name="description" content="Encuestas"/>

    <meta name="viewport" content="width=1000, initial-scale=1.0, maximum-scale=1.0">

    <!-- loading bootstrap -->
    <link href="<?php print base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- bootflat -->
    <link href="<?php print base_url() ?>assets/css/bootflat.css" rel="stylesheet">
    <link href="<?php print base_url() ?>assets/css/custom.css" rel="stylesheet">

    <!-- font awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    <!--<link rel="shortcut icon" href="img/favicon.ico">-->

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
      <script src="<?php print base_url() ?>js/html5shiv.js"></script>
      <script src="<?php print base_url() ?>js/respond.min.js"></script>
    <![endif]-->

    <!-- jquery -->
    <script src="<?php print base_url() ?>assets/js/jquery-1.10.1.min.js"></script>

    </head>
    <body>

        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php print base_url() ?>">Encuestas</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">                        
                        <?php $this->load->view($this->session->userdata("menu_principal")) ?>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Mi cuenta <b class="caret"></b></a>
                            <ul class="dropdown-menu" role="menu">
                                <!--
                                <li class="dropdown-header">Configuraci&oacute;n</li>
                                <li><a href="#">Perfil</a></li>
                                <li><a href="#">Cambiar contrase&ntilde;a</a></li>                                
                                <li class="divider"></li>
                                -->
                                <li><a href="<?php print base_url()."login/cerrar_sesion" ?>">Salir</a></li>
                            </ul>
                        </li>                        
                    </ul>
                </div>
            </div>
        </nav>     

        <div class="container-fluid">            
            <div class="row">
                <div class="col-lg-12"><?php $this->load->view($contenido_view) ?></div>
            </div>
        </div>

        <!-- js -->        
        <script src="<?php print base_url() ?>assets/js/bootstrap.min.js"></script>
        <script src="<?php print base_url() ?>assets/js/icheck.min.js"></script>        
        <script src="<?php print base_url() ?>assets/js/jquery.fs.selecter.min.js"></script>
        <script src="<?php print base_url() ?>assets/js/jquery.fs.stepper.min.js"></script>
        <script src="<?php print base_url() ?>assets/js/funciones.js"></script>
        <script src="<?php print base_url() ?>assets/js/jquery.timeago.js"></script>
        <script>
            jQuery(document).ready(function() {
                jQuery("time.timeago").timeago();

                jQuery.timeago.settings.strings = {
                    prefixAgo: "hace",
                    prefixFromNow: "dentro de",
                    suffixAgo: "",
                    suffixFromNow: "",
                    seconds: "menos de un minuto",
                    minute: "un minuto",
                    minutes: "unos %d minutos",
                    hour: "una hora",
                    hours: "%d horas",
                    day: "un día",
                    days: "%d días",
                    month: "un mes",
                    months: "%d meses",
                    year: "un año",
                    years: "%d años"
                };
            }); 
        </script>
        <script src="https://code.highcharts.com/highcharts.js"></script>
        
    </body>
</html>