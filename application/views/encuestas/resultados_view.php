<div class="row">
	<div class="col-lg-12 text-center">
		<h1 class="page-header">
			<?php print $encuesta->nombre_encuesta ?><br>			
		</h1>
	</div>
</div>


<!-- botones accion -->
<div class="row hidden-xs">
	<div class="col-lg-12">
		<div class="well">
			<div class="row">
				<div class="col-sm-4 text-center">
					<a href="<?php print base_url()."encuestas/mis_encuestas/".$encuesta->campaigns_k ?>" class="btn btn-primary"><i class="fa fa-check-square-o"></i> Lista de encuestas</a>
				</div>
				<div class="col-sm-4 text-center">
					<a href="<?php print base_url()."encuestas/crear/".$encuesta->campaigns_k ?>" class="btn btn-default"><i class="fa fa-plus"></i> Crear encuesta</a>
				</div>
				<div class="col-sm-4 text-center">
					<a href="<?php print base_url()."encuestas/aplicar/".$encuesta->encuestas_k ?>" class="btn btn-info btn-xs-block"><i class="fa fa-check-square-o"></i> Aplicar</a>
				</div>
			</div>
		</div>
	</div>	
</div>

<div class="row visible-xs">
	<div class="col-sm-8 text-center">
		<p>
			<div class="btn-group">
				<a <?php print base_url()."encuestas/mis_encuestas/".$encuesta->campaigns_k ?> class="btn btn-lg btn-primary"><i class="fa fa-check-square-o"></i> Lista de encuestas</a>

				<button class="btn btn-lg btn-primary dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>

				<ul class="dropdown-menu">
					<li>
						<a href="<?php print base_url()."encuestas/crear/".$encuesta->campaigns_k ?>"><i class="fa fa-plus"></i> Crear encuesta</a>
					</li>
					<li>
						<a href="<?php print base_url()."encuestas/aplicar/".$encuesta->encuestas_k ?>"><i class="fa fa-check-square-o"></i> Aplicar</a>
					</li>				
				</ul>
			</div>
		</p>
	</div>
</div>
<!-- botones accion fin -->


<!-- buscar resultados -->
<form action="<?php print base_url()."encuestas/resultados/".$encuesta->encuestas_k ?>" method="post" onsubmit="return valida_buscar_resultados_encuesta();">
	<div class="row">
		<div class="col-md-12">		
			<div class="well">
				<div class="row">					
					<div class="col-sm-8">
						<div class="row">
							<div class="col-sm-12 col-xs-12">								
								<div class="input-daterange input-group" id="datepicker">
								    <input type="text" class="form-control" name="fecha_inicio" id="fecha_inicio" value="<?php print $fecha_inicio ?>" />
								    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
								    <input type="text" class="form-control" name="fecha_fin" id="fecha_fin" value="<?php print $fecha_fin ?>" />
								</div>
								<!--<a href="#" name="mas_filtros">M&aacute;s opciones <i class="fa fa-angle-down"></i></a>-->
								<script>
									$(function(){

										// rango de fechas

										$('.input-daterange').datepicker({
										    startDate: "2015-10-01",
										    endDate: "2016-04-01",
										    multidate: false,
										    language: 'es',
										    format: "yyyy-mm-dd",
										    autoclose: true,
										    orientation: 'bottom'
										});

										// mas opciones

										$("a[name=mas_filtros]").click(function(e){

											e.preventDefault();

											$("#buscar_mas_filtros").toggleClass("hidden");

											$("a[name=mas_filtros]").toggleClass("hidden");

										});

									})
								</script>								
							</div>
							<div class="col-sm-12 col-xs-12 hidden" id="buscar_mas_filtros">

								<!-- ubicacion -->

								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">											
											<select name="cat_entidades_k" id="cat_entidades_k" class="form-control">
												<option value="todos">Todos los estados</option>
												<?php 
													foreach($entidades as $entidad):
												?>
												<option value="<?php print $entidad->cat_entidades_k ?>"><?php print $entidad->nom_ent ?></option>
												<?php
													endforeach;
												?>
											</select>
											<span class="help-block" id="cat_entidades_k_help"></span>
										</div>
									</div>
									<div class="col-sm-6" id="lista_municipios"></div>
								</div>

								<!-- ubicacion fin -->


								<div class="row">
									<div class="col-sm-6">
										<!-- edad -->
										<div class="form-group">											
											<select name="rango_edad" id="rango_edad" class="form-control">
												<option value="todos">Todas las edades</option>
												<option value="18-25">18 a 25 a&ntilde;os</option>
												<option value="26-35">26 a 35 a&ntilde;os</option>
												<option value="36-45">36 a 45 a&ntilde;os</option>
												<option value="46">+46</option>
											</select>
										</div>
										<!-- edad fin -->
									</div>
									<div class="col-sm-6">
										<!-- sexo -->
										<div class="form-group" id="form_group_sexo">
											<label class="radio-inline">
										  		<input type="radio" name="sexo" id="sexo_hombre" value="HOMBRE"> <strong>Hombre</strong>
											</label>
											<label class="radio-inline">
											  	<input type="radio" name="sexo" id="sexo_mujer" value="MUJER"> <strong>Mujer</strong>
											</label>
											<span id="sexo_help" class="help-block"></span>
										</div>
										<!-- sexo fin -->						
									</div>
								</div>								
							</div>							
							<div class="col-sm-12">
								<a href="#" name="mas_filtros" class="hidden">Menos opciones <i class="fa fa-angle-up"></i></a>
							</div>
						</div>						
					</div>	
					<div class="col-sm-2 col-xs-6 text-right">
						<button type="submit" class="btn btn-primary btn-block btns-resultados"><i class="fa fa-search"></i></button>
					</div>
					<div class="col-sm-2 col-xs-6 text-right">
						<button type="button" class="btn btn-danger btn-block btns-resultados" data-toggle="modal" data-target="#enviarEncuestaModal"><i class="fa fa-envelope"></i></button>
					</div>				
				</div>
			</div>		
		</div>
	</div>
