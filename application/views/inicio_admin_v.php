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
	<script src="<?=base_url(); ?>statics/js/jquery.popupWindow.js"></script>
    <script type="text/javascript">var base='<?= base_url(); ?>' </script> 
	<script src="<?=base_url(); ?>statics/js/inicio_admin.js"></script>
</head>

<body>
	<!-- container -->
	
	<div class="container">
		<div class="row">
			<div class="twelve columns">
			<ul class="breadcrumbs">
			  <li><a id="InicioAdminBtn" href="<?=base_url()?>index.php/inicio_admin_c/">Inicio</a></li>
			  <li><a id="AgregarHorarioBtn" class="AgregarHorarioBtn">Agregar Horario</a></li>
			  <li><a id="AgregarHorarioEspBtn" class="AgregarHorarioEspBtn">Horario esp</a></li>
			  <li><a id="vaciarHorariosBtn" class="vaciarHorariosBtn">Vaciar Horarios</a></li>
			  <li><a id="IrRecursosAdminBtn" href="<?=base_url()?>index.php/recursos_admin_c">Recursos</a></li>
			  <li><a id="AdministracionBtn" href="<?=base_url()?>index.php/administracion_c">Grupos</a></li>
			  <li><a id="AdministracionBtn" href="<?=base_url()?>index.php/ueas_c">UEA's</a></li>
			  <li><a id="ProfesoresBtn" href="<?=base_url()?>index.php/profesores_c">Profesores</a></li>			  
			  <li><a id="Administracion2Btn" href="<?=base_url()?>index.php/administracion2_c">Administración</a></li>
			  <li><a href="<?=base_url()?>index.php/inicio_admin_c/do_logout">Salir</a></li>
			</ul><br>
			<br>		

	    	<!--EL RESTO DE LA PÁGINA LO CARGA EL CONTROLADOR -->
</html>
