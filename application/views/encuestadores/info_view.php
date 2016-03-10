<div class="row">
	<div class="col-sm-12">
		<strong>Email</strong>
		<p><?php print $encuestador->email ?></p>
	</div>
</div>

<div class="row">
	<div class="col-sm-12">
		<strong>Nombre</strong>
		<p><?php print $encuestador->nombre." ".$encuestador->apellidos ?></p>
	</div>	
</div>

<div class="row">
	<div class="col-sm-6">
		<strong>Tel&eacute;fono</strong>
		<?php 
			if($encuestador->telefono!=""):
		?>
		<p><?php print $encuestador->telefono ?></p>
		<?php 
			else:
		?>
		<p class="text-muted">[NINGUNO]</p>
		<?php
			endif;
		?>
	</div>
	<div class="col-sm-6">
		<strong>Celular</strong>
		<p><?php print $encuestador->celular ?></p>
	</div>
</div>

<div class="row">
	<div class="col-sm-12">
		<strong>Direcci&oacute;n</strong>
		<p><?php print $this->typography->auto_typography($encuestador->direccion); ?></p>
	</div>
</div>