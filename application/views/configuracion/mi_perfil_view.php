<div class="row">
	<div class="col-md-4 col-md-offset-4 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1">		
		<form action="<?php print base_url()."configuracion/mi_perfil/" ?>" method="post" onsubmit="return validar_mi_perfil();">

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
					<div class="form-group">	
						<label class="control-label">* Email</label>					
						<input type="text" name="email" id="email" class="form-control" value="<?php print $mi_perfil->email ?>">
						<span class='help-block' id="email_help"></span>
					</div>

					<div class="form-group">	
						<label class="control-label" for="empresa">* Empresa</label>
						<input type="text" name="empresa" id="empresa" class="form-control" value="<?php print $mi_perfil->empresa ?>">
						<span class="help-block" id="empresa_help"></span>
					</div>

					<div class="form-group">	
						<label class="control-label" for="nombre">* Nombre</label>					
						<input type="text" name="nombre" id="nombre" class="form-control" value="<?php print $mi_perfil->nombre ?>">
						<span class="help-block" id="nombre_help"></span>
					</div>

					<div class="form-group">	
						<label class="control-label" for="apellidos">* Apellidos</label>					
						<input type="text" name="apellidos" id="apellidos" class="form-control" value="<?php print $mi_perfil->apellidos ?>">
						<span class="help-block" id="apellidos_help"></span>
					</div>

					<div class="form-group">	
						<label class="control-label" for="telefono">* Tel&eacute;fono</label>					
						<input type="text" name="telefono" id="telefono" class="form-control" value="<?php print $mi_perfil->telefono ?>">
						<span class="help-block" id="telefono_help"></span>
					</div>

					<div class="form-group">	
						<label class="control-label" for="celular">Celular</label>					
						<input type="text" name="celular" id="celular" class="form-control" value="<?php print $mi_perfil->celular ?>">
						<span class="help-block" id="celular_help"></span>
					</div>

					<div class="form-group">	
						<label class="control-label" for="direccion">Direcci&oacute;n</label>					
						<textarea name="direccion" id="direccion" class="form-control" rows="8"><?php print $mi_perfil->direccion ?></textarea>
						<span class="help-block" id="direccion_help"></span>
					</div>

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