<!DOCTYPE html>

<html lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<!-- <meta name="viewport" content="width=device-width" /> -->
    <!-- <title>Laboratorios de Docencia - ueas</title> -->
	<!-- <link href='http://fonts.googleapis.com/css?family=Gafata' rel='stylesheet' type='text/css'> -->
	
  	<!-- <script src="<?=base_url(); ?>statics/js/jquery-1.8.2.js"></script>
  	<script src="<?=base_url(); ?>statics/foundation/javascripts/foundation.min.js"></script>
  	<script src="<?=base_url(); ?>statics/foundation/javascripts/modernizr.foundation.js"></script> -->
  	
	<style>
		body{background:#fff; font-family: 'Gafata',sans-serif; } header{background:#9ABD6D; padding: 2px; width:40%;}
		h1, h2{color:#fff} h1{font-size:15px; margin-left: 20px;} h2{font-size:13px; margin-left:20px;}
		table{width:100%} 
		table.horario {width: 100%; text-align:center; font-size:10px;}
		td{font-size:10px;}
		th{font-size:12px; padding:5px; background:#4DB788} td,tr{padding:3px;}
		ul{font-size:10px;}
		.labo{font-size:10px; font-weight:bold; background:#4DB788;}
		.div-1, ul.listacbi{color:#46433A;} .div-2, ul.listacbs{color:#64B6B1;} .div-3,ul.listacsh{color:#CE534D;} .div-4,ul.listacompu{color:#0080FF;}
		.div-5, ul.listabio{color:#04B45F;} .div-6,ul.listaele{color:#8A2908;} .div-7, ul.listapos{color:#D358F7;} .div-8,ul.listacomple{color:#086A87;}
		.div-9, ul.listaotro{color:#F78181;} .div-esp{background:#4DB788;} .lista1{width:100%; height:auto; margin-top:0px;}
		.lista2, .lista3{width:100%; margin-top:300px; height:auto;}
		.cbi{width:33.3%; float:right;} #ueasEspeciales{width:100%; margin-top:750px;}
		.labo-row{background:#E6E6E6}
		.th2{font-size:11px; background:#E6E6E6 !important;} .td2{font-size:10px; text-align:center}
		.col-uea{width:20%;} .col-grupo{width:10%} .col-sig{width:10%} .col-hora{width:10%} .col-dia{width:10%;} .col-sem{width:10%}
	</style>
</head>

<body>
	
	<table class="horario" border='1' class='responsive'>
		<tr>
			<th>Día</th><th colspan='5'>Lunes</th>
			<!-- <th colspan='5'>Martes</th><th colspan='5'>Miércoles</th><th colspan='5'>Jueves</th><th colspan='5'>Viernes</th> -->
		</tr>
		<tr class="labo-row">
			<td>Labo</td>
			<td>105</td><td>106</td><td>219</td><td>220</td><td>220B</td>
			<!-- <td>105</td><td>106</td><td>219</td><td>220</td><td>220B</td>
			<td>105</td><td>106</td><td>219</td><td>220</td><td>220B</td>
			<td>105</td><td>106</td><td>219</td><td>220</td><td>220B</td>
			<td>105</td><td>106</td><td>219</td><td>220</td><td>220B</td> -->
		</tr>
        <?php 
        	$i=1;
        	foreach ($DataHorarios as $value) { ?>
			<tr>
				<td class="labo-row"><?= $value ?></td> 
				<td><?php print_r($Data['$DataU105_1'][$i]['siglas']) ?></td>				
				<!-- <td><?php print_r($Data['$DataU106_1'][$i]['siglas']) ?></td>
				<td><?php print_r($Data['$DataU219_1'][$i]['siglas']) ?></td>
				<td><?php print_r($Data['$DataU220_1'][$i]['siglas']) ?></td>
				<td><?php print_r($Data['$DataU221_1'][$i]['siglas']) ?></td> -->
				<td><?php print_r($Data['$DataU105_2'][$i]['siglas']) ?></td>
				<!-- <td><?php print_r($Data['$DataU106_2'][$i]['siglas']) ?></td>
				<td><?php print_r($Data['$DataU219_2'][$i]['siglas']) ?></td>
				<td><?php print_r($Data['$DataU220_2'][$i]['siglas']) ?></td>
				<td><?php print_r($Data['$DataU221_2'][$i]['siglas']) ?></td> -->
				<td><?php print_r($Data['$DataU105_3'][$i]['siglas']) ?></td>
				<!-- <td><?php print_r($Data['$DataU106_3'][$i]['siglas']) ?></td>
				<td><?php print_r($Data['$DataU219_3'][$i]['siglas']) ?></td>
				<td><?php print_r($Data['$DataU220_3'][$i]['siglas']) ?></td>
				<td><?php print_r($Data['$DataU221_3'][$i]['siglas']) ?></td> -->
				<td><?php print_r($Data['$DataU105_4'][$i]['siglas']) ?></td>
				<!-- <td><?php print_r($Data['$DataU106_4'][$i]['siglas']) ?></td>
				<td><?php print_r($Data['$DataU219_4'][$i]['siglas']) ?></td>
				<td><?php print_r($Data['$DataU220_4'][$i]['siglas']) ?></td>
				<td><?php print_r($Data['$DataU221_4'][$i]['siglas']) ?></td> -->
				<td><?php print_r($Data['$DataU105_5'][$i]['siglas']) ?></td>
				<!-- <td><?php print_r($Data['$DataU106_5'][$i]['siglas']) ?></td>
				<td><?php print_r($Data['$DataU219_5'][$i]['siglas']) ?></td>
				<td><?php print_r($Data['$DataU220_5'][$i]['siglas']) ?></td> -->
				<!-- <td><?php print_r($Data['$DataU221_5'][$i]['siglas']) ?></td> -->
				<td>ja</td>
			</tr>
		<?php  $i ++;
		 } ?>
		 <tr>
		 	<td class="labo-row">Horas</td>
			<!-- <?php 
				foreach ($horaxDia as $value) { ?>
				<td><?= $value ?></td>	
			<?php }
			
			?> -->
		 </tr>
	</table> <!--TERMINA LA TABLA -->
	
	<div id="listaUEA"> <!--row lista uea --> 
		<div class="lista1">
			<div id="CBI-UEA" class="cbi">
				<h5>CBI</h5>
			    <ul class="disc listacbi">
  				    <?php  
  				    	if($Data['datosCBI']==-1){
  				    		echo "<label class='noDatos'> Sin cursos</label>";
  				    	}else{
		    				  				    		
							foreach ($Data['datosCBI'] as $valor) {
								$cadena='('.$valor['siglas'].')';
								echo "<li>";
								print_r(strtoupper($valor['nombreuea']));
								echo"<span class='siglasUEA'>";
								print_r(strtoupper($cadena));
								echo"</span>";
								echo "</li>";									
							}
						}
					?>
			    </ul>
  			</div>
		
			<div id="CBS-UEA" class="cbi">
				<h5>CBS</h5>
			    <ul class="disc listacbs">
  				    <?php  
  				    	if($Data['datosCBS']==-1){
  				    		echo "<label class='noDatos'> Sin cursos</label>";
  				    		
  				    	}else{			    	
							foreach ($Data['datosCBS'] as $valor) {
								$cadena='('.$valor['siglas'].')';
								echo "<li>";
								print_r(strtoupper($valor['nombreuea']));
								echo"<span class='siglasUEA'>";
								print_r(strtoupper($cadena));
								echo"</span>";
								echo "</li>";									
							}
						}
					?>
				</ul>
			  </div>
			  <div id="CSH-UEA" class="cbi">
				<h5>CSH</h5>
			    <ul class="disc listacsh">
  				    <?php  
  				    	if($Data['datosCSH']==-1){
  				    		echo "<label class='noDatos'> Sin cursos </label>";
						}else{
							foreach ($Data['datosCSH'] as $valor) {
								$cadena='('.$valor['siglas'].')';
								echo "<li>";
								print_r(strtoupper($valor['nombreuea']));
								echo"<span class='siglasUEA'>";
								print_r(strtoupper($cadena));
								echo"</span>";
								echo "</li>";									
							}
						}
					?>
			    </ul>
			  </div>
		</div> <!-- termina row lista uea -->
			  
        <div class="lista2"> <!--segundo bloque de ueas -->
		  	<div class="cbi">
				<h5>Computación</h5>
				<ul class="disc listacompu">
  				    <?php  
  				    	if($Data['datosCompu']==-1){
  				    		echo "<label class='noDatos'> Sin cursos </label>";
						}else{
							foreach ($Data['datosCompu'] as $valor) {
								$cadena='('.$valor['siglas'].')';
								echo "<li>";
								print_r(strtoupper($valor['nombreuea']));
								echo"<span class='siglasUEA'>";
								print_r(strtoupper($cadena));
								echo"</span>";
								echo "</li>";									
							}
						}
					?>
			    </ul>
		  	</div>
		  	
		  	<div class="cbi">
		  		<h5>Ing. Biomédica</h5>
		  		<ul class="disc listabio">
  				    <?php  
  				    	if($Data['datosBio']==-1){
  				    		echo "<label class='noDatos'> Sin cursos </label>";
						}else{
							foreach ($Data['datosBio'] as $valor) {
								$cadena='('.$valor['siglas'].')';
								echo "<li>";
								print_r(strtoupper($valor['nombreuea']));
								echo"<span class='siglasUEA'>";
								print_r(strtoupper($cadena));
								echo"</span>";
								echo "</li>";									
							}
						}
					?>
			    </ul>
		  	</div>
		  	
		  	<div class="cbi">
		  		<h5>Ing. Electrónica</h5>
		  		<ul class="disc listaele">
  				    <?php  
  				    	if($Data['datosElec']==-1){
  				    		echo "<label class='noDatos'> Sin cursos </label>";
						}else{
							foreach ($Data['datosElec'] as $valor) {
								$cadena='('.$valor['siglas'].')';
								echo "<li>";
								print_r(strtoupper($valor['nombreuea']));
								echo"<span class='siglasUEA'>";
								print_r(strtoupper($cadena));
								echo"</span>";
								echo "</li>";									
							}
						}
					?>
			    </ul>	  	
		  	</div>
		</div> <!--termina segundo bloque de ueas-->

        <div class="lista3"> <!--tercer bloque de ueas -->
		  	<div class="cbi">
				<h5>PCITI</h5>
				<ul class="disc listapos">
  				    <?php  
  				    	if($Data['datosPCITI']==-1){
  				    		echo "<label class='noDatos'> Sin cursos </label>";
						}else{
							foreach ($Data['datosPCITI'] as $valor) {
								$cadena='('.$valor['siglas'].')';
								echo "<li>";
								print_r(strtoupper($valor['nombreuea']));
								echo"<span class='siglasUEA'>";
								print_r(strtoupper($cadena));
								echo"</span>";
								echo "</li>";									
							}
						}
					?>
			    </ul>
		  	</div>
		  	
		  	<div class="cbi">
		  		<h5>Cursos complementarios</h5>
				<ul class="disc listacomple">
  				    <?php  
  				    	if($Data['datosCC']==-1){
  				    		echo "<label class='noDatos'> Sin cursos </label>";
						}else{
							foreach ($Data['datosCC'] as $valor) {
								$cadena='('.$valor['siglas'].')';
								echo "<li>";
								print_r(strtoupper($valor['nombreuea']));
								echo"<span class='siglasUEA'>";
								print_r(strtoupper($cadena));
								echo"</span>";
								echo "</li>";									
							}
						}
					?>
			    </ul>  			  		
		  	</div>
		  	
		  	<div class="cbi">
		  		<h5>Otro</h5>	
				<ul class="disc listaotro">
  				    <?php  
  				    	if($Data['datosOtros']==-1){
  				    		echo "<label class='noDatos'> Sin cursos</label>";
						}else{
							foreach ($Data['datosOtros'] as $valor) {
								$cadena='('.$valor['siglas'].')';
								echo "<li>";
								print_r(strtoupper($valor['nombreuea']));
								echo"<span class='siglasUEA'>";
								print_r(strtoupper($cadena));
								echo"</span>";
								echo "</li>";									
							}
						}
					?>
			    </ul> 			  		  	
		  	</div>	  	
		</div> <!--termina tercer bloque de ueas -->
	</div><!--lista uea-->
	<div id="ueasEspeciales">
		<h5>Especiales</h5>
			<table border="1">
				<?php
				if($filtro != NULL){
					foreach ($filtro as $i => $labo) { ?>						
						<tr>
							<th colspan="6" class="labo"><?= $i ?></th>
						</tr>
						<tr>
							<td class="th2 col-uea">UEA</td><td class="th2 col-grupo">Grupo</td>
							<td class="th2 col-sig">Siglas</td><td class="th2 col-hora">Hora</td>
							<td class="th2 col-dia">Día</td><td class="th2 col-sem">Semanas</td>
						</tr>
						<?php 
							foreach ($labo as $grupo) { ?>
								<tr>
									<td><?= $grupo['uea'] ?></td>
									<td><?= $grupo['grupo'] ?></td>
									<td><?= $grupo['siglas'] ?></td>
									<td><?= $grupo['hora_inicial'] ?> - <?= $grupo['hora_final'] ?></td>
									<td><?= $grupo['dia']?></td>
									<td><?= $grupo['semanai'] ?> - <?= $grupo['semanaf'] ?>	</td>
								</tr>
							<?php } ?>
					<?php }}?>
			</table>
	</div>
</body>
</html>

