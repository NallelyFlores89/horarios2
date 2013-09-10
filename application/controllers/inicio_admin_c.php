<?php if( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	class Inicio_admin_c extends CI_Controller {
		
		public function __construct(){				
			parent::__construct();
			$this->load->helper(array('html', 'url','date'));
			$this->load->model('Inicio_m'); //Cargando mi modelo
			$this->check_isvalidated();
			$this->load->helper('form');
			$this->load->library('dateOperations');
						
		}
		
		//Esta función carga la vista principal	
		//Recibe como parametro el id del trimestre a cargar por 'default' desde el inicio. Se debe modificar manualmente
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
			// $InicioTrim = "2013-08-20";
			//Llamamos función para calcular en qué semana estamos
			$Data['semanaActiva']= $this->calculaSemana($fechaAct,$InicioTrim);
			
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
			$DataHorarios['hora']=$this->Inicio_m->Obtenhorarios();
			$trimestres['trimActual'] = $trim;
			$trimestres['trim'] = $this->Inicio_m->ObtenTrim();
			
			
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

			$datos=Array(
				'DataHorarios' => $DataHorarios['hora'],
				'Data' => $Data
			);
			
			$this->load->view('inicio_admin_v', $trimestres);
			$this->load->view('tablaHorario_v', $datos);
			$this->load->view('listaUeas_v', $datos);
			$this->load->view('footer');
			
		}//Fin función index
		
		
		public function horarioxTrimestre($trim){ //Este controlador carga los horarios dependiendo del trimestre elegido en la vista
			
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
			// $InicioTrim = "2013-08-20";
			//Llamamos función para calcular en qué semana estamos
			$Data['semanaActiva']= $this->calculaSemana($fechaAct,$InicioTrim);
			
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
			$DataHorarios['hora']=$this->Inicio_m->Obtenhorarios();
			$trimestres['trim'] = $this->Inicio_m->ObtenTrim();
			$trimestres['trimActual'] = $trim;

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

			$datos=Array(
				'DataHorarios' => $DataHorarios['hora'],
				'Data' => $Data
			);

			$this->load->view('inicio_admin_v', $trimestres);
			$this->load->view('tablaHorario_v', $datos);
			$this->load->view('listaUeas_v', $datos);
			$this->load->view('footer');			
			
		} //Fin función horarioxTrimestre
		
		
		//Recibe la fecha actual y fecha de inicio del trimestre en formato AAAA-MM-DD
		//Esta función calcula la fecha límite de cada semana 
		//Y calcula la semana activa acorde a la fecha actual, regresando como dato el número de semana
		//correspondiente
		function calculaSemana($fechaAct, $fechaInicio){
			$fechaAux = $fechaInicio; //Guarda fecha inicio al princpio
			// echo "fecha aux:";
			// print_r ($fechaAux);
			// echo "<br>fecha act:";
			// print_r ($fechaAct);
			$fechaSemanas[1] = $fechaInicio;
			//Realizando cálculos de fechas límites para cada semana
			for ($i=2; $i<=12; $i++){
				$fechaSemanas[$i] = $this->dateoperations->sum($fechaAux,'day',7);
				$fechaAux = $this->dateoperations->sum($fechaAux,'day',7);
			}
			// echo "<pre>";
			// print_r($fechaSemanas);
			// echo "</pre>";
			
			foreach ($fechaSemanas as $i => $fecha) {
				if($fechaAct < $fecha){
					return $i-1; //Regresa el número de semana correspondiente a la fecha actual
				}
			}
		}
		private function check_isvalidated(){
			if(! $this->session->userdata('validated')){
				redirect('loguin_c');
			}
		}
	
		public function do_logout(){
			$this->session->sess_destroy();
			redirect('inicio');
		}
	
	}//Fin de la clase
?>