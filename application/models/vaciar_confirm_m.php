<?php if(! defined('BASEPATH')) exit ('No direct script acces allowed');

	class Vaciar_confirm_m extends CI_Model{
	
		function __construct(){
			parent::__construct();
			$this->load->database();
			$this->load->library('form_validation');
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>'); 
		}
			
		function obtenerIdGrupo($trim, $lab){
			$this->db->select('idgrupo');
			$this->db->from('laboratorios_grupo');
			$this->db->where('idlaboratorios',$lab);
			$this->db->where('idgrupo !=','NULL');
			
			$idGrupo=$this->db->get();

			if(($idGrupo->num_rows())>0){
				$indice=1;
				foreach ($idGrupo->result_array() as $value) {
					$idGr[$indice]= $value['idgrupo'];
					$indice++;
				}
				return ($idGr);
			}else{
				return -1;
			}//fin del else
		
		} //Fin de obtenerGrupo
		
		function obtenLab_Grupo($idgrupo){
			$this->db->select('idlaboratorios');
			$this->db->where('idgrupo',$idgrupo);
			$this->db->distinct();
			$idsgrupos=$this->db->get('laboratorios_grupo');
			if($idsgrupos->num_rows()>=1){
				return 1;
			}else{
				return -1;
			}
		}
		
		function vaciarLaboratorio($idtrim, $idlab){
			$datos = Array(	'trimestre_idtrim' => $idtrim, 'idlaboratorios' => $idlab);
			$this->db->delete('laboratorios_grupo', $datos); 	
		}

		function obtenGruposxTrim($idtrim){
			$this->db->select('idgrupo');
			$this->db->from('laboratorios_grupo');
			$this->db->where('trimestre_idtrim',$idtrim);
			$this->db->distinct();
			$idGrupo=$this->db->get();

			if(($idGrupo->num_rows())>0){
				$indice=1;
				foreach ($idGrupo->result_array() as $value) {
					$idGr[$indice]= $value['idgrupo'];
					$indice++;
				}
				return ($idGr);
			}else{
				return -1;
			}//fin del else			
		}

		function eliminar_trim($idtrim){ //Elimina los horarios del trimestre
			$datos=Array(
				'trimestre_idtrim' => $idtrim,
			);
			$this->db->delete('laboratorios_grupo', $datos);
			
			//Elimina el trimestre
			$datos=Array(
				'idtrim' => $idtrim,
			);
			$this->db->delete('trimestre', $datos);
			 
		}
		
		function GrupoIsAnotherTrim($idgrupo){
			$this->db->select('trimestre_idtrim');
			$this->db->where('idgrupo', $idgrupo);
			$this->db->distinct();
			$trims=$this->db->get('laboratorios_grupo');
			
			if($trims->num_rows()>1){ 
				return 1;
			}else{
				return -1;
			}
		}
		
		function elimina_lab_gr($idgrupo, $trim){
			
			$datos=Array(
				'idgrupo' => $idgrupo,
				'trimestre_idtrim' => $trim
			);
			$this->db->delete('laboratorios_grupo', $datos);
		}
		
		function eliminaTrim($idtrim){
			$datos=Array(
				'idtrim' => $idtrim
			);
			
			$this->db->delete('trimestre',$datos);
		}
		
	
	} //Fin de la clase
?>

 