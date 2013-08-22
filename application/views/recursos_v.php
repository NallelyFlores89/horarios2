<!DOCTYPE html>
<html lang="en"> 
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
				<h1 class="nine columns">Laboratorios de Docencia CBI</h1>
				<a class="three columns" id="adminBtn" href="<?=base_url();?>index.php/loguin_c/">Entrar como administrador</a>
			</div><hr>
			<h3>Recursos</h3><br><br>	
			
			<label>Lista de software y hardware que ofrece cada laboratorio.</label><br><br>
			
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
			            		<table width="100%">
			            			<?php
										if($re[$value['idlaboratorios']] != -1){
											foreach ($re[$value['idlaboratorios']] as $valor) { ?>
												<tr>
													<td><?= $valor['recurso'] ?></td>
												</tr>	
									<?php }}else{ ?>
											<label class='noDatos'> No se han agregado recursos </label>
									<?php } ?>		            			
			            		</table>
			            	</li>						
				<?php	}else{ ?>		
		            	<li class="" id="simple<?= $value['idlaboratorios']?>Tab">
		            		<br>
		            		<table width="100%">
								<?php
									if($re[$value['idlaboratorios']] != -1){
										foreach ($re[$value['idlaboratorios']] as $valor) { ?>
											<tr>
												<td><?= $valor['recurso'] ?></td>
											</tr>	
								<?php }}else{ ?>
										<label class='noDatos'> No se han agregado recursos </label>
								<?php } ?>	
		            			
		            		</table>
		            	</li>					
				<?php } } ?>
			</ul>
		</div><!--twelve columns-->
	</div> <!--row-->
</body>
</html>
