<div class="row">
	<div class="col-lg-12 text-center">
		<h1 class="page-header">
			<?php print $encuesta->nombre_encuesta ?><br>			
		</h1>
	</div>
</div>

<div class="row">
	<div class="col-sm-2">		
		<p><a href="<?php print base_url()."encuestas/mis_encuestas/".$encuesta->campaigns_k ?>" class="btn btn-primary btn-block btn-lg"><i class="fa fa-check-square-o"></i> Lista de encuestas</a></p>
	</div>
	<div class="col-sm-8">
		<div class="panel">
			<div class="panel-body">

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
			    endDate: "2016-04-01",
			    multidate: false,
			    language: 'es',
			    format: "yyyy-mm-dd",
			});

		})
	</script>
	<div class="col-sm-2 text-right text-right-not-xs">
		<p><a href="<?php print base_url()."encuestas/crear/".$encuesta->campaigns_k ?>" class="btn btn-info btn-block btn-lg"><i class="fa fa-plus"></i> Crear encuesta</a></p>
	</div>
</div>

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