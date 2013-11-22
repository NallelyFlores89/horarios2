<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	class Ueas_c extends CI_Controller{
    
	    function __construct(){
	        parent::__construct();
			
			$this->load->helper(array('html', 'url'));
	        $this->load->model(array('administracion_m','agregar_horario_m','Inicio_m')); // modelo
	        // $this->load->model('agregar_horario_m'); // modelo
	        $this->load->library('form_validation');
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');				
	   	}

	    function index(){
	    	
			if(! $this->session->userdata('validated')){
				redirect('loguin_c/index2/NULL/12');
			}else{
				$trim = $this->Inicio_m->ObtenTrimActivo(); //Definimos el id del trimestre a mostrar.
				$trimestres['trimActual'] = $trim;
				$trimestres['trim'] = $this->Inicio_m->ObtenTrim();				
				$datos['menuAdmin'] = $this->load->view('v_menuAdmin',$trimestres, TRUE);
				$datos['DatosUEA']=$this->administracion_m->obtenListaUEAS();
		    	$this->load->view('ueas_v',$datos);
			}
		} //fin del index
		
		function edita($iduea){
			if(! $this->session->userdata('validated')){
				redirect('loguin_c/relogin');
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
		
		function elimina_uea($iduea){
			if(! $this->session->userdata('validated')){
				redirect('loguin_c/relogin');
			}else{
				if($_POST != NULL){
					$this->administracion_m->eliminaUEA($iduea);
					echo "<script languaje='javascript' type='text/javascript'>
							window.opener.location.reload();
							window.close();</script>";				
				}else{
					$this->load->view('elimina_uea_v');
				}
			}	
		} 
		
		function agrega(){
			if(! $this->session->userdata('validated')){
				redirect('loguin_c/relogin');
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