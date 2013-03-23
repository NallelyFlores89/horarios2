<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	
	class Profesores_c extends CI_Controller{
    
	    function __construct(){
	        parent::__construct();
			
			$this->load->helper(array('html', 'url'));
	        $this->load->model('profesores_m'); // modelo
	        $this->load->model('administracion_m'); // modelo
	        			
	   	}

	    function index(){
	    	if(! $this->session->userdata('validated')){
				redirect('loguin_c/index2/NULL/6');
			}else{
				$data['datosProf']=$this->profesores_m->obtenerInfoProfesor();
		        $this->load->view('profesores_v', $data);
			}
	    }
		
		function elimina($id){
			if(! $this->session->userdata('validated')){
				redirect('loguin_c/index2/NULL/6');
			}else{				
				if($_POST != NULL){
					$grupos=$this->administracion_m->obtenGruposxProf($id); 
					foreach ($grupos as $value) { //Elimina los grupos dados por el profesor
						$this->administracion_m->eliminaGrupo($value['idgrupo']);
					}
					
					//Eliminando al profesor
					$this->administracion_m->eliminaProfesor($id);
										
					echo "<script languaje='javascript' type='text/javascript'>
							window.opener.location.reload();
							window.close();</script>";				
					
				}else{
					$this->load->view('elimina_profr');
				}
			}
		}
		
		function edita($id){
			if(! $this->session->userdata('validated')){
				redirect('loguin_c/index2/NULL/6');
			}else{
				$data['datosProf']=$this->profesores_m->obtenerInfoProfesorId($id);
								
				$this->form_validation->set_rules('nombreInput', 'nombreInput', 'required');
				$this->form_validation->set_rules('correoInput', 'correoInput', 'email_valid');

				$this->form_validation->set_message('required','Este campo no puede ser nulo');
	
				if($this->form_validation->run()){
					
					$this->profesores_m->editaProfesor($id, $_POST['nombreInput'], $_POST['numInput'],$_POST['correoInput']);
					
					echo "<script languaje='javascript' type='text/javascript'>
							window.opener.location.reload();
			                window.close();</script>";
			                
				}else{
					$this->load->view('edita_profesor_v',$data);
				}	
			}
		} //Fin función
		
		function agrega(){
			if(! $this->session->userdata('validated')){
				redirect('loguin_c/index2/NULL/7');
			}else{
				
				$this->form_validation->set_rules('nombreInput', 'nombreInput', 'required');
				$this->form_validation->set_rules('correoInput', 'correoInput', 'email_valid');

				$this->form_validation->set_message('required','Este campo no puede ser nulo');
				$this->form_validation->set_message('email_valid','Ingrese una dirección de correo valida');
	
				if($this->form_validation->run()){
					
					$this->profesores_m->inserta_profesores($_POST['nombreInput'], $_POST['numInput'],$_POST['correoInput']);
					
					echo "<script languaje='javascript' type='text/javascript'>
							window.opener.location.reload();
			                window.close();</script>";
			                
				}else{
					
					$this->load->view('agregar_profesor');
				}
			}	
		}
		
	} //Fin de la clase
?>