<div class="row">
	<div class="col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1 titulo-campaign-encuesta text-center">
		<h3 class="text-muted">Encuestas de la campa&ntilde;a</h3>

		<h1 class="page-header">			
			<?php print $campaign->campaign ?>
		</h1>
	</div>
</div>

<div class="row">
	<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1">
		<div class="row">
			<!-- encuesta -->
			<?php 
				foreach($encuestas as $encuesta):
			?>
			<div class="col-sm-6">
				<div class="thumbnail text-center">
					<br><i class="fa fa-check-square-o fa-4x"></i>
					<div class="caption">
						<h3><?php print $encuesta->nombre_encuesta ?></h3>						
						<p>
							<i class="fa fa-clock-o"></i> <time title="<?php print $encuesta->fecha_hora_creacion ?>" class="timeago" datetime="<?php print $encuesta->fecha_hora_creacion ?>"></time>
						</p>
						<p>
							<?php 
								if($this->session->userdata("nivel")==50):
							?>
							<a href="<?php print base_url()."encuestas/resultados/".$encuesta->encuestas_k ?>" class="btn btn-primary" role="button">Resultados</a>
							<?php 
								endif;
							?>

							<a href="<?php print base_url()."encuestas/aplicar/".$encuesta->encuestas_k ?>" class="btn btn-info" role="button">Aplicar</a>

						</p>
					</div>
				</div>
			</div>
			<?php 
				endforeach;
			?>
			<!-- encuesta fin -->
		</div>
		
	</div>
</div>