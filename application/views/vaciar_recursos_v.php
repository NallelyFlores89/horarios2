<!DOCTYPE html>

<html lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width" />
    <title>Vaciar recursos</title>
	<link href='http://fonts.googleapis.com/css?family=Gafata' rel='stylesheet' type='text/css'>
  	<link rel="stylesheet" href="<?=base_url(); ?>statics/foundation/stylesheets/foundation.min.css">
  	<link rel="stylesheet" href="<?=base_url(); ?>statics/foundation/stylesheets/zurb.mega-drop.css">
  	<script src="<?=base_url(); ?>statics/js/jquery-1.8.2.js"></script>
  	<script src="<?=base_url(); ?>statics/foundation/javascripts/foundation.min.js"></script>
  	<script src="<?=base_url(); ?>statics/foundation/javascripts/modernizr.foundation.js"></script>

  	<link rel="stylesheet" href="<?=base_url(); ?>statics/foundation/stylesheets/app.css">

</head>

<body>
		<div class="row">
			<div class="twelve columns">
				<br><br>
				<fieldset >
					<form class="custom" action="" method="post">
						<div class="row">
							<label>Vaciar la lista de recursos de los laboratorios:</label>
							<div class="six columns">
						      <label for="checkbox105"><input type="checkbox" id="checkbox105" name="checkboxes2[]" style='display: none;' value="105"><span class="custom checkbox"></span> 105</label>
						      <label for="checkbox106"><input type="checkbox" id="checkbox106" name="checkboxes2[]" style='display: none;' value="106"><span class="custom checkbox"></span> 106</label>
							</div>
							<div class="six columns">
								<label for="checkbox219"><input type="checkbox" id="checkbox219" name="checkboxes2[]" style='display: none;' value="219"><span class="custom checkbox"></span> 219</label>
						      	<label for="checkbox220"><input type="checkbox" id="checkbox220" name="checkboxes2[]" style='display: none;' value="220"><span class="custom checkbox"></span> 220</label>
							</div>
					  		<?php echo form_error('checkboxes2[]'); ?>
						</div><hr>

						<div class="four columns"></div>
							<input type="submit" id="vaciarBtn" class="button four columns" value="Vaciar" />
						<div class="four columns"></div>

					</form>
				</fieldset>

			</div> <!--twelve colums-->
		</div> <!--row-->

</body>
</html>
