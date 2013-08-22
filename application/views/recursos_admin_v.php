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
   	<script src="<?=base_url(); ?>statics/foundation/javascripts/marketing_docs.js"></script>
	<script src="<?=base_url(); ?>statics/js/jquery.popupWindow.js"></script>
	<script> var base = '<?= base_url(); ?>'</script>
  	<script src="<?=base_url(); ?>statics/js/recursos_admin.js"></script>

  	<link rel="stylesheet" href="<?=base_url(); ?>statics/foundation/stylesheets/zurb.mega-drop.css">
  	<link rel="stylesheet" href="<?=base_url(); ?>statics/foundation/stylesheets/foundation.min.css">
	<link rel="stylesheet" href="<?=base_url(); ?>statics/responsiveTable/stylesheets/app.css">
	 	 	
</head>

<body>
		<div class="row">
			<br><br>
			<div class="twelve columns">
			<h2>Administrar recursos</h2><hr><br><br>			
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
												<td><a href='#' class='EliminarRecurso three columns' onclick='ventanaElimina(<?= $valor['idrecursos']?>, <?= $value['idlaboratorios']?>)'>Eliminar</a></td>
												<td><a class='EditarRecurso three columns' href='#' onclick='ventanaEdita(<?= $valor['idrecursos'] ?>)'>Modificar</a></td>
											</tr>
										<?php } ?>	
									<?php }else{ ?>
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
												<td><a href='#' class='EliminarRecurso three columns' onclick='ventanaElimina(<?= $valor['idrecursos']?>, <?= $value['idlaboratorios']?>)'>Eliminar</a></td>
												<td><a class='EditarRecurso three columns' href='#' onclick='ventanaEdita(<?= $valor['idrecursos'] ?>)'>Modificar</a></td>
											</tr>
										<?php } ?>	
									<?php }else{ ?>
										<label class='noDatos'> No se han agregado recursos </label>
									<?php } ?>
							</table>            			
		            	</li>					
				<?php }} ?>
			</ul>
				
				<br><br>
				<div class="two columns"></div>
				<a href="<?= base_url(); ?>index.php/recursos_admin_c/agregar_recursos" class="button AgregarRecursosBtn four columns">Agregar recursos</a>
				<a href="<?= base_url(); ?>index.php/recursos_admin_c/vaciar_recursos" class="button VaciarRecursosBtn four columns">Vaciar recursos</a><br/><br/>
				<div class="two columns"></div>
			</div><!--twelve columns-->
		</div> <!--row-->
</body>
</html>