<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_mitra extends CI_Controller{

	public function __construct(){
		parent::__construct();

		if($this->session->userdata('status') != "login"){
            redirect("c_login");
        }
		$this->load->model('admin/m_mitra');

	}

	function index(){
		$data['mitra'] = $this->m_mitra->getMitra();
		 $this->template->load('admin/header','admin/mitra',$data);

	}

	function insertMitra(){
	
		$data['mitra'] = $this->m_mitra->getMitra();
		$this->template->load('admin/header','admin/insertMitra',$data);
	}

	function aksiInsertMitra(){

		$simpan = array(
					"mitra_nama" => $this->input->post('mitra_nama'),
					"mitra_alamat" => $this->input->post('mitra_alamat'),
					"mitra_email" => $this->input->post('mitra_email'),
					"mitra_nohp" => $this->input->post('mitra_nohp'),
					"mitra_website" => $this->input->post('mitra_website'),
					"mitra_gambar" => $_FILES['mitra_gambar']['name'],
				
                );
                foreach ($_FILES as  $key => $value){
                    move_uploaded_file($value['tmp_name'],"./assets/img/mitra/" .$value['name']);
                }
				

         $this->db->insert('tb_mitra', $simpan);  

         redirect('admin/c_mitra');      
	}

	function deleteMitra($mitra_id){

        $where = array('mitra_id' => $mitra_id);

     	  $this->db->delete('tb_mitra',$where);

        redirect('admin/c_mitra');
    
	}

	function updateMitra(){
		$mitra_id = $this->uri->segment(4);
		$data['mitra'] = $this->m_mitra->getMitraId($mitra_id);
		$this->template->load('admin/header','admin/updateMitra',$data);
	}

	function aksiUpdateMitra(){
		$mitra_id = $this->uri->segment(4);
		$simpan = array(
					"mitra_nama" => $this->input->post('mitra_nama'),
					"mitra_alamat" => $this->input->post('mitra_alamat'),
					"mitra_email" => $this->input->post('mitra_email'),
					"mitra_nohp" => $this->input->post('mitra_nohp'),
					"mitra_website" => $this->input->post('mitra_website'),
					"mitra_gambar" => $_FILES['mitra_gambar']['name'],
				
                );
                foreach ($_FILES as  $key => $value){
                    move_uploaded_file($value['tmp_name'],"./assets/img/mitra/" .$value['name']);
                }
         $where = array("mitra_id" => $mitra_id);

        // $this->m_berita->updateBelajar($where,'tb_berita',$simpan); 

         $this->m_mitra->updateMitra($where, 'tb_mitra', $simpan);
    	
        redirect('admin/c_mitra');
    }
}