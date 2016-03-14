<div class="form-group">
	<label for="cat_municipios_k" class="control-label">* Municipios</label>
	<select name="cat_municipios_k" id="cat_municipios_k" class="form-control">
		<option value=""></option>
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