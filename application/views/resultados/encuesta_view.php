<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">    
    <title>Encuestas</title>
    <meta name="description" content="Encuestas"/>

    </head>
    <body>

        <h1 class="page-header">
            <?php print $encuesta->nombre_encuesta ?><br>           
        </h1>

        <p>Resultados generados del <strong><?php print getFechaNormal($fecha_inicio,"corto") ?></strong> al <strong><?php print getFechaNormal($fecha_fin,"corto") ?></strong></p>

        <p>Para ver los resultados de la encuesta, por favor haga clic en el siguiente enlace:</p>

        <p>
            <a href="<?php print base_url()."resultados/encuesta/".$codigo ?>" target="_blank"><?php print base_url()."resultados/encuesta/".$codigo ?></a>
        </p>
        
    </body>
</html>