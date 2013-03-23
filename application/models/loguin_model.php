<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Loguin_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	
	public function validate(){
		$username = $this->security->xss_clean($this->input->post('usuarioInput'));
		$password = $this->security->xss_clean($this->input->post('passInput'));
		
		$this->db->where('usuario', $username);
		$this->db->where('pass', $password);
		
		
		$query = $this->db->get('usuarioadmin');

		if($query->num_rows == 1){
			$row = $query->row();
			$data = array(
				'idusuarioadmin' => $row->idusuarioadmin,
				'usuario' => $row->usuario,
				'validated' => true
				);
			$this->session->set_userdata($data);
			return true;
		}

		return false;
	}
	
	function login($username, $password){
	   $this->db->select('idusuarioadmin, usuario, pass');
	   $this->db->from('usuarioadmin');
	   $this->db->where('usuario',$username);
	   $this->db->where('pass',$password);
	   $this->db->limit(1);
	
	   $query = $this->db->get();
	
	   if($query->num_rows()==1){
	   		return $query->result();
	   }else {
	     return false;
	   }
	 }
}
?>