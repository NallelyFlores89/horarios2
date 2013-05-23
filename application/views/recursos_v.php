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
			
			<dl class="tabs five-up">
				<?php
					foreach ($labos as $i => $value) { 
						if($i == 1){ ?>
							<dd class="active"><a  href="#simple<?= $value['idlaboratorios']?>"><?= $value['nombrelaboratorios'] ?></a></dd>
						<?php }else{ ?>	

						<dd><a href="#simple<?= $value['idlaboratorios']?>"><?= $value['nombrelaboratorios'] ?></a></dd>
				<?php }}
				
				?>
			</dl>	
			
			<ul class="tabs-content">
			<?php 
				foreach ($labos as $i => $value) { 
					if($i == 1){ ?>
						<li class="active" id="simple<?= $value['idlaboratorios']?>Tab">
		            		<br>
		            		<ul>
		            			<?php
									if($re[$value['idlaboratorios']] != -1){
										foreach ($re[$value['idlaboratorios']] as $valor) {
											echo "<li>"; print_r($valor['recurso']); echo "</li>";
										}	
									}else{
										echo "<label class='noDatos'> No se han agregado recursos </label>";
									}            			
		            			?>
		            			
		            		</ul>
		            	</li>						
			<?php	}else{ ?>		
	            	<li class="" id="simple<?= $value['idlaboratorios']?>Tab">
	            		<br>
	            		<ul>
	            			<?php
								if($re[$value['idlaboratorios']] != -1){
									foreach ($re[$value['idlaboratorios']] as $valor) {
										echo "<li>"; print_r($valor['recurso']); echo "</li>";
									}	
								}else{
									echo "<label class='noDatos'> No se han agregado recursos </label>";
								}            			
	            			?>
	            			
	            		</ul>
	            	</li>					
			<?php } } ?>

			</ul>

			</div><!--twelve columns-->
		</div> <!--row-->
</body>
</html>
