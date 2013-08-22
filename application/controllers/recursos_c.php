<?php if( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	class Recursos_c extends CI_Controller {
		
		public function __construct(){
				
			parent::__construct();
			
			$this->load->helper(array('html', 'url'));
			$this->load->model('Recursos_m'); //Cargando mi modelo
			$this->load->model('solicitar_laboratorio_m');
		
		}
	
		function index($trim){           //Cargamos vista
			$Data['labos'] = $this->solicitar_laboratorio_m->obtenLaboratorios();
			$Data['trimAct'] = $trim;
			$Data['re']['105']=$this->Recursos_m->obtenRecursos(105); 
			$Data['re']['106']=$this->Recursos_m->obtenRecursos(106);
			$Data['re']['219']=$this->Recursos_m->obtenRecursos(219); 
			$Data['re']['220']=$this->Recursos_m->obtenRecursos(220);
			$Data['re']['221']=$this->Recursos_m->obtenRecursos(221);
			
			$this->load->view('recursos_v',$Data);
		
		} //Fin de SolicitarLaboratorio

		
		
	}//Fin de la clase
?>