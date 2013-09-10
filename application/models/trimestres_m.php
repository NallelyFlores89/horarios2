<?php if(! defined('BASEPATH')) exit ('No direct script acces allowed');

	class Trimestres_m extends CI_Model{
	
		function __construct(){
			parent::__construct();
			$this->load->database();
	
		}
		
		function agrega($datosTrim){
			echo "<pre>";
			print_r($datosTrim);
			echo "</pre>";
			$datos=Array(
				'trim'=>$datosTrim['trimInput'],
				'fechaInicio' => $datosTrim['fechaInicio'],
				'estado' => $datosTrim['estado'][0]
			);
			$this->db->insert('trimestre',$datos);
		}
		
		function desactivaTrimestre(){
			$datos= Array(
				'estado'=>0,
			);
			$this->db->where('estado',1);
			$this->db->update('trimestre', $datos); 
		}
		
		function activaTrimestre($idtrim){
			$datos= Array(
				'estado'=>1,
			);
			$this->db->where('idtrim',$idtrim);
			$this->db->update('trimestre', $datos);			
		}
		
		function estadoTrimestre($idtrim){
			$this->db->select('estado');
			$this->db->where('idtrim',$idtrim);
			$res=$this->db->get('trimestre');
			$res = $res->result_array();
			$res = $res[0]['estado'];
			return $res;
		}
		
		function ObtenTrimId($idtrim){
			$this->db->select('idtrim, trim,fechaInicio, estado');
			$this->db->where('idtrim',$idtrim);
			$t=$this->db->get('trimestre');

			if(($t->num_rows())>0){
				$trim = $t->result_array();
				$trim = $trim[0]; 
				return ($trim);
			}else{
				return 0;
			}//fin del else
			
		} 
		
		function edita($idtrim, $act){
			$datos = array(
				'trim' => $act['trimestre'],
				'fechaInicio' => $act['fecha'],
			);
			$this->db->where('idtrim', $idtrim);
			$this->db->update('trimestre',$datos);			
		}
		
		
	} //Fin de la clase
?>

 