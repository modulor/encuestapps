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

function validar_mi_perfil()
{

	$(".help-block").empty();

	// email

	if($("#email").val()==""){		
		mensajesError("email","Campo obligatorio");
		return false;
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

	return true;

}


// crear encuensta

function validar_crear_encuesta()
{

	return true;

}