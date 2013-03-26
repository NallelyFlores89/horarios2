<?php if( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	class Inicio extends CI_Controller {
		
		public function __construct(){

			parent::__construct();
			
			$this->load->helper(array('html', 'url'));
			$this->load->model('Inicio_m'); //Cargando mi modelo
		}
	
		function index($trim=1){           

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
			
			
			$DataHorarios['hora']=$this->Inicio_m->Obtenhorarios();

			$datos=Array(
					'DataHorarios' => $DataHorarios['hora'],
					'Data' => $Data
			);

			$this->load->view('inicio');
			$this->load->view('opciones_v');
			$this->load->view('tablaHorario_v', $datos);
			$this->load->view('opciones_v');
			$this->load->view('listaUeas_v', $datos);
			$this->load->view('footer');
		}//Fin función
		
		function ueasProf(){
			$datos['datosUPG']=$this->Inicio_m->obtenListaUeaProfesorGrupo();
			$this->load->view('ueasProf_v', $datos);
			$this->load->view('footer');
			
		}
		
	
	}//Fin de la clase
?>