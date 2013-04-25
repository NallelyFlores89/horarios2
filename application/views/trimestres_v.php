<!DOCTYPE html>

<html lang="en"> 
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width" />
	<link href='http://fonts.googleapis.com/css?family=Gafata' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="<?=base_url(); ?>statics/foundation/stylesheets/foundation.min.css">
  	<link rel="stylesheet" href="<?=base_url(); ?>statics/foundation/stylesheets/foundation.min.css">
  	<link rel="stylesheet" href="<?=base_url(); ?>statics/responsiveTable/responsive-tables.css">
	<link rel="stylesheet" href="<?=base_url(); ?>statics/responsiveTable/stylesheets/app.css">
  	<script src="<?=base_url(); ?>statics/js/jquery-1.8.2.js"></script>
  	<script src="<?=base_url(); ?>statics/foundation/javascripts/foundation.min.js"></script>
  	<script src="<?=base_url(); ?>statics/foundation/javascripts/modernizr.foundation.js"></script>
	<script src="<?=base_url(); ?>statics/responsiveTable/responsive-tables.js"></script>
   	<script src="<?=base_url(); ?>statics/foundation/javascripts/marketing_docs.js"></script>
    <script type="text/javascript">var base='<?= base_url(); ?>' </script> 
    <script src="<?=base_url(); ?>statics/js/trimestres.js"></script>
</head>

<body>
    <title>Horarios por trimestre</title>
	<div class="container">
		<div class="row">
		<h3>Horarios por trimestre</h3><hr>
			<table id="my-table" class="responsive contentHorario">
				<tr>
					<th>ID</th><th>Trimestre</th><th colspan="3">Acciones</th>
				</tr>
				
				<?php 
					foreach ($trim as $value) { ?>
					<tr>
						<td><?= $value['idtrim'] ?></td>
						<td><?= $value['trim']?></td>
						<td><a href="<?= base_url() ?>index.php/inicio_admin_c/horarioxTrimestre/<?= $value['idtrim']?>" target="_blank">Ver</a></td>
						<td><a href="#" onclick="eliminar(<?=$value['idtrim']?>,'<?=$value["trim"] ?>')">Eliminar</a></td>
						<td><a id="limpiarBtn" href="#" onclick="limpiar(<?=$value['idtrim']?>, '<?=$value["trim"] ?>')">Limpiar</a></td>
					</tr>
				<?php	}		
		
				?>
			
			</table> 
		</div>
	 	<div class="row">
	 		<div class="four columns"></div>
	 		<input type="button" id="agregar" onclick="agregar()" class="button normal four columns" value="Agregar"/>
	 		<div class="four columns"></div>
	 		
	 	</div>
 	</div> <!--container-->
 	
</body>
</html>
