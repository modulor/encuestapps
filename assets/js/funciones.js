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


/* select para municipios de un estado */

$(function(){

	$("#cat_entidades_k").change(function(){

		// ver si existe el formulario con name = aplicar_encuesta

		var obligatorio = "no";

		// para mostrar al principio un option value vacio o un option con "todos los municipios"

		var todos = "no";

		if($("form[name=aplicar_encuesta]").length > 0) {

			// si existe el formulario

			obligatorio = "obligatorio";

		}
		else{

			// todos los municipios, estamos mostrando resultados de una encuesta

			todos = "todos";

		}

		// cargar los municipios de cat_entidades_k

		$.ajax({
	        url: base_url+"ubicaciones/municipios/"+obligatorio+"/"+todos, 
	        type: "POST", 
	        dataType: 'html',
	        data: {
	            cat_entidades_k: $("#cat_entidades_k").val()
	        },   
	        beforeSend: function(){

	        	$("#lista_municipios").html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x"></i></div>');
	        	
	        },                 
	        success: function(respond){ 					        	
	        	
	        	$("#lista_municipios").html(respond);

	        },
	        error: function (data){		            

	        	swal({
					title: "Oops...",
					text: "Ocurrio un error inesperado...",
					timer: 3500,
					type: "error"
				});

	        }
	    });

	});	

});

/* */