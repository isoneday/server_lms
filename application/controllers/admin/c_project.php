<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_project extends CI_Controller{

	public function __construct(){
		parent::__construct();

		if($this->session->userdata('status') != "login"){
            redirect("c_login");
        }
		$this->load->model('admin/m_project');

	}

	function index(){
		$data['project'] = $this->m_project->getProject();
		 $this->template->load('admin/header','admin/project',$data);

	}

}