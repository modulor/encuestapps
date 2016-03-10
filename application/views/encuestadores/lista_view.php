

<div class="row">
	<div class="col-md-12">		
		
		<h1 class="text-center page-header">Encuestadores</h1>		

		<div class="panel panel-info">
			<div class="panel-heading">
				<h3 class="panel-title">Lista de encuestadores registrados</h3>
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
							foreach($encuestadores as $encuestador):
						?>
						<tr>					
							<td><?php print $encuestador->nombre." ".$encuestador->apellidos ?></td>
							<td><?php print $encuestador->email ?></td>
							<td><?php print $encuestador->celular ?></td>
							<td>
								<?php 
									switch ($encuestador->estatus) {
										case '1':
											
											$estatus_class = "label-success";
											$estatus_texto = "activo";
											
											$link_btn_class = "warning";
											$link_title = "desactivar";
											$link_icon = "power-off";

										break;
										
										case '0':

											$estatus_class = "label-danger";
											$estatus_texto = "inactivo";

											$link_btn_class = "success";
											$link_title = "activar";
											$link_icon = "check";

										break;
									}									
								?>
								<span class="label <?php print $estatus_class?>"><?php print $estatus_texto ?></span>
							</td>
							<td>
								<button name="encuestador_ver" class="btn btn-info btn-xs" title="ver informaci&oacute;n encuestador" data-toggle="modal" data-target="#encuestadorModal" data-usuariosk="<?php print $encuestador->usuarios_k ?>"><i class="fa fa-user"></i></button>
								<a href="<?php print base_url()."encuestadores/cambiar_estatus/".$encuestador->usuarios_k ?>" class="btn btn-<?php print $link_btn_class ?> btn-xs" title="<?php print $link_title ?> encuestador"><i class="fa fa-<?php print $link_icon ?>"></i></a>
								<a href="<?php print base_url()."encuestadores/borrar/".$encuestador->usuarios_k ?>" class="btn btn-danger btn-xs" title="borrar encuestador"><i class="fa fa-times"></i></a>
							</td>
						</tr>
						<?php 
							endforeach;
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


<!-- info encuestador -->
<div class="modal fade" id="encuestadorModal" tabindex="1" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true"><i class="fa fa-times"></i></span></button>
				<h4 class="modal-title">Informaci&oacute;n del Encuestador</h4>
			</div>
			<div class="modal-body"></div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
			</div>
		</div>
	</div>
</div>
<!-- info encuestador fin -->

<script>
	$(function(){

		$("button[name=encuestador_ver]").click(function(){

			var usuarios_k = $(this).data('usuariosk');

			$.ajax({
		        url: base_url+"encuestadores/info/"+usuarios_k, 
		        type: "POST", 
		        dataType: 'html',                      
		        data: {
		            usuarios_k: usuarios_k
		        },   
		        beforeSend: function(){
		        	
		        },                 
		        success: function(result){ 
		        	
		        	$("div.modal-body").html(result);

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

	});
</script>