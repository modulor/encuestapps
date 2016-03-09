<div class="row">
	<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1">		
		<form action="<?php print base_url()."configuracion/mi_perfil/" ?>" method="post" onsubmit="return validar_mi_perfil('<?php print $this->session->userdata('nivel') ?>');">

			<?php 
				if(isset($ok)){
			?>
			<script>
				$(function(){

					swal({
						title: "Informaci&oacute;n guardada",
						timer: 1500,
						type: "success",
						html: true
					});

				})
			</script>
			<?php
				}
			?>
		
			<h1 class="text-center page-header">Mi perfil</h1>

			<div class="panel panel-info">
				<div class="panel-heading">
					<h2 class="panel-title">Informaci&oacute;n de mi cuenta</h2>
				</div>
				<div class="panel-body">	

					<div class="form-group" name="email_group">	
						<label class="control-label">* Email</label>					
						<input type="text" name="email" id="email" class="form-control" value="<?php print $mi_perfil->email ?>">
						<i class="form-control-feedback glyphicon"></i>
						<span class='help-block' id="email_help"></span>
					</div>
					
					<?php 

						$this->load->view("configuracion/mi_perfil/".$perfil_view);

					?>

					<div class="form-group">
						<p class="help-block">* campos obligatorios</p>
					</div>
				</div>
			</div>

			<input type="hidden" id="email_old" value="<?php print $mi_perfil->email ?>">

			<div class="form-group">
				<button name="btn_guardar" class="btn btn-info btn-block btn-lg">Guardar</button>
			</div>

		</form>
	</div>
</div>

<script>

	// validar cambio de email

	$(function(){

		$('#email').blur(function(){

			// remover errores

			$("div[name=email_group]").removeClass("has-error");

			$("i.form-control-feedback").removeClass('glyphicon-remove');

			$.ajax({
		        url: base_url+"usuarios/validar_no_existe_email/", 
		        type: "POST", 
		        dataType: 'json',                      
		        data: {
		            email: $("#email").val(),
		            email_old: $("#email_old").val()
		        },   
		        beforeSend: function(){
		        	$("#email").prop("disabled",true);
		        },                 
		        success: function(data){ 
		        	
		        	$("#email").prop("disabled",false);

		        	switch(data.respuesta){

		        		// error si existe el usuario, debemos mandar un error 

		        		case 'si':

		        			$("div[name=email_group]").addClass('has-error has-feedback');

		        			$("i.form-control-feedback").addClass('glyphicon-remove');

		        			swal({
								title: "Error...",
								text: "El email <strong>"+$("#email").val()+"</strong> ya esta registrado",
								timer: 4500,
								type: "error",
								html: true
							});

							$("button[name=btn_guardar]").prop("disabled",true);

		        		break;

		        		// exito! no existe el usuario, todo esta bien y puede continuar

		        		case 'no':

		        			$("div[name=email_group]").addClass('has-success has-feedback');

		        			$("i.form-control-feedback").addClass('glyphicon-ok');

		        			$("button").prop("disabled",false);

		        		break;

		        	}		        	

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

		
</script>