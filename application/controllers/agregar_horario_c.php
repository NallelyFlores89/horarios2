<?php if( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Agregar_horario_c extends CI_Controller {
		
		public function __construct(){
				
			parent::__construct();
			
			$this->load->helper(array('html', 'url'));
			$this->load->model('Solicitar_laboratorio_m'); 
			$this->load->model('Agregar_horario_m');
			$this->load->model('Inicio_m');
			$this->load->model('profesores_m'); 
			$this->load->library('session');									
			$this->load->library('form_validation');
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		}
		
		function index($trim){         //Cargamos vista
			
			if(! $this->session->userdata('validated')){
				redirect('loguin_c/index2/NULL/5');
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
				$this->form_validation->set_rules('laboratoriosDropdown', 'laboratoriosDropdown', '');	
								
				$this->form_validation->set_rules('nombreInput', 'nombreInput', 'required');
				$this->form_validation->set_rules('ueaInput', 'ueaInput', 'required');
				$this->form_validation->set_rules('grupoInput', 'grupoInput', 'required');
				$this->form_validation->set_rules('siglasInput', 'siglasInput', 'required');
				$this->form_validation->set_rules('checkboxes[]', 'checkboxes', 'required');
				
				$this->form_validation->set_message('required','<script>alert("Por favor, seleccione al menos un día")</script>');
						
				$datos=Array(  //Enviando datos a la vista
						'listaDivisiones' => $divisiones,
						'Data' => $Data
				);
					
				if($this->form_validation->run()){
					$datos['limpia']=1;
	
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
					
					//Agregando el grupo el grupo
					$idGrupo=$this->Agregar_horario_m->obtenerIdGrupo($_POST['grupoInput']);
					
					//Si el grupo no existe, lo agregará a la tabla de laboratorios_grupo
					if($idGrupo==-1){
						$this->Agregar_horario_m->inserta_grupo($_POST['grupoInput'], $_POST['siglasInput'], $iduea, $idProf);
					}else{
						//Si el grupo existe, mandará un alerta advirtiendo que el horario está ocupado
						$GrupoExiste=1;		
					}
					$horaI = $_POST['HoraIDropdown'];
					$horaF = $_POST['HoraFDropdown'];						
					$idGrupo=$this->Agregar_horario_m->obtenerIdGrupo($_POST['grupoInput']); //Id definitivo del grupo a manejar
												
					$idtrim = $_POST['trimestre'];	
					//INSERTANDO EN LABORATORIO_GRUPO				
					for ($j=1; $j <=12; $j++) { //Semanas
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
					
					if(array_key_exists('otro', $_POST)){
						echo "
							<script>
								alert('horario agregado')
								window.opener.location.reload();
								
							</script>";
						$this->load->view('header');
						$this->load->view('script');
						$this->load->view('agregarHorarioForm', $datos);
						$this->load->view('agregar_horario_v', $datos);					
					}else{
						echo "<script languaje='javascript' type='text/javascript'>
						    window.opener.location.reload();
						    alert('Horario agregado');
							window.opener.location.reload();
			                window.close();</script>";
					}

					}else{
							$datos['limpia']=0;
							$this->load->view('header');
							$this->load->view('script');
							$this->load->view('agregarHorarioForm', $datos);
							$this->load->view('agregar_horario_v', $datos);
						
					} //Validation run
				} //Login
			} //Fin de index

			//FUNCIONES MANEJADAS CON AJAX
			function propon_profesor(){
				$term = $this->input->post('term',TRUE);
				$rows = $this->Agregar_horario_m->propon_profesor(array('keyword' => $term));
				$json_array = array();
				
				foreach ($rows as $row){
					 $json_array[$row->idprofesores]=$row->nombre;
				}			
				echo json_encode($json_array);
			}	
			
			function propon_uea(){
				$term = $this->input->post('term',TRUE);
				$rows = $this->Agregar_horario_m->propon_uea(array('keyword' => $term));
			
				$json_array = array();
				foreach ($rows as $row){
					 array_push($json_array, $row->nombreuea);
				}
			
				echo json_encode($json_array);
			}

			function busca_id_prof(){
				$term = $this->input->post('term2',TRUE);
				$rows = $this->Agregar_horario_m->busca_id_profesor(array('keyword' => $term));
				$json_array = array();
				
				foreach ($rows as $row){
					array_push($json_array, $row->idprofesores);				
				}			
				echo json_encode($json_array);
			}
			
			function busca_num_empleado(){
				$term = $this->input->post('term3',TRUE);
				$rows = $this->Agregar_horario_m->busca_num_empleado(array('keyword' => $term));
				$json_array = array();

				if($rows != -1){
					foreach ($rows as $row){
						array_push($json_array, $row->numempleado);
					}			
					echo json_encode($json_array);
				}else{
					echo json_encode("No número");
				}
			}
			
			function busca_correo_empleado(){
				$term = $this->input->post('term4',TRUE);
				$rows = $this->Agregar_horario_m->busca_correo_empleado(array('keyword' => $term));
				$json_array = array();

				if($rows != -1){
					foreach ($rows as $row){
						array_push($json_array, $row->correo);
					}			
					echo json_encode($json_array);
				}else{
					echo json_encode("No correo");
				}
			}

			function busca_id_uea(){
				$term = $this->input->post('termUea',TRUE);
				$rows = $this->Agregar_horario_m->busca_id_uea(array('keyword' => $term));
				$json_array = array();
				
				foreach ($rows as $row){
					array_push($json_array, $row->iduea);				
				}			
				echo json_encode($json_array);
			}

			function busca_clave(){
				$term = $this->input->post('idUea',TRUE);
				$rows = $this->Agregar_horario_m->busca_clave(array('keyword' => $term));
				$json_array = array();

				if($rows != -1){
					foreach ($rows as $row){
						array_push($json_array, $row->clave);
					}			
					echo json_encode($json_array);
				}else{
					echo json_encode(-1);
				}
			}
			
			function busca_division(){
				$term = $this->input->post('idUea',TRUE);
				$rows = $this->Agregar_horario_m->busca_division(array('keyword' => $term));
				$json_array = array();

				if($rows != -1){
					foreach ($rows as $row){
						array_push($json_array, $row->divisiones_iddivisiones);
					}			
					echo json_encode($json_array);
				}else{
					echo json_encode(-1);
				}				
				
			}
			
			function envia_hora_dsps(){
				$term = $this->input->post('horaI',TRUE);
				echo json_encode($term+1);

			}							

	
	}//Fin de la clase
	
?>