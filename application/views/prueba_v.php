<!DOCTYPE html>

<html lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width" />
    <title>Laboratorios de Docencia - ueas</title>
	<link href='http://fonts.googleapis.com/css?family=Gafata' rel='stylesheet' type='text/css'>

	
  	<script src="<?=base_url(); ?>statics/js/jquery-1.8.2.js"></script>
  	<script src="<?=base_url(); ?>statics/foundation/javascripts/foundation.min.js"></script>
  	<script src="<?=base_url(); ?>statics/foundation/javascripts/modernizr.foundation.js"></script>
	<script src="<?=base_url(); ?>statics/responsiveTable/responsive-tables.js"></script>

	<style>
		table {width: 100%;}
		.div-1{color:#46433A;}
		.div-2{color:#64B6B1;}
		.div-3{color:#CE534D;}
		.div-4{color:#0080FF;}
		.div-5{color:#04B45F;}
		.div-6{color:#8A2908;}
		.div-7{color:#D358F7;}
		.div-8{color:#086A87;}
		.div-9{color:#F78181;}		
	</style>
</head>

<body>
	<table border='1' class='responsive'>
		<tr>
			<th>Día</th><th colspan='5'>Lunes</th><th colspan='5'>Martes</th><th colspan='5'>Miércoles</th><th colspan='5'>Jueves</th><th colspan='5'>Viernes</th>
		</tr>
		<tr>
			<td>Labo</td>
			<td>105</td><td>106</td><td>219</td><td>220</td><td>220B</td>
			<td>105</td><td>106</td><td>219</td><td>220</td><td>220B</td>
			<td>105</td><td>106</td><td>219</td><td>220</td><td>220B</td>
			<td>105</td><td>106</td><td>219</td><td>220</td><td>220B</td>
			<td>105</td><td>106</td><td>219</td><td>220</td><td>220B</td>
		</tr>
        <?php 
        	$i=1;
        	foreach ($DataHorarios as $value) { ?>
			<tr>
				<td><?= $value ?></td> 
				<td class="div-<?= $Data['$DataU105_1'][$i]['divisiones_iddivisiones']; ?>"><?php print_r($Data['$DataU105_1'][$i]['siglas']) ?></td>
				<td class="div-<?= $Data['$DataU106_1'][$i]['divisiones_iddivisiones']; ?>"><?php print_r($Data['$DataU106_1'][$i]['siglas']) ?></td>
				<td class="div-<?= $Data['$DataU219_1'][$i]['divisiones_iddivisiones']; ?>"><?php print_r($Data['$DataU219_1'][$i]['siglas']) ?></td>
				<td class="div-<?= $Data['$DataU220_1'][$i]['divisiones_iddivisiones']; ?>"><?php print_r($Data['$DataU220_1'][$i]['siglas']) ?></td>
				<td class="div-<?= $Data['$DataU221_1'][$i]['divisiones_iddivisiones']; ?>"><?php print_r($Data['$DataU221_1'][$i]['siglas']) ?></td>
				<td class="div-<?= $Data['$DataU105_2'][$i]['divisiones_iddivisiones']; ?>"><?php print_r($Data['$DataU105_2'][$i]['siglas']) ?></td>
				<td class="div-<?= $Data['$DataU106_2'][$i]['divisiones_iddivisiones']; ?>"><?php print_r($Data['$DataU106_2'][$i]['siglas']) ?></td>
				<td class="div-<?= $Data['$DataU219_2'][$i]['divisiones_iddivisiones']; ?>"><?php print_r($Data['$DataU219_2'][$i]['siglas']) ?></td>
				<td class="div-<?= $Data['$DataU220_2'][$i]['divisiones_iddivisiones']; ?>"><?php print_r($Data['$DataU220_2'][$i]['siglas']) ?></td>
				<td class="div-<?= $Data['$DataU221_2'][$i]['divisiones_iddivisiones']; ?>"><?php print_r($Data['$DataU221_2'][$i]['siglas']) ?></td>
				<td class="div-<?= $Data['$DataU105_3'][$i]['divisiones_iddivisiones']; ?>"><?php print_r($Data['$DataU105_3'][$i]['siglas']) ?></td>
				<td class="div-<?= $Data['$DataU106_3'][$i]['divisiones_iddivisiones']; ?>"><?php print_r($Data['$DataU106_3'][$i]['siglas']) ?></td>
				<td class="div-<?= $Data['$DataU219_3'][$i]['divisiones_iddivisiones']; ?>"><?php print_r($Data['$DataU219_3'][$i]['siglas']) ?></td>
				<td class="div-<?= $Data['$DataU220_3'][$i]['divisiones_iddivisiones']; ?>"><?php print_r($Data['$DataU220_3'][$i]['siglas']) ?></td>
				<td class="div-<?= $Data['$DataU221_3'][$i]['divisiones_iddivisiones']; ?>"><?php print_r($Data['$DataU221_3'][$i]['siglas']) ?></td>
				<td class="div-<?= $Data['$DataU105_4'][$i]['divisiones_iddivisiones']; ?>"><?php print_r($Data['$DataU105_4'][$i]['siglas']) ?></td>
				<td class="div-<?= $Data['$DataU106_4'][$i]['divisiones_iddivisiones']; ?>"><?php print_r($Data['$DataU106_4'][$i]['siglas']) ?></td>
				<td class="div-<?= $Data['$DataU219_4'][$i]['divisiones_iddivisiones']; ?>"><?php print_r($Data['$DataU219_4'][$i]['siglas']) ?></td>
				<td class="div-<?= $Data['$DataU220_4'][$i]['divisiones_iddivisiones']; ?>"><?php print_r($Data['$DataU220_4'][$i]['siglas']) ?></td>
				<td class="div-<?= $Data['$DataU221_4'][$i]['divisiones_iddivisiones']; ?>"><?php print_r($Data['$DataU221_4'][$i]['siglas']) ?></td>
				<td class="div-<?= $Data['$DataU105_5'][$i]['divisiones_iddivisiones']; ?>"><?php print_r($Data['$DataU105_5'][$i]['siglas']) ?></td>
				<td class="div-<?= $Data['$DataU106_5'][$i]['divisiones_iddivisiones']; ?>"><?php print_r($Data['$DataU106_5'][$i]['siglas']) ?></td>
				<td class="div-<?= $Data['$DataU219_5'][$i]['divisiones_iddivisiones']; ?>"><?php print_r($Data['$DataU219_5'][$i]['siglas']) ?></td>
				<td class="div-<?= $Data['$DataU220_5'][$i]['divisiones_iddivisiones']; ?>"><?php print_r($Data['$DataU220_5'][$i]['siglas']) ?></td>
				<td class="div-<?= $Data['$DataU221_5'][$i]['divisiones_iddivisiones']; ?>"><?php print_r($Data['$DataU221_5'][$i]['siglas']) ?></td>
			</tr>
		<?php  $i ++; } ?>
	</table> <!--TERMINA LA TABLA -->
</body>
</html>

