<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_belajar extends CI_Controller{

	public function __construct(){
		parent::__construct();

		if($this->session->userdata('status') != "login"){
            redirect("c_login");
        }
		$this->load->model('admin/m_belajar');

	}

	function index(){
		$data['belajar'] = $this->m_belajar->getBelajar();
		 $this->template->load('admin/header','admin/belajar',$data);

	}

}