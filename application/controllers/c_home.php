<?php

class c_home extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        
        if($this->session->userdata('status') != "login"){
            redirect("c_login");
        }
    }
            
    function index(){
        $this->template->load('header','home');
    }
}