<div class="row">
	<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1">

		<form action="<?php print base_url()."encuestas/crear/" ?>" method="post" onsubmit="return validar_crear_encuesta();">
		
			<h1 class="text-center page-header">Crear encuesta</h1>

			<div class="panel panel-info">
				<div class="panel-heading">
					<h2 class="panel-title">Nombre de la encuesta</h2>
				</div>
				<div class="panel-body">					
					<div class="form-group">						
						<input type="text" name="nombre_encuesta" id="nombre_encuesta" class="form-control" placeholder="captura el nombre de la encuesta...">
					</div>
				</div>
			</div>

			<!-- preguntas -->

			<div class="panel panel-info">
				<div class="panel-heading">
					<h1 class="panel-title">Preguntas del cuestionario</h1>
				</div>

				<ul class="list-group">
					<!-- pregunta -->
					<li class="list-group-item">
						<div class="form-group">
							<label>Pregunta</label>
							<input type="text" name="pregunta_1" id="pregunta_1" class="form-control" placeholder="escriba aqu&iacute; su pregunta...">
						</div>

						<div class="form-group">
							<label>Respuestas</label>
							<div class="input-group">
								<span class="input-group-addon">A</span>
								<input type="text" name="respuesta_1_p1" id="respuesta_1_p1" class="form-control" placeholder="capture su respuesta...">
							</div>
						</div>

						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon">B</span>
								<input type="text" name="respuesta_2_p1" id="respuesta_2_p1" class="form-control" placeholder="capture su respuesta...">
							</div>
						</div>

						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon">C</span>
								<input type="text" name="respuesta_3_p1" id="respuesta_3_p1" class="form-control" placeholder="capture su respuesta...">
							</div>
						</div>

						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon">D</span>
								<input type="text" name="respuesta_4_p1" id="respuesta_4_p1" class="form-control" placeholder="capture su respuesta...">
							</div>
						</div>
					</li>
					<!-- pregunta fin -->										
				</ul>

				<div class="panel-footer text-center">					
					<button type="button" id="btn_agrega_pregunta" class="btn btn-primary" onclick="Javascript:agrega_pregunta('<?php print base_url()."encuestas/agrega_pregunta/" ?>','.list-group');"><i class="fa fa-plus"></i> Agregar pregunta</button>
					<input type="hidden" id="num_preguntas" name="num_preguntas" value="1">
				</div>
			</div>

			<input type="hidden" name="datos_clientes_k" value="<?php print $datos_clientes_k ?>">

			<div class="form-group">
				<button class="btn btn-info btn-block btn-lg">Guardar encuesta</button>
			</div>

		</form>	
		
	</div>
</div>