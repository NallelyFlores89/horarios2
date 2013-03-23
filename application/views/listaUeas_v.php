		<!--Aquí comienza lista de UEA's-->
		<div id="listaUEA" class="row"> <!--row lista uea --> 
			<div id="CBI-UEA" class="four columns">
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
		
			<div id="CBS-UEA" class="four columns">
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
			  <div id="CSH-UEA" class="four columns">
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
		<hr>
			  
        <div class="row"> <!--segundo bloque de ueas -->
		  	<div class="four columns">
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
		  	
		  	<div class="four columns">
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
		  	
		  	<div class="four columns">
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
		<hr>
        <div class="row"> <!--tercer bloque de ueas -->
		  	<div class="four columns">
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
		  	
		  	<div class="four columns">
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
		  	
		  	<div class="four columns">
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
		</div><!--twelve columns-->
	</div> <!--row-->
</div> <!--container-->
</body>