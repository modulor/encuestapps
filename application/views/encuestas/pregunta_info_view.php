<div class="table-responsive">
	<table class="table table-bordered table-striped" style="width: 100%;">
		<thead>
			<tr>
				<th>#</th>
				<th>Fecha</th>
				<th>G&eacute;nero</th>
				<th>Edad</th>
				<th>Municipio</th>
				<th>Secci&oacute;n</th>
				<th>Encuestador</th>
			</tr>
		</thead>
		<tbody>
			<?php 
				$num = 1;
				foreach($resultados as $row):
			?>
			<tr>
				<td><?php print $num; $num++; ?></td>
				<td><?php print getFechaNormal(getOnlydate($row->fecha_hora_creacion),"corto") ?></td>
				<td><?php print $row->genero ?></td>
				<td><?php print $row->rango_edad." a&ntilde;os" ?></td>
				<td><?php print $row->municipio ?></td>
				<td><?php print $row->seccion ?></td>
				<td><?php print $row->email_encuestador ?></td>
			</tr>
			<?php 					
				endforeach;
			?>
		</tbody>
	</table>
</div>


<script type="text/javascript">
	$(function(){
		
		$("#modal_pregunta_title").html("<?php print $pregunta->pregunta ?>");
		$("#modal_respuesta_title").html("<?php print $respuesta->opcion ?>");

		// datatables

		$('table').DataTable({
        	"language": {
            	"url": "<?php print base_url().'assets/datatables/spanish.json' ?>"
        	}
	    });

	})
</script>