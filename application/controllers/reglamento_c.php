<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
 
class Reglamento_c extends CI_Controller {
 
    function __construct() {
        parent::__construct();
		$this->load->helper(array('html', 'url'));
    }
 
    public function index(){
		$this->load->view('reglamento_v');

    }

}