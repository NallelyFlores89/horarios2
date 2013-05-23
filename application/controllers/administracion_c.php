<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	
	class Administracion_c extends CI_Controller{
    
	    function __construct(){
	        parent::__construct();
			
			$this->load->helper(array('html', 'url'));
			$this->load->library('form_validation');
	        $this->load->model('administracion_m'); // modelos
			$this->load->model('profesores_m');
			$this->load->model('solicitar_laboratorio_m');
			$this->load->model('agregar_horario_m');
			$this->load->model('inicio_m');
			$this->load->model('Vaciar_confirm_m');
			
	   	}
		
	    function index($trim){
	    	if(! $this->session->userdata('validated')){ //Login
				redirect('loguin_c/index2/NULL/2');
			}else{
				$data['trim'] = $this->inicio_m->ObtenTrim();
				$data['trimAct'] = $trim;
				$data['datosUPG']=$this->administracion_m->obtenListaUeaProfesorGrupo($trim);
		        $this->load->view('grupos_v', $data);
			}
	    }
		
		//Edita los datos de las UEAS como son sección, nombre de la uea, clave, etc.
		function edita($idgrupo){ //Login
			if(! $this->session->userdata('validated')){
				redirect('loguin_c/relogin');
			}else{
				$datos['datos'] = $this->administracion_m->obtenDatosGrupo($idgrupo);
				$datos['id_div'] =$datos['datos'][1]['divisiones_iddivisiones']; 
				$datos['div'] = $this->administracion_m->obtenDiv();
				
				//Validaciones del formulario
				$this->form_validation->set_rules('ueaInput', 'ueaInput', 'required');
				$this->form_validation->set_rules('siglasInput', 'siglasInput', 'required');
				$this->form_validation->set_rules('grupoInput', 'grupoInput', 'required');
				
				$this->form_validation->set_rules('claveInput', 'claveInput', '');
				
				if($this->form_validation->run()){ //Se ha recibido la solicitud
					//En caso de que la uea sea modificada, debemos comprobar primero si existe en la BD o no
					$ueaExiste=$this->administracion_m->obtenUEAxNombre($_POST['ueaInput']);					
					
					if($ueaExiste == -1){ //Si la UEA no existe, se agregará a la BD y después se le asignará su id a uea_iduea 
						$this->agregar_horario_m->inserta_uea($_POST['ueaInput'], '', $_POST['division']);
						$iduea=$this->administracion_m->obtenUEAxNombre($_POST['ueaInput']);
						$this->administracion_m->editaGrupo($idgrupo,$_POST['grupoInput'], $_POST['siglasInput'], $iduea['iduea']);
						
					}else{
						//Si la UEA existe (y por si se edita la sección) la actualizamos y luego le asignamos su id a uea_iduea
						$this->administracion_m->actualizaU($ueaExiste['iduea'], $_POST['division']);												
						$this->administracion_m->editaGrupo($idgrupo,$_POST['grupoInput'], $_POST['siglasInput'], $ueaExiste['iduea']);
					}
					//Script que recarga la página madre y cierra la ventana hija
					echo "<script languaje='javascript' type='text/javascript'>
							window.opener.location.reload();
			                window.close();</script>";
			                
				}else{
					$this->load->view('admin_edita_v',$datos);
				}	
			}
		} //Fin función
		
		function cambiaHora($idgrupo, $siglas, $idlab, $idtrim){
			if(! $this->session->userdata('validated')){
				redirect('loguin_c/relogin');
			}else{
				
				$datos['horarios'] = $this->solicitar_laboratorio_m->Obtenhorarios();
				$datos['dias'] = $this->solicitar_laboratorio_m->ObtenDias();
				$horario_grupo = $this->administracion_m->obtenDatosLaboratoriosGrupo2($idgrupo, $idlab);
				$horas=array(); $dias=array(); $semanas=array(); $lab=array();
				foreach ($horario_grupo as $value) {
					array_push($horas,$value['horarios_idhorarios']);
					array_push($semanas, $value['semanas_idsemanas']);
					array_push($dias, $value['dias_iddias']);
				}
				
				$hrs = array_unique($horas);
				$datos['hora_i'] = array_shift($hrs);
				$datos['hora_f'] = end($hrs);				
				$datos['dias_g'] = array_unique($dias);
				$datos['semanas'] = array_unique($semanas);
				$semi = reset($datos['semanas']);
				$semf = end($datos['semanas']);

				if($_POST != NULL){ //Recibe la petición para cambiar de laboratorio

					//Borra el grupo de su horario original					
					
					$this->administracion_m->borraGrupo($idgrupo, $idlab, $idtrim);
					// echo "el grupo fue borrado de laboratorios_grupo <br>";
					//Inserta grupo en su horario nuevo
					
					for ($weeks=$semi; $weeks<=$semf; $weeks++) {
						foreach ($_POST['diasCheckBox'] as $value) {
							for ($horas=$_POST['HoraIDropdown']; $horas <= $_POST['HoraFDropdown']; $horas++) { 
								$this->agregar_horario_m->agregaHorario($idlab, $idgrupo, $weeks, $value, $horas, $idtrim);
								echo "grupo cambiando de hora";
							}
						} 
					}
					echo "<script languaje='javascript' type='text/javascript'>
						    window.opener.location.reload();
			                window.close();</script>";
				}else{
					$this->load->view('cambiaHora_v', $datos);
				}
			}		
		}

		function cambia_labo($idgrupo, $idlab, $idtrim){
			if(! $this->session->userdata('validated')){
				redirect('loguin_c/relogin');
			}else{
				$datos['laboratorios']=$this->administracion_m->obtenLaboratorios();
				$datos['idlab'] = $idlab;
				
				if($_POST != NULL){ //Recibe la petición para cambiar de laboratorio
				
					$laboratorios_grupo = $this->administracion_m->obtenDatosLaboratoriosGrupo($idgrupo, $idtrim);
					$indice=1;
					foreach ($laboratorios_grupo as $value) { //Obteniendo datos para cambiar de laboratorio
						$diasA[$indice]= $value['dias_iddias'];
						$semanasA[$indice] = $value['semanas_idsemanas'];
						$horasA[$indice] = $value['horarios_idhorarios'];
						$indice++;
					}
					$dias=array_unique($diasA); $semanas=array_unique($semanasA); $horas=array_unique($horasA);
					
					//Borrando el grupo del laboratorio actual
					$this->administracion_m->borraGrupo($idgrupo, $idlab, $idtrim);
					
					//Insertando grupo en el laboratorio nuevo
					foreach ($semanas as $idsem) {
						foreach ($dias as $iddias) {
							foreach ($horas as $idhoras) {
								$this->agregar_horario_m->agregaHorario($_POST['laboratoriosDropdown'], $idgrupo, $idsem, $iddias, $idhoras, $idtrim);
							}
						}
					}
					echo "<script languaje='javascript' type='text/javascript'>
						    window.opener.location.reload();
			                window.close();</script>";
				}
				
				$this->load->view('editaLabo_v',$datos);
			}		
		} //Fin función cambia labos

		function cambiaProfe($idgrupo, $idprofesor){
			
			if(! $this->session->userdata('validated')){
				redirect('loguin_c/relogin');
			}else{
				$datos['profesor'] = $this->profesores_m->obtenerInfoProfesorId($idprofesor);
				$this->form_validation->set_rules('profesor', 'profesor', 'required');
				$this->form_validation->set_message('required','Este campo no puede ser nulo');

				if($this->form_validation->run()){ 

					$idprof = $this->administracion_m->obtenIdProf($_POST['profesor']);

					//Si el profesor no existe, se inserta en la base de datos
					if($idprof == -1){
						$this->profesores_m->inserta_profesores($_POST['profesor'], '', '');
						$idprof = $this->administracion_m->obtenIdProf($_POST['profesor']);
						$this->administracion_m->cambiaProfesor($idgrupo, $idprof);						
						
					}else{ 	//En caso de que exista, se le asigna su id al grupo					

						$idprof = $this->administracion_m->obtenIdProf($_POST['profesor']); //Consultamos el id del profesor nuevo
						$this->administracion_m->cambiaProfesor($idgrupo, $idprof);
					}

					echo "<script languaje='javascript' type='text/javascript'>
						    window.opener.location.reload();
			                window.close();</script>";
				}else{				
					$this->load->view('cambiar_profe_v',$datos);
				}			
			
			}
		}

		function elimina_grupo($idgrupo){
			if(! $this->session->userdata('validated')){
				redirect('loguin_c/relogin');
			}else{				
				if($_POST != NULL){
					$this->administracion_m->eliminaGrupo($idgrupo);
					echo "<script languaje='javascript' type='text/javascript'>
							window.opener.location.reload();
							window.close();</script>";	
				}else{
					$this->load->view('elimina_grupo_v');	
				}
			}			
		}
	}
?>