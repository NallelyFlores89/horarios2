<!DOCTYPE html>

<html lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width" />
</head>

<body>

	<label style="color: #4DB788; font-size: 16px;">Nombre del solicitante:</label>
	<label style="color:#000; font-size: 16px;" class="infCorreo seven columns"><?php print_r($nombre); ?></label><br>

	<label style="color: #4DB788; font-size: 16px;">Num. Empleado:</label>
	<label style="color:#000; font-size: 16px;" class="infCorreo seven columns"><?php print_r($numero); ?></label><br>

	<label style="color: #4DB788; font-size: 16px;">Correo:</label>
	<label style="color:#000; font-size: 16px;"><?php print_r($correo); ?></label><br>

	<label style="color: #4DB788; font-size: 16px;">Clave de la UEA:</label>
	<label style="color:#000; font-size: 16px;"><?php print_r($clave); ?></label><br>

	<label class="correoLabel five columns" style="color: #4DB788; font-size: 16px;">Nombre de la UEA:</label>
	<label class="infCorreo seven columns" style="color:#000; font-size: 16px;"><?php print_r($uea); ?></label><br>

	<label class="correoLabel five columns" style="color: #4DB788; font-size: 16px;">Grupo:</label>
	<label class="infCorreo seven columns" style="color:#000; font-size: 16px;"><?php print_r($grupo); ?></label><br>

	<label class="correoLabel five columns" style="color: #4DB788; font-size: 16px;">División:</label>
	<label class="infCorreo seven columns" style="color:#000; font-size: 16px;"><?php print_r($division); ?></label><br>

	<label class="correoLabel five columns" style="color: #4DB788; font-size: 16px;">Laboratorio:</label>
	<label class="infCorreo seven columns" style="color:#000; font-size: 16px;"><?php
	 switch ($laboratorio) {
		 case 0:
			 $labo='Ninguno en especial';
			 break;
		case 105:
			 $labo='AT-105';
			 break;
		case 106:
			 $labo='AT-106';
			 break;
		case 219:
			 $labo='AT-219';
			 break;
		case 220:
			 $labo='AT-220';
			 break;
	 }
	 print_r($labo); ?></label><br>
	
	<label class="correoLabel five columns" style="color: #4DB788; font-size: 16px;">Laboratorio Alterno:</label>
	<label class="infCorreo seven columns" style="color:#000; font-size: 16px;"><?php
		 switch ($laboratorioAlt) {
			 case 0:
				 $labo='Ninguno en especial';
				 break;
			case 105:
				 $labo='AT-105';
				 break;
			case 106:
				 $labo='AT-106';
				 break;
			case 219:
				 $labo='AT-219';
				 break;
			case 220:
				 $labo='AT-220';
				 break;
	 }
	 print_r($labo); ?></label><br>

	<label class="correoLabel five columns" style="color: #4DB788; font-size: 16px;">Hora Inicio:</label>
	<label class="infCorreo seven columns" style="color:#000; font-size: 16px;"><?php print_r($hora_i); ?></label><br>

	<label class="correoLabel five columns" style="color: #4DB788; font-size: 16px;">Hora Term:</label>
	<label class="infCorreo seven columns" style="color:#000; font-size: 16px;"><?php print_r($hora_f); ?></label><br>

	<label class="correoLabel five columns" style="color: #4DB788; font-size: 16px;">Semana de inicio:</label>
	<label class="infCorreo seven columns" style="color:#000; font-size: 16px;"><?php print_r($semI); ?></label><br>

	<label class="correoLabel five columns" style="color: #4DB788; font-size: 16px;">Semana Final:</label>
	<label class="infCorreo seven columns" style="color:#000; font-size: 16px;"><?php print_r($semF); ?></label><br>

	<label class="correoLabel five columns" style="color: #4DB788; font-size: 16px;">Días:</label>
	<label class="infCorreo seven columns" style="color:#000; font-size: 16px";><?php
		foreach ($dias as $value) {
			switch ($value) {
				case 1:
					$dia='Lunes';
					break;
				case 2:
					$dia='Martes';
					break;
				case 3:
					$dia='Miércoles';
					break;
				case 4:
					$dia='Jueves';
					break;
				case 5:
					$dia='Viernes';
					break;				
			}
			echo " ";print_r($dia); echo ",";
		}
	 ?></label><br>

	<label class="correoLabel five columns" style="color: #4DB788; font-size: 16px;">Recursos:</label>
	<label class="infCorreo seven columns" style="color:#000; font-size: 16px;"><?php print_r($recursos); ?></label><br>

	<label class="correoLabel five columns" style="color: #4DB788; font-size: 16px;">Comentarios:</label>
	<label class="infCorreo seven columns" style="color:#000; font-size: 16px;"><?php print_r($comentarios); ?></label><br>

</body>
</html>
