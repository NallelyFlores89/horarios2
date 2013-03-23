<?php if( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	class Recursos_admin_c extends CI_Controller {
		
		public function __construct(){
				
			parent::__construct();
			
			$this->load->helper(array('html', 'url'));
			$this->load->model('Recursos_m'); //Cargando mi modelo
			$this->load->library('form_validation');
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>'); 
		}
	
		function index()	{           //Cargamos vista
			
			if(! $this->session->userdata('validated')){
				redirect('loguin_c/index2/NULL/8');
			}else{
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
				$this->load->view('recursos_admin_v',$RecursosLabos);
			}	
			
		} //Fin de Recursos
		
		function agregar_Recursos()	{           //Cargamos vista
		
		if(! $this->session->userdata('validated')){
				redirect('loguin_c/index2/NULL/9');
		}else{

			$this->form_validation->set_rules('recursoInput', 'recursoInput', 'required');
			$this->form_validation->set_rules('checkboxes[]', 'checkboxes', 'required');
			$this->form_validation->set_message('required','Campo obligatorio');
			
			
			if($this->form_validation->run()){

				$recurso = $_POST['recursoInput'];	
				$labos=$_POST['checkboxes'];
				
				$idrecurso=$this->Recursos_m->obtenIdRecurso($_POST['recursoInput']);
				
				if($idrecurso==-1){ //Si el recurso no existe en la BD
					$this->Recursos_m->insertaRecurso($recurso);
					$idrecurso=$this->Recursos_m->obtenIdRecurso($_POST['recursoInput']); //id definitivo del recurso
					
				}
				
				foreach ($labos as $value) {
					foreach ($idrecurso as $idr) {
							
						$laboratorio_recursoExiste = $this->Recursos_m->obtenLaboratorios_recursos($value, $idr);
						
						if($laboratorio_recursoExiste==-1){
							 echo "<br>No existe, así que lo insertaré en la table laboratorios_has_recursos";
							$this->Recursos_m->insertaLaboratorios_recursos($value, $idr); //Insertando en la tabla laboratorios_has_recursos
						}else{
							//echo "<h2>El recurso se encuentra ya en algunos laboratorios. Sólo se ha insertando en los laboratorios que no lo tenían </h2>";			
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
		
		function eliminar_Recurso($idrecurso, $idlab)	{           //Cargamos vista
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

		function editar_Recurso($idrecurso)	{           //Cargamos vista
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
		
		function vaciar_Recursos()	{           //Cargamos vista
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