<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_iklanevent extends CI_Controller{

	public function __construct(){
		parent::__construct();

		if($this->session->userdata('status') != "login"){
            redirect("c_login");
        }
		$this->load->model('admin/m_iklanevent');

	}

	function index(){
		$data['iklanevent'] = $this->m_iklanevent->getIklanEvent();
		 $this->template->load('admin/header','admin/iklanevent',$data);

	}

	function insertIklanEvent(){
		$data['iklanevent'] = $this->m_iklanevent->getIklanEvent();
		$data['event'] = $this->m_iklanevent->getEvent();
		$data['mitra'] = $this->m_iklanevent->getMitra();
		$this->template->load('admin/header','admin/insertIklanEvent',$data);
	}

	function aksiInsertIklanEvent(){

		$simpan = array(
					"iklan_e_gambar" => $_FILES['iklan_e_gambar']['name'],
					"iklan_e_tgl_mulai" => $this->input->post('iklan_e_tgl_mulai'),
					"iklan_e_tgl_selesai" => $this->input->post('iklan_e_tgl_selesai'),
					"event_id" => $this->input->post('event_id'),
					"mitra_id" => $this->input->post('mitra_id'),
					
                );
                foreach ($_FILES as  $key => $value){
                    move_uploaded_file($value['tmp_name'],"./assets/img/iklan/event/" .$value['name']);
                }
				

         $this->db->insert('tb_iklan_event', $simpan);  

         redirect('admin/c_iklanevent');      
	}

	function deleteIklanEvent($iklan_e_id){

        $where = array('iklan_e_id' => $iklan_e_id);

     	  $this->db->delete('tb_iklan_event',$where);

        redirect('admin/c_iklanevent');
    
	}

	function updateIklanEvent(){
		$iklan_e_id = $this->uri->segment(4);
		$data['iklanevent'] = $this->m_iklanevent->getIklanEventId($iklan_e_id);
		$data['event'] = $this->m_iklanevent->getEvent();
		$data['mitra'] = $this->m_iklanevent->getMitra();
		$this->template->load('admin/header','admin/updateIklanEvent',$data);
	}

	function aksiUpdateIklanEvent(){
		$iklan_e_id = $this->uri->segment(4);
		$simpan = array(
					"iklan_e_gambar" => $_FILES['iklan_e_gambar']['name'],
					"iklan_e_tgl_mulai" => $this->input->post('iklan_e_tgl_mulai'),
					"iklan_e_tgl_selesai" => $this->input->post('iklan_e_tgl_selesai'),
					"event_id" => $this->input->post('event_id'),
					"mitra_id" => $this->input->post('mitra_id'),
					
                );
             foreach ($_FILES as  $key => $value){
                    move_uploaded_file($value['tmp_name'],"./assets/img/iklan/event/" .$value['name']);
                }

         $where = array("iklan_e_id" => $iklan_e_id);

        // $this->m_berita->updateBelajar($where,'tb_berita',$simpan); 

         $this->m_iklanevent->updateIklanEvent($where, 'tb_iklan_event', $simpan);
    	
        redirect('admin/c_iklanevent');
    }
}