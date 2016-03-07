/* agregar pregunta a encuesta */

function agrega_pregunta(url,elemento){

	var indice = parseInt($("#num_preguntas").val()) + 1;

	// aumentamos el num_preguntas

	$("#num_preguntas").val(indice);

	var la_url = url+'/'+indice;

	$.get(la_url, function(result) {
	    $(elemento).append(result);
	});

}

/* */