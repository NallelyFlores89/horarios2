<!DOCTYPE html>

<html lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width" />
    <title>Modificar recurso</title>
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
				<br><br>
				<fieldset >
					<form class="custom" action="" method="post">
						<label for="recursoInput">Recurso</label>
						<input type="text" name="recursoInput" id"recursoInput">						
						<input type="submit" id="EditarBtn" class="button offset-by-two" value="Guardar cambios" />
					</form>
				</fieldset>

			</div> <!--twelve colums-->
		</div> <!--row-->

</body>
</html>
