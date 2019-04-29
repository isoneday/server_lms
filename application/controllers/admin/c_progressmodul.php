<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_progressmodul extends CI_Controller{

	public function __construct(){
		parent::__construct();

		if($this->session->userdata('status') != "login"){
            redirect("c_login");
        }
		$this->load->model('admin/m_progressmodul');

	}

	function index(){
		$data['p_modul'] = $this->m_progressmodul->getProgressModul();
		 $this->template->load('admin/header','admin/p_modul',$data);

	}

}