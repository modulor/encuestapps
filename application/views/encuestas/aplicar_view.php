<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header text-center"><?php print $encuesta->nombre_encuesta ?></h1>
	</div>
</div>

<?php 
	if(isset($ok)){
?>
<script>
	$(function(){

		<?php 
			switch ($this->session->userdata("nivel")) {

				// cliente

				case 50:
					$confirmButtonText = "Resultados";
					$location = base_url()."encuestas/resultados/".$encuesta->encuestas_k;
				break;
				
				case 20:
					$confirmButtonText = "Continuar";
					$location = base_url()."encuestas/mis_encuestas/".$encuesta->campaigns_k;
				break;
				
			}
		?>

		swal(
			{
				title: "Informaci&oacute;n guardada",						
				type: "success",
				html: true,
				showCancelButton: false,						
				confirmButtonText: "<?php print $confirmButtonText ?>",
				closeOnConfirm: false
			}, 
			function(){
				location.href='<?php print $location ?>';
			}
		);

	})
</script>
<?php
	}
?>

<div class="row">
	<div class="col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1">

		<form action="<?php print base_url()."encuestas/aplicar/".$encuesta->encuestas_k ?>" method="post" onsubmit="return validar_aplicar_encuesta();">

			<!-- ubicacion -->
			<div class="panel panel-info" id="encuesta_ubicacion">
				<div class="panel-heading">
					<h2 class="panel-title">Ubicaci&oacute;n de la encuesta</h2>
				</div>
				<div class="panel-body">
					<p class="text-muted">Por favor seleccione la ubicaci&oacute;n en donde est&aacute; realizando la encuesta</p>

					<div class="form-group">
						<label for="cat_entidades_k" class="control-label">* Estado</label>
						<select name="cat_entidades_k" id="cat_entidades_k" class="form-control">
							<option value=""></option>
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

					<div id="lista_municipios"></div>

					<script>
						$("#cat_entidades_k").change(function(){

							// cargar los municipios de cat_entidades_k

							$.ajax({
						        url: base_url+"ubicaciones/municipios/", 
						        type: "POST", 
						        dataType: 'html',
						        data: {
						            cat_entidades_k: $("#cat_entidades_k").val()
						        },   
						        beforeSend: function(){

						        	$("#lista_municipios").html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x"></i></div>');
						        	
						        },                 
						        success: function(respond){ 					        	
						        	
						        	$("#lista_municipios").html(respond);

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

						});
					</script>
				</div>
			</div>
			<!-- ubicacion fin -->

			<!-- preguntas -->
			<?php

				$p = 0;

				foreach($preguntas as $pregunta):

					$p++;

			?>
			<div id="encuesta_lista_preguntas">
				<div class="panel panel-info">
					<div class="panel-heading">
						<h2 class="panel-title"><?php print $pregunta->pregunta ?></h2>
					</div>
					
					<p class="text-center help-block text-danger hidden" name="help_<?php print $p ?>"><i class="fa fa-warning"></i> Por favor seleccione una respuesta</p>
					
					<ul class="list-group" name="list_group_<?php print $p ?>">
						<!-- respuestas -->
						<?php

							$opciones = $this->Encuestas_model->get_preguntas_opciones($pregunta->encuestas_preguntas_k);

							foreach($opciones as $opcion):

						?>
						<li class="list-group-item">
							<div class="form-group">
								<div class="radio">
							    	<label>
							      		<input type="radio" name="encuestas_preguntas_k_<?php print $pregunta->encuestas_preguntas_k ?>" id="<?php print $opcion->encuestas_preguntas_opciones_k ?>" value="<?php print $opcion->encuestas_preguntas_opciones_k ?>" data-pregunta="<?php print $p ?>">
							      		<?php print $opcion->opcion ?>
							    	</label>
							  	</div>
							</div>
						</li>
						<?php 
							endforeach;
						?>
						<!-- respuestas fin -->
					</ul>

					<input type="hidden" name="pregunta_<?php print $p ?>" value="0">
				</div>				
			</div>
			<?php 				

				endforeach;

			?>
			<!-- preguntas fin -->	

			<!-- datos encuestado -->
			<div class="panel panel-info" id="encuesta_datos_encuestado">
				<div class="panel-heading">
					<h2 class="panel-title">Informaci&oacute;n del encuestado</h2>
				</div>
				<div class="panel-body">
					<div class="form-group">
						<label for="celular" class="control-label">* Celular</label>
						<input type="text" name="celular" id="celular" class="form-control">
						<span id="celular_help" class="help-block"></span>
					</div>

					<div class="form-group">
						<label for="seccion" class="control-label">* Secci&oacute;n</label>
						<input type="text" name="seccion" id="seccion" class="form-control">
						<span id="seccion_help" class="help-block"></span>
					</div>
					
					<div class="form-group" id="form_group_sexo">
						<label class="radio-inline">
					  		<input type="radio" name="sexo" id="sexo_hombre" value="HOMBRE"> Hombre
						</label>
						<label class="radio-inline">
						  	<input type="radio" name="sexo" id="sexo_mujer" value="MUJER"> Mujer
						</label>
						<span id="sexo_help" class="help-block"></span>
					</div>

					<div class="form-group">
						<label for="rango_edad" class="control-label">* Rango de edad</label>
						<select name="rango_edad" id="rango_edad" class="form-control">
							<option value=""></option>
							<option value="18-25">18 a 25 a&ntilde;os</option>
							<option value="26-35">26 a 35 a&ntilde;os</option>
							<option value="36-45">36 a 45 a&ntilde;os</option>
							<option value="46">+46</option>
						</select>
						<span id="rango_edad_help" class="help-block"></span>
					</div>
				</div>
			</div>
			<!-- datos encuestado fin -->

			<input type="hidden" name="encuestas_k" value="<?php print $encuesta->encuestas_k ?>">

			<input type="hidden" id="num_preguntas" value="<?php print $p ?>">



			<div class="form-group">
				<button class="btn btn-info btn-block btn-lg">Guardar</button>
				<a href="<?php print base_url()."encuestas/mis_encuestas/".$encuesta->campaigns_k ?>" class="btn btn-default btn-block btn-lg">Cancelar</a>
			</div>

		</form>	

	</div>
</div>

<script>
	$(function(){

		$("input:radio").click(function(){

			var pregunta = $(this).attr("data-pregunta");

			$("input[name=pregunta_"+pregunta+"]").val("1");

			//$(this).attr("data-id")

		});

	})
</script>