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
	<script src="<?=base_url(); ?>statics/js/jquery.popupWindow.js"></script>
    <script type="text/javascript">var base='<?= base_url(); ?>' </script> 
	<script src="<?=base_url(); ?>statics/js/administracion.js"></script>
</head>

<body>
    <title>Grupos</title>
	<div class="container">
	<div class="row">
	<h3>Grupos</h3><hr>
	<div class="twelve columns>">
		<label for="kwd_search">Buscar:</label>
		<input type="text" id="kwd_search" value=""/>
	</div>
		<table id="my-table" class="responsive contentHorario">
			<tr>
				<th>Profesor</th><th>UEA</th><th>Siglas</th>
				<th>Grupo</th><th>Secc</th><th>Lab</th><th colspan="5">Acciones</th>
			</tr>
				<?php  //Cargando datos 
					if($datosUPG==-1){
						echo "<label class='noDatos'> No hay datos que cargar</label>";
					}else{
						foreach ($datosUPG as $valor) {
							echo "<tr>";
							echo"<td class='izq'>";print_r(strtoupper($valor['nombre'])); echo"</td>";
							echo"<td class='izq'>";print_r(strtoupper($valor['nombreuea'])); echo"</td>";
							echo"<td>";print_r(strtoupper($valor['siglas'])); echo"</td>";
							echo"<td>";print_r(strtoupper($valor['grupo'])); echo"</td>";
							echo"<td>";print_r(strtoupper($valor['nombredivision'])); echo"</td>";
							echo"<td>";print_r($valor['idlaboratorios']); echo"</td>";
						?>
							<td><a href="#" onclick="ventanaEdita(<?= $valor['idgrupo'] ?>)">Editar</a></td>
							<td><a href="#" onclick="ventanaCambiaHora(<?= $valor['idgrupo']?>,'<?= $valor['siglas']?>', <?= $valor['idlaboratorios'] ?>)">Cambiar horario</a></td>
							<td><a href="#" onclick="ventanaCambiaLabo('<?= $valor['idgrupo']?>',<?= $valor['idlaboratorios'] ?>)">Cambiar lab</a></td>
							<td><a href="#" onclick="ventanaCambiaProfe('<?= $valor['idgrupo'] ?>','<?= $valor['idprofesores'] ?>')">Cambiar profesor</a></td>
							<td><a href="#" onclick="ventanaEliminaGrupo('<?= $valor['idgrupo'] ?>')">Eliminar grupo</a></td>

							<?php echo "</tr>";
						 }
					}								 
				?>
		</table> <!--TERMINA LA TABLA -->
	</div>
 	</div> <!--container-->
</body>
</html>
