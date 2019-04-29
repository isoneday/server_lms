<?php

class c_modul extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->model('m_modul');
        $this->load->library(array(
			'custom_upload',
			'form_validation'
		));
        
        if($this->session->userdata('status') != "login"){
            redirect("c_login");
        }
    }

    // function index(){
    //     $id = $this->uri->segment(3);
    //     $user_id = $this->session->userdata('user_id');
    //     $modul_id = $this->uri->segment(4);
        
    //     $data['modul'] = $this->m_modul->getModul($id);
    //     $data['m'] = $this->m_modul->getM($id,$modul_id);
    //     $data['content'] = $this->m_modul->getContent($modul_id);
    //     $data['row'] = $this->m_modul->getModulRow($id);
        
    //     $data['status'] = $this->m_modul->getStatusModul($user_id, $id, $modul_id);
        
    //     if($data['status']->num_rows() == NULL){
    //         foreach ($data['modul']->result() as $key ){

    //              $simpan = array(
    //                         "materi_id " =>$id,
    //                         "user_id" => $user_id,
    //                         "modul_id" => $key->modul_id,
    //                         "status" => 0
    //                   );

                 
    //             $this->db->insert('tb_progress_modul', $simpan);
               
    //         }
    //     }else {
    //         foreach ($data['m']->result() as $m){
    //             if($m->modul_judul == "Submission"){
    //                 $simpan = array(
    //                     "status" => 0
    //               );
    
    //             }else{
    //                 $simpan = array(
    //                     "status" => 1
    //               );
  
    //             }
    //             $where = array( "materi_id " =>$id,
    //                     "user_id" => $user_id,
    //                     "modul_id" => $modul_id);

    //            $this->m_modul->updateBelajar($where, 'tb_progress_modul', $simpan);
    //         }
            
    //     }
        
    //     $data['statusBelajar'] = $this->m_modul->getStatusBelajar($user_id, $id);
         
    //     if($data['statusBelajar']->num_rows() == NULL){
        
    //         date_default_timezone_set('Asia/Jakarta');
    //         $mulai = date('Y/m/d h:i:s a', time());
    //         $simpanBelajar = array(
    //                     "user_id" => $user_id,
    //                     "materi_id" =>$id,
    //                     "belajar_status" => "proses",
    //                     "belajar_mulai" => $mulai
    //               );
    //         $this->db->insert('tb_belajar', $simpanBelajar);
    //     } else{
    //             //update data

    //         $data['statusBelajar'] = $this->m_modul->getStatusBelajar($user_id, $id);
    //         $materi['deadline_materi'] = $this->m_modul->getDeadlineMateri($id);

    //          foreach($materi['deadline_materi']->result() as $key ){

    //             $materi_deadline = $key->materi_deadline;
    //         }
    //         foreach($data['statusBelajar']->result() as $key ){

    //             $time = strtotime($key->belajar_mulai);
    //             $time += $materi_deadline * 86400;
    //             $date = date('Y-m-d H:i:s', $time);

    //             $progress = $key->progress_modul;
    //             $jml = $key->materi_jml_modul;
    //             $persen = ($progress / $jml) * 100;
    //             $persen1 = round($persen);
    // //            $persen1 = 100;


    //                 date_default_timezone_set('Asia/Jakarta');
    //                 $cur_date = date('m/d/Y h:i:s a', time());
    //                 if($persen1 == 100 and $cur_date <= $date){
    //                     $status = 'selesai';
    //                 }else if($cur_date <= $date){
    //                     $status = 'belajar';
    //                 }else{
    //                     $status =  'Kedaluwarsa';
    //                 }
    //         }
    //         $hitung_modul = $this->m_modul->hitungProgressModul($id, $user_id);
    //         date_default_timezone_set('Asia/Jakarta');
    //         $now = date('Y/m/d h:i:s a', time());
    //         $upBelajar = array(
    //                     "belajar_deadline" => $date,
    //                     "progress_modul" => $hitung_modul,
    //                     "last_seen" => $now,
    //                     "belajar_status" => $status
    //               );

    //         $where = array("user_id"=>$user_id ,
    //                     "materi_id " =>$id);

    //         $this->m_modul->updateBelajar($where,'tb_belajar',$upBelajar);
    //     }

    //    $data['rb'] =  $this->m_modul->getRb($modul_id);
    //    $data['kunci'] = "";
    //    $data['ceklis'] = $this->m_modul->getCeklis($id, $user_id);
    //     $this->template->load('header','modul',$data);
        
        
    // }
            
    function index(){
        $id = $this->uri->segment(3);
        $user_id = $this->session->userdata('user_id');
        $modul_id = $this->uri->segment(4);
        
        $data['modul'] = $this->m_modul->getModul($id);
        $data['m'] = $this->m_modul->getM($id,$modul_id);
        $data['content'] = $this->m_modul->getContent($modul_id);
        $data['row'] = $this->m_modul->getModulRow($id);
        
        $data['status'] = $this->m_modul->getStatusModul($user_id, $id, $modul_id);
        
        if($data['status']->num_rows() == NULL){
            foreach ($data['modul']->result() as $key ){

                 $simpan = array(
                            "materi_id " =>$id,
                            "user_id" => $user_id,
                            "modul_id" => $key->modul_id,
                            "status" => 0
                      );

                 
                $this->db->insert('tb_progress_modul', $simpan);
               
            }
        }

        $data['statusBelajar'] = $this->m_modul->getStatusBelajar($user_id, $id);
         
        if($data['statusBelajar']->num_rows() == NULL){
        
            date_default_timezone_set('Asia/Jakarta');
            $mulai = date('Y/m/d h:i:s a', time());
            $simpanBelajar = array(
                        "user_id" => $user_id,
                        "materi_id" =>$id,
                        "belajar_status" => "proses",
                        "belajar_mulai" => $mulai
                  );
            $this->db->insert('tb_belajar', $simpanBelajar);
        }

       $data['rb'] =  $this->m_modul->getRb($modul_id);
       $data['kunci'] = "";
       $data['ceklis'] = $this->m_modul->getCeklis($id, $user_id);
        $this->template->load('header','modul',$data);

    }

    function mdl(){
        $id = $this->uri->segment(3);
        $user_id = $this->session->userdata('user_id');
        $modul_id = $this->uri->segment(4);
        
        $data['modul'] = $this->m_modul->getModul($id);
        $data['m'] = $this->m_modul->getM($id,$modul_id);
        $data['content'] = $this->m_modul->getContent($modul_id);
        $data['row'] = $this->m_modul->getModulRow($id);
        
        $data['status'] = $this->m_modul->getStatusModul($user_id, $id, $modul_id);
        foreach ($data['status']->result() as $key) {
            $s = $key->status;
        }
        if($data['status']->num_rows() != NULL){
            foreach ($data['m']->result() as $m){
                if($m->modul_judul == "Submission"){
                  
                        if($s == 0){
                             $simpan = array(
                            "status" => 0   );
                        
                     }else{
                         $simpan = array(
                            "status" => 1   );
                     }
              
                }else{
                    $simpan = array(
                        "status" => 1
                  );
  
                }
                $where = array( "materi_id " =>$id,
                        "user_id" => $user_id,
                        "modul_id" => $modul_id);

               $this->m_modul->updateBelajar($where, 'tb_progress_modul', $simpan);
            }
            
        }
        
        $data['statusBelajar'] = $this->m_modul->getStatusBelajar($user_id, $id);
         
        if($data['statusBelajar']->num_rows() != NULL){
                //update data

            $data['statusBelajar'] = $this->m_modul->getStatusBelajar($user_id, $id);
            $materi['deadline_materi'] = $this->m_modul->getDeadlineMateri($id);

             foreach($materi['deadline_materi']->result() as $key ){

                $materi_deadline = $key->materi_deadline;
            }
            foreach($data['statusBelajar']->result() as $key ){

                $time = strtotime($key->belajar_mulai);
                $time += $materi_deadline * 86400;
                $date = date('Y-m-d H:i:s', $time);

                $progress = $key->progress_modul;
                $jml = $key->materi_jml_modul;
                $persen = ($progress / $jml) * 100;
                $persen1 = round($persen);
    //            $persen1 = 100;


                    date_default_timezone_set('Asia/Jakarta');
                    $cur_date = date('m/d/Y h:i:s a', time());
                    if($progress == $jml and $cur_date <= $date){
                        $status = 'selesai';
                    }else if($progress != $jml and $cur_date <= $date){
                        $status = 'belajar';
                    }else{
                        $status =  'Kedaluwarsa';
                    }
            }
            $hitung_modul = $this->m_modul->hitungProgressModul($id, $user_id);
            date_default_timezone_set('Asia/Jakarta');
            $now = date('Y/m/d h:i:s a', time());
            $upBelajar = array(
                        "belajar_deadline" => $date,
                        "progress_modul" => $hitung_modul,
                        "last_seen" => $now,
                        "belajar_status" => $status
                  );

            $where = array("user_id"=>$user_id ,
                        "materi_id " =>$id);

            $this->m_modul->updateBelajar($where,'tb_belajar',$upBelajar);
        }

       $data['rb'] =  $this->m_modul->getRb($modul_id);
       $data['kunci'] = "";
       $data['ceklis'] = $this->m_modul->getCeklis($id, $user_id);

        $this->template->load('header','modul',$data);

    }
   
    function progressBelajar(){
        $user_id = $this->session->userdata('user_id');
        $data['progress'] = $this->m_modul->getPogress($user_id);
        $this->template->load('header','progressBelajar',$data);
    }
    
   function simpanProject(){
       $materi_id = $this->uri->segment(3);
        $user_id = $this->session->userdata('user_id');
        $modul_id = $this->uri->segment(4);
        $data['p'] = $this->m_modul->getProject($user_id, $materi_id, $modul_id);
        
       $file = $this->custom_upload->single_upload('file', array(
			'upload_path' => 'project',
			// 'allowed_types' => 'zip' // etc
		'allowed_types' => 'zip' // etc
	
		));
               
       $link = $this->input->post('link');
       $simpan = array(
                    'user_id' => $user_id,
                    'materi_id' => $materi_id,
                    'modul_id' => $modul_id,
                    'project_nama'=> ((empty($file)) ? null : $file),
                    'link_git'=> $link
		);
       
       
        if($data['p']->num_rows() == NULL){
                $this->db->insert('tb_project', $simpan);
        }
        
                //update progress belajar
                 $upBelajar = array(
                       
                        "materi_id " =>$materi_id,
                        "user_id" => $user_id,
                        "modul_id" => $modul_id,
                        "status" => 1
                  );

            $where = array("user_id"=>$user_id ,
                        "materi_id " =>$materi_id,
                        "modul_id"=>$modul_id);

            $this->m_modul->updateBelajar($where,'tb_progress_modul',$upBelajar);
        
            $data['modul'] = $this->m_modul->getModul($materi_id);
            $data['content'] = $this->m_modul->getContent($modul_id);
            $data['ceklis'] = $this->m_modul->getCeklis($materi_id, $user_id);
             $data['row'] = $this->m_modul->getModulRow($materi_id);
              $data['kunci'] = "";
        $this->template->load('header','modul',$data);
        
    } 

    function simpanJawaban(){
        $id = $this->uri->segment(3);
        $user_id = $this->session->userdata('user_id');
        $modul_id = $this->uri->segment(4);

        $rb = $this->input->post('rb');
         $data['jawab'] = $this->m_modul->getJawaban($modul_id);

         foreach ($data['jawab']->result() as $j){
            $kunci = $j->jawaban;
            $cocok = strcmp($kunci, $rb);
            echo $cocok;
           if($cocok != 0){
            $data['kunci'] = "salah";
           } else{
            $data['kunci'] = "benar";
           }
         }    
       

        $data['modul'] = $this->m_modul->getModul($id);
        $data['m'] = $this->m_modul->getM($id,$modul_id);
        $data['content'] = $this->m_modul->getContent($modul_id);
        $data['row'] = $this->m_modul->getModulRow($id);
        $data['ceklis'] = $this->m_modul->getCeklis($id, $user_id);
        $data['rb'] =  $this->m_modul->getRb($modul_id);
        $data['isi'] = $rb;

       $this->template->load('header','modul',$data);
    }

    function review(){

        $this->template->load('header','review');
    }

    function simpanReview(){
        $materi_id = $this->uri->segment(3);
        $user_id = $this->session->userdata('user_id');

        $rating = $this->input->post('rating');
        $komentar = $this->input->post('komentar');

        $data['rating'] = $this->m_modul->getReview($materi_id, $user_id);

        if($data['rating']->num_rows() == 0){
            $simpan = array("user_id"=>$user_id,
                        "materi_id" =>$materi_id,
                        "rating_angka" =>$rating,
                        "rating_komentar" => $komentar
                            );

             $this->db->insert('tb_rating', $simpan);
        }

        $sumRating = $this->m_modul->sumRating($materi_id);
        $baris = $this->m_modul->getBarisRating($materi_id);
        $rat = number_format($sumRating/$baris,1);

         $upBelajar = array(
                        "materi_rating" => $rat
                  );

            $where = array(
                        "materi_id " =>$materi_id);

            $this->m_modul->updateBelajar($where,'tb_materi',$upBelajar);

        redirect('c_modul/progressBelajar');
        
    }

    function reqSertifikat(){
         $id = $this->uri->segment(3);
        $user_id = $this->session->userdata('user_id');
        $data['req'] = $this->m_modul->getReqSertifikat($id, $user_id);
        
        if($data['req']->num_rows() == NULL){
        
            date_default_timezone_set('Asia/Jakarta');
            $mulai = date('Y/m/d h:i:s a', time());
            $simpan = array(
                        "user_id" => $user_id,
                        "materi_id" =>$id
                  );
            $this->db->insert('tb_req_sertifikat', $simpan);
        }

         echo '<script language="javascript">';
            echo 'alert("Sertifikat akan dikirim ke email anda");';
             echo 'window.location= "'.base_url('index.php/c_modul/progressBelajar').'";';
            echo '</script>';


    }


  
}
