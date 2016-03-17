<div class="row">
	<div class="col-md-12">	

		<div class="row">
			<div class="col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1 titulo-campaign-encuesta text-center">
				<h3 class="text-muted">Encuestas realizadas por</h3>
				<h1 class="page-header"><?php print $encuestador->nombre." ".$encuestador->apellidos ?></h1>
			</div>
		</div>

		<div class="panel panel-info">
			<div class="panel-heading">
				<h3 class="panel-title">Encuestas</h3>
			</div>
			<div class="panel-body">
				<table class="table table-striped table-bordered text-center">
					<thead>
						<tr>					
							<th class="text-center">Nombre</th>
							<th class="text-center">Email</th>
							<th class="text-center">Celular</th>
							<th class="text-center">Estado</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php 
							//foreach($encuestadores as $encuestador):
						?>
						<tr>					
							
						</tr>
						<?php 
							//endforeach;
						?>
					</tbody>
				</table>
				<script>
					$(document).ready(function() {
				    	$('table').DataTable( {
				        	"language": {
				            	"url": "<?php print base_url().'assets/datatables/spanish.json' ?>"
				        	}
					    });
					});
				</script>
			</div>
		</div>
	</div>
</div>