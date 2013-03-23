<?php if( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	class Inserta_laboratorios_grupo_c extends CI_Controller {
		
		public function __construct(){
				
			parent::__construct();
			
			$this->load->helper(array('html', 'url'));
			$this->load->model('Llena_tabla_laboratorios_grupo_m'); //Cargando mi modelo
		
		}
	
		function index(){          //Este controlador sirve para llenar o vaciar la tabla de laboratorios_Grupo
			
			for ($sem=1; $sem <=13; $sem++) {
				for ($dias=3; $dias<=3; $dias++) {
					 for ($hora=24; $hora <=24; $hora++) { 
						$this->Llena_tabla_laboratorios_grupo_m->inserta_laboratorios_grupo(220, $sem, $dias, $hora);
					 }
				}
			}
			
			//En caso de querer vaciar, descomentar la siguiente línea y en el modelo indicar las condiciones
			//$this->Llena_tabla_laboratorios_grupo_m->elimina_laboratorios_grupo(); 
			echo "listo";
		}//Fin función
		
	
	}//Fin de la clase
?>