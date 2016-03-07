<div class="row">
	<div class="col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1">

		<?php 
			if(isset($ok)){
		?>
		<div class="alert alert-success alert-dismissible text-center" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<p><i class="fa fa-check-square-o fa-3x"></i></p> 
			<p>Las respuestas se han guardado correctamente</p>
		</div>
		<?php
			}
		?>
		
		<h3 class="page-header text-center"><?php print $encuesta->nombre_encuesta ?></h3>

		<form action="<?php print base_url()."encuestas/aplicar/".$encuesta->encuestas_k ?>" method="post">

			<!-- preguntas -->
			<?php
				foreach($preguntas as $pregunta):
			?>
			<div class="panel panel-info">
				<div class="panel-heading">
					<h2 class="panel-title"><?php print $pregunta->pregunta ?></h2>
				</div>
				<ul class="list-group">
					<!-- respuestas -->
					<?php

						$opciones = $this->Encuestas_model->get_preguntas_opciones($pregunta->encuestas_preguntas_k);

						foreach($opciones as $opcion):

					?>
					<li class="list-group-item">
						<div class="form-group">
							<div class="radio">
						    	<label>
						      		<input type="radio" name="encuestas_preguntas_k_<?php print $pregunta->encuestas_preguntas_k ?>" id="<?php print $opcion->encuestas_preguntas_opciones_k ?>" value="<?php print $opcion->encuestas_preguntas_opciones_k ?>">
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
			</div>
			<?php 
				endforeach;
			?>
			<!-- preguntas fin -->	

			<input type="hidden" name="encuestas_k" value="<?php print $encuesta->encuestas_k ?>">

			<div class="form-group">
				<button class="btn btn-info btn-block btn-lg">Guardar respuestas</button>
			</div>

		</form>	

	</div>
</div>