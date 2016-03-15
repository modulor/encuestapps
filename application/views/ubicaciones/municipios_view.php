<div class="form-group">
	<?php if($mostrar_label): ?>
	<label for="cat_municipios_k" class="control-label"><?php print $asterisco ?>Municipios</label>
	<?php endif ?>
	<select name="cat_municipios_k" id="cat_municipios_k" class="form-control">
		<?php print $primer_resultado ?>
		<?php 
			foreach($municipios as $municipio):
		?>
		<option value="<?php print $municipio->cat_municipios_k ?>"><?php print $municipio->nom_mun ?></option>
		<?php
			endforeach;
		?>
	</select>
	<span class="help-block" id="cat_municipios_k_help"></span>
</div>