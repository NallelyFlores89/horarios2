<!DOCTYPE html>

<html lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width" />
    <title>Laboratorios de Docencia - Horarios</title>
	<link href='http://fonts.googleapis.com/css?family=Gafata' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="<?=base_url(); ?>statics/foundation/stylesheets/foundation.min.css">
  	<link rel="stylesheet" href="<?=base_url(); ?>statics/responsiveTable/responsive-tables.css">
  	<link rel="stylesheet" href="<?=base_url(); ?>statics/responsiveTable/collapsed.css/">
	<link rel="stylesheet" href="<?=base_url(); ?>statics/responsiveTable/stylesheets/app.css">
	
  	<script src="<?=base_url(); ?>statics/js/jquery-1.8.2.js"></script>
  	<script src="<?=base_url(); ?>statics/foundation/javascripts/foundation.min.js"></script>
  	<script src="<?=base_url(); ?>statics/foundation/javascripts/modernizr.foundation.js"></script>
	<script src="<?=base_url(); ?>statics/responsiveTable/responsive-tables.js"></script>
   	<script src="<?=base_url(); ?>statics/foundation/javascripts/marketing_docs.js"></script>
	<!-- 	<script src="<?=base_url(); ?>statics/js/jquery.popupWindow.js"></script> -->
	<script src="<?=base_url(); ?>statics/collapsed/src/jquery.collapse.js"></script>
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
 				<hr>
 				<!--UEAS-PROFESORES-->
				<h3 id="ueas-profesores-h3">UEA's-Profesores</h3>
				<table class="responsive contentHorario">
					<tr>
						<th>UEA</th>
						<th>Siglas</th>
						<th>Grupo</th>
						<th>Lab</th>
						<th>Profesor</th>
					</tr>
						<?php
							if($datosUPG==-1){
								echo "<label class='noDatos'> No hay datos que cargar</label>";
							}else{
								foreach ($datosUPG as $valor) {
									echo "<tr>";
									echo"<td class='derecha'>";print_r(strtoupper($valor['nombreuea'])); echo"</td>";
									echo"<td>";print_r(strtoupper($valor['siglas'])); echo"</td>";
									echo"<td>";print_r(strtoupper($valor['grupo'])); echo"</td>";
	 								echo"<td>";print_r(strtoupper($valor['idlaboratorios'])); echo"</td>";
	 								echo"<td>";print_r(strtoupper($valor['nombre'])); echo"</td>";
									echo "</tr>";
								 }
							}								 
						?>
				</table> <!--TERMINA LA TABLA DE HORARIOS -->
		
			</div><!--twelve columns-->
		</div> <!--row-->
		
 	</div> <!--container-->
    </body>

</html>

