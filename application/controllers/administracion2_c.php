<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	
	class Administracion2_c extends CI_Controller{
    
	    function __construct(){
	        parent::__construct();
			
			$this->load->helper(array('html', 'url'));
	        $this->load->model('administracion2_m'); // modelo
			$this->load->library('form_validation');
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');				
	   	}

	    function index(){
	    	
			if(! $this->session->userdata('validated')){
				redirect('loguin_c/index2/NULL/3');
			}else{
		    	$datos['usuarios'] = $this->administracion2_m->traeAdministradores();
	
				if($_POST != NULL){
					if(array_key_exists(1, $_POST)){ //Para cambiar la contraseña
						//Validando los campos
						$this->form_validation->set_rules('usuario', 'usuario', 'required');
						$this->form_validation->set_rules('passActual', 'passActual', 'required');
						$this->form_validation->set_rules('passNueva', 'passNueva', 'required');
						$this->form_validation->set_rules('passNueva2', 'passNueva2', 'required|matches[passNueva]');
	
						$this->form_validation->set_message('required','Campo obligatorio');
						$this->form_validation->set_message('matches','Las contraseñas no coinciden');
	
						if($this->form_validation->run()){
							$validaPass=$this->administracion2_m->compruebaPass($_POST['usuario']);
							if($validaPass == $_POST['passActual']){
								$this->administracion2_m->actualizaPass($_POST['usuario'],$_POST['passNueva']);
								echo "<script>
									alert('Contraseña actualizada éxitosamente')
								</script>";
								redirect('administracion2_c', 'refresh');
							}else{
								echo "<script>alert('La contraseña que introdujo es incorrecta')</script>";
								$this->load->view('administracion_v',$datos);
							}
						}else{
								$this->load->view('administracion_v',$datos);
						}
					}
					
					if(array_key_exists(2, $_POST)){
						//Validando los campos
						$this->form_validation->set_rules('usuario', 'usuario', 'required');
						$this->form_validation->set_rules('pass', 'pass', 'required');
						$this->form_validation->set_rules('correo', 'correo', 'required');
						$this->form_validation->set_rules('correo2', 'correo2', 'required|matches[correo]');
	
						$this->form_validation->set_message('required','Campo obligatorio');
						$this->form_validation->set_message('matches','<script>alert("Los correos no coinciden")</script>');
	
						if($this->form_validation->run()){
							$validaPass=$this->administracion2_m->compruebaPass($_POST['usuario']);
							if($validaPass == $_POST['pass']){
								$this->administracion2_m->actualizaCorreo($_POST['usuario'],$_POST['correo']);
								echo "<script>
									alert('Dirección de correo actualizada éxitosamente')
								</script>";
	      						redirect('administracion2_c', 'refresh');							
							}else{
								echo "<script>alert('La contraseña que introdujo es incorrecta')</script>";
								$this->load->view('administracion_v',$datos);
							}
						}else{
								$this->load->view('administracion_v',$datos);
						}
		
					}
		
					if(array_key_exists(3, $_POST)){
						$this->form_validation->set_rules('nombre', 'nombre', 'required');
						$this->form_validation->set_rules('usuario', 'usuario', 'callback_usuario_check');
						$this->form_validation->set_rules('correo', 'correo', 'callback_correo_check');
						$this->form_validation->set_rules('pass', 'pass', 'required');
						$this->form_validation->set_rules('pass2', 'pass2', 'required|matches[pass]');
	
						$this->form_validation->set_message('matches','<script>alert("Las contraseñas no coinciden")</script>');
	
						if($this->form_validation->run()){
							
							$this->administracion2_m->agregaAdmin($_POST['nombre'],$_POST['usuario'],$_POST['correo'], $_POST['pass']);
							echo "<script>
								alert('Administrador agregado')
							</script>";
	  						redirect('administracion2_c', 'refresh');	
							
						}else{
								$this->load->view('administracion_v',$datos);
						}
						
					}
				}else{
					$this->load->view('administracion_v',$datos);
				}
			}
		} //Fin de la función

		public function usuario_check($usuario){
			if(! $this->session->userdata('validated')){
				redirect('loguin_c/index2/NULL/3');
			}else{
				if($usuario==''){
						$this->form_validation->set_message('usuario_check','Campo obligatorio');
						return FALSE;
				}
				$existe=$this->administracion2_m->verificaUsuario($usuario); //Vefirificando si el nombre de usuario no existe en la BD
				if($existe == 1){
					$this->form_validation->set_message('usuario_check','<script>alert("El nombre de usuario ya existe") return 0</script>');
					return FALSE;
				}
			}
		}
		
		public function correo_check($correo){
			if(! $this->session->userdata('validated')){
				redirect('loguin_c/index2/NULL/3');
			}else{
				if($correo==''){
						$this->form_validation->set_message('correo_check','Campo obligatorio');
						return FALSE;
				}
	
				$existe=$this->administracion2_m->verificaCorreo($correo);
				if($existe == 1){
					$this->form_validation->set_message('correo_check','El correo ya está registrado');
					return FALSE;
				}
				return TRUE;
			}
		}
		
		public function elimina_admin($id){
			if(! $this->session->userdata('validated')){
				redirect('loguin_c/index2/NULL/3');
			}else{
				if($_POST!=NULL){
					$this->administracion2_m->elimina_admin($id);
					echo "<script languaje='javascript' type='text/javascript'>
						window.opener.location.reload();
						window.close();</script>";	
				}else{
					$this->load->view('eliminaAdmin_v.php');
				}			
			}
		}

	} //fin de la clase
?>