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
   	<script src="<?=base_url(); ?>statics/foundation/javascripts/marketing_docs.js"></script>
    <script type="text/javascript">var base='<?= base_url(); ?>' </script> 
    <title>Exportar horario</title>
</head>

<body>
	<br><br>
	<div class="container">
		<div class="row">
			<div class="three columns"></div>
			<div class="six columns">
				<form action="<?=base_url()?>index.php/pdf_c/generar" method="post">
					<?php 
						$i=1;
						foreach ($trim as $value) {
							$tr[$value['idtrim']] = $value['trim'];
							$i++;
						}
					?>
					<label>Seleccion un trimestre</label><br>
					<?php  echo form_dropdown('trim', $tr, 1,'id="trimestre"'); ?> <br><br>
					<input type="submit" id="agregar" class="button normal twelve columns" value="Exportar"/>
				</form>
			</div>
			<div class="three columns"></div>
			
		</div><br>
 	</div><!--container-->
 	
</body>
</html>
