<!DOCTYPE html>

<html lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width" />
    <title>Recursos </title>
	<link href='http://fonts.googleapis.com/css?family=Gafata' rel='stylesheet' type='text/css'>
  	<script src="<?=base_url(); ?>statics/js/jquery-1.8.2.js"></script>
  	<script src="<?=base_url(); ?>statics/foundation/javascripts/foundation.min.js"></script>
  	<script src="<?=base_url(); ?>statics/foundation/javascripts/modernizr.foundation.js"></script>
  	
  	<link rel="stylesheet" href="<?=base_url(); ?>statics/foundation/stylesheets/foundation.min.css">
	<link rel="stylesheet" href="<?=base_url(); ?>statics/responsiveTable/stylesheets/app.css">
   	<script src="<?=base_url(); ?>statics/foundation/javascripts/marketing_docs.js"></script>
	 	 	
</head>

<body>
		<div class="row">
			<br><div class="twelve columns">
			<div class="row cabecera">
				<h1>Laboratorios de Docencia CBI</h1><br>
			</div>
			<h2>Recursos</h2><br><br>	
			<label>Lista de software y hardware que ofrece cada laboratorio</label><br><br>	
			<dl class="tabs four-up">
					<dd class="active"><a href="#simple1">AT-105</a></dd>
				  	<dd><a href="#simple2">AT-106</a></dd>
				  	<dd><a href="#simple3">AT-219</a></dd>
				  	<dd><a href="#simple4">AT-220</a></dd>
			</dl>

				<ul class="tabs-content">
	            	<li class="active" id="simple1Tab">
	            		<br>
	            		<ul>
	            			<?php
								if($recursos105 != -1){
									foreach ($recursos105 as $valor) {
										echo "<li>"; print_r($valor['recurso']); echo "</li>";
									}	
								}else{
									echo "<label class='noDatos'> No se han agregado recursos </label>";
								}            			
	            			?>
	            			
	            		</ul>
	            		
	            		
	            		
	            	</li>
				  	<li id="simple2Tab">
	            		<br>
	            		<ul>
	            			<?php
		            			if($recursos106 != -1){
		            				foreach ($recursos106 as $valor) {
										echo "<li>"; print_r($valor['recurso']); echo "</li>";
									}
								}else{
									echo "<label class='noDatos'> No se han agregado recursos </label>";
								}	            			
	            			?>	            			
	            		</ul>				  		
				  	</li>
				  	
				  	<li id="simple3Tab">
	            		<br>
	            		<ul>
	            			<?php
			            		if($recursos219 != -1){
									foreach ($recursos219 as $valor) {
										echo "<li>"; print_r($valor['recurso']); echo "</li>";
									}	        
								}else{
										echo "<label class='noDatos'> No se han agregado recursos </label>";
								}    			
	            			?>	            			
	            		</ul>
	             	</li>
				  	
				  	<li id="simple4Tab">
	            		<br>
	            		<ul>
	            			<?php
		            			if($recursos220 != -1){
		            			
									foreach ($recursos220 as $valor) {
										echo "<li>"; print_r($valor['recurso']); echo "</li>";
									}
								}else{
									echo "<label class='noDatos'> No se han agregado recursos </label>";
								}	            			
	            			?>	 	            			
	            		</ul>
	            	</li>				  	
				</ul>
			</div><!--twelve columns-->
		</div> <!--row-->
</body>
</html>
