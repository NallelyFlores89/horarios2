<!DOCTYPE html>

<html lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width" />
    <title>Editar</title>
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
				<p class="instrucciones">Rellene los campos que desee editar</p>
				<fieldset >
					<form class="custom" action="" method="post">
						<div class="row">
							<div class="twelve columns">
						  		<label for="trimestre">Trimestre</label>
						  		<input type="text" id="trimestre" name="trimestre" value="<?= $trim['trim'] ?>" />
						  	</div>
						 							  	
							<div class="twelve columns">
						  		<label for="fecha">Fecha inicio</label>
						  		<input type="text" id="fecha" name="fecha" value="<?= $trim['fechaInicio'] ?>"  />
						  	</div>
						</div>
						<br><br>
						<div class="four columns"></div>
						<input type="submit" id="editar" class="button large four columns" value="Guardar cambios" />
						<div class="four columns"></div>
					</fieldset>

			</div> <!--twelve colums-->
		</div> <!--row-->

</body>
</html>
