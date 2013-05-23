<!DOCTYPE html>

<html lang="en"> 
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width" />
    <title>Laboratorios de Docencia - Administración</title>
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
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js" type="text/javascript"></script>
	<script>
		function ventanaEdita(id){
			liga='<?= base_url(); ?>index.php/profesores_c/edita/'+id
			window.open(liga, 'Edita', 'status=1,width=510,height=420, resizable=0') 
			return 0;
		}
		function ventanaElimina(id){
			liga='<?= base_url(); ?>index.php/profesores_c/elimina/'+id
			window.open(liga, 'Elimina', 'status=1,width=310,height=320, resizable=0') 
			return 0;
		}
		
		function ventanaAgrega(){
			liga='<?= base_url(); ?>index.php/profesores_c/agrega/'
			window.open(liga, 'Agrega', 'status=1,width=420,height=520, resizable=0, scrollbars=1') 
			return 0;
		}
		
		$(document).ready(function(){
			// Write on keyup event of keyword input element
			$("#kwd_search").keyup(function(){
				// When value of the input is not blank
				if( $(this).val() != "")
				{
					// Show only matching TR, hide rest of them
					$("#my-table tbody>tr").hide();
					$("#my-table td:contains-ci('" + $(this).val() + "')").parent("tr").show();
				}
				else
				{
					// When there is no input or clean again, show everything back
					$("#my-table tbody>tr").show();
				}
			});
		});
		// jQuery expression for case-insensitive filter
		$.extend($.expr[":"], 
		{
		    "contains-ci": function(elem, i, match, array) 
			{
				return (elem.textContent || elem.innerText || $(elem).text() || "").toLowerCase().indexOf((match[3] || "").toLowerCase()) >= 0;
			}
		});
	</script>
 
</head>

<body>
	<div class="container">
	<div class="row">
	<div class="twelve columns">
	<h3>Profesores-UEA</h3><br><br>
		<label for="kwd_search">Búsqueda:</label> <input type="text" id="kwd_search" value=""/>
		<table id="my-table" class="responsive contentHorario">
			<tr>
				<th>Profesor</th><th>N°. Empleado</th><th>Correo</th><th colspan="5">Acciones</th>
			</tr>
			<?php  //Cargando datos 
				if($datosProf==-1){
					echo "<label class='noDatos'> No hay datos que cargar</label>";
				}else{
					foreach ($datosProf as $valor) {
						echo "<tr>";
						echo"<td class='izq'>";print_r(strtoupper($valor['nombre'])); echo"</td>";
						echo"<td>";print_r($valor['numempleado']); echo"</td>";
						echo"<td>";print_r($valor['correo']); echo"</td>";
						$id=$valor['idprofesores'];
					?>
					<td><a href="#" onclick="ventanaEdita(<?= $id?>)">Editar</td>
					<td><a href="#" onclick="ventanaElimina(<?= $id?>)">Eliminar</td>
					

						<?php echo "</tr>";
					 }
				}								 
			?>
		</table> <!--TERMINA LA TABLA -->
		<hr>
		<div class="four columns"></div>
			<input id="add_prof" class="button large four columns" type="submit" value="Agregar profesor" onclick="ventanaAgrega()">
		<div class="four columns"></div>
 	</div>
 	</div>
 	</div> <!--container-->
</body>
</html>