</form>
<!-- buscar resultados fin -->


<!-- preguntas y graficas -->
<?php
	foreach($preguntas as $pregunta):
?>
<div class="row margin-bottom-20">

	<!-- preguntas -->
	<div class="<?php print $class_col_preguntas ?>">						
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
				<button class="list-group-item" data-toggle="modal" data-target="#preguntaModal" data-encuestas-preguntas-opciones-k="<?php print $opcion->encuestas_preguntas_opciones_k ?>" data-encuestas-preguntas-k="<?php print $pregunta->encuestas_preguntas_k ?>">
					<span class="badge badge-primary"><?php $votos = $this->Encuestas_model->get_votos_pregunta($opcion->encuestas_preguntas_opciones_k, $fecha_inicio, $fecha_fin); print $votos ?></span>
					<?php  print $opcion->opcion; ?>
				</button>
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
	</div>
	<!-- preguntas fin -->

	<!-- grafica pie -->
	<div class="<?php print $class_col_pie ?>">				
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
	</div>
	<!-- grafica pie fin -->

	<!-- grafica linea -->
	<?php 
		if($grafica_linea_mostrar):
	?>
	<div class="<?php print $class_col_linea ?>">		
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
			    	chart: {
			            type: 'area'
			        },
			        title: {
			            text: ''
			        },
			        subtitle: {
			            text: ''
			        },
			        xAxis: {
			            categories: <?php print json_encode($array_fechas_texto) ?>,
			            tickmarkPlacement: 'on',
			            title: {
			                enabled: false
			            }
			        },
			        yAxis: {
			            title: {
			                text: 'Porcentaje'
			            }
			        },
			        tooltip: {
			            pointFormat: '<span style="color:{series.color}">{series.name}</span>: <b>{point.percentage:.1f}%</b> ({point.y:,.0f} votos)<br/>',
			            shared: true
			        },
			        plotOptions: {
			            area: {
			                stacking: 'percent',
			                lineColor: '#ffffff',
			                lineWidth: 1,
			                marker: {
			                    lineWidth: 1,
			                    lineColor: '#ffffff'
			                }
			            }
			        },
			        series: <?php print $data_pie ?>
			        /*
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
			        */
			    });
			});
		</script>		
	</div>
	<?php 
		endif;
	?>
	<!-- grafica linea fin -->

</div>
<?php 
	endforeach;
?>
<!-- preguntas y graficas fin -->


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


<!-- ver respuestas de pregunta modal -->
<div class="modal fade" id="preguntaModal" tabindex="1" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true"><i class="fa fa-times"></i></span></button>
				<h4 class="modal-title" id="modal_pregunta_title"></h4>
				<p class="text-muted" id="modal_respuesta_title"></p>
			</div>
			<div class="modal-body" id="modal_pregunta_contenido">
			</div>
			<div class="modal-footer">				
				<button type="button" class="btn btn-default hide" data-dismiss="modal">Cerrar</button>
			</div>
		</div>
	</div>
</div>
<!-- ver respuestas de pregunta modal fin -->

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


	// trigger para el modal con info de una pregunta

	$("button.list-group-item").click(function(){

		var encuestas_preguntas_opciones_k = $(this).data('encuestas-preguntas-opciones-k');

		var encuestas_preguntas_k = $(this).data('encuestas-preguntas-k');		

		$.ajax({
	        url: base_url+"encuestas/pregunta_resultados/", 
	        type: "POST", 
	        dataType: 'html',
	        data: {
	            encuestas_preguntas_opciones_k: encuestas_preguntas_opciones_k,
	            encuestas_preguntas_k: encuestas_preguntas_k,
	            fecha_inicio: $('#fecha_inicio').val(),
	            fecha_fin: $('#fecha_fin').val()
	        },   
	        beforeSend: function(){

	        	$("#modal_pregunta_contenido").html("<div class='text-center'><i class='fa fa-spinner fa-spin fa-3x'></i></div>");
	        	
	        },                 
	        success: function(respond){ 
	        	
				$("#modal_pregunta_contenido").html(respond);	        	

	        },
	        error: function (data){		            

	        	swal({
					title: "Oops...",
					text: "Ocurrio un error inesperado...",
					timer: 3500,
					type: "error"
				});			

	        }
	    });


	    // agregar col-xs-2 para los divs con "mostrar registros" y "buscar" del encabezado del datatables

	    DataTables_Table_2_wrapper

	});

</script>