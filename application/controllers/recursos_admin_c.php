<?php if( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	class Recursos_admin_c extends CI_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->helper(array('html', 'url'));
			$this->load->model('Recursos_m'); //Cargando mi modelo
			$this->load->model('solicitar_laboratorio_m');
			$this->load->library('form_validation');
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>'); 
		}
	
		function index(){//Cargamos vista			
			if(! $this->session->userdata('validated')){
				redirect('loguin_c/index2/NULL/8');
			}else{
				$Data['labos'] = $this->solicitar_laboratorio_m->obtenLaboratorios();
				$Data['re']['105']=$this->Recursos_m->obtenRecursos(105); //Obteniendo mis datos
				$Data['re']['106']=$this->Recursos_m->obtenRecursos(106); //Obteniendo mis datos
				$Data['re']['219']=$this->Recursos_m->obtenRecursos(219); //Obteniendo mis datos
				$Data['re']['220']=$this->Recursos_m->obtenRecursos(220); //Obteniendo mis datos
				$Data['re']['221']=$this->Recursos_m->obtenRecursos(221); //Obteniendo mis datos

				$this->load->view('recursos_admin_v',$Data);
			}	
			
		} //Fin de Recursos
		
		function agregar_Recursos(){           //Cargamos vista		
		if(! $this->session->userdata('validated')){
				redirect('loguin_c/index2/NULL/9');
		}else{
			$this->form_validation->set_rules('recursos[]', 'recursos[]', 'required');
			$this->form_validation->set_rules('checkboxes[]', 'checkboxes', 'required');
			$this->form_validation->set_message('required','Campo obligatorio');
						
			if($this->form_validation->run()){
				$recurso = $_POST['recursos'];
				$labos=$_POST['checkboxes'];
				$i=1;
				
				//Verificamos la existencia o no existencia del recurso en la base de datos
				foreach ($recurso as $value) {
					$idrecurso[$i]=$this->Recursos_m->obtenIdRecurso($value); //¿Existe el recurso en la BD?
					if($idrecurso[$i]==-1){ //Si el recurso no existe en la BD
						$this->Recursos_m->insertaRecurso($value); //Se inserta en la BD
						$idrecurso[$i]=$this->Recursos_m->obtenIdRecurso($value); //id definitivo del recurso
					}
					$i++;	
				}
								
				foreach($labos as $value){
					foreach ($idrecurso as $idr){							
						$laboratorio_recursoExiste = $this->Recursos_m->obtenLaboratorios_recursos($value, $idr);
						if($laboratorio_recursoExiste==-1){
							$this->Recursos_m->insertaLaboratorios_recursos($value, $idr); //Insertando en la tabla laboratorios_has_recursos
						}
					}
				}
				
				echo "<script languaje='javascript' type='text/javascript'>
				window.opener.location.reload();
		        window.close();</script>";
			}else{
				$this->load->view('agregar_recurso_v');
			}
		}
		
		} //Fin de agregarRecursos
		
		function eliminar_Recurso($idrecurso, $idlab){           //Cargamos vista
			if(! $this->session->userdata('validated')){
				redirect('loguin_c/index2/NULL/8');
			}else{
				if($_POST != NULL){
					$this->Recursos_m->elimina_laboratorios_has_recursos($idrecurso, $idlab);
					echo "<script languaje='javascript' type='text/javascript'>
					    window.opener.location.reload();
			            window.close();</script>";
				}
				$this->load->view('eliminar_recurso_v');
			}

		} //Fin función Eliminar_Recurso

		function editar_Recurso($idrecurso){           //Cargamos vista
			if(! $this->session->userdata('validated')){
				redirect('loguin_c/index2/NULL/8');
			}else{
				if($_POST != NULL){
					$this->Recursos_m->edita_recurso($idrecurso,$_POST['recursoInput']);
					echo "<script languaje='javascript' type='text/javascript'>
					    window.opener.location.reload();
			            window.close();</script>";
				}
				$this->load->view('editar_recurso_v');
			}
		} //Fin función Eliminar_Recurso
		
		function vaciar_Recursos(){           //Cargamos vista
			if(! $this->session->userdata('validated')){
				redirect('loguin_c/index2/NULL/10');
			}else{		
				$this->form_validation->set_rules('checkboxes2[]', 'checkboxes2', 'required');
				$this->form_validation->set_message('required','Escoja al menos un laboratorio');
				
				
				if($this->form_validation->run()){
					foreach ($_POST['checkboxes2'] as $value) {
						$this->Recursos_m->vacia_recursos($value);
						echo "<script languaje='javascript' type='text/javascript'>
					    window.opener.location.reload();
			            window.close();</script>";
					}
				}else{
					$this->load->view('vaciar_recursos_v');
				}
			}
		}
	}//Fin de la clase
?>