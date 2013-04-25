<!DOCTYPE html>

<html lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width" />
    <title>Aviso</title>
   	<link href='http://fonts.googleapis.com/css?family=Gafata' rel='stylesheet' type='text/css'>
  	<link rel="stylesheet" href="<?=base_url(); ?>statics/foundation/stylesheets/foundation.min.css">
  	<link rel="stylesheet" href="<?=base_url(); ?>statics/foundation/stylesheets/app.css">
  	<script src="<?=base_url(); ?>statics/js/jquery-1.8.2.js"></script>
  	<script src="<?=base_url(); ?>statics/foundation/javascripts/foundation.min.js"></script>
  	<script src="<?=base_url(); ?>statics/foundation/javascripts/modernizr.foundation.js"></script>
</head>

<body>
		<div class="row">
			<div class="twelve columns">
				<br><br>
				<fieldset >
					<form class="custom twelve columns" action="" method="post">
						<div class="row">
							<label class="pregunta">El horario que usted solicita, no está disponible</label>
						</div>
						<div class="row">
							<p>El horario que solicita, está siendo actualmente ocupado por el/los grupos: <br> 
							<?php foreach ($grupos as  $value) { ?>
								<ul>
									<li><?=$value['grupo'] ?> - <?= $value['nombreuea']?></li>
								</ul>
							<?php } ?> </p>
						</div>
						<div>
							<label class="pregunta">¿Desea sobreescribir el horario?</label>
							<p>El/Los grupos que están actualmente ocupando el horario se borrarán de la tabla y será necesario agregarlos nuevamente</p>
							<input type="submit" id="EliminarBtn" class="button normal twelve columns" name="Sobreescribir" value="Aceptar" />
						</div>


					</form>
				</fieldset>
			</div> <!--twelve colums-->
		</div> <!--row-->

</body>
</html>
