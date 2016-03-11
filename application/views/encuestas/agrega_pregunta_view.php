<!-- pregunta -->
<li class="list-group-item" name="list_pregunta_<?php print $indice ?>">

	<div class="row">
		<div class="col-lg-12 text-right">
			<button name="btn_borrar_<?php print $indice ?>" type="button" class="btn btn-danger btn-xs"><i class="fa fa-remove"></i> Borrar</button>
			<script>
				$("button[name=btn_borrar_<?php print $indice ?>]").click(function(){
					
					$("li[name=list_pregunta_<?php print $indice ?>").remove();

					var num_preguntas = parseInt($("#num_preguntas").val());

					var total_preguntas = num_preguntas - 1;

					$("#num_preguntas").val(total_preguntas);

				});
			</script>
		</div>
	</div>

	<div class="form-group">
		<label>Pregunta</label>
		<input type="text" name="pregunta_<?php print $indice ?>" id="pregunta_<?php print $indice ?>" class="form-control" placeholder="escriba aqu&iacute; su pregunta...">
		<span class="help-block" id="pregunta_<?php print $indice ?>_help"></span>
	</div>			

	<div class="form-group">
		<label>Respuestas</label>
		<div class="input-group">
			<span class="input-group-addon">R</span>
			<input type="text" name="respuesta_1_p<?php print $indice ?>" id="respuesta_1_p<?php print $indice ?>" class="form-control" placeholder="capture su respuesta...">
		</div>
		<span class="help-block text-danger" id="respuesta_1_p<?php print $indice ?>_help"></span>
	</div>

	<div class="form-group">
		<div class="input-group">
			<span class="input-group-addon">R</span>
			<input type="text" name="respuesta_2_p<?php print $indice ?>" id="respuesta_2_p<?php print $indice ?>" class="form-control" placeholder="capture su respuesta...">
		</div>
		<span class="help-block text-danger" id="respuesta_2_p<?php print $indice ?>_help"></span>
	</div>

	<div class="form-group">
		<div class="input-group">
			<span class="input-group-addon">R</span>
			<input type="text" name="respuesta_3_p<?php print $indice ?>" id="respuesta_3_p<?php print $indice ?>" class="form-control" placeholder="capture su respuesta...">
		</div>
		<span class="help-block text-danger" id="respuesta_3_p<?php print $indice ?>_help"></span>
	</div>

	<div class="form-group">
		<div class="input-group">
			<span class="input-group-addon">R</span>
			<input type="text" name="respuesta_4_p<?php print $indice ?>" id="respuesta_4_p<?php print $indice ?>" class="form-control" placeholder="capture su respuesta...">
		</div>
		<span class="help-block text-danger" id="respuesta_4_p<?php print $indice ?>_help"></span>
	</div>	
</li>
<!-- pregunta fin -->