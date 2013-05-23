<!DOCTYPE html>

<html lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width" />
    <title>Cambiar Laboratorio</title>
	<link href='http://fonts.googleapis.com/css?family=Gafata' rel='stylesheet' type='text/css'>
  	<link rel="stylesheet" href="<?=base_url(); ?>statics/foundation/stylesheets/foundation.min.css">
  	<link rel="stylesheet" href="<?=base_url(); ?>statics/foundation/stylesheets/zurb.mega-drop.css">
  	<link rel="stylesheet" href="<?=base_url(); ?>statics/foundation/stylesheets/app.css">
  	<script src="<?=base_url(); ?>statics/js/jquery-1.8.2.js"></script>
  	<script src="<?=base_url(); ?>statics/foundation/javascripts/foundation.min.js"></script>
  	<script src="<?=base_url(); ?>statics/foundation/javascripts/modernizr.foundation.js"></script>

</head>

<body>
		<div class="row">
			<div class="twelve columns">
				<fieldset>
				<form method="POST">
	                <label for="laboratoriosDropdown">Laboratorio</label>
						<?php 
							foreach ($laboratorios as $value) {
								$labos[$value['idlaboratorios']]=$value['nombrelaboratorios'];
							}
							echo form_dropdown('laboratoriosDropdown', $labos, $idlab);
					    ?>
					<br><br>
					<div class="row"></div>
						<input type="submit" id="editar" class="button offset-by-two" value="Guardar cambios" />
					</div>
				</form>
				</fieldset>
			</div> <!--twelve colums-->
		</div> <!--row-->
</body>
</html>
