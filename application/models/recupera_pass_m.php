<?php if(! defined('BASEPATH')) exit ('No direct script acces allowed');

	class Recupera_pass_m extends CI_Model{
	
		function __construct(){
			parent::__construct();
			$this->load->database();
		}


		function verificaCorreo($correo){
			
			$this->db->select('pass');
			$this->db->from('usuarioadmin');
			$this->db->where('correo', $correo);
			
			$users=$this->db->get();
			
			if(($users->num_rows())>0){
				foreach ($users->result_array() as $value) {
					$usuarios[1]=$value['pass'];
				}
				return ($usuarios[1]);
			}else{
				return -1;			
			}						
			
		}		

	} //Fin de la clase

?>


		

 