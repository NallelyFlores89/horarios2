<?php if( ! defined('BASEPATH')) exit('No direct script access allowed');
	class AgHorarioEsp_c extends CI_Controller {
		
		public function __construct(){
				
			parent::__construct();
			
			$this->load->helper(array('html', 'url'));
			$this->load->model('Solicitar_laboratorio_m'); 
			$this->load->model('Agregar_horario_m');
			$this->load->model('profesores_m');
			$this->load->model('Inicio_m');
									
			$this->load->library('form_validation');
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		}
		
		function index($trim){           //Cargamos vista
			
			if(! $this->session->userdata('validated')){
				redirect('loguin_c/index2/NULL/4');
			}else{
				$GrupoExiste=0;
				
				$Data['division']=$this->Solicitar_laboratorio_m->ObtenListaDivisiones(); 
				$Data['dias']=$this->Solicitar_laboratorio_m->ObtenDias();
				$Data['trimActual'] = $trim;
				$Data['trim'] = $this->Inicio_m->ObtenTrim();				
				$Data['labos']=$this->Agregar_horario_m->obtenLaboratorios();
				$Data['hora']=$this->Solicitar_laboratorio_m->Obtenhorarios();
				$Data['sem']=$this->Agregar_horario_m->obtenerSemana(); 
		
				if($Data['division'] > 0){
					foreach ($Data['division'] as $indice => $division) {
						$divisiones['divisiones'][$indice]=$division;
					}
				}else{
					$mensaje='No hay datos';
					$divisiones['divisiones'][1]=$mensaje;
				}		
				
				
				/**Validación del formulario**/		
					
				$this->form_validation->set_rules('correoInput', 'claveInput', '');					
				$this->form_validation->set_rules('numInput', 'claveInput', '');					
				$this->form_validation->set_rules('claveInput', 'claveInput', '');	
				$this->form_validation->set_rules('grupoInput', 'claveInput', '');	
				$this->form_validation->set_rules('HoraIDropdown', 'HoraIDropdown', '');	
				$this->form_validation->set_rules('HoraFDropdown', 'HoraFDropdown', '');	
				$this->form_validation->set_rules('divisionesDropdown', 'divisionesDropdown', '');	
				$this->form_validation->set_rules('SemIDropdown', 'SemIDropdown', '');	
				$this->form_validation->set_rules('SemFDropdown', 'SemFDropdown', '');	
				$this->form_validation->set_rules('laboratoriosDropdown', 'laboratoriosDropdown', '');

				$this->form_validation->set_rules('nombreInput', 'nombreInput', 'required');
				$this->form_validation->set_rules('ueaInput', 'ueaInput', 'required');
				$this->form_validation->set_rules('grupoInput', 'grupoInput', 'required');
				$this->form_validation->set_rules('siglasInput', 'siglasInput', 'required');
				$this->form_validation->set_rules('checkboxes[]', 'checkboxes', 'required');

				$this->form_validation->set_message('required','<script>alert("Por favor, seleccione al menos un día")</script>');
								
				$datos=Array(  //Enviando datos a la vista
						'listaDivisiones' => $divisiones,
						'Data' => $Data,
				);
			
				if($this->form_validation->run()){

					//AGREGANDO DATOS EN BD

					//Agregando al profesor
										
					$idProf=$this->Agregar_horario_m->obtenerIdProfesor($_POST['nombreInput']); //Profesor
					
					if($idProf==-1){ //Si no existe el profesor en la base de datos, lo inserta
						$this->Agregar_horario_m->inserta_profesores($_POST['nombreInput'], $_POST['numInput'], $_POST['correoInput']);
					}
	
					$idProf=$this->Agregar_horario_m->obtenerIdProfesor($_POST['nombreInput']); //Obteniendo id del profesor
				
					$id_lab = $_POST['laboratoriosDropdown'];
					
					//Agregando la UEA
					$iduea=$this->Agregar_horario_m->obtenerIdUea($_POST['ueaInput']);
					
					if($iduea==-1){ //Si la UEA no existe, la insertará
						$this->Agregar_horario_m->inserta_uea($_POST['ueaInput'], $_POST['claveInput'], $_POST['divisionesDropdown']);
					}
					
					$iduea=$this->Agregar_horario_m->obtenerIdUea($_POST['ueaInput']); //id definitivo de UEA a manejar
									
					$idGrupo=$this->Agregar_horario_m->obtenerIdGrupo($_POST['grupoInput']);
					
					if($idGrupo==-1){
						$this->Agregar_horario_m->inserta_grupo($_POST['grupoInput'], $_POST['siglasInput'], $iduea, $idProf);
					}else{
						$GrupoExiste=1;		
					}
					$horaI = $_POST['HoraIDropdown'];
					$horaF = $_POST['HoraFDropdown'];																			
					$idGrupo=$this->Agregar_horario_m->obtenerIdGrupo($_POST['grupoInput']); //Id definitivo del grupo a manejar
									
					//OPERACIONES SEMANA
			
					$idSemI=$_POST['SemIDropdown'];
					$idSemF=$_POST['SemFDropdown'];
					$idtrim = $_POST['trimestre'];					
					//INSERTANDO EN LABORATORIO_GRUPO				
					for ($j=$idSemI; $j <=$idSemF; $j++) { //Semanas
						if($horaF==27){
							for ($i=$horaI; $i <=26; $i++) {  //horas
								foreach ($_POST['checkboxes'] as $dias) { //días
									$this->Agregar_horario_m->agregaHorario($id_lab, $idGrupo, $j, $dias, $i, $idtrim);
								}
							}							
							
						}else{ 
							for ($i=$horaI; $i <$horaF; $i++) {  //horas
								foreach ($_POST['checkboxes'] as $dias) { //días
									$this->Agregar_horario_m->agregaHorario($id_lab, $idGrupo, $j, $dias, $i, $idtrim);
								}
							}
						}
					}
					
					echo "<script languaje='javascript' type='text/javascript'>
						    window.opener.location.reload();
						    alert('Horario agregado');
							window.opener.location.reload();
			                window.close();</script>";
					}else{
						$this->load->view('header');
						$this->load->view('script');
						$this->load->view('agregarHorarioForm', $datos);
						$this->load->view('agHorarioEsp_v', $datos);
					} //Validation run
				} //Login
			} //Fin de index
	
	}//Fin de la clase
	
?>