<!DOCTYPE html>

<html lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width" />
    <title>Laboratorios de Docencia - Horarios</title>
	<link href='http://fonts.googleapis.com/css?family=Gafata' rel='stylesheet' type='text/css'>
  	<link rel="stylesheet" href="<?=base_url(); ?>statics/foundation/stylesheets/foundation.min.css">
	<link rel="stylesheet" href="<?=base_url(); ?>statics/responsiveTable/stylesheets/app.css">
  	<link rel="stylesheet" href="<?=base_url(); ?>statics/responsiveTable/responsive-tables.css">

  	<script src="<?=base_url(); ?>statics/js/jquery-1.8.2.js"></script>
  	<script src="<?=base_url(); ?>statics/foundation/javascripts/foundation.min.js"></script>
  	<script src="<?=base_url(); ?>statics/foundation/javascripts/modernizr.foundation.js"></script>
	<script src="<?=base_url(); ?>statics/responsiveTable/responsive-tables.js"></script>
   	<script src="<?=base_url(); ?>statics/foundation/javascripts/marketing_docs.js"></script>
</head>

<body>
	<!-- caja tipo tooltip para dar más información de los horarios -->
	<span id="datosGrupo">
		<p>UEA:<span id="ueaNombreG"></span></p>
		<p>Sección:<span id="seccionG"></span></p>
		<p>Profesor:<span id="profesorG"></span></p>
		<label class="close"></label>
	</span>
	<div class="container">
		<div class="row">
			<div class="twelve columns">

			<?= $menuAdmin?>
			<?php  
				$indice=1;
				foreach ($trim as $value) {
					$trimestre[$value['idtrim']] = $value['trim'];
				}	
			?>
			<div class="row">
				<div class="six columns"></div>
				<div class="six columns">
					<label>Trimestre</label>
					<?php  echo form_dropdown('trimestre', $trimestre,$trimActual,'id="trimestre"'); ?>
				</div>
			</div><br><br>
			<?= $tablaHorario ?>
			<?= $listaUeas ?>
			<?= $footer ?>
</body>
</html>
