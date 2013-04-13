<?php if(! defined('BASEPATH')) exit ('No direct script acces allowed');

	class Trimestres_m extends CI_Model{
	
		function __construct(){
			parent::__construct();
			$this->load->database();
	
		}
		
		function agrega($nombre){
			$datos=Array(
				'trim'=>$nombre
			);
			$this->db->insert('trimestre',$datos);
		} 
		
			
				
				
	} //Fin de la clase
?>

 