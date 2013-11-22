<!DOCTYPE html>

<html lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width" />
    <title>Reglamento</title>
   	<link href='http://fonts.googleapis.com/css?family=Gafata' rel='stylesheet' type='text/css'>
  	<link rel="stylesheet" href="<?=base_url(); ?>statics/foundation/stylesheets/foundation.min.css">
  	<link rel="stylesheet" href="<?=base_url(); ?>statics/responsiveTable/stylesheets/app.css">
  	<script src="<?=base_url(); ?>statics/js/jquery-1.8.2.js"></script>
  	<script src="<?=base_url(); ?>statics/foundation/javascripts/foundation.min.js"></script>
  	<script src="<?=base_url(); ?>statics/foundation/javascripts/modernizr.foundation.js"></script>
  	<style>
  		.regla{text-align:left;}
  		.reglamento{height: auto; background:#E6E6E6; padding:40px 20px;}
  		ul.lista-re > li{font-size:16px; margin-top:5px}
  	</style>
</head>

<body>
	<div class="row">
		<div class="twelve columns"><br><br>
			<div class="row cabecera">
				<h1 class="nine columns">Laboratorios de Docencia CBI</h1>
				<a class="three columns" id="adminBtn" href="<?=base_url();?>index.php/loguin_c/">Entrar como administrador</a>
			</div><hr>
			<h3>Reglamento</h3><br><br>	
			<div class="row reglamento">
				<ul class="lista-re">
					<li>No se permite el acceso a personal ajeno fuera del horario de clases.</li>
					<li>Se prohíbe consumir alimentos y/o bebidas dentro los los laboratorios.</li>
					<li>El laboratorio, así como el material del mismo, queda bajo responsabilidad del profesor asignado, el cual deberá responder 
						ante cualquier daño o pérdida que se haya reconocido dentro de su horario de actividades.
					</li>
					<li>Los alumnos no tendrán acceso a los laboratorios hasta que el profesor responsable esté presente.</li>
					<li>Los usuarios deberán dejar el equipo de cómputo tal y como lo encontraron.</li>
					<li>Mantener limpia el área del trabajo.</li>
					<li>La puerta de los laboratorios deberá permanecer cerrada.</li>
					<li>El profesor queda como responsable tanto del mantenimiento del equipo, así como del comportamiento de los alumnos.</li>
					<li>El profesor debe concluir con su clase 5 minutos antes para que los alumnos tengan tiempo de apagar el equipo y
						el grupo abandone el laboratorio a la hora que indica el horario.  </li>
					<li>Bajo ningún motivo el profesor abandonará el laboratorio sin que todos sus alumnos lo hayan hecho primero.</li>
					<li>En caso de que el profesor necesite ausentarse por un momento, deberá preguntar al personal encargado si se puede atender el grupo.</li>
					<li>El profesor debe respetar el horario que se le ha sido asignado.Bajo ningún motivo se debe exceder de la hora a finalizar.</li>
				</ul>
			</div>
		</div> <!--twelve-->
	</div> <!--row-->
</body>
<hr>
<?= $footer ?>
</html>
