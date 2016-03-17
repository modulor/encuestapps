<div class="row">
	<div class="col-md-12">	

		<div class="row">
			<div class="col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1 titulo-campaign-encuesta text-center">
				<h3 class="text-muted">Encuestas realizadas por</h3>
				<h1 class="page-header"><?php print $encuestador->nombre." ".$encuestador->apellidos ?></h1>
			</div>
		</div>

		<p class="text-center">
			Total de encuestas realizadas: <strong><?php print $total_encuestas ?></strong>
		</p>

		<form method="post" action="<?php print base_url()."encuestadores/encuestas/".$encuestador->usuarios_k ?>">
			<div class="well">
				<div class="row">					
					<div class="col-sm-10">
						<div class="row">
							<div class="col-sm-12 col-xs-12">								
								<div class="input-daterange input-group" id="datepicker">
								    <input type="text" class="form-control" name="fecha_inicio" id="fecha_inicio" value="<?php print $fecha_inicio ?>" />
								    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
								    <input type="text" class="form-control" name="fecha_fin" id="fecha_fin" value="<?php print $fecha_fin ?>" />
								</div>								
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
							
						</div>						
					</div>	
					<div class="col-sm-2 col-xs-12 text-right">
						<button type="submit" class="btn btn-primary btn-block btns-resultados"><i class="fa fa-search"></i></button>
					</div>				
				</div>
			</div>
		</form>

		<div class="panel panel-info">
			<div class="panel-heading">
				<h3 class="panel-title">Encuestas</h3>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-striped table-bordered text-center">
						<thead>
							<tr>					
								<th class="text-center">#</th>
								<th class="text-center">Fecha</th>
								<th class="text-center">Hora</th>
								<th class="text-center">Ubicaci&oacute;n</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								$num = 1;
								foreach($encuestas as $row):
							?>
							<tr>		
								<td><?php print $num; $num++; ?></td>			
								<td><?php print getOnlyDate($row->fecha_hora_creacion) ?></td>
								<td><?php print getOnlyTime($row->fecha_hora_creacion)." HRS" ?></td>
								<td><?php print $row->municipio.". ".$row->entidad ?></td>
							</tr>
							<?php 
								endforeach;
							?>
						</tbody>
					</table>
				</div>
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