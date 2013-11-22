<?php if( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	class Inicio extends CI_Controller {
		
		public function __construct(){
			parent::__construct();			
			$this->load->helper(array('html', 'url', 'date'));
			$this->load->model('Inicio_m'); //Cargando mi modelo
 			$this->load->library('dateOperations');
 		}
		//Esta función carga la vista que todos los usuarios verán
		
		function index(){			
			$trim = $this->Inicio_m->ObtenTrimActivo(); //Definimos el id del trimestre a mostrar.
			//Obtenemos fecha actual del sistema. Esto para activar la semana correspondiente
			$fechaAct = time();
			//Convirtiendo en array para manejar datos
			$fechaActArray = Array(
				"year" => mdate("%Y", mysql_to_unix($fechaAct)),
				"mes" => mdate("%m", mysql_to_unix($fechaAct)),
				"dia" => mdate("%d", mysql_to_unix($fechaAct)),
			);			
			//Obtenemos fecha actual en formato AAAA-MM-DD
			$fechaAct = $fechaActArray["year"]."-".$fechaActArray["mes"]."-".$fechaActArray["dia"];
			//Obtenemos fecha inicio de trimestre desde base de datos
			$InicioTrim = $this->Inicio_m->obtenFechaInicioTrim($trim);
			//Convirtiendo en array para manejar datos
			$fechaInicioTrim = Array(
				"year" => mdate("%Y", mysql_to_unix($InicioTrim)),
				"mes" => mdate("%m", mysql_to_unix($InicioTrim)),
				"dia" => mdate("%d", mysql_to_unix($InicioTrim)),
			);
			
			//Obtenemos fecha inicio trimestre en formato AAAA-MM-DD
			$InicioTrim = $fechaInicioTrim["year"]."-".$fechaInicioTrim["mes"]."-".$fechaInicioTrim["dia"];
			$InicioTrim = "2013-08-20";
			//Llamamos función para calcular en qué semana estamos
			$Data['semanaActiva']= $this->calculaSemana($fechaAct,$InicioTrim);
			$trimestres['trimAct'] = $trim;
			$Data['datosCBI']=$this->Inicio_m->obtenListaUeasDiv(1, $trim);
			$Data['datosCBS']=$this->Inicio_m->obtenListaUeasDiv(2, $trim); 
			$Data['datosCSH']=$this->Inicio_m->obtenListaUeasDiv(3, $trim); 
			$Data['datosCompu']=$this->Inicio_m->obtenListaUeasDiv(4, $trim); 
			$Data['datosBio']=$this->Inicio_m->obtenListaUeasDiv(5, $trim); 
			$Data['datosElec']=$this->Inicio_m->obtenListaUeasDiv(6, $trim); 
			$Data['datosPCITI']=$this->Inicio_m->obtenListaUeasDiv(7, $trim);
			$Data['datosCC']=$this->Inicio_m->obtenListaUeasDiv(8, $trim);
			$Data['datosOtros']=$this->Inicio_m->obtenListaUeasDiv(9, $trim);
			$Data['laboratorios']=$this->Inicio_m->ObtenLabos();
			
			for ($sem=1; $sem <= 12 ; $sem++) { //Obteniendo datos para cargar las tablas del 105
				for ($dia=1; $dia <=5 ; $dia++) { 
					$vacio= array_fill(1,27, null);
					$ocupados = $this->Inicio_m->ueas(105,$sem,$dia, $trim);
					if($ocupados == -1){
						 $Data['$DataU105_'.$sem.'_'.$dia]=$vacio;
					}else{
						$Data['$DataU105_'.$sem.'_'.$dia]=array_replace($vacio,$ocupados);
					}
				}
			}

			for ($sem=1; $sem <= 12 ; $sem++) { //Obteniendo datos para cargar las tablas del 106
				for ($dia=1; $dia <=5 ; $dia++) { 
					$vacio= array_fill(1,27, null);
					$ocupados = $this->Inicio_m->ueas(106,$sem,$dia, $trim);
					if($ocupados == -1){
						 $Data['$DataU106_'.$sem.'_'.$dia]=$vacio;
					}else{
						$Data['$DataU106_'.$sem.'_'.$dia]=array_replace($vacio,$ocupados);
					}
				}
			}
			
			for ($sem=1; $sem <= 12 ; $sem++) { //Obteniendo datos para cargar las tablas del 219
				for ($dia=1; $dia <=5 ; $dia++) { 
					$vacio= array_fill(1,27, null);
					$ocupados = $this->Inicio_m->ueas(219,$sem,$dia, $trim);
					if($ocupados == -1){
						 $Data['$DataU219_'.$sem.'_'.$dia]=$vacio;
					}else{
						$Data['$DataU219_'.$sem.'_'.$dia]=array_replace($vacio,$ocupados);
					}
				}
			}			

			for ($sem=1; $sem <= 12 ; $sem++) { //Obteniendo datos para cargar las tablas del 220
				for ($dia=1; $dia <=5 ; $dia++) { 
					$vacio= array_fill(1,27, null);
					$ocupados = $this->Inicio_m->ueas(220,$sem,$dia, $trim);
					if($ocupados == -1){
						 $Data['$DataU220_'.$sem.'_'.$dia]=$vacio;
					}else{
						 $Data['$DataU220_'.$sem.'_'.$dia]=array_replace($vacio,$ocupados);
					}
				}
			}
			
			for ($sem=1; $sem <= 12 ; $sem++) { //Obteniendo datos para cargar las tablas del 220b
				for ($dia=1; $dia <=5 ; $dia++) { 
					$vacio= array_fill(1,27, null);
					$ocupados = $this->Inicio_m->ueas(221,$sem,$dia, $trim);
					if($ocupados == -1){
						 $Data['$DataU221_'.$sem.'_'.$dia]=$vacio;
					}else{
						 $Data['$DataU221_'.$sem.'_'.$dia]=array_replace($vacio,$ocupados);
					}
				}
			}
			//Obteniendo horarios de la base de datos				
			$DataHorarios['hora']=$this->Inicio_m->Obtenhorarios();

			$datos=Array('DataHorarios' => $DataHorarios['hora'],'Data' => $Data);
			
			//Cargando vista
			$trimestres['opciones'] = $this->load->view('opciones_v', $trimestres, TRUE);
			$trimestres['tablaHorario'] = $this->load->view('tablaHorario_v', $datos, TRUE);
			$trimestres['listaUeas'] =$this->load->view('listaUeas_v', $datos, TRUE);
			$trimestres['footer'] = $this->load->view('footer',null, true);
			$this->load->view('inicio', $trimestres);
		}//Fin función
		
		function ueasProf($trim){
			$datos['datosUPG']=$this->Inicio_m->obtenListaId($trim);
			$this->load->view('ueasProf_v', $datos);
			$this->load->view('footer');			
		}
		
		//Recibe la fecha actual y fecha de inicio del trimestre en formato AAAA-MM-DD
		//Esta función calcula la fecha límite de cada semana 
		//Y calcula la semana activa acorde a la fecha actual, regresando como dato el número de semana
		//correspondiente
		function calculaSemana($fechaAct, $fechaInicio){
			$fechaAux = $fechaInicio;
			$fechaSemanas[1] = $fechaInicio;
			//Realizando cálculos de fechas límites para cada semana
			for ($i=2; $i<=12; $i++){
				$fechaSemanas[$i] = $this->dateoperations->sum($fechaAux,'day',7);
				$fechaAux = $this->dateoperations->sum($fechaAux,'day',7);
			}
			
			foreach ($fechaSemanas as $i => $fecha) {
				if($fechaAct < $fecha){
					return $i-1; //Regresa el número de semana correspondiente a la fecha actual
				}
			}
			
		}	
	}//Fin de la clase
?>