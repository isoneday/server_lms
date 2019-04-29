<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_pembayaran extends CI_Controller{

	public function __construct(){
		parent::__construct();

		if($this->session->userdata('status') != "login"){
            redirect("c_login");
        }
		$this->load->model('admin/m_pembayaran');

	}

	function index(){
		$data['pembayaran'] = $this->m_pembayaran->getPembayaran();
		 $this->template->load('admin/header','admin/pembayaran',$data);

	}

	function insertPembayaran(){
		$data['pembayaran'] = $this->m_pembayaran->getPembayaran();
		$data['user'] = $this->m_pembayaran->getPembayaran();
		$data['materi'] = $this->m_pembayaran->getMitra();
		$this->template->load('admin/header','admin/insertPembayaran',$data);
	}


	function deletePembayaran($pmby_id){

        $where = array('pmby_id' => $pmby_id);

     	  $this->db->delete('tb_pembayaran',$where);

        redirect('admin/c_pembayaran');
    
	}

	function updatePembayaran(){
		$pmby_id = $this->uri->segment(4);
		$data['pembayaran'] = $this->m_pembayaran->getPembayaranId($pmby_id);
		$data['user'] = $this->m_pembayaran->getPembayaran();
		$data['materi'] = $this->m_pembayaran->getMateri();
		
		$this->template->load('admin/header','admin/updatePembayaran',$data);
	}

	function aksiUpdatePembayaran(){
		$pmby_id = $this->uri->segment(4);
		$simpan = array(
					"user_id" => $this->input->post('user_id'),
					"materi_id" => $this->input->post('materi_id'),
					"pmby_bukti" => $_FILES['pmby_bukti']['name'],
					"pmby_status" => $this->input->post('pmby_status'),
					"pmby_tanggal" => $this->input->post('pmby_tanggal'),
					"pmby_batas" => $this->input->post('pmby_batas'),
				
                );
                foreach ($_FILES as  $key => $value){
                    move_uploaded_file($value['tmp_name'],"./bukti_pembayaran/" .$value['name']);
                }
				 
         $where = array("pmby_id" => $pmby_id);

        // $this->m_berita->updateBelajar($where,'tb_berita',$simpan); 

         $this->m_pembayaran->updatePembayaran($where, 'tb_pembayaran', $simpan);
    	
        redirect('admin/c_pembayaran');
    }
}