<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_kelas extends CI_Controller{

	public function __construct(){
		parent::__construct();

		if($this->session->userdata('status') != "login"){
            redirect("c_login");
        }
		$this->load->model('admin/m_kelas');

	}

	function index(){
		$data['kelas'] = $this->m_kelas->getKelas();
		 $this->template->load('admin/header','admin/kelas',$data);

	}

	function insertKelas(){
		$data['kelas'] = $this->m_kelas->getKelas();
		$this->template->load('admin/header','admin/insertKelas',$data);
	}

	function aksiInsertKelas(){

		$simpan = array(
					"jenis_kelas_nama" => $this->input->post('jenis_kelas_nama'),
					"jenis_kelas_deskripsi" => $this->input->post('jenis_kelas_deskripsi'),
                );
               
         $this->db->insert('tb_jenis_kelas', $simpan);  

         redirect('admin/c_kelas');      
	}

	function deleteKelas($event_id){

        $where = array('jenis_kelas_id' => $event_id);

     	  $this->db->delete('tb_jenis_kelas',$where);

        redirect('admin/c_kelas');
    
	}

	function updateKelas(){
		$jenis_kelas_id = $this->uri->segment(4);
		$data['kelas'] = $this->m_kelas->getKelasId($jenis_kelas_id);
		$this->template->load('admin/header','admin/updateKelas',$data);
	}

	function aksiUpdateKelas(){
		$jenis_kelas_id = $this->uri->segment(4);
		$simpan = array(
					"jenis_kelas_nama" => $this->input->post('jenis_kelas_nama'),
					"jenis_kelas_deskripsi" => $this->input->post('jenis_kelas_deskripsi'),
                );
         $where = array("jenis_kelas_id" => $jenis_kelas_id);

        // $this->m_berita->updateBelajar($where,'tb_berita',$simpan); 

         $this->m_kelas->updateKelas($where, 'tb_jenis_kelas', $simpan);
    	
        redirect('admin/c_kelas');
    }
}