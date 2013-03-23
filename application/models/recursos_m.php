<?php if(! defined('BASEPATH')) exit ('No direct script acces allowed');

	class Recursos_m extends CI_Model{
	
		function __construct(){
			parent::__construct();
			$this->load->database();
		
		}
			
		function obtenRecursos($idlab){
			$this->db->select('idrecursos');
			$this->db->select('recurso');
			$this->db->from('recursos');
			$this->db->join('laboratorios_has_recursos', 'recursos_idrecursos=idrecursos','left');
			$this->db->where('laboratorios_idlaboratorios',$idlab);
			$this->db->order_by('recurso');

			$listaRecursos=$this->db->get(); //Vacía el contenido de la consulta en la variable
			
			if(($listaRecursos->num_rows())>0){ //Verificando si tengo datos a cargar
				$indice=1;

				foreach ($listaRecursos->result_array() as $value) {
					$arregloRecursos[$indice] = $value; //Guardando mis datos en un arreglo
					$indice=$indice+1;
				 }
			
				return($arregloRecursos);
			}else{
				return (-1);
			}//fin del else
			
		} //Fin de obtenRecursos
		
		function insertaRecurso($recurso){
			$datos=Array(
				'recurso' => $recurso,
			);
			$this->db->insert('recursos', $datos); //Insertando en base de datos
		}

		function obtenIdRecurso($recurso){
			$this->db->select('idrecursos');
			$this->db->from('recursos');
			$this->db->where('recurso', $recurso);
			
			$idRecurso=$this->db->get();
			if(($idRecurso->num_rows())>0){ //Verificando si tengo datos a cargar
				$indice=1;

				foreach ($idRecurso->result_array() as $value) {
					$idRecursos[$indice] = $value['idrecursos']; //Guardando mis datos en un arreglo
					$indice=$indice+1;
				 }
			
				return($idRecursos);
			}else{
				return -1;
			}//fin del else	
		}
		
		function obtenLaboratorios_recursos($idlabo, $idrecurso){
			$this->db->select('recursos_idrecursos', $idrecurso);
			$this->db->from('laboratorios_has_recursos');
			$this->db->where('laboratorios_idlaboratorios', $idlabo);
			$this->db->where('recursos_idrecursos', $idrecurso);
			
			$idRecurso=$this->db->get();
			if(($idRecurso->num_rows())>0){ //Verificando si tengo datos a cargar
				return 1;
			}else{
				return -1;
			}//fin del else		
			
		}
		
		function insertaLaboratorios_recursos($idlabo, $idrecurso){
			$datos=Array(
				'laboratorios_idlaboratorios' => $idlabo,
				'recursos_idrecursos' => $idrecurso,
			);
			$this->db->insert('laboratorios_has_recursos', $datos); //Insertando en base de datos
		
		}
		
		function elimina_laboratorios_has_recursos($idrecurso, $idlab){
			
			$datos=Array(
				'laboratorios_idlaboratorios' => $idlab,
				'recursos_idrecursos' =>$idrecurso
			);
			
			$this->db->delete('laboratorios_has_recursos', $datos); 
		}
		
		function edita_recurso($idrecurso, $recurso){
			$datos= Array(
				'recurso'=>$recurso,
			);
			$this->db->where('idrecursos',$idrecurso);
			$this->db->update('recursos', $datos); 
			
		}
		function vacia_recursos($idlab){
			$datos= Array(
				'laboratorios_idlaboratorios'=>$idlab,
			);
			$this->db->delete('laboratorios_has_recursos', $datos); 
		}		
		
					
	} //Fin de la clase
?>

 