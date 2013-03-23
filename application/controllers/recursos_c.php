<?php if( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	class Recursos_c extends CI_Controller {
		
		public function __construct(){
				
			parent::__construct();
			
			$this->load->helper(array('html', 'url'));
			$this->load->model('Recursos_m'); //Cargando mi modelo
		
		}
	
		function index()	{           //Cargamos vista
			
			$DataRecursos105=$this->Recursos_m->obtenRecursos(105); //Obteniendo mis datos
			$DataRecursos106=$this->Recursos_m->obtenRecursos(106); //Obteniendo mis datos
			$DataRecursos219=$this->Recursos_m->obtenRecursos(219); //Obteniendo mis datos
			$DataRecursos220=$this->Recursos_m->obtenRecursos(220); //Obteniendo mis datos
			
			$RecursosLabos=Array(
				'recursos105'=> $DataRecursos105,
				'recursos106'=> $DataRecursos106,
				'recursos219'=> $DataRecursos219,
				'recursos220'=> $DataRecursos220
			);
		
			$this->load->view('recursos_v',$RecursosLabos);
		
		} //Fin de SolicitarLaboratorio

		
		
	}//Fin de la clase
?>