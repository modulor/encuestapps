<div class="row">
	<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1">

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

		<form action="<?php print base_url()."encuestadores/nuevo/" ?>" method="post" onsubmit="return validar_encuestador();">
		
			<h1 class="text-center page-header">Nuevo encuestador</h1>

			<div class="panel panel-info">
				<div class="panel-heading">
					<h2 class="panel-title">Capture la informaci&oacute;n del encuestador</h2>
				</div>
				<div class="panel-body">					
					<div class="form-group">						
						<label class="control-label">* Email</label>
						<input type="text" name="email" id="email" class="form-control">
						<span class="help-block" id="email_help"></span>
					</div>

					<div class="form-group">						
						<label class="control-label">* Contrase&ntilde;a</label>
						<input type="password" name="password" id="password" class="form-control">
						<span class="help-block" id="password_help"></span>
					</div>

					<div class="form-group">						
						<label class="control-label">* Confirmar contrase&ntilde;a</label>
						<input type="password" name="password2" id="password2" class="form-control">
						<span class="help-block" id="password2_help"></span>
					</div>

					<div class="form-group">						
						<label class="control-label">* Nombre</label>
						<input type="text" name="nombre" id="nombre" class="form-control">
						<span class="help-block" id="nombre_help"></span>
					</div>

					<div class="form-group">						
						<label class="control-label">* Apellidos</label>
						<input type="text" name="apellidos" id="apellidos" class="form-control">
						<span class="help-block" id="apellidos_help"></span>
					</div>

					<div class="form-group">						
						<label class="control-label">Tel&eacute;fono</label>
						<input type="text" name="telefono" id="telefono" class="form-control">
						<span class="help-block" id="telefono_help"></span>
					</div>

					<div class="form-group">						
						<label class="control-label">* Celular</label>
						<input type="text" name="celular" id="celular" class="form-control">
						<span class="help-block" id="celular_help"></span>
					</div>

					<div class="form-group">						
						<label class="control-label">* Direcci&oacute;n</label>
						<textarea name="direccion" id="direccion" rows="8" class="form-control"></textarea>
						<span class="help-block" id="direccion_help"></span>
					</div>
				</div>
			</div>

			<input type="hidden" name="datos_clientes_k" value="<?php print $datos_clientes_k ?>">

			<div class="form-group">
				<button class="btn btn-info btn-block btn-lg">Guardar</button>
			</div>

			<p class="text-muted">* todos los campos son obligatorios</p>

		</form>	
		
	</div>
</div>