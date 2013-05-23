<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	
	class Trimestres_c extends CI_Controller{
    
	    function __construct(){
	        parent::__construct();
			
			$this->load->helper(array('html', 'url'));
			$this->load->model('inicio_m');
			$this->load->model('Solicitar_laboratorio_m'); 
			$this->load->model('Vaciar_confirm_m'); 
			$this->load->model('administracion_m'); 
			$this->load->model('trimestres_m');
			$this->load->library('form_validation');
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');			
	   	}

	    function index(){
	    	if(! $this->session->userdata('validated')){
				redirect('loguin_c/index2/NULL/13');
			}else{
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
					//Enlistamos los grupos candidatos a ser eliminados
					$grupos = $this->Vaciar_confirm_m->ObtenGruposxTrim($idtrim);
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
						$this->administracion_m->trim_elimina_grupo($value);	
					}
					
					//Por último, eliminamos el trimestre
					$this->Vaciar_confirm_m->eliminaTrim($idtrim);
					echo "<script languaje='javascript' type='text/javascript'>
	                        window.opener.location.reload();
	                   		window.close();</script>";							
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
					//Añadimos el trimestre a la BD
					$this->trimestres_m->agrega($_POST['trimInput']);
					echo "<script languaje='javascript' type='text/javascript'>
	                        window.opener.location.reload();
	                        alert('Trimestre agregado')
	                   		window.close();</script>";					
				}else{
					$this->load->view('agregaTrim_v');
				}
				
			}			
		}

	} //Fin de la clase
?>