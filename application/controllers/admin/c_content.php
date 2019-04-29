<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_content extends CI_Controller{

	public function __construct(){
		parent::__construct();

		if($this->session->userdata('status') != "login"){
            redirect("c_login");
        }
		$this->load->model('admin/m_content');

	}

	function index(){
		$data['content'] = $this->m_content->getContent();
		 $this->template->load('admin/header','admin/content',$data);

	}

	function insertContent(){
	
		$data['content'] = $this->m_content->getContent();
		$data['modul'] = $this->m_content->getModul();
		
		$this->template->load('admin/header','admin/insertContent',$data);
	}

	function aksiInsertContent(){

		$simpan = array(
					"modul_id" => $this->input->post('modul_id'),
					"modul_tipe" => $this->input->post('modul_tipe'),
					"content_isi" => $this->input->post('content_isi'),
				
                );
                

         $this->db->insert('tb_content', $simpan);  

         redirect('admin/c_content');      
	}

	function deleteContent($content_urutan){

        $where = array('content_urutan' => $content_urutan);

     	  $this->db->delete('tb_content',$where);

        redirect('admin/c_content');
    
	}

	function updateContent(){
		$content_urutan = $this->uri->segment(4);
		
		$data['content'] = $this->m_content->getContentId($content_urutan);
		$data['modul'] = $this->m_content->getModul();
		$this->template->load('admin/header','admin/updateContent',$data);
	}

	function aksiUpdateContent(){
		$content_urutan = $this->uri->segment(4);
		$simpan = array(
				
					"modul_id" => $this->input->post('modul_id'),
					"modul_tipe" => $this->input->post('modul_tipe'),
					"content_isi" => $this->input->post('content_isi'),
				
                );
                
         $where = array("content_urutan" => $content_urutan);

        // $this->m_berita->updateBelajar($where,'tb_berita',$simpan); 

         $this->m_content->updateContent($where, 'tb_content', $simpan);
    	
        redirect('admin/c_content');
    }
}