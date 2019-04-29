<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_materi extends CI_Controller{

	public function __construct(){
		parent::__construct();

		if($this->session->userdata('status') != "login"){
            redirect("c_login");
        }
		$this->load->model('admin/m_materi');

	}

	function index(){
		$data['materi'] = $this->m_materi->getMateri();
		 $this->template->load('admin/header','admin/materi',$data);

	}

	function insertMateri(){
		$data['materi'] = $this->m_materi->getMateri();
		$data['jenis_kelas'] = $this->m_materi->getJeniskelas();
		$data['mitra'] = $this->m_materi->getMitra();
		$this->template->load('admin/header','admin/insertMateri',$data);
	}

	function aksiInsertMateri(){

		$simpan = array(
					"materi_nama" => $this->input->post('materi_nama'),
					"materi_deskripsi" => $this->input->post('materi_deskripsi'),
					"materi_platform" => $this->input->post('materi_platform'),
					"materi_gambar" => $_FILES['materi_gambar']['name'],
					"jenis_kelas_id" => $this->input->post('jenis_kelas_id'),
					"materi_harga" => $this->input->post('materi_harga'),
					"materi_diskon" => $this->input->post('materi_diskon'),
					"materi_xp" => $this->input->post('materi_xp'),
					"materi_rating" => $this->input->post('materi_rating'),
					"materi_jml_modul" => $this->input->post('materi_jml_modul'),
					"mitra_id" => $this->input->post('mitra_id'),
					"materi_waktu" => $this->input->post('materi_waktu'),
					"materi_deadline" => $this->input->post('materi_deadline'),
					"materi_level" => $this->input->post('materi_level'),
					"materi_tgl" => $this->input->post('materi_tgl'),
					"materi_jum_siswa" => $this->input->post('materi_jum_siswa'),
					"materi_video" => $this->input->post('materi_video'),
                    
                );
                foreach ($_FILES as  $key => $value){
                    move_uploaded_file($value['tmp_name'],"./assets/img/materi/" .$value['name']);
                }

         $this->db->insert('tb_materi', $simpan);  

         redirect('admin/c_materi');      
	}

	function deleteMateri($materi_id){

        $where = array('materi_id' => $materi_id);

     	  $this->db->delete('tb_materi',$where);

        redirect('admin/c_materi');
    
	}

	function updateMateri(){
		$materi_id = $this->uri->segment(4);
		$data['materi'] = $this->m_materi->getMateriId($materi_id);
		$data['jenis_kelas'] = $this->m_materi->getJeniskelas();
		$data['mitra'] = $this->m_materi->getMitra();
		$this->template->load('admin/header','admin/updateMateri',$data);
	}

	function aksiUpdateMateri(){
		$materi_id = $this->uri->segment(4);
		$simpan = array(
					"materi_nama" => $this->input->post('materi_nama'),
					"materi_deskripsi" => $this->input->post('materi_deskripsi'),
					"materi_platform" => $this->input->post('materi_platform'),
					"materi_gambar" => $_FILES['materi_gambar']['name'],
					"jenis_kelas_id" => $this->input->post('jenis_kelas_id'),
					"materi_harga" => $this->input->post('materi_harga'),
					"materi_diskon" => $this->input->post('materi_diskon'),
					"materi_xp" => $this->input->post('materi_xp'),
					"materi_rating" => $this->input->post('materi_rating'),
					"materi_jml_modul" => $this->input->post('materi_jml_modul'),
					"mitra_id" => $this->input->post('mitra_id'),
					"materi_waktu" => $this->input->post('materi_waktu'),
					"materi_deadline" => $this->input->post('materi_deadline'),
					"materi_level" => $this->input->post('materi_level'),
					"materi_tgl" => $this->input->post('materi_tgl'),
					"materi_jum_siswa" => $this->input->post('materi_jum_siswa'),
					"materi_video" => $this->input->post('materi_video'),
                    
                );
                foreach ($_FILES as  $key => $value){
                    move_uploaded_file($value['tmp_name'],"./assets/img/materi/" .$value['name']);
                }

         $where = array("materi_id" => $materi_id);

        // $this->m_berita->updateBelajar($where,'tb_berita',$simpan); 

         $this->m_materi->updateMateri($where, 'tb_materi', $simpan);
    	
        redirect('admin/c_materi');
    }
}