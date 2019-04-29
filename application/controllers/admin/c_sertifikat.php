<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_sertifikat extends CI_Controller{

	public function __construct(){
		parent::__construct();

		if($this->session->userdata('status') != "login"){
            redirect("c_login");
        }
		$this->load->model('admin/m_sertifikat');

	}

	function index(){
		$data['sertifikat'] = $this->m_sertifikat->getSertifikat();
		 $this->template->load('admin/header','admin/sertifikat',$data);

	}



	function deleteSertikat($req_id){

        $where = array('req_id' => $req_id);

     	  $this->db->delete('tb_req_sertifikat',$where);

        redirect('admin/c_sertifikat');
    
	}

	function updateSertifikat(){
		$req_id = $this->uri->segment(4);
		$data['sertifikat'] = $this->m_sertifikat->getSertifikatId($req_id);
		$data['user'] = $this->m_sertifikat->getUser();
		$data['materi'] = $this->m_sertifikat->getUser();
		$this->template->load('admin/header','admin/updateSertifikat',$data);
	}

	function aksiUpdateSertifikat(){
		$req_id = $this->uri->segment(4);
		$simpan = array(
					
					"sertifikat_gambar" => $_FILES['sertifikat_gambar']['name']
					
                );
                foreach ($_FILES as  $key => $value){
                    move_uploaded_file($value['tmp_name'],"./assets/img/sertifikat/" .$value['name']);
                }	

         $where = array("req_id" => $req_id);

        // $this->m_berita->updateBelajar($where,'tb_berita',$simpan); 

         $this->m_sertifikat->updateSertifikat($where, 'tb_req_sertifikat', $simpan);
    	
        redirect('admin/c_sertifikat');
    }
	
	
	function email()
	{
		$req_id = $this->uri->segment(4);
	$materi_id = $this->uri->segment(5);
	$user_id = $this->uri->segment(6);
		  // Konfigurasi email

           $this->load->library('email');
        $config = array();
        $config['charset'] = 'utf-8';
        $config['useragent'] = 'Codeigniter';
        $config['protocol']= "smtp";
        $config['mailtype']= "html";
        $config['smtp_host']= "ssl://smtp.gmail.com";//pengaturan smtp
        $config['smtp_port']= "465";
        $config['smtp_timeout']= "400";
        $config['smtp_user']= "auliarahmii25@gmail.com"; // isi dengan email kamu
        $config['smtp_pass']= "ar178621"; // isi dengan password kamu
        $config['crlf']="\r\n"; 
        $config['newline']="\r\n"; 
        $config['wordwrap'] = TRUE;
        //memanggil library email dan set konfigurasi untuk pengiriman email

        $this->email->initialize($config);
    //konfigurasi pengiriman
        $this->email->from($config['smtp_user'], 'Herror');
		
		
      $data['user'] = $this->m_sertifikat->getUserId($user_id);
		foreach($data['user']->result() as $u){
		
        // Email penerima
		$user_email = $u->user_email;
       $this->email->to($user_email); // Ganti dengan email tujuan kamu
		}
		
		$data['gambar'] = $this->m_sertifikat->getGambarSertifikat($req_id, $materi_id, $user_id);
		
		foreach($data['gambar']->result() as $g){
        // Lampiran email, isi dengan url/path file
         $this->email->attach('http://localhost/server_lms/assets/img/sertifikat/' . $g->sertifikat_gambar);

        // Subject email
        $this->email->subject('Sertifikat ' . $g->materi_nama);

        // Isi email
        $this->email->message("Salam " . $g->user_name . "<br><br>Selamat anda telah menyelesaikan kelas" .  $g->materi_nama . "<br><br>Ini sertifikat anda :");
		
		}
  
       if($this->email->send())
        {
             echo '<script language="javascript">';
            echo 'alert("Sertifikat berhasil dikirim ke email ");';
             echo 'window.location= "'.base_url('index.php/admin/c_sertifikat').'";';
            echo '</script>';
			
        }else
        {
           echo "Berhasil , namu gagal mengirim verifikasi email";
        }

	}		
}