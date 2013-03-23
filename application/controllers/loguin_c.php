<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	
	class Loguin_c extends CI_Controller{
    
	    function __construct(){
	        parent::__construct();
			
			$this->load->helper(array('html', 'url'));
	        $this->load->model('loguin_model'); 
			$this->load->library('session');
	   	}

    function index( $msg = NULL ){
 		$data['msg'] = $msg;
		$data['pag'] = 1;
        $this->load->view('loguin_v', $data);
    }

    function index2( $msg = NULL, $pag){
 		$data['msg'] = $msg;
		$data['pag'] = $pag;
        $this->load->view('loguin_v', $data);
    }	

	 function process($pag){
        $result = $this->loguin_model->validate();// Validando al usuario         
		
		if(! $result){ 
           	$msg = '<font class="error">Nombre de usuario y/o contraseña incorrectos</font><br />';
			$this->index($msg);
			
        }else{
        	switch ($pag) {
				case '1':
					redirect('inicio_admin_c');
					break;
				
				case '2':
					redirect('administracion_c');
					break;
					
				case '3':
					redirect('administracion2_c');
					break;

				case '4':
					redirect('agHorarioEsp_c');
					break;
					
				case '5':
					redirect('agregar_horario_c');
					break;
					
				case '6':
					redirect('profesores_c');
					break;

				case '7':
					redirect('profesores_c/agrega');
					break;
					
				case '8':
					redirect('recursos_admin_c');
					break;

				case '9':
					redirect('recursos_admin_c/agregar_recursos');
					break;

				case '10':
					redirect('recursos_admin_c/vaciar_recursos');
					break;
				
				case '11':
					redirect('vaciar_confirm_c');
					break;
			} //Fin del switch
            // redirect('inicio_admin_c'); //Cargando página de administrador        
        }        
    }

}
?>