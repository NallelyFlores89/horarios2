<!DOCTYPE html>

<html lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width" />
    <title>Laboratorios de Docencia - Horarios</title>
	<link href='http://fonts.googleapis.com/css?family=Gafata' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="<?=base_url(); ?>statics/foundation/stylesheets/foundation.min.css">
  	<link rel="stylesheet" href="<?=base_url(); ?>statics/responsiveTable/responsive-tables.css">
	<link rel="stylesheet" href="<?=base_url(); ?>statics/responsiveTable/stylesheets/app.css">
	
  	<script src="<?=base_url(); ?>statics/js/jquery-1.8.2.js"></script>
  	<script src="<?=base_url(); ?>statics/foundation/javascripts/foundation.min.js"></script>
  	<script src="<?=base_url(); ?>statics/foundation/javascripts/modernizr.foundation.js"></script>
	<script src="<?=base_url(); ?>statics/responsiveTable/responsive-tables.js"></script>
   	<script src="<?=base_url(); ?>statics/foundation/javascripts/marketing_docs.js"></script>
	<script src="<?=base_url(); ?>statics/js/horarios.js"></script>
</head>

<body>
	<div class="container">
		<div class="row">
			<div class="twelve columns">
				<div class="row cabecera">
					<h1 class="nine columns">Laboratorios de Docencia CBI</h1>
					<a class="three columns" id="adminBtn" href="<?=base_url();?>index.php/loguin_c/">Entrar como administrador</a>
				</div>
				<?= $opciones ?>
				<?= $tablaHorario ?>
				<?= $opciones ?>
				<?= $listaUeas ?>
				<?= $footer ?>
</body>				
</html>

