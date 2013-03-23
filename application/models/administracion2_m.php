<?php if(! defined('BASEPATH')) exit ('No direct script acces allowed');

	class Administracion2_m extends CI_Model{
	
		function __construct(){
			parent::__construct();
			$this->load->database();
			$this->load->library('form_validation');
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');		
		}


		function traeAdministradores(){
			$this->db->select('idusuarioadmin,nombre, usuario, correo');
			$this->db->from('usuarioadmin');
			
			$users=$this->db->get();
			
			if(($users->num_rows())>0){
				$indice=1;
				foreach ($users->result_array() as $value) {
					$usuarios[$indice]=$value;
					$indice++;
				}
				return ($usuarios);
			}else{
				return -1;			
			}			
		}		
		
		function traeAdministradoresId($id){
			$this->db->select('idusuarioadmin,nombre');
			$this->db->from('usuarioadmin');
			$this->db->where('idusuarioadmin', $id);
			
			$users=$this->db->get();
			
			if(($users->num_rows())>0){
				$indice=1;
				foreach ($users->result_array() as $value) {
					$usuarios[$indice]=$value;
					$indice++;
				}
				return ($usuarios);
			}else{
				return -1;			
			}			
		}
			
		function compruebaPass($usuario){
			$this->db->select('pass');
			$this->db->from('usuarioadmin');
			$this->db->where('usuario', $usuario);
			
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
		
		function actualizaPass($usuario, $nuevaPass){
			$datos = Array('pass' => $nuevaPass);
			$this->db->where('usuario',$usuario);
			$this->db->update('usuarioadmin', $datos); 
		}

		function actualizaCorreo($usuario, $correo){
			$datos = Array(	'correo' => $correo);
			
			$this->db->where('usuario',$usuario);
			$this->db->update('usuarioadmin', $datos); 
		}	
		
		function agregaAdmin($nombre, $usuario, $correo, $pass){
			$datos = Array(
				'usuario' => $usuario,
				'pass' => $pass,
				'correo' => $correo,
				'nombre' => $nombre
			);
			
			$this->db->insert('usuarioadmin',$datos);
		}			
		
		function verificaUsuario($usuario){
			$this->db->select('idusuarioadmin');
			$this->db->from('usuarioadmin');
			$this->db->where('usuario', $usuario);
			
			$users=$this->db->get();
			
			if(($users->num_rows())>0){
				return 1;
			}else{
				return -1;			
			}						
			
		}
		
		function verificaCorreo($correo){
			$this->db->select('idusuarioadmin');
			$this->db->from('usuarioadmin');
			$this->db->where('correo', $correo);
			
			$users=$this->db->get();
			
			if(($users->num_rows())>0){
				return 1;
			}else{
				return -1;			
			}						
		}
		
		function elimina_admin($id){
			$datos=Array('idusuarioadmin' => $id);
			$this->db->delete('usuarioadmin', $datos); 					
		}		
	} //Fin de la clase

?>


		

 