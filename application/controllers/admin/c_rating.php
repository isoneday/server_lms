<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_rating extends CI_Controller{

	public function __construct(){
		parent::__construct();

		if($this->session->userdata('status') != "login"){
            redirect("c_login");
        }
		$this->load->model('admin/m_rating');

	}

	function index(){
		$data['rating'] = $this->m_rating->getRating();
		 $this->template->load('admin/header','admin/rating',$data);

	}

	
}