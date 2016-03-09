<div class="row">
	<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1">

		<form action="<?php print base_url()."campaigns/new_campaign/" ?>" method="post" onsubmit="return validar_crear_campaign();">
		
			<h1 class="text-center page-header">Crear campa&ntilde;a</h1>

			<div class="panel panel-info">
				<div class="panel-heading">
					<h2 class="panel-title">Nombre de la campa&ntilde;a</h2>
				</div>
				<div class="panel-body">					
					<div class="form-group">						
						<input type="text" name="campaign" id="campaign" class="form-control" placeholder="captura el nombre de la campa&ntilde;a...">
						<span class="help-block" id="campaign_help"></span>
					</div>
				</div>
			</div>

			<input type="hidden" name="datos_clientes_k" value="<?php print $datos_clientes_k ?>">

			<div class="form-group">
				<button class="btn btn-info btn-block btn-lg">Guardar</button>
			</div>

			<p class="help-block">* todos los campos son obligatorios</p>

		</form>	
		
	</div>
</div>