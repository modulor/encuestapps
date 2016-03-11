/********************************************************************************************/
/* validaciones generales */
/********************************************************************************************/


// mensajes de error

function mensajesError(elemento,mensaje){

	$("#"+elemento+"_help").append( "<i class='fa fa-warning'></i> "+mensaje );

	//$( "#"+elemento ).closest(".form-group").addClass( "has-error" );

	$( "#"+elemento ).parent().addClass( "has-error" );

	$('html, body').animate({

        scrollTop: $("#"+elemento).offset().top

    }, 150);

}


// email

function validarEmail(email) {
	
	var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
	
	if( !emailReg.test(email))
		return false;

	return true;

}


// fecha

function validarFecha(fecha){

	var fechaReg = /^(\d{4})(\/|-)(\d{1,2})(\/|-)(\d{1,2})$/;
	
	if(!fechaReg.test(fecha))
		return false;

	return true;

}


// hora

function validarHora(hora){

	var horaReg = /^\d{2}:\d{2}:\d{2}$/;
	
	if(!horaReg.test(hora))
		return false;

	return true;

}


// float

function validarFloat(numero){

	if (!/^([0-9])*[.]?[0-9]*$/.test(numero))
    	return false;

    return true;

}


// Int

function validarInt(numero){

	if (!/^([0-9])*$/.test(numero))
    	return false;

    return true;

}


// codigo postal

function validarCodigoPostal(cp){		

	if (/^\d{5}$/.test(cp))
    	return false;

    return true;

}

/********************************************************************************************/
/********************************************************************************************/


// mi perfil

function validar_mi_perfil(nivel)
{

	$(".help-block").empty();

	$(".form-group").removeClass('has-error');

	switch(nivel){

		// admin

		case '99':

		break;

		// cliente

		case '50':

			// email

			if($("#email").val()==""){		
				mensajesError("email","Campo obligatorio");
				return false;
			}

			if(!validarEmail($("#email").val())){		
				mensajesError("email","El email <strong>'"+$("#email").val()+"'</strong> no es v&aacute;lido");
				errores++;
			}

			// empresa

			if($("#empresa").val()==""){		
				mensajesError("empresa","Campo obligatorio");
				return false;
			}

			// nombre

			if($("#nombre").val()==""){		
				mensajesError("nombre","Campo obligatorio");
				return false;
			}

			// apellidos

			if($("#apellidos").val()==""){		
				mensajesError("apellidos","Campo obligatorio");
				return false;
			}

			// telefono

			if($("#telefono").val()==""){		
				mensajesError("telefono","Campo obligatorio");
				return false;
			}

		break;

		// encuestador

		case '20':

			// email

			if($("#email").val()==""){		
				mensajesError("email","Campo obligatorio");
				return false;
			}

			if(!validarEmail($("#email").val())){		
				mensajesError("email","El email <strong>'"+$("#email").val()+"'</strong> no es v&aacute;lido");
				errores++;
			}

			// nombre

			if($("#nombre").val()==""){		
				mensajesError("nombre","Campo obligatorio");
				return false;
			}

			// apellidos

			if($("#apellidos").val()==""){		
				mensajesError("apellidos","Campo obligatorio");
				return false;
			}

			// celular

			if($("#celular").val()==""){		
				mensajesError("celular","Campo obligatorio");
				return false;
			}

			// direccion

			if($("#direccion").val()==""){		
				mensajesError("direccion","Campo obligatorio");
				return false;
			}

		break;

	}

	return true;

}


// crear encuensta

function validar_crear_encuesta()
{

	// vaciar errores

	$(".help-block").empty();

	$(".has-error").removeClass('has-error');

	var errores = 0;

	// nombre_encuesta

	if($("#nombre_encuesta").val()==""){		
		mensajesError("nombre_encuesta","Campo obligatorio");
		errores++;
	}

	// validar preguntas y opciones

	var num_preguntas = $("#num_preguntas").val();	

	for(var i = 1; i <= num_preguntas; i++){

		if($("#pregunta_"+i).val()==""){
			mensajesError("pregunta_"+i,"Campo obligatorio");
			errores++;
		}

		// revisar inputs de respuestas

		//for(var r = 1; r <= $("#num_respuestas_"+i).val(); r++){

		for(var r = 1; r <= 4; r++){

			// respuesta_1_p1

			if($("#respuesta_"+r+"_p"+i).val()==""){
				mensajesError("respuesta_"+r+"_p"+i,"Campo obligatorio");
				errores++;
			}

			/*

			multiple respuestas

			if($("#respuesta_"+r+"_p"+i).val()==""){
				mensajesError("respuesta_"+r+"_p"+i,"Campo obligatorio");
				errores++;
			}

			*/

		}

	}

	if(errores > 0){

		swal({
			title: "Oops...",
			text: "Todos los campos son obligatorios",
			timer: 3500,
			type: "error"
		});

		return false;

	}		

	return true;

}


