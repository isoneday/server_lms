<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_event extends CI_Controller{

	public function __construct(){
		parent::__construct();

		if($this->session->userdata('status') != "login"){
            redirect("c_login");
        }
		$this->load->model('admin/m_event');

	}

	function index(){
		$data['event'] = $this->m_event->getEvent();
		 $this->template->load('admin/header','admin/event',$data);

	}

	function insertEvent(){
		$data['event'] = $this->m_event->getEvent();
		$data['mitra'] = $this->m_event->getMitra();
		$this->template->load('admin/header','admin/insertEvent',$data);
	}

	function aksiInsertEvent(){

		$simpan = array(
					"event_nama" => $this->input->post('event_nama'),
					"event_tgl_mulai" => $this->input->post('event_tgl_mulai'),
					"event_tgl_selesai" => $this->input->post('event_tgl_selesai'),
					"event_kuota" => $this->input->post('event_kuota'),
					"event_kota" => $this->input->post('event_kota'),
					"event_jenis" => $this->input->post('event_jenis'),
					"event_deskripsi" => $this->input->post('event_deskripsi'),
					"event_gambar" => $_FILES['event_gambar']['name'],
					"event_xp" => $this->input->post('event_xp'),
					"mitra_id" => $this->input->post('mitra_id'),
					"event_video" => $this->input->post('event_video'),
                    "event_alamat" => $this->input->post('event_alamat'),
					"event_tiket" => $_FILES['event_tiket']['name'],
                );
                foreach ($_FILES as  $key => $value){
                    move_uploaded_file($value['tmp_name'],"./assets/img/event/" .$value['name']);
                }
				 foreach ($_FILES as  $key => $value){
                    move_uploaded_file($value['tmp_name'],"./assets/img/iklan/event/tiket" .$value['name']);
                }

         $this->db->insert('tb_event', $simpan);  

         redirect('admin/c_event');      
	}

	function deleteEvent($event_id){

        $where = array('event_id' => $event_id);

     	  $this->db->delete('tb_event',$where);

        redirect('admin/c_event');
    
	}

	function updateEvent(){
		$event_id = $this->uri->segment(4);
		$data['event'] = $this->m_event->getEventId($event_id);
		$data['mitra'] = $this->m_event->getEvent();
		$this->template->load('admin/header','admin/updateEvent',$data);
	}

	function aksiUpdateEvent(){
		$event_id = $this->uri->segment(4);
		$simpan = array(
					"event_nama" => $this->input->post('event_nama'),
					"event_tgl_mulai" => $this->input->post('event_tgl_mulai'),
					"event_tgl_selesai" => $this->input->post('event_tgl_selesai'),
					"event_kuota" => $this->input->post('event_kuota'),
					"event_kota" => $this->input->post('event_kota'),
					"event_jenis" => $this->input->post('event_jenis'),
					"event_deskripsi" => $this->input->post('event_deskripsi'),
					"event_gambar" => $_FILES['event_gambar']['name'],
					"event_xp" => $this->input->post('event_xp'),
					"mitra_id" => $this->input->post('mitra_id'),
					"event_video" => $this->input->post('event_video'),
					"event_alamat" => $this->input->post('event_alamat'),
					"event_tiket" => $_FILES['event_tiket']['name'],
                );
                foreach ($_FILES as  $key => $value){
                    move_uploaded_file($value['tmp_name'],"./assets/img/event/" .$value['name']);
                }
				 foreach ($_FILES as  $key => $value){
                    move_uploaded_file($value['tmp_name'],"./assets/img/event/tiket/" .$value['name']);
                }

         $where = array("event_id" => $event_id);

        // $this->m_berita->updateBelajar($where,'tb_berita',$simpan); 

         $this->m_event->updateEvent($where, 'tb_event', $simpan);
    	
        redirect('admin/c_event');
    }
}