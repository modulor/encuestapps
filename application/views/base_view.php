<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">    
    <title>Encuestas</title>
    <meta name="description" content="Encuestas"/>
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <!-- loading bootstrap -->
    <link href="<?php print base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- bootflat -->
    <link href="<?php print base_url() ?>assets/css/bootflat.css" rel="stylesheet">
    
    <!-- custom -->
    <link href="<?php print base_url() ?>assets/css/custom.css" rel="stylesheet">

    <!-- font awesome -->
    <link rel="stylesheet" href="<?php print base_url()."assets/css/font-awesome.min.css" ?>">

    <!-- sweet alert -->
    <link rel="stylesheet" href="<?php print base_url()."assets/css/sweetalert.css" ?>">

    <!-- datatables -->
    <link rel="stylesheet" type="text/css" href="<?php print base_url()."assets/datatables/datatables.min.css" ?>"/>

    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="<?php print base_url()."assets/css/bootstrap-datepicker.min.css" ?>">

    <!--<link rel="shortcut icon" href="img/favicon.ico">-->

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
      <script src="<?php print base_url() ?>js/html5shiv.js"></script>
      <script src="<?php print base_url() ?>js/respond.min.js"></script>
    <![endif]-->

    <!-- jquery -->
    <script src="<?php print base_url() ?>assets/js/jquery-1.10.1.min.js"></script>

    <script>var base_url = "<?php print base_url() ?>"</script>

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
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php print $this->session->userdata("email") ?> <b class="caret"></b></a>
                            <ul class="dropdown-menu" role="menu">
                                <li class="dropdown-header">Configuraci&oacute;n</li>
                                <li><a href="<?php print base_url()."configuracion/mi_perfil" ?>">Mi perfil</a></li>
                                <li><a href="<?php print base_url()."configuracion/cambiar_password" ?>">Cambiar contrase&ntilde;a</a></li>
                                <li class="divider"></li>
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
        <script src="<?php print base_url()."assets/js/highcharts.js" ?>"></script>
        <script src="<?php print base_url()."assets/js/validaciones.js" ?>"></script>
        <script src="<?php print base_url()."assets/js/sweetalert.min.js" ?>"></script>
        <script src="<?php print base_url()."assets/datatables/datatables.min.js" ?>"></script>
        <script src="<?php print base_url() ?>assets/js/jquery.timeago.js"></script>
        <script src="<?php print base_url()."assets/js/jquery.timeago.spanish.js" ?>"></script>
        <script src="<?php print base_url()."assets/js/bootstrap-datepicker.min.js" ?>"></script>
        <script src="<?php print base_url()."assets/locales/bootstrap-datepicker.es.min.js" ?>"></script>
        
    </body>
</html>