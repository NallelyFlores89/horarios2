<!DOCTYPE html>

<html lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width" />
	<link href='http://fonts.googleapis.com/css?family=Gafata' rel='stylesheet' type='text/css'>
  	<link rel="stylesheet" href="<?=base_url(); ?>statics/foundation/stylesheets/foundation.min.css">
  	<link rel="stylesheet" href="<?=base_url(); ?>statics/foundation/stylesheets/app.css">
  	<script src="<?=base_url(); ?>statics/js/jquery-1.8.2.js"></script>
  	<script src="<?=base_url(); ?>statics/foundation/javascripts/foundation.min.js"></script>
</head>
<body>
		<div class="row">
			<div class="twelve columns">
				<br><br>
				<h2>Agregar trimestre</h2><br>
				<p class="instrucciones">Por favor, llene el formulario</p>
				<fieldset >
					<form class="custom" action="" method="post">
						<div class="row">
						<div class="twelve columns">
					  		<label for="trimInput">Trimestre</label>
					  		<input type="text" id="trimInput" name="trimInput" value="" required />
					  		<label for="fechaInicio">Fecha de inicio</label>
					  		<input type="date" id="fechaInicio" name="fechaInicio" placeholder="AAAA-MM-DD" value="" required/>
					  		<label>Estado</label>
							<input type="radio" name="estado[]" value="1" checked="checked">Activo
							<input type="radio" name="estado[]" value="0">Inactivo					  		
					  	</div>
					 	</div><br>	  	
						<div class="row">
							<div class="twelve columns">
								<input type="submit" id="AgregarHorarioBtn" class="button normal" value="Agregar" />
							</div>
						</div>						
					</form><br><br>
				</fieldset>
			</div> <!--twelve colums-->
		</div> <!--row-->
</body>
</html>