<?php

class c_academy extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->model('m_materi');
        $this->load->model('m_modul');
        
        if($this->session->userdata('status') != "login"){
            redirect("c_login");
        }
    }
            
    function index(){
        $data['iklan'] = $this->m_materi->getIklan();
        $data['materi'] = $this->m_materi->getMateriTerbaru();
        foreach ( $data['materi']->result() as $key){
            $materi_id = $key->materi_id;
        
        $jum_siswa = $this->m_materi->totSiswa($materi_id);
        
        $upJum = array(
                    "materi_jum_siswa" => $jum_siswa 
              );
        
        $where = array(
                    "materi_id" =>$materi_id);
                
        $this->db->where($where);
	$this->db->update('tb_materi',$upJum);
        }
        
        $data['materi'] = $this->m_materi->getMateriTerbaru();
        
        $this->template->load('header','academy',$data);
    }
    
    function materiTerlaris(){
        $data['iklan'] = $this->m_materi->getIklan();
        $data['materi'] = $this->m_materi->getMateriTerlaris();
        $this->template->load('header','academy',$data);
    }

    function materiGratis(){
        $data['iklan'] = $this->m_materi->getIklan();
        $data['materi'] = $this->m_materi->getMateriGratis();
        $this->template->load('header','academy',$data);
    }
    
    function detailMateri(){
        $id = $this->uri->segment(3);
         $user_id = $this->session->userdata('user_id');
         $data['modul'] = $this->m_modul->getModulRow($id);
        $data['detailmateri'] = $this->m_materi->getMateri($id);
        $data['statusPembayaran'] = $this->m_materi->getStatusPembayaran($user_id, $id);
        
        foreach ($data['detailmateri']->result() as $key){
            $arga = $key->materi_harga;
            
            if($arga == 0){
                if($data['statusPembayaran']->num_rows() == NULL){
                    $simpan = array("user_id"=>$user_id ,
                                "materi_id" =>$id,
                                "pmby_bukti" =>"-",
                                "pmby_status" => "gratis",
                                
                            );

                    $this->db->insert('tb_pembayaran', $simpan);
                }
            }else{
                if($data['statusPembayaran']->num_rows() == NULL){
                    $simpan = array("user_id"=>$user_id,
                                "materi_id" =>$id
                            );

                    $this->db->insert('tb_pembayaran', $simpan);
                }
            }
            
        }
       $data['statusPembayaran'] = $this->m_materi->getStatusPembayaran($user_id, $id);
        $this->template->load('header','detailMateri',$data);

    }
    
    function search_keyword(){
        $data['iklan'] = $this->m_materi->getIklan();
      
       $keyword = $this->input->post('keyword');
       
       $data['materi'] = $this->m_materi->search($keyword);
       
       $this->template->load('header','academy',$data);
    }
    
     function pembayaran(){
        
        $id = $this->uri->segment(3);
        $data['pembayaran'] = $this->m_materi->getMateri($id);
       $this->template->load('header','pembayaran',$data);

       
    }
    
    function detailPembayaran(){
        
        $id = $this->uri->segment(3);
        $user_id = $this->session->userdata('user_id');
        
        $data['detail'] = $this->m_materi->getDetailPembayaran($user_id, $id);
       $this->template->load('header','detailPembayaran',$data);

    }
    
    function simpanPembayaran(){
        $id = $this->uri->segment(3);
        $data['pembayaran'] = $this->m_materi->getMateri($id);
        $user_id = $this->session->userdata('user_id');
        $data['progress'] = $this->m_materi->getPembayaran($user_id);
       
        date_default_timezone_set('Asia/Jakarta');
        $date = date('Y/m/d h:i:s a', time());
//        $t=time();
//        $date = (date("Y-m-d",$t));
        $status = "cek";
        $simpan = array(
                    "pmby_bukti" => $_FILES['bukti']['name'],
                    "pmby_status" => $status,
                    "pmby_tanggal" => $date
                );
                foreach ($_FILES as  $key => $value){
                    move_uploaded_file($value['tmp_name'], "./bukti_pembayaran/" . $value['name']);
                }
                $where = array("user_id"=>$user_id ,
                    "materi_id " =>$id);
                
                $this->m_materi->updatePembayaran($where,'tb_pembayaran',$simpan);
                
                
                $data['progress'] = $this->m_materi->getPembayaran($user_id);
                $this->template->load('header','pembelian',$data);
    }
    
    function pembelian(){
        $user_id = $this->session->userdata('user_id');
        $data['progress'] = $this->m_materi->getPembayaran($user_id);
        $this->template->load('header','pembelian',$data);
    }

   function simpanFavorite(){
         $id = $this->uri->segment(3);
        $user_id = $this->session->userdata('user_id');
          $simpan = array("materi_id " =>$id,
                     "user_id"=>$user_id
                );
           $this->db->insert('tb_fav_materi', $simpan);
        
           $data['iklan'] = $this->m_materi->getIklan();
        $data['materi'] = $this->m_materi->getMateriTerbaru();

        $this->template->load('header','academy',$data);
    }
    
}