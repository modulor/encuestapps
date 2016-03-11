/* agregar pregunta o respuesta a una encuesta */

function agrega_elemento_encuesta(url,elemento,tipo,num_pregunta){

	// tipo: preguntas | respuestas

	switch(tipo){

		case 'preguntas':

			// obtenemos el indice actual

			var indice = parseInt($("#num_"+tipo).val()) + 1;

			// aumentamos el num_+tipo

			$("#num_"+tipo).val(indice);

			// url 

			var la_url = url+indice;

		break;


		case 'respuestas':

			// obtenemos el indice actual

			var indice = parseInt($("#num_"+tipo+"_"+num_pregunta).val()) + 1;

			// aumentamos el num_+tipo

			$("#num_"+tipo+"_"+num_pregunta).val(indice);

			// url

			var la_url = url+indice+'/'+num_pregunta;

		break;

	}		

	$.get(la_url, function(result) {
	    $(elemento).append(result);
	});

}

/* */