<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_modul extends CI_Controller{

	public function __construct(){
		parent::__construct();

		if($this->session->userdata('status') != "login"){
            redirect("c_login");
        }
		$this->load->model('admin/m_modul');

	}

	function index(){
		$data['modul'] = $this->m_modul->getModul();
		 $this->template->load('admin/header','admin/modul',$data);

	}

	function insertModul(){
		$data['modul'] = $this->m_modul->getModul();
		$data['materi'] = $this->m_modul->getMateri();
		$this->template->load('admin/header','admin/insertModul',$data);
	}

	function aksiInsertModul(){

		$simpan = array(
					"materi_id" => $this->input->post('materi_id'),
					"modul_id" => $this->input->post('modul_id'),
					"modul_judul" => $this->input->post('modul_judul'),
					 );
         $this->db->insert('tb_modul', $simpan);  

         redirect('admin/c_modul');      
	}

	function deleteModul($modul_id){

        $where = array('modul_id' => $modul_id);

     	  $this->db->delete('tb_modul',$where);

        redirect('admin/c_modul');
    
	}

	function updateModul(){
		$modul_id = $this->uri->segment(4);
		$data['modul'] = $this->m_modul->getModulId($modul_id);
		$data['materi'] = $this->m_modul->getMateri();
		$this->template->load('admin/header','admin/updateModul',$data);
	}

	function aksiUpdateModul(){
		$modul_id = $this->uri->segment(4);
		$simpan = array(
					"materi_id" => $this->input->post('materi_id'),
					"modul_id" => $this->input->post('modul_id'),
					"modul_judul" => $this->input->post('modul_judul'),
					 );

         $where = array("modul_id" => $modul_id);

        // $this->m_berita->updateBelajar($where,'tb_berita',$simpan); 

         $this->m_modul->updateModul($where, 'tb_modul', $simpan);
    	
        redirect('admin/c_modul');
    }
}