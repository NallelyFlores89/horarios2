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
					<div class="twelve">
			    	    <div class="six columns">
				        	<label for="HoraIDropdown">Hora de inicio</label>
								<?php 
									foreach ($horarios as $index => $value) {
										$time[$index]=substr($value,0,-6);							
									}
									echo form_dropdown('HoraIDropdown', $time, $hora_i);
								?>
							</div>
							
						<div class="six columns">
			                <label for="HoraFAltDropdown">Hora de Term</label>
							<?php 
								foreach ($horarios as $index => $value) {
									$time[$index]=substr($value,6);							
								}
								$time[27]='21:00';
								echo form_dropdown('HoraFDropdown', $time, $hora_f);
							?>
						</div>
						
					</div><hr><!--twelve -->
					
					<div class="twelve columns">
						<label for="dias">Días</label>
						<?php 
							foreach ($dias as $value) {
								if(in_array($value['iddias'],$dias_g)){
									$checked=TRUE;
								}else{
									$checked=FALSE;
								}
						?>
								<div class="two columns">
								<label><?= $value['nombredia'] ?></label>
								<?php echo form_checkbox('diasCheckBox[]', $value['iddias'] , $checked); ?>
								</div>
						<?php }	?>
						<div class="one columns"></div>
					</div>


					<div class="row"></div><br><br>
						<input type="submit" id="editar" name="editar" class="button offset-by-two" value="Guardar cambios" />
					</div>
				</form>
				</fieldset>
			</div> <!--twelve colums-->
		</div> <!--row-->
</body>
</html>
