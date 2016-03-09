<div class="row">
	<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1">

		<?php 
			if(isset($ok)){
		?>
		<script>
			$(function(){

				swal(
					{
						title: "Campa&ntilde;a borrada",						
						type: "success",
						html: true,
						showCancelButton: false,						
						confirmButtonText: "Continuar",
						closeOnConfirm: false
					}, 
					function(){
						location.href='<?php print base_url()."campaigns/my_campaigns" ?>';
					}
				);

			})
		</script>
		<?php
			}
			else{
		?>

		<form action="<?php print base_url()."campaigns/delete_campaign/".$campaign->campaigns_k ?>" method="post">
		
			<h1 class="text-center page-header">Borrar campa&ntilde;a</h1>

			<div class="panel panel-info">				
				<div class="panel-body text-center">
					<p>&iquest;Est&aacute; seguro de borrar la campa&ntilde;a<br><strong>"<?php print $campaign->campaign ?>"</strong>?</p>
				</div>
			</div>

			<input type="hidden" name="campaigns_k" value="<?php print $campaign->campaigns_k ?>">

			<div class="form-group">
				<div class="row">
					<div class="col-sm-6">
						<button class="btn btn-danger btn-block btn-lg">Borrar</button>
					</div>
					<div class="col-sm-6">
						<a href="<?php print base_url()."campaigns/my_campaigns/" ?>" class="btn btn-block btn-default btn-lg">Cancelar</a>
					</div>
				</div>
				
				
			</div>

		</form>	

		<?php 

			}

		?>
		
	</div>
</div>