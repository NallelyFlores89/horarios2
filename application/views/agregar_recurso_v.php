<!DOCTYPE html>

<html lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width" />
    <title>Agregar recursos</title>
	<link href='http://fonts.googleapis.com/css?family=Gafata' rel='stylesheet' type='text/css'>
  	<link rel="stylesheet" href="<?=base_url(); ?>statics/foundation/stylesheets/foundation.min.css">
  	<link rel="stylesheet" href="<?=base_url(); ?>statics/foundation/stylesheets/zurb.mega-drop.css">
  	<link rel="stylesheet" href="<?=base_url(); ?>statics/foundation/stylesheets/app.css">
 
  	<script src="<?=base_url(); ?>statics/js/jquery-1.8.2.js"></script>
  	<script src="<?=base_url(); ?>statics/foundation/javascripts/foundation.min.js"></script>
  	<script src="<?=base_url(); ?>statics/foundation/javascripts/modernizr.foundation.js"></script>
  	<script src="<?=base_url(); ?>statics/js/recursos_admin.js"></script>
</head>

<body>
		<div class="row">
			<div class="twelve columns"><br>
				<h3>Agregar recursos</h3><br>

				<fieldset >
					<form class="custom" action="" method="post">
						<div id="recNombre" class="six columns">
							<label>Recurso1</label>
				  			<input type="text" id="recursoInput1" name="recursos[]"/>
					  		<?php echo form_error('recursoInput'); ?>
				  		</div>
				  		<div id="links" class="five columns">
							<label class="" for="rLink1">Link de descarga</label>
				  			<input type="text" id="rLink1" name="rLink1"/>
					  		<?php echo form_error('recursoInput'); ?>				  			
				  		</div>
				  		<input class="one columns" id="agMas" type="button" value="+"><hr>
						<div class="row">
							<label>Laboratorios</label>
							<div class="two columns">
						      <label for="checkbox105"><input type="checkbox" id="checkbox105" name="checkboxes[]" style='display: none;' value="105"><span class="custom checkbox"></span> 105</label>
							</div>
							<div class="two columns">

						      <label for="checkbox106"><input type="checkbox" id="checkbox106" name="checkboxes[]" style='display: none;' value="106"><span class="custom checkbox"></span> 106</label>
						     </div>
							<div class="two columns">
								<label for="checkbox219"><input type="checkbox" id="checkbox219" name="checkboxes[]" style='display: none;' value="219"><span class="custom checkbox"></span> 219</label>
							</div>
							<div class="two columns">
						      	<label for="checkbox220"><input type="checkbox" id="checkbox220" name="checkboxes[]" style='display: none;' value="220"><span class="custom checkbox"></span> 220</label>
							</div>
							<div class="two columns">
						      	<label for="checkbox221"><input type="checkbox" id="checkbox220" name="checkboxes[]" style='display: none;' value="221"><span class="custom checkbox"></span> 220-B</label>
							</div>
							<div class="two columns"></div>
					  		<?php echo form_error('checkboxes[]'); ?>

						</div><hr>

						<input type="submit" id="AgregarRecursoBtn" class="button offset-by-three six columns" value="Agregar" />
					</form>
				</fieldset>
			</div> <!--twelve colums-->
		</div> <!--row-->

</body>
</html>
