<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <title>Iniciar sesi&oacute;n &raquo; Encuestas</title>
    <meta name="description" content="Encuestas"/>

    <meta name="viewport" content="width=device-width,initial-scale=1">

    <!-- loading bootstrap -->
    <link href="<?php print base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- bootflat -->
    <link href="<?php print base_url() ?>assets/css/bootflat.min.css" rel="stylesheet">
    <link href="<?php print base_url() ?>assets/css/custom.css" rel="stylesheet">

    <!-- font awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">


    <!--<link rel="shortcut icon" href="img/favicon.ico">-->

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
      <script src="<?php print base_url() ?>js/html5shiv.js"></script>
      <script src="<?php print base_url() ?>js/respond.min.js"></script>
    <![endif]-->

    </head>
    <body class="body-login">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">                    

                    <form action="<?php print base_url()."login" ?>" method="post" class="login-form">

                        <div class="form-group text-center">                            
                            <i class="fa fa-user fa-4x"></i>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                <input type="text" class="form-control login-field" value="" placeholder="Correo electr&oacute;nico" id="email-login" name="email" autofocus />
                            </div>                            
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                <input type="password" class="form-control login-field" value="" placeholder="Contrase&ntilde;a" id="login-pass" name="password" />
                            </div>
                            
                        </div>
                        
                        <button class="btn btn-primary btn-lg btn-block" href="#">Entrar</button>

                    </form>
                    
                    <?php 
                        if(isset($error)):
                    ?>
                    <div class="alert alert-danger text-center" role="alert">
                        <?php print $error;  ?>
                    </div>
                    <?php
                        endif;
                    ?>
                </div>
            </div>
        </div>

        <script src="<?php print base_url() ?>assets/js/jquery-1.10.1.min.js"></script>
        <script src="<?php print base_url() ?>assets/js/bootstrap.min.js"></script>
        <script src="<?php print base_url() ?>assets/js/icheck.min.js"></script>        
        <script src="<?php print base_url() ?>assets/js/jquery.fs.selecter.min.js"></script>
        <script src="<?php print base_url() ?>assets/js/jquery.fs.stepper.min.js"></script>
    </body>
</html>