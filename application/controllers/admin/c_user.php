<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_user extends CI_Controller{

	public function __construct(){
		parent::__construct();

		if($this->session->userdata('status') != "login"){
            redirect("c_login");
        }
		$this->load->model('admin/m_user');

	}

	function index(){
		$data['user'] = $this->m_user->getUser();
		 $this->template->load('admin/header','admin/user',$data);

	}
	
	
	function deleteUser($user_id){

        $where = array('user_id' => $user_id);

     	  $this->db->delete('tb_user',$where);

        redirect('admin/c_user');
    
	}

	function updateUser(){
		$user_id = $this->uri->segment(4);
		$data['user'] = $this->m_user->getUserId($user_id);
	
		$this->template->load('admin/header','admin/updateUser',$data);
	}

	function aksiUpdateUser(){
		$user_id = $this->uri->segment(4);
		$simpan = array(
					"user_name" => $this->input->post('user_name'),
					"user_email" => $this->input->post('user_email'),
					"user_password" => $this->input->post('user_password'),
					"user_image" => $_FILES['user_image']['name'],
					"user_date" => $this->input->post('user_date'),
					"user_asal" => $this->input->post('user_asal'),
					"user_xp" => $this->input->post('user_xp'),
                    
                );
                foreach ($_FILES as  $key => $value){
                    move_uploaded_file($value['tmp_name'],"./assets/img/user/" .$value['name']);
                }

         $where = array("user_id" => $user_id);

        // $this->m_berita->updateBelajar($where,'tb_berita',$simpan); 

         $this->m_user->updateUser($where, 'tb_user', $simpan);
    	
        redirect('admin/c_user');
    }
}

