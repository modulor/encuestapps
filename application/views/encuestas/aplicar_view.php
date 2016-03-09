<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header text-center"><?php print $encuesta->nombre_encuesta ?></h1>
	</div>
</div>

<div class="row">
	<div class="col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1">

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

		<form action="<?php print base_url()."encuestas/aplicar/".$encuesta->encuestas_k ?>" method="post" onsubmit="return validar_aplicar_encuesta();">

			<!-- preguntas -->
			<?php

				$p = 0;

				foreach($preguntas as $pregunta):

					$p++;

			?>
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
			<?php 				

				endforeach;

			?>
			<!-- preguntas fin -->	

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