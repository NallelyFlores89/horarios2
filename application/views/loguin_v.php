<!DOCTYPE html>

<html lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width" />
    <title>Administrador - Logueo </title>
	<link href='http://fonts.googleapis.com/css?family=Gafata' rel='stylesheet' type='text/css'>
  	<link rel="stylesheet" href="<?=base_url(); ?>statics/foundation/stylesheets/foundation.min.css">
  	<link rel="stylesheet" href="<?=base_url(); ?>statics/foundation/stylesheets/app.css">
  	<script src="<?=base_url(); ?>statics/js/jquery-1.8.2.js"></script>
  	<script src="<?=base_url(); ?>statics/foundation/javascripts/foundation.min.js"></script>
  	<script src="<?=base_url(); ?>statics/foundation/javascripts/modernizr.foundation.js"></script>
 	<script src="<?=base_url(); ?>statics/js/jquery.popupWindow.js"></script>
	<script src="<?=base_url(); ?>statics/js/logueo.js"></script>
</head>

<body>
		<div class="row">
			<div class="eight columns offset-by-two">
				<br><br>
				<p class="instrucciones">Introduzca sus datos para ingresar al sistema</p>
				<fieldset>
					<form action='<?php echo base_url();?>index.php/loguin_c/process/<?=$pag?>' method='post' name='process'>
						<?php if(! is_null($msg) AND $msg != 'NULL')
							 echo $msg;?>			
						<label for="usuarioInput">Usuario</label>
				  		<input type="text" id="usuarioInput" name="usuarioInput" />
					  
						<label for="passInput">Contraseña</label>
				  		<input type="password" id="passInput" name="passInput"/>
				  		<div class="four columns"></div>
  						<input type="submit" id="LogueoAdminBtn" class="button four columns" value="Ingresar" />
  						<div class="four columns"></div>
				</fieldset>

				<p><a class="offset-by-seven OlvidoPassBtn" href="<?= base_url(); ?>index.php/recupera_pass_c" id="OlvidoPassBtn">¿Olvidó su contraseña?</a></p>
			</div><!--twelve columns-->
		</div> <!--row-->

</body>
</html>
