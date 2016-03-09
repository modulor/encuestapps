<div class="row">
	<div class="col-lg-12 text-center">
		<h1 class="page-header">
			<?php print $encuesta->nombre_encuesta ?><br>
			<a href="<?php print base_url()."encuestas/mis_encuestas/".$encuesta->campaigns_k ?>" class="btn btn-info"><i class="fa fa-check-square-o"></i> Lista de encuestas</a>
		</h1>
	</div>
</div>

<?php
	foreach($preguntas as $pregunta):
?>

<div class="row">
	<div class="col-lg-4 col-md-4 col-sm-12">		
		<!-- preguntas -->		
		<div class="panel panel-info">
			<div class="panel-heading">
				<h2 class="panel-title"><?php print $pregunta->pregunta ?></h2>				
			</div>
			<ul class="list-group">
				<!-- respuestas -->
				<?php

					$los_resultados = array();

					$opciones = $this->Encuestas_model->get_preguntas_opciones($pregunta->encuestas_preguntas_k);

					foreach($opciones as $opcion):

				?>
				<li class="list-group-item">

					<span class="badge badge-primary"><?php $votos = $this->Encuestas_model->get_votos_pregunta($opcion->encuestas_preguntas_opciones_k); print $votos ?></span>

					<?php  print $opcion->opcion; ?>
				</li>
				<?php 

					// datos para el js highcharts

					$los_resultados[] = array(
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
	<div class="col-lg-4 col-md-4 col-sm-6">
		<div id="grafica_pie_<?php print $pregunta->encuestas_preguntas_k ?>"></div>

		<?php $data = json_encode($los_resultados) ?>

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
	</div>
	<div class="col-lg-4 col-md-4 col-sm-6">
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
			            categories: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun',
			                'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic']
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
			        series: [{
			            name: 'A',
			            data: [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 25.3, 28.9, 29.6]
			        }, {
			            name: 'B',
			            data: [-0.2, 0.8, 5.7, 11.3, 17.0, 22.0, 24.8, 24.1, 20.1, 14.1, 15.6, 16.5]
			        }, {
			            name: 'C',
			            data: [-0.9, 0.6, 3.5, 8.4, 13.5, 17.0, 18.6, 17.9, 14.3, 9.0, 3.9, 1.0]
			        }, {
			            name: 'D',
			            data: [3.9, 4.2, 5.7, 8.5, 11.9, 15.2, 17.0, 16.6, 14.2, 10.3, 6.6, 4.8]
			        }]
			    });
			});
		</script>
	</div>
</div>

<hr>
<?php 
	endforeach;
?>