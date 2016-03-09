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