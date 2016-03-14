<div class="row">
	<div class="col-lg-12 text-center">
		<h1 class="page-header">
			<?php print $encuesta->nombre_encuesta ?><br>			
		</h1>
	</div>
</div>

<div class="row">
	<div class="col-xs-6 text-right">
		<a href="<?php print base_url()."encuestas/mis_encuestas/".$encuesta->campaigns_k ?>" class="btn btn-primary"><i class="fa fa-check-square-o"></i> Lista de encuestas</a>
	</div>
	<div class="col-xs-6 text-left">
		<a href="<?php print base_url()."encuestas/crear/".$encuesta->campaigns_k ?>" class="btn btn-info"><i class="fa fa-plus"></i> Crear encuesta</a>
	</div>	
</div>

<div class="row">
	<div class="col-md-12">
		<div class="panel">
			<div class="panel-body">
				<div class="row">					
					<div class="col-sm-12">		
						<form action="<?php print base_url()."encuestas/resultados/".$encuesta->encuestas_k ?>" method="post" onsubmit="return valida_buscar_resultados_encuesta();">
							<div class="row">
								<div class="col-xs-8">
									<div class="form-group">
										<div class="input-daterange input-group" id="datepicker">
										    <input type="text" class="form-control" name="fecha_inicio" id="fecha_inicio" value="<?php print $fecha_inicio ?>" />
										    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
										    <input type="text" class="form-control" name="fecha_fin" id="fecha_fin" value="<?php print $fecha_fin ?>" />
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
									</div>						
								</div>
								<div class="col-xs-2 text-right">
									<button type="submit" class="btn btn-primary btn-block"><i class="fa fa-search"></i></button>
								</div>
								<div class="col-xs-2 text-right">
									<button type="button" class="btn btn-danger btn-block" data-toggle="modal" data-target="#enviarEncuestaModal"><i class="fa fa-envelope"></i></button>
								</div>
							</div>
						</form>
					</div>					
				</div>
			</div>
		</div>
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


<!-- enviar encuesta modal -->
<div class="modal fade" id="enviarEncuestaModal" tabindex="1" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true"><i class="fa fa-times"></i></span></button>
				<h4 class="modal-title"><i class="fa fa-envelope"></i> Enviar encuesta</h4>
			</div>
			<div class="modal-body">
				<div class="form-group">						
					<label class="control-label">* Email</label>
					<input type="text" name="email" id="email" class="form-control">
					<span class="help-block" id="email_help"></span>
				</div>

				<p class="text-muted" id="mensaje_email"></p>
			</div>
			<div class="modal-footer">
				<button type="button" name="enviar_email" class="btn btn-primary">Enviar</button>
				<button type="button" name="cancelar_email" class="btn btn-default hide" data-dismiss="modal">Cerrar</button>
			</div>
		</div>
	</div>
</div>
<!-- enviar encuesta modal fin -->

<script type="text/javascript">

	// modal email

	$('#enviarEncuestaModal').on('shown.bs.modal', function () {
  		
  		$('#email').focus();

  		// mensaje email

		var mensaje_email = "<p>Se enviar&aacute;n los resultados obtenidos del <strong>"+$("#fecha_inicio").val()+"</strong> al <strong>"+$("#fecha_fin").val()+"</strong></p>";

		$("#mensaje_email").html(mensaje_email);

	});	
	
	// validar envio de email

	$("button[name=enviar_email]").click(function(){		

		enviarEmailEncuesta();

	});


	$('#email').keypress(function (e) {
		var key = e.which;
		if(key == 13){
			enviarEmailEncuesta();
			return false;  
		}
	});


	function enviarEmailEncuesta()
	{

		// vaciar errores

		$(".help-block").empty();

		$(".has-error").removeClass('has-error');

		errores = 0;

		if($("#email").val()==""){		
			mensajesError("email","Campo obligatorio");
			errores++;
		}

		if(!validarEmail($("#email").val())){		
			mensajesError("email","El email <strong>'"+$("#email").val()+"'</strong> no es v&aacute;lido");
			errores++;
		}

		if(errores == 0){

			var email = $("#email").val();

			var fecha_inicio = $("#fecha_inicio").val();

			var fecha_fin = $("#fecha_fin").val();

			var encuestas_k = "<?php print $encuesta->encuestas_k ?>";

			$.ajax({
		        url: base_url+"encuestas/enviar/", 
		        type: "POST", 
		        dataType: 'json',
		        data: {
		            encuestas_k: encuestas_k,
		            fecha_inicio: fecha_inicio,
		            fecha_fin: fecha_fin,
		            email: email
		        },   
		        beforeSend: function(){

		        	$("div.modal-body").html("<div class='text-center'><i class='fa fa-spinner fa-spin fa-3x'></i></div>");

		        	$("button[name=enviar_email]").prop("disabled",true);
		        	
		        },                 
		        success: function(respond){ 
		        	
		        	$("div.modal-body").html('<div class="text-center">La encuesta ha sido enviada a <strong>'+respond.email+'</strong></div>');

		        	$("button[name=enviar_email]").addClass("hide");

		        	$("button[name=cancelar_email]").removeClass("hide");

		        	console.log("fecha inicio: "+respond.fecha_inicio);
		        	console.log("fecha fin: "+respond.fecha_fin);

		        },
		        error: function (data){		            

		        	swal({
						title: "Oops...",
						text: "Ocurrio un error inesperado...",
						timer: 3500,
						type: "error"
					});

					$("button[name=enviar_email]").prop("disabled",false);

		        }
		    });

		}

	}

</script>