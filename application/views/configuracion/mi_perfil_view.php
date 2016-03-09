<div class="row">
	<div class="col-md-4 col-md-offset-4 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1">		
		<form action="<?php print base_url()."configuracion/mi_perfil/" ?>" method="post" onsubmit="return validar_mi_perfil('<?php print $this->session->userdata('nivel') ?>');">

			<?php 
				if(isset($ok)){
			?>
			<script>
				$(function(){

					swal({
						title: "Informaci&oacute;n guardada",
						timer: 1500,
						type: "success",
						html: true
					});

				})
			</script>
			<?php
				}
			?>
		
			<h1 class="text-center page-header">Mi perfil</h1>

			<div class="panel panel-info">
				<div class="panel-heading">
					<h2 class="panel-title">Informaci&oacute;n de mi cuenta</h2>
				</div>
				<div class="panel-body">					
					
					<?php 

						$this->load->view("configuracion/mi_perfil/".$perfil_view);

					?>

					<div class="form-group">
						<p class="help-block">* campos obligatorios</p>
					</div>
				</div>
			</div>

			<div class="form-group">
				<button class="btn btn-info btn-block btn-lg">Guardar</button>
			</div>

		</form>
	</div>
</div>