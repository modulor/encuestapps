<div class="row">
	<div class="col-lg-12 text-center">
		<h1 class="page-header">
			<?php print $encuesta->nombre_encuesta ?><br>			
		</h1>
	</div>
</div>

<div class="row">
	<div class="col-sm-3">
		<p>&nbsp;</p>
		<p><a href="<?php print base_url()."encuestas/mis_encuestas/".$encuesta->campaigns_k ?>" class="btn btn-primary"><i class="fa fa-check-square-o"></i> Lista de encuestas</a></p>
	</div>
	<div class="col-sm-6">
		<div class="panel">
			<div class="panel-body">
				<?php 

					$startDate = new DateTime($fecha_inicio);
					$endDate = new DateTime($fecha_fin);

					$interval = $startDate->diff($endDate);

					echo $interval->days." - days<br>";
					echo (int)(($interval->days) / 7)." - weeks<br><br>";

					$step  = 1;
					$unit  = 'W';

					$interval = new DateInterval("P{$step}{$unit}");
					$period   = new DatePeriod($startDate, $interval, $endDate);

					foreach ($period as $date) {
					    echo $date->format('Y-m-d'), PHP_EOL;
					    print "<br>";
					}

					/*

					$dow   = 'saturday';
					$step  = 1;
					$unit  = 'W';

					$start = new DateTime('2012-06-01');
					$end   = clone $start;

					$start->modify($dow); // Move to first occurence
					$end->add(new DateInterval('P1Y')); // Move to 1 year from start

					$interval = new DateInterval("P{$step}{$unit}");
					$period   = new DatePeriod($start, $interval, $end);

					foreach ($period as $date) {
					    echo $date->format('Y-m-d'), PHP_EOL;
					    print "<br>";
					}

					*/

				?>
				<form action="<?php print base_url()."encuestas/resultados/".$encuesta->encuestas_k ?>" method="post" onsubmit="return valida_buscar_resultados_encuesta();">
					<div class="row">
						<div class="col-xs-10">
							<div class="form-group">
								<div class="input-daterange input-group" id="datepicker">
								    <input type="text" class="form-control" name="fecha_inicio" id="fecha_inicio" value="<?php print $fecha_inicio ?>" />
								    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
								    <input type="text" class="form-control" name="fecha_fin" id="fecha_fin" value="<?php print $fecha_fin ?>" />
								</div>
							</div>						
						</div>
						<div class="col-xs-2 text-right">
							<button type="submit" class="btn btn-primary btn-block"><i class="fa fa-search"></i></button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<script>
		$(function(){

			$('.input-daterange').datepicker({
			    startDate: "2015-10-01",
			    endDate: "2016-03-11",
			    multidate: false,
			    language: 'es',
			    format: "yyyy-mm-dd",
			});

		})
	</script>
	<div class="col-sm-3 text-right text-right-not-xs">
		<p>&nbsp;</p>
		<p><a href="<?php print base_url()."encuestas/crear/".$encuesta->campaigns_k ?>" class="btn btn-info"><i class="fa fa-plus"></i> Crear encuesta</a></p>
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

					<span class="badge badge-primary"><?php $votos = $this->Encuestas_model->get_votos_pregunta($opcion->encuestas_preguntas_opciones_k, $fecha_inicio, $fecha_fin); print $votos ?></span>

					<?php  print $opcion->opcion; ?>
				</li>
				<?php 

						// datos para el js highcharts pie

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
			            categories: ['Ene', 'Feb', 'Mar']
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
			            data: [7.0, 6.9, 9.5]
			        }, {
			            name: 'B',
			            data: [-0.2, 0.8, 5.7]
			        }, {
			            name: 'C',
			            data: [-0.9, 0.6, 3.5]
			        }, {
			            name: 'D',
			            data: [3.9, 4.2, 5.7]
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