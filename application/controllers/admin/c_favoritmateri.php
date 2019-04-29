<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_favoritmateri extends CI_Controller{

	public function __construct(){
		parent::__construct();

		if($this->session->userdata('status') != "login"){
            redirect("c_login");
        }
		$this->load->model('admin/m_favmateri');

	}

	function index(){
		$data['favoritmateri'] = $this->m_favmateri->getFavMateri();
		 $this->template->load('admin/header','admin/favoritmateri',$data);

	}

}