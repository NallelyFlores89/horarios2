<!DOCTYPE html>

<html lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width" />
    <title>Administrador - Recuperar Contraseña </title>
	<link href='http://fonts.googleapis.com/css?family=Gafata' rel='stylesheet' type='text/css'>
  	<link rel="stylesheet" href="<?=base_url(); ?>statics/foundation/stylesheets/foundation.min.css">
  	<link rel="stylesheet" href="<?=base_url(); ?>statics/foundation/stylesheets/app.css">
  	<script src="<?=base_url(); ?>statics/js/jquery-1.8.2.js"></script>
  	<script src="<?=base_url(); ?>statics/foundation/javascripts/foundation.min.js"></script>
  	<script src="<?=base_url(); ?>statics/foundation/javascripts/modernizr.foundation.js"></script>
  	<script src="<?=base_url(); ?>statics/foundation/javascripts/modernizr.foundation.js"></script>
	<script src="<?=base_url(); ?>statics/js/recupera_pass.js"></script>

</head>

<body>
		<div class="row">
			<div class="eight columns offset-by-two">
				<br><br>
				<p class="instrucciones">Introduzca su correo para recuperar contraseña</p>
				<fieldset>
					<form action='' method='post' name=''>
						<label for="correoInput">Correo</label>
				  		<input type="text" id="correoInput" name="correoInput"/>
				  		
  						<input type="submit" id="recuperarPassBtn" class="button offset-by-one" value="Recuperar Contraseña" />
					</form>
				</fieldset>
			</div><!--twelve columns-->
		</div> <!--row-->

</body>
</html>
