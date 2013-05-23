<!DOCTYPE html>

<html lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width" />
    <title>Laboratorios de Docencia - ueas</title>
	<link href='http://fonts.googleapis.com/css?family=Gafata' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="<?=base_url(); ?>statics/foundation/stylesheets/foundation.min.css">
  	<link rel="stylesheet" href="<?=base_url(); ?>statics/responsiveTable/responsive-tables.css">
	<link rel="stylesheet" href="<?=base_url(); ?>statics/responsiveTable/stylesheets/app.css">
	
  	<script src="<?=base_url(); ?>statics/js/jquery-1.8.2.js"></script>
  	<script src="<?=base_url(); ?>statics/foundation/javascripts/foundation.min.js"></script>
  	<script src="<?=base_url(); ?>statics/foundation/javascripts/modernizr.foundation.js"></script>
	<script src="<?=base_url(); ?>statics/responsiveTable/responsive-tables.js"></script>
	<script> base ="<?= base_url()?>"</script>
	<script src="<?=base_url(); ?>statics/js/administracion.js"></script>

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
				<h3 id="ueas-profesores-h3">UEA's</h3>
				<table class="responsive contentHorario">
					<tr>
						<th>UEA</th><th>Clave</th><th>Sección</th><th colspan="2">Acciones</th>
					</tr>
						<?php
							if($DatosUEA==-1){
								echo "<label class='noDatos'> No hay datos que cargar</label>";
							}else{
								foreach ($DatosUEA as $valor) { ?>
									<tr>
										<td class='derecha'> <?= strtoupper($valor['nombreuea']) ?> </td>
										<td class=''> <?= strtoupper($valor['clave']) ?> </td>
										<td class=''> <?= strtoupper($valor['nombredivision']) ?> </td>
										<td><a href="#" onclick="edita(<?= $valor['iduea'] ?>)">Editar</a></td>
										<td><a href="#" onclick="ventanaEliminaUea(<?= $valor['iduea'] ?>)">Eliminar</a></td>
									</tr>
								 <?php }
							}								 
						?>
				</table> <!--TERMINA LA TABLA -->
				
				<div class="four columns"></div>
					<input id="add_uea" class="button large four columns" type="submit" value="Agregar UEA" onclick="ventanaAgregaU()">
				<div class="four columns"></div>
		
			</div><!--twelve columns-->
		</div> <!--row-->
		
 	</div> <!--container-->
    </body>

</html>

