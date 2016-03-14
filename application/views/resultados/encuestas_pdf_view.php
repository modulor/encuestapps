<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">    
    <title>Encuestas</title>
    <meta name="description" content="Encuestas"/>
    
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
        
        <h1 class="page-header">
            <?php print $encuesta->nombre_encuesta ?><br>           
        </h1>

        <?php
            foreach($preguntas as $pregunta):
        ?>

        <div class="row">
            <div class="<?php print $class_col_preguntas ?>">       
                <!-- preguntas -->      
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h2 class="panel-title"><?php print $pregunta->pregunta ?></h2>             
                    </div>
                    <ul class="list-group">
                        <!-- respuestas -->
                        <?php

                            $los_resultados_pie = array();

                            $opciones = $this->Encuestas_model->get_preguntas_opciones($pregunta->encuestas_preguntas_k);

                            foreach($opciones as $opcion):

                        ?>
                        <li class="list-group-item">

                            <span class="badge badge-primary"><?php $votos = $this->Encuestas_model->get_votos_pregunta($opcion->encuestas_preguntas_opciones_k, $fecha_inicio, $fecha_fin); print $votos ?></span>

                            <?php  print $opcion->opcion; ?>
                        </li>
                        <?php 

                                // datos para el js highcharts pie

                                $los_resultados_pie[] = array(
                                    "name" => $opcion->opcion, 
                                    "y"  => $votos
                                );

                            endforeach;

                        ?>
                        <!-- respuestas fin -->
                    </ul>
                </div>
                <!-- preguntas fin -->
            </div>
            <div class="<?php print $class_col_pie ?>">
                
                <!-- grafica pie -->
                <div id="grafica_pie_<?php print $pregunta->encuestas_preguntas_k ?>"></div>
                <?php $data = json_encode($los_resultados_pie) ?>
                <script type="text/javascript">
                    $(function () {
                        $(document).ready(function () {
                            // Build the chart
                            $('#grafica_pie_<?php print $pregunta->encuestas_preguntas_k ?>').highcharts({
                                chart: {
                                    plotBackgroundColor: null,
                                    plotBorderWidth: null,
                                    plotShadow: false,
                                    type: 'pie'
                                },
                                title: {
                                    text: ''
                                },
                                tooltip: {
                                    pointFormat: '<b>{point.percentage:.1f}%</b>'
                                },
                                plotOptions: {
                                    pie: {
                                        allowPointSelect: true,
                                        cursor: 'pointer',
                                        dataLabels: {
                                            enabled: false
                                        },
                                        showInLegend: true
                                    }
                                },
                                series: [{
                                    name: '',
                                    colorByPoint: true,
                                    data:<?php print $data ?>
                                }]
                            });
                        });
                    });
                </script>
                <!-- grafica pie fin -->

            </div>

            <?php 

                if($grafica_linea_mostrar):

            ?>
            <div class="<?php print $class_col_linea ?>">

                <!-- grafica linea -->
                <?php

                    $los_resultados_linea = array();

                    foreach($opciones as $opcion):

                        $los_votos_linea = $this->Encuestas_model->get_votos_pregunta_linea($opcion->encuestas_preguntas_opciones_k, $array_fechas);

                        $los_resultados_linea[] = array(
                            "name" => $opcion->opcion, 
                            "data"  => $los_votos_linea
                        );

                    endforeach;

                    $data_pie = json_encode($los_resultados_linea);

                    //print $data_pie." - ";

                ?>
                <div id="grafica_linea_<?php print $pregunta->encuestas_preguntas_k ?>"></div>
                <script type="text/javascript">
                    $(function () {
                        $('#grafica_linea_<?php print $pregunta->encuestas_preguntas_k ?>').highcharts({
                            title: {
                                text: '',
                                x: -20 //center
                            },
                            subtitle: {
                                text: '',
                                x: -20
                            },
                            xAxis: {
                                categories: <?php print json_encode($array_fechas_texto) ?>
                            },
                            yAxis: {
                                title: {
                                    text: 'Votos'
                                },
                                plotLines: [{
                                    value: 0,
                                    width: 1,
                                    color: '#808080'
                                }]
                            },
                            tooltip: {
                                valueSuffix: ''
                            },
                            legend: {
                                layout: 'vertical',
                                align: 'right',
                                verticalAlign: 'middle',
                                borderWidth: 0
                            },
                            series: <?php print $data_pie ?>
                        });
                    });
                </script>
                <!-- grafica linea fin -->

            </div>
            <?php 

                endif;

            ?>
        </div>

        <hr>
        <?php 
            endforeach;
        ?>

        <script src="<?php print base_url()."assets/js/highcharts.js" ?>"></script>
        
    </body>
</html>