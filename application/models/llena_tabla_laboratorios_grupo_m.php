<?php if(! defined('BASEPATH')) exit ('No direct script acces allowed');

	class Llena_tabla_laboratorios_grupo_m extends CI_Model{
	
		function __construct(){
			parent::__construct();
			$this->load->database();
		
		}
							
		function inserta_laboratorios_grupo($idlab, $idsemanas, $iddias, $idhorarios){
			$datos=Array(
				'idlaboratorios' => $idlab,
				'idgrupo' => NULL,
				'semanas_idsemanas' => $idsemanas,
				'dias_iddias' => $iddias,
				'horarios_idhorarios' => $idhorarios		
			);
			
			$this->db->insert('laboratorios_grupo', $datos); //Inserta en la tabla grupo
						
		} //fin Obtenhorarios
		
		function elimina_laboratorios_grupo(){
			$datos=Array(
				'idlaboratorios' => 105,
			);
			
			$this->db->delete('laboratorios_grupo', $datos); 
			echo "base de datos vacia";
						
		}
				
	} //Fin de la clase

?>


		

 