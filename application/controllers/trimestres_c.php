<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	
	class Trimestres_c extends CI_Controller{
    
	    function __construct(){
	        parent::__construct();
			
			$this->load->helper(array('html', 'url'));
			$this->load->model(array('inicio_m','Solicitar_laboratorio_m','Vaciar_confirm_m','administracion_m','trimestres_m'));
			$this->load->library('form_validation');
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');			
	   	}

	    function index(){
	    	if(! $this->session->userdata('validated')){
				redirect('loguin_c/index2/NULL/13');
			}else{
				$trim = $this->inicio_m->ObtenTrimActivo(); //Definimos el id del trimestre a mostrar.
				$trimestres['trimActual'] = $trim;
				$trimestres['trim'] = $this->inicio_m->ObtenTrim();				
				$datos['menuAdmin'] = $this->load->view('v_menuAdmin',$trimestres, TRUE);
				$datos['footer'] = $this->load->view('footer',NULL,TRUE);
				$datos['trim'] = $this->inicio_m->ObtenTrim();
		        $this->load->view('trimestres_v', $datos);
			}
	    }
		
		function limpiar($idtrim, $trim){		
			if(! $this->session->userdata('validated')){
				redirect('loguin_c/relogin');
			}else{
				$datos['trim'] = $trim;
				$this->form_validation->set_rules('checkboxes2[]', 'checkboxes2', 'required');
				$this->form_validation->set_message('required','<script>alert("Escoja al menos un laboratorio")</script>');
				
				if($this->form_validation->run()){
					$indice=1;
					foreach ($_POST['checkboxes2'] as $idlaboratorio) { //laboratorios
						$idsgrupo[$indice]=$this->Vaciar_confirm_m->obtenerIdGrupo($idtrim, $idlaboratorio); //Obteniendo ids de los grupos a eliminar
						$this->Vaciar_confirm_m->vaciarLaboratorio($idtrim, $idlaboratorio); //Vaciando tabla del laboratorio $idlaboratorio								
						$indice++;
					}					
					
					foreach ($idsgrupo as $value) {
						
						if($value==-1){
							echo "<br>horario vacío, nada por eliminar";
						}else{
							$gr = array_unique($value, SORT_REGULAR);
							
							foreach ($gr as $valor2) {
								//Verificará si el grupo no está también en otro laboratorio que no se vaya a vaciar
								//Si el grupo está en otro laboratorio que no se vaya a vaciar, simplemente se borrará de la tabla
								$masDeUnLab = $this->Vaciar_confirm_m->obtenLab_Grupo($valor2);
								//En caso de que el grupo no esté en otro laboratorio, se eliminará de la base de datos
								if($masDeUnLab==-1){
									$this->db->delete('grupo', array('idgrupo' => $valor2));
								}
							}
						}
					}
					//Se recargará la página de horarios y se cerrará la confirmación de vaciar horarios
					echo "<script languaje='javascript' type='text/javascript'>
	                        window.opener.location.reload();
	                   		window.close();</script>";			
				}else{
						$this->load->view('limpiar_v', $datos);
				}
	
			}
		}	

		function eliminar($idtrim, $trim){
			if(! $this->session->userdata('validated')){
				redirect('loguin_c/relogin');
			}else{
				$datos['trim'] = $trim;
				if($_POST != NULL){ //Se recibe la solicitud para eliminar el trimestre
				
					//Primero se revisirá si el trimestre está o no activo.
					//Si el trimestre está activo, no podrá eliminarse hasta que lo desactive
					if($this->trimestres_m->estadoTrimestre($idtrim) == 1){
						echo "<script>alert('No se puede eliminar un trimestre que esté activo')
							window.close();</script>";						
					}else{					
						//En otro caso, lo eliminará sin problemas:
						//Enlistamos los grupos candidatos a ser eliminados
						$grupos = $this->Vaciar_confirm_m->ObtenGruposxTrim($idtrim);
						
						if($grupos != -1){
							//Filtrará a los grupos que están en otros trimestres
							$i=1;
							foreach ($grupos as $valor) {
								if($this->Vaciar_confirm_m->GrupoIsAnotherTrim($valor)==-1){ //Si el grupo no está en otros trimestres
									$grupos_eliminar[$i] = $valor;
								}else{ //Si el grupo está en otros trimestres
									//Eliminamos su horario del trimestre 
									$this->Vaciar_confirm_m->elimina_lab_gr($valor,$idtrim);
									$grupos_eliminar[$i] = -1;						
								}
								$i++;
							}
						
							//Filtrados los grupos, se eliminan
							foreach ($grupos_eliminar as $value) {
								// echo "eliminando grupos";
								$this->administracion_m->eliminaGrupo($value);	
							}
						}
						//Por último, eliminamos el trimestre
						$this->Vaciar_confirm_m->eliminaTrim($idtrim);
						echo "<script languaje='javascript' type='text/javascript'>
		                        window.opener.location.reload();
		                   		window.close();</script>";
	                }							
				}else{
					$this->load->view('eliminar_trim_v', $datos);	
				}
				
			}
		}

		function agregar(){
			if(! $this->session->userdata('validated')){
				redirect('loguin_c/relogin');
			}else{
				if($_POST != NULL){
					$this->form_validation->set_rules('trimInput', 'trimInput', 'required');
					$this->form_validation->set_rules('fechaInicio', 'fechaInicio', 'required');
					$this->form_validation->set_rules('estado[]', 'estado[]', 'required');
				
					if($this->form_validation->run()){						
						//Verificamos si se activará el trimestre o no
						//Si el trimestre será el trimestre activo, nos aseguraremos que el trimestre activo se desactive
						//Sólo puede existir un trimestre activo
						if($_POST['estado'] == 1){
							$this->trimestres_m->desactivaTrimestre();
						}
						//Añadimos el trimestre a la BD
						$this->trimestres_m->agrega($_POST);
						
						echo "<script languaje='javascript' type='text/javascript'>
		                        window.opener.location.reload();
		                        alert('Trimestre agregado')
		                   		window.close();</script>";
					}else{
						echo "<script>alert('faltan campos por llenar')</script>";
						$this->load->view('agregaTrim_v');
					}					
				}else{
					$this->load->view('agregaTrim_v');
				}
				
			}			
		}
		
		function editar($idtrim){	
			if(! $this->session->userdata('validated')){
				redirect('loguin_c/relogin');
			}else{
				$datos['trim'] = $this->trimestres_m->ObtenTrimId($idtrim);
				if($_POST != NULL){
					$this->form_validation->set_rules('trimestre', 'trimestre', 'required');
					$this->form_validation->set_rules('fecha', 'fecha', 'required');			
					if($this->form_validation->run()){
						$this->trimestres_m->edita($idtrim,$_POST);	
						echo "<script languaje='javascript' type='text/javascript'>
	                        window.opener.location.reload();
	                   		window.close();</script>";			
					}else{
						echo "<script>alert('faltan campos por llenar')</script>";
						$this->load->view('editaTrim_v', $datos);
					}			
										
				}else{
					$this->load->view('editaTrim_v', $datos);
				}
				
			}
		}
		
		function cambiaEdoTrim($idtrim, $edo){
			if($edo == 1){
				$this->trimestres_m->desactivaTrimestre();
				echo json_encode(1);
			}else{
				$this->trimestres_m->desactivaTrimestre();
				$this->trimestres_m->activaTrimestre($idtrim);
				echo json_encode(2);			
			}			
		}

	} //Fin de la clase
?>