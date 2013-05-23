<!DOCTYPE html>

<html lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width" />
    <title>Eliminar trimestre</title>
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
					<form class="custom" action="" method="post">
						<label class="pregunta">¿Seguro que desea eliminar los horarios del trimestre <b style="font-size:20px;"><?=$trim ?></b>?</label>
						<input type="submit" id="EliminarBtn" class="button offset-by-two" name="eliminar" value="Sí" />
					</form>
				</fieldset>
			</div> <!--twelve colums-->
		</div> <!--row-->

</body>
</html>