// cambiar password

function validar_cambiar_password()
{

	$(".help-block").empty();

	$(".has-error").removeClass('has-error');

	// password

	if($("#password").val()==""){		
		mensajesError("password","Campo obligatorio");
		return false;
	}

	if($("#password").val()!=$("#password2").val()){		
		mensajesError("password2","Las contrase&ntilde;as no coinciden");
		return false;
	}

	return true;

}


// aplicar encuesta 

function validar_aplicar_encuesta()
{

	// quitar errores

	$(".list-group").removeClass("has-error");

	$("p.text-center.help-block.text-danger").addClass("hidden");

	var preguntas = $("#num_preguntas").val();

	var errores = 0;

    for(var i = 1; i <= preguntas; i++){

    	if($("input[name=pregunta_"+i+"]").val()=="0"){

    		errores++;

    		// hacer visible el texto de error

    		$("p[name=help_"+i+"]").removeClass("hidden");

    		// agregar has-error al list-group

    		$("ul[name=list_group_"+i+"]").addClass("has-error");

    	}

    }

    if(errores > 0){

    	swal({
			title: "Oops...",
			text: "Debes contestar todas las preguntas",
			timer: 3500,
			type: "error"
		});

		return false;

    }		

	return true;

}


// nueva campaign

function validar_crear_campaign()
{

	// vaciar errores

	$(".help-block").empty();

	$(".has-error").removeClass('has-error');

	var errores = 0;

	// campaign

	if($("#campaign").val()==""){		
		mensajesError("campaign","Campo obligatorio");
		errores++;
	}

	if(errores > 0){

		swal({
			title: "Oops...",
			text: "Todos los campos son obligatorios",
			timer: 3500,
			type: "error"
		});

		return false;

	}		

	return true;

}


// encuestador

function validar_encuestador()
{

	// vaciar errores

	$(".help-block").empty();

	$(".has-error").removeClass('has-error');

	var errores = 0;

	// email

	if($("#email").val()==""){		
		mensajesError("email","Campo obligatorio");
		errores++;
	}

	if(!validarEmail($("#email").val())){		
		mensajesError("email","El email <strong>'"+$("#email").val()+"'</strong> no es v&aacute;lido");
		errores++;
	}

	// password

	if($("#password").val()==""){		
		mensajesError("password","Campo obligatorio");
		errores++;
	}

	// password2

	if($("#password2").val()!=$("#password").val()){		
		mensajesError("password2","Las contrase&ntilde;as no coinciden");
		errores++;
	}

	// nombre

	if($("#nombre").val()==""){		
		mensajesError("nombre","Campo obligatorio");
		errores++;
	}

	// apellidos

	if($("#apellidos").val()==""){		
		mensajesError("apellidos","Campo obligatorio");
		errores++;
	}

	// celular

	if($("#celular").val()==""){		
		mensajesError("celular","Campo obligatorio");
		errores++;
	}

	// direccion

	if($("#direccion").val()==""){		
		mensajesError("direccion","Campo obligatorio");
		errores++;
	}

	// swal alert

	if(errores > 0){

		swal({
			title: "Oops...",
			text: "Por favor verifica los campos obligatorios",
			timer: 3500,
			type: "error"
		});

		return false;

	}		

	return true;

}


// buscar resultados de una encuesat (fechas)

function valida_buscar_resultados_encuesta()
{

	// vaciar errores

	$(".help-block").empty();

	$(".has-error").removeClass('has-error');

	var errores = 0;

	// fecha_inicio & fecha_fin

	if($("#fecha_inicio").val()=="" || $("#fecha_fin").val()==""){		
		
		swal({
			title: "Oops...",
			text: "Debes seleccionar un rango de fechas para realizar la busqueda",
			timer: 3500,
			type: "error"
		});

		return false;

	}

	return true;

}