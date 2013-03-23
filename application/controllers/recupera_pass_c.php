<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	
	class Recupera_pass_c extends CI_Controller{
    
	    function __construct(){
	        parent::__construct();
			
			$this->load->helper(array('html', 'url'));
	        $this->load->model('recupera_pass_m');
			$this->load->library('email');
		}

	    function index(){
			if($_POST != NULL){
				$existe=$this->recupera_pass_m->verificaCorreo($_POST['correoInput']);
				if($existe!=-1){
						
					$config['mailtype']='html';
	 				$this->email->initialize($config);
					$this->email->from('anjudark89@gmail.com', 'Laboratorios de Docencia CBI');
					$this->email->to($_POST['correoInput']);
					$this->email->subject('Recupere su contraseña');
					$msj='Su contraseña es: '.$existe;			
					$this->email->message($msj);				
					$this->email->send();					
					echo "<script>alert('La clave de la contraseña ha sido enviada a su dirección de correo electrónico');
							window.close();</script>";	
					$this->load->view('recupera_pass_v');
				}else{
					echo "<label class='error'>El correo no existe en la base de datos</label>";
			        $this->load->view('recupera_pass_v');
				}
			}else{
		        $this->load->view('recupera_pass_v');
			}
	    }
	

	}
?>