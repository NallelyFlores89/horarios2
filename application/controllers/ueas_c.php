<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	class Ueas_c extends CI_Controller{
    
	    function __construct(){
	        parent::__construct();
			
			$this->load->helper(array('html', 'url'));
	        $this->load->model('administracion_m'); // modelo
	        $this->load->model('agregar_horario_m'); // modelo
	        $this->load->library('form_validation');
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');				
	   	}

	    function index(){
	    	
			if(! $this->session->userdata('validated')){
				redirect('loguin_c/index2/NULL/3');
			}else{
				$datos['DatosUEA']=$this->administracion_m->obtenListaUEAS();
		    	$this->load->view('ueas_v',$datos);
			}
		} //fin del index
		
		function edita($iduea){
			if(! $this->session->userdata('validated')){
				redirect('loguin_c/index2/NULL/3');
			}else{
				$datos['DatosUEA']=$this->administracion_m->obtenDatosUEA($iduea);
				$datos['div']=$this->administracion_m->obtenDiv();
				if($_POST != NULL){
					$this->administracion_m->editaU($iduea, $_POST['ueaInput'], $_POST['claveInput'], $_POST['division']);
					echo "<script languaje='javascript' type='text/javascript'>
				    window.opener.location.reload();
		            window.close();</script>";
				}else{
		    		$this->load->view('editaUea_v',$datos);
		    	}
			}
		} 
		
		function agrega(){
			if(! $this->session->userdata('validated')){
				redirect('loguin_c/index2/NULL/3');
			}else{
				$datos['div']=$this->administracion_m->obtenDiv();

				if($_POST != NULL){
					$this->agregar_horario_m->inserta_uea($_POST['ueaInput'], $_POST['claveInput'], $_POST['division']);
					echo "<script languaje='javascript' type='text/javascript'>
				    window.opener.location.reload();
		            window.close();</script>";
				}else{
		    		$this->load->view('agregar_uea_v',$datos);
		    	}
			}			
			
		}
	} //Fin de la clase
?>