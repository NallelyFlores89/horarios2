<?php if( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Solicitar_labo_c extends CI_Controller {
		
		public function __construct(){
				
			parent::__construct();
			
			$this->load->helper(array('html', 'url'));
			$this->load->model('Solicitar_laboratorio_m'); 
			
			$this->load->library('form_validation');
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
			$this->load->library('email');
		}
		
		function index()	{
				           
			$Datos['division']=$this->Solicitar_laboratorio_m->ObtenListaDivisiones(); //Obteniendo mis datos
	
			if($Datos['division'] > 0){
				foreach ($Datos['division'] as $indice => $division) {
					$Datos['divisiones'][$indice]=$division;
				}
			}else{
				$mensaje='No hay datos';
				$Datos['divisiones'][1]=$mensaje;
			}		
			 
			$Datos['hora']=$this->Solicitar_laboratorio_m->Obtenhorarios();
			$Datos['semanas']=$this->Solicitar_laboratorio_m->obtenerSemana();
			$Datos['laboratorios']=$this->Solicitar_laboratorio_m->obtenLaboratorios();
			

			/**Validación del formulario**/			
			$this->form_validation->set_rules('nombreInput', 'nombreInput', 'required');
			$this->form_validation->set_rules('checkboxes[]', 'checkboxes', 'required');
			$this->form_validation->set_rules('correoInput', 'correoInput', 'required');
			$this->form_validation->set_rules('ueaInput', 'ueaInput', 'required');
			
			$this->form_validation->set_message('required','<script>alert("Por favor, seleccione al menos un día")</script>');

			$this->form_validation->set_rules('claveInput', 'claveInput', '');
			$this->form_validation->set_rules('grupoInput', 'grupoInput', '');
			$this->form_validation->set_rules('numInput', 'numInput', '');
			$this->form_validation->set_rules('comentarios', 'comentarios', '');
			$this->form_validation->set_rules('recursos', 'recursos', '');
			$this->form_validation->set_rules('divisionesDropdown', 'divisionesDropdown', '');
			$this->form_validation->set_rules('laboratoriosDropdown', 'laboratoriosDropdown', '');
			$this->form_validation->set_rules('laboratoriosAltDropdown', 'laboratoriosAltDropdown', '');
			$this->form_validation->set_rules('HoraIDropdown', 'HoraIDropdown', '');
			$this->form_validation->set_rules('HoraFDropdown', 'HoraFDropdown', '');		
			$this->form_validation->set_rules('SemIDropdown', 'SemIDropdown', '');		
			$this->form_validation->set_rules('SemFDropdown', 'SemFDropdown', '');		

			
			if($this->form_validation->run()){
				$divi = $this->Solicitar_laboratorio_m->obtenDivision($_POST['divisionesDropdown']);
				$h1=$this->Solicitar_laboratorio_m->obtenHora($_POST['HoraIDropdown']);
				$h2=$this->Solicitar_laboratorio_m->obtenHora($_POST['HoraFDropdown']);
				
				$datos_correo=Array(
					'nombre' => $_POST['nombreInput'],
					'numero' => $_POST['numInput'],
					'correo' => $_POST['correoInput'],
					'uea' =>$_POST['ueaInput'],
					'clave' => $_POST['claveInput'],
					'grupo' =>$_POST['grupoInput'],
					'division' => $divi,
					'laboratorio' => $_POST['laboratoriosDropdown'],
					'laboratorioAlt' => $_POST['laboratoriosAltDropdown'],
					'hora_i' => substr($h1,0,-6),
					'hora_f' => substr($h2,0,-6),
					'recursos' => $_POST['recursos'],
					'dias' => $_POST['checkboxes'],
					'semI' => $_POST['SemIDropdown'],
					'semF' => $_POST['SemFDropdown'],
 					'comentarios' => $_POST['comentarios']
				
				);
				
				//Comprobando si el horario no está ocupado

				$idHoraI=$_POST['HoraIDropdown'];
				$idHoraF=$_POST['HoraFDropdown'];
				$indice=1;
				
				for ($j=$_POST['SemIDropdown']; $j <=$_POST['SemFDropdown']; $j++) { //Semanas 
					for ($i=$idHoraI; $i <=$idHoraF; $i++) {  //horas
						foreach ($_POST['checkboxes'] as $dias) { //días
							$ocupado[$indice] = $this->Solicitar_laboratorio_m->horarioOcupado($_POST['laboratoriosDropdown'], $j, $dias, $i);
							$indice++;
						}
					}
				}
				
				$no_disponible = array_unique($ocupado);
				
				if(sizeof($no_disponible)==1 AND ($no_disponible[1] == NULL || $no_disponible[1]==-1)){ //En caso de que los horarios estén disponibles, envía la solicitud
					
					$config['mailtype']='html';
	 				$this->email->initialize($config);
					$this->email->from('nallely.ag.sama@gmail.com', 'Laboratorios de Docencia CBI'); //Cambiar aquí por la dirección de correo electrónico de administración
					$this->email->to('naye_flo89@hotmail.com'); //Cambiar aquí por la dirección del correo del administrador
					$this->email->subject('Solicitud de laboratorio');
					$msj=$this->load->view('correo_v',$datos_correo,TRUE);			
					$this->email->message($msj);				
					$this->email->send();	
					// echo $this->email->print_debugger();
					echo "<script languaje='javascript' type='text/javascript'>
				    alert('Solicitud enviada. Por favor, espere aprovación');
	                window.close();</script>";
				
				}else{ //En otro caso, le indica al usuario que el horario no está disponible
					echo "<script>alert('Lo sentimos. El laboratorio que está solicitando, no está disponible en este horario')</script>";						
					$this->load->view('solicitar_lab_v', $Datos);

				}
		} //Fin de validación
		else{
			$this->load->view('solicitar_lab_v', $Datos);
			$this->load->view('footer');
		}
			

		} //Fin de index
		
	}//Fin de la clase
?>