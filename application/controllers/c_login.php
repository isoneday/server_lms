<?php

class c_login extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model("m_user");
    }
    
    function index(){
        $this->load->view('login');
    }
    
     function aksi_login(){
        $email = $this->input->post('email');
        $pass = $this->input->post('pass');
        
        $where = array('user_email' => $email,
                        'user_password' => $pass);
        
        $cek = $this->m_user->cek_login("tb_user", $where);
        
        if($cek->num_rows() == 0){
            echo '<script language="javascript">';
            echo 'alert("Email dan kata sandi salah");';
             echo 'window.location= "'.base_url('index.php/c_login').'";';
            echo '</script>';
            
        } else {
             
            foreach ($cek->result() as $login){
            $data_session = array(
                
                'email' => $email,
                'status' => "login",
                'user_id' => $login->user_id,
                'user_name' => $login->user_name,
                'user_image' => $login->user_image
            );

                $this->session->set_userdata($data_session);
           
            }
            redirect("c_home");
        }
    }
    
    function logout(){
        $this->session->sess_destroy();
        redirect("c_login");
    }
}
