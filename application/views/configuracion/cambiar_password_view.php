<div class="row">
	<div class="col-md-4 col-md-offset-4 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1">		
		<form action="<?php print base_url()."configuracion/cambiar_password/" ?>" method="post" onsubmit="return validar_cambiar_password();">

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
		
			<h1 class="text-center page-header">Cambiar password</h1>

			<div class="panel panel-info">
				<div class="panel-heading">
					<h2 class="panel-title">Capture su nueva contrase&ntilde;a</h2>
				</div>
				<div class="panel-body">					
					<div class="form-group">	
						<label class="control-label">* Contrase&ntilde;a</label>					
						<input type="password" name="password" id="password" class="form-control">
						<span class='help-block' id="password_help"></span>
					</div>

					<div class="form-group">	
						<label class="control-label">* Confirmar contrase&ntilde;a</label>					
						<input type="password" name="password2" id="password2" class="form-control">
						<span class='help-block' id="password2_help"></span>
					</div>
				</div>
			</div>

			<input type="hidden" name="usuarios_k" value="<?php print $this->session->userdata("usuarios_k") ?>">

			<div class="form-group">
				<button class="btn btn-info btn-block btn-lg">Guardar</button>
			</div>

		</form>
	</div>
</div>