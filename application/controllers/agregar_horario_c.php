<?php if( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Agregar_horario_c extends CI_Controller {
		
		public function __construct(){
				
			parent::__construct();
			
			$this->load->helper(array('html', 'url'));
			$this->load->model('Solicitar_laboratorio_m'); 
			$this->load->model('administracion_m'); 
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
			
				//Datos que se cargan en la vista
				$Data['division']=$this->Solicitar_laboratorio_m->ObtenListaDivisiones(); 
				$Data['dias']=$this->Solicitar_laboratorio_m->ObtenDias();
				$Data['trimActual'] = $trim;
				$Data['trim'] = $this->Inicio_m->ObtenTrim();				
				$Data['labos']=$this->Agregar_horario_m->obtenLaboratorios();
				$Data['hora']=$this->Solicitar_laboratorio_m->Obtenhorarios();
				$Data['sem']=$this->Agregar_horario_m->obtenerSemana();
				
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

				//Enviando datos a la vista						
				$datos=Array( 'Data' => $Data);
				//Se recibe correctamente la solicitud para agregar el horario				
				if($this->form_validation->run()){
					$datos['limpia']=1; //Indica que debe limpiar o no el formulario. Se utiliza cuando se escoge la opción "agregar otro"
	
					//AGREGANDO DATOS EN BD
					
					$idtrim = $_POST['trimestre']; //Se obtiene el trimestre al que se agregará el horario
					//Agregando al profesor
					$idProf=$this->Agregar_horario_m->obtenerIdProfesor($_POST['nombreInput']); //Profesor
					
					if($idProf==-1){ //Si no existe el profesor en la base de datos, lo agrega
						$this->Agregar_horario_m->inserta_profesores($_POST['nombreInput'], $_POST['numInput'], $_POST['correoInput']);
					}
	
					$idProf=$this->Agregar_horario_m->obtenerIdProfesor($_POST['nombreInput']); //Obteniendo id del profesor
					$id_lab = $_POST['laboratoriosDropdown']; //Se obtiene el laboratorio al que será asignado el horario
					
					//Agregando la UEA
					$iduea=$this->Agregar_horario_m->obtenerIdUea($_POST['ueaInput']);
					
					if($iduea==-1){ //Si la UEA no existe, la agregará
						$this->Agregar_horario_m->inserta_uea($_POST['ueaInput'], $_POST['claveInput'], $_POST['divisionesDropdown']);
					}
					
					$iduea=$this->Agregar_horario_m->obtenerIdUea($_POST['ueaInput']); //id definitivo de UEA a manejar

					//Revisamos si el grupo existe o no en el trimestre
					$idGrupo=$this->Agregar_horario_m->obtenerIdGrupoTrim($_POST['grupoInput'], $idtrim);
					
					//Si el grupo no existe, lo agregará a la tabla de laboratorios_grupo
					if($idGrupo==-1){
						$this->Agregar_horario_m->inserta_grupo($_POST['grupoInput'], $_POST['siglasInput'], $iduea, $idProf, $idtrim);
					}

					$horaI = $_POST['HoraIDropdown']; $horaF = $_POST['HoraFDropdown'];						
					$idGrupo=$this->Agregar_horario_m->obtenerIdGrupoTrim($_POST['grupoInput'], $idtrim); //Id definitivo del grupo a manejar

					
					//Revisando si el horario no está ocupado por otro grupo
					$indice=1;
					for ($j=1; $j <=12; $j++) { //Semanas 
						for ($i=$horaI; $i <$horaF; $i++) {  //horas
							foreach ($_POST['checkboxes'] as $dias) { //días
								$ocupado[$indice] = $this->Solicitar_laboratorio_m->horarioOcupado($_POST['laboratoriosDropdown'], $j, $dias, $i, $idtrim);
								$indice++;
							}
						}
					}
					//Obteniendo el/los grupos que están ocupando el horario
					$i=1;
					foreach ($ocupado as $value) {
						 if($value['idgrupo'] != NULL){
						 	$gr[$i]=$value['idgrupo']; 
						 	$i++;
						 }	
					}
					$no_disponible = array_unique($ocupado);
					//Horario NO ocupado. Agrega horario a la tabla										
					if(sizeof($no_disponible)==1 AND ($no_disponible[1] == NULL || $no_disponible[1]==-1)){ //En caso de que los horarios estén disponibles, envía la solicitud
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
					}else{ //Horario ocupado
						$grps_oc=array_unique($gr);
						$dias = $_POST['checkboxes'];
						$liga = 'agregar_horario_c/aviso/'.$idtrim.'/'.$id_lab.'/'.$idGrupo.'/'.$horaI.'/'.$horaF.'/'.implode("-", $dias).'/'.implode("-", $grps_oc);
						echo "<br> liga: <br>";
						print_r($liga);
						redirect($liga);						
					}
					//Verifica si el usuario desea o no agregar otro horario
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
						    alert('Horario agregado');
							window.opener.location.reload();
			                window.close();</script>";
					}

				}else{//validation run no es válida
					$datos['limpia']=0;
					$this->load->view('header');
					$this->load->view('script');
					$this->load->view('agregarHorarioForm', $datos);
					$this->load->view('agregar_horario_v', $datos);
						
				} //Validation run
			} //Login
		} //Fin de index
			
		function aviso(){				
			$trim= $this->uri->segment(3, 0);
			$lab= $this->uri->segment(4, 0);
			$grupo= $this->uri->segment(5, 0);
			$horai= $this->uri->segment(6, 0);
			$horaf= $this->uri->segment(7, 0);
			$datos['dias']= explode("-",$this->uri->segment(8, 0)); //Convertimos en array para facilitar su manejo
			$datos['grp_oc']= explode("-", $this->uri->segment(9, 0));
			$i=1;
			foreach ($datos['grp_oc'] as $value) {
				$datos['grupos'][$i] = $this->Agregar_horario_m->obtenGrupoyUea($value['idgrupo']);
				$i++;				
			}
					
			if($_POST!=NULL){ //El usuario ha decidido sobreescribir el horario
				//Borramos el grupo de la tabla laboratorios_grupo
				foreach ($datos['grupos'] as $value) {
					$this->administracion_m->borraGrupo($value['idgrupo'], $lab,$trim);	
				}
				//Agregamos el grupo nuevo
					for ($j=1; $j <=12; $j++) { //Semanas
						if($horaf==27){
							for ($i=$horai; $i <=26; $i++) {  //horas
								foreach ($datos['dias'] as $dias) { //días
									$this->Agregar_horario_m->agregaHorario($lab, $grupo, $j, $dias, $i, $trim);
								}
							}							
						
					 	}else{ 
							for ($i=$horai; $i <$horaf; $i++) {  //horas
								foreach ($datos['dias'] as $dias) { //días
									$this->Agregar_horario_m->agregaHorario($lab, $grupo, $j, $dias, $i, $trim);
								}
							}
						}
					}				
					echo "<script languaje='javascript' type='text/javascript'>
	                window.close();</script>";
			}else{
				$this->load->view('aviso_v', $datos);
			}
			
		}

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