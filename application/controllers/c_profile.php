<?php

class c_profile extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->model('m_profile');
        
        if($this->session->userdata('status') != "login"){
            redirect("c_login");
        }
    }
            
    function index(){
        $user_id = $this->session->userdata('user_id');
         
         $data['join_belajar'] = $this->m_profile->getJoinBelajar($user_id);
         $status['belajar_status'] = $this->m_profile->getBelajarStatus($user_id);
        
         $sumXp = $this->m_profile->sumXp($user_id);
         
         $upUser = array(
                    "user_xp" => $sumXp,
                  
              );
        
        $where = array("user_id"=>$user_id);
                
        $this->m_profile->update($where,'tb_user',$upUser);
  
        $data['user'] = $this->m_profile->getUser($user_id);
        $data['join_event'] = $this->m_profile->getJoinEvent($user_id);
        $this->template->load('header','profile',$data);
    }

    function editProfile(){
      $this->load->view('editProfile');
    }
    
    
}
