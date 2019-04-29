<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_login extends CI_Controller{

	public function __construct(){
		parent::__construct();

		$this->load->model('admin/m_login');

	}

	function index(){
        $this->load->view('admin/login');
    }

	function aksi_login(){
		$email = $this->input->post('inputEmail');
		$pass = $this->input->post('inputPassword');

		$where = array('user_email' => $email,
				'user_password' => $pass);

		$cek = $this->m_login->cek_login("tb_user", $where);

		if($cek->num_rows() == 0){
			echo '<script language="javascript">';
            echo 'alert("Email dan kata sandi salah");';
             echo 'window.location= "'.base_url('index.php/admin/c_login').'";';
            echo '</script>';
		} else {
			foreach ($cek->result() as $login){
            $data_session = array(
                
                'user_email' => $email,
                'status' => "login",
                
            );

                $this->session->set_userdata($data_session);
           
            }
            redirect('admin/c_materi');
		}
	}

	function logout(){
        $this->session->sess_destroy();
        redirect("admin/c_login");
    }

}