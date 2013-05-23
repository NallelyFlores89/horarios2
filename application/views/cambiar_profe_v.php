<!DOCTYPE html>

<html lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width" />
    <title>Cambiar profesor</title>
	<link href='http://fonts.googleapis.com/css?family=Gafata' rel='stylesheet' type='text/css'>
  	<link rel="stylesheet" href="<?=base_url(); ?>statics/foundation/stylesheets/foundation.min.css">
  	<link rel="stylesheet" href="<?=base_url(); ?>statics/foundation/stylesheets/zurb.mega-drop.css">
  	<link rel="stylesheet" href="<?=base_url(); ?>statics/foundation/stylesheets/app.css">
  	<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.0/themes/base/jquery-ui.css" />

  	<script src="<?=base_url(); ?>statics/js/jquery-1.8.2.js"></script>
  	<script src="<?=base_url(); ?>statics/foundation/javascripts/foundation.min.js"></script>
  	<script src="<?=base_url(); ?>statics/foundation/javascripts/modernizr.foundation.js"></script>
  	<script src="<?=base_url(); ?>statics/ui/jquery-ui-1.10.0.custom.min.js"></script>
	
	<script type="text/javascript">
		$(document).ready(function() {
			$("#profesor").autocomplete({
				source: function(request, response) {
					$.ajax({ 
						url: "<?php echo site_url('agregar_horario_c/propon_profesor'); ?>",
						data: { term: $("#profesor").val()},
						dataType: "json",
						type: "POST",
						success: function(data){
							response(data);
						}
					});
				},
				minLength: 1
			});
			
		});

	</script>
</head>

<body>
	<div class="row">
		<div class="twelve columns">
			<fieldset>
				<form class="custom" action="" method="post">
					<label for="profesor">Profesor:</label>
					<input type="text" name="profesor" id="profesor" value="<?= $profesor['nombre'] ?>">
			  		<?php echo form_error('profesor'); ?><br><br>
					<input type="submit" value="Aceptar" class="button" name="aceptar"/>

				</form>
			</fieldset>
			
		</div> <!--twelve colums-->
	</div> <!--row-->
</body>
</html>
