<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_register extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("m_user");
    }

    
     function index(){
        $data['record'] = $this->m_user->tampil_data();
        $this->load->view('register', $data);
    }
    
    function simpan_data(){
        $data = array("user_name"=> $this->input->post('nama'),
                    "user_email"=> $this->input->post('email'),
                     "user_password"=> $this->input->post('pass'),
                      "user_asal"=> $this->input->post('asal')
            
            );
            $this->db->insert('tb_user',$data);
            redirect("c_login");
    }
}


