<!DOCTYPE html>

<html lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width" />
    <title>Agregar profesor</title>
	<link href='http://fonts.googleapis.com/css?family=Gafata' rel='stylesheet' type='text/css'>

  	<link rel="stylesheet" href="<?=base_url(); ?>statics/foundation/stylesheets/foundation.min.css">
  	<link rel="stylesheet" href="<?=base_url(); ?>statics/foundation/stylesheets/zurb.mega-drop.css">
  	<link rel="stylesheet" href="<?=base_url(); ?>statics/foundation/stylesheets/app.css">
 	<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.0/themes/base/jquery-ui.css" />

  	<script src="<?=base_url(); ?>statics/js/jquery-1.8.2.js"></script>
  	<script src="<?=base_url(); ?>statics/foundation/javascripts/foundation.min.js"></script>
  	<script src="<?=base_url(); ?>statics/foundation/javascripts/modernizr.foundation.js"></script>
  	<script src="<?=base_url(); ?>statics/ui/jquery-ui-1.10.0.custom.min.js"></script>
</head>

<body>
		<div class="row">
			<div class="twelve columns">
				<br><br>
				<h2>Agregar profesor</h2><br>
				<p class="instrucciones">Por favor, llene el formulario</p>

				<fieldset >
					<form class="custom" action="" method="post">
						<div class="twelve columns">
						<div class="row">
							<div class="nine columns">
								<label for="nombreInput">Nombre del profesor</label>
					  			<input type="text" id="nombreInput" name="nombreInput" value="<?php echo set_value('nombreInput'); ?>" required/>
							 </div>
							<div class="three columns">
								<label for="numInput">No. Empleado</label>
					  			<input type="text" id="numInput" name="numInput" value="<?php echo set_value('numInput'); ?>"/>
						 	</div>
						</div></div><hr>
						<div class="twelve columns">
							<label for="correoInput">Correo</label>
				  			<input type="email" id="correoInput" name="correoInput" value="<?php echo set_value('correoInput'); ?>"/>
						</div><hr>
						<div class="twelve column>">	
							<div class="four columns"></div>						
								<input type="submit" id="AgregarHorarioBtn" class="button normal four columns" value="Agregar" />
							<div class="four columns"></div>
						</div>						
					</form>
				</fieldset>

			</div> <!--twelve colums-->
		</div> <!--row-->

</body>
</html>
