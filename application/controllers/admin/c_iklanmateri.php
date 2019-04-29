<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_iklanmateri extends CI_Controller{

	public function __construct(){
		parent::__construct();

		if($this->session->userdata('status') != "login"){
            redirect("c_login");
        }
		$this->load->model('admin/m_iklanmateri');

	}

	function index(){
		$data['iklanmateri'] = $this->m_iklanmateri->getIklanMateri();
		 $this->template->load('admin/header','admin/iklanmateri',$data);

	}
	
	function insertIklanMateri(){
		$data['iklanmateri'] = $this->m_iklanmateri->getIklanMateri();
		$data['materi'] = $this->m_iklanmateri->getMateri();
		$data['mitra'] = $this->m_iklanmateri->getMitra();
		$this->template->load('admin/header','admin/insertIklanMateri',$data);
	}

	function aksiInsertIklanMateri(){

		$simpan = array(
					"iklan_m_gambar" => $_FILES['iklan_m_gambar']['name'],
					"mitra_id" => $this->input->post('mitra_id'),
					"materi_id" => $this->input->post('materi_id'),
					"iklan_tgl_mulai" => $this->input->post('iklan_tgl_mulai'),
					"iklan_tgl_selesai" => $this->input->post('iklan_tgl_selesai'),
                    
                );
                foreach ($_FILES as  $key => $value){
                    move_uploaded_file($value['tmp_name'],"./assets/img/iklan/materi/" .$value['name']);
                }

         $this->db->insert('tb_iklan_materi', $simpan);  

         redirect('admin/c_iklanmateri');      
	}

	function deleteIklanMateri($iklan_m_id){

        $where = array('iklan_m_id' => $iklan_m_id);

     	  $this->db->delete('tb_iklan_materi',$where);

        redirect('admin/c_iklanmateri');
    
	}

	function updateIklanMateri(){
		$iklan_m_id = $this->uri->segment(4);
		$data['iklanmateri'] = $this->m_iklanmateri->getIklanMateriId($iklan_m_id);
		$data['materi'] = $this->m_iklanmateri->getMateri();
		$data['mitra'] = $this->m_iklanmateri->getMitra();
		$this->template->load('admin/header','admin/updateIklanMateri',$data);
	}

	function aksiUpdateIklanMateri(){
		$iklan_m_id = $this->uri->segment(4);
		$simpan = array(
					"iklan_m_gambar" => $_FILES['iklan_m_gambar']['name'],
					"mitra_id" => $this->input->post('mitra_id'),
					"materi_id" => $this->input->post('materi_id'),
					"iklan_tgl_mulai" => $this->input->post('iklan_tgl_mulai'),
					"iklan_tgl_selesai" => $this->input->post('iklan_tgl_selesai'),
                    
                );
                foreach ($_FILES as  $key => $value){
                    move_uploaded_file($value['tmp_name'],"./assets/img/iklan/materi/" .$value['name']);
                }

         $where = array("iklan_m_id" => $iklan_m_id);

        // $this->m_berita->updateBelajar($where,'tb_berita',$simpan); 

         $this->m_iklanmateri->updateIklanMateri($where, 'tb_iklan_materi', $simpan);
    	
        redirect('admin/c_iklanmateri');
    }

}