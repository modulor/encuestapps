<div class="row">
	<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1">
		
		<h1 class="text-center page-header">Mis campa&ntilde;as</h1>

		<div class="row">

			<!-- encuesta -->
			<?php 

				if(sizeof($campaigns)==0):

			?>

			<div class="col-sm-12 text-center">

				<p>No hay campa&ntilde;as registradas</p>

				<?php
					if($this->session->userdata("nivel")==50){
				?>

				<p>
					<a href="<?php print base_url()."campaigns/new_campaign" ?>" class="btn btn-info">Crear campa&ntilde;a</a>
				</p>

				<?php
					}
				?>

			</div>

			<?php

				else:

					foreach($campaigns as $campaign):
			?>

			<div class="col-sm-6">
			
				<div class="thumbnail text-center">
					<p class="text-right">
						<a title="borrar campa&ntilde;a" href="<?php print base_url()."campaigns/delete_campaign/".$campaign->campaigns_k ?>" class="btn btn-danger btn-xs"><i class="fa fa-times"></i></a>
					</p>
					<i class="fa fa-flag fa-4x"></i>
					<div class="caption">						
						<h3><?php print $campaign->campaign ?></h3>						
						<p>
							<i class="fa fa-clock-o"></i> <time title="<?php print $campaign->fecha_hora_creacion ?>" class="timeago" datetime="<?php print $campaign->fecha_hora_creacion ?>"></time><br>
							<span class="fecha-hora-creacion"><?php print getOnlyDateNormal($campaign->fecha_hora_creacion) ?></span>
						</p>
						<p>							

							<a href="<?php print base_url()."encuestas/mis_encuestas/".$campaign->campaigns_k ?>" class="btn btn-primary" role="button">Encuestas</a>
							<?php 
								if($this->session->userdata("nivel")>=50):
							?>
							<a href="<?php print base_url()."encuestas/crear/".$campaign->campaigns_k ?>" class="btn btn-info" role="button">Crear encuesta</a>
							<?php
								endif;
							?>

						</p>
					</div>
				</div>
			
			<?php 
					
					endforeach;

				endif;

			?>
			<!-- encuesta fin -->

			</div>
		</div>
		
	</div>
</div>