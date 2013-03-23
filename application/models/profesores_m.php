<?php if(! defined('BASEPATH')) exit ('No direct script acces allowed');

	class Profesores_m extends CI_Model{
	
		function __construct(){
			parent::__construct();
			$this->load->database();
		
		}
			
		function obtenerInfoProfesor(){
			$this->db->select('idprofesores, nombre, numempleado, correo');
			$this->db->from('profesores');
			$this->db->distinct(); //Para que no se repitan los datos

			$idProfesor=$this->db->get(); 
			
			if(($idProfesor->num_rows())>0){ //Verificando si tengo datos a cargar
				$indice=1;
				foreach ($idProfesor->result_array() as $value) {
					$idProfr[$indice] = $value;
					$indice++;					 
				 }
			
				return($idProfr);
			}else{
				return(-1);
			}//fin del else
		} 
		
		function obtenerInfoProfesorId($id){

			$this->db->select('idprofesores, nombre, numempleado, correo');
			$this->db->from('profesores');
			$this->db->where('idprofesores',$id);
			$idProfesor=$this->db->get(); 
			if(($idProfesor->num_rows())>0){ //Verificando si tengo datos a cargar
				foreach ($idProfesor->result_array() as $value) {
					$idProfr[1] = $value;
				 }
			
				return($idProfr[1]);
			}else{
				return(-1);
			}//fin del else
		}
		
		function inserta_profesores($nombre, $num_emp, $correo){
				
			$datos=Array(
				'nombre' => $nombre,
				'numempleado' => $num_emp,
				'correo' => $correo,
			);		

			$this->db->insert('profesores', $datos); //Insertan en la tabla profesores
			
		} //Fin insertaProfesor
		
		function editaProfesor($id, $nombre, $num_emp, $correo){
				
			$datos=Array(
				'nombre' => $nombre,
				'numempleado' => $num_emp,
				'correo' => $correo,
			);		
			$this->db->where('idprofesores', $id);

			$this->db->update('profesores', $datos); //Insertan en la tabla profesores
			
		}
				
	} //Fin de la clase
?>

 