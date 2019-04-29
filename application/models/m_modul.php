<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_modul extends CI_model {

    public function getModul($id){
         $this->db->select('*');
         $this->db->from('tb_modul');
         $this->db->where('materi_id', $id);
        $modul = $this->db->get();
        return $modul;
    }
    
    public function getM($id, $modul_id){
         $this->db->select('*');
         $this->db->from('tb_modul');
         $this->db->where('materi_id', $id);
         $this->db->where('modul_id', $modul_id);
        $modul = $this->db->get();
        return $modul;

    }

    public function getCeklis($materi_id, $user_id)
    {
        $this->db->select('*');
        $this->db->from('tb_modul, tb_progress_modul');
        $this->db->where('tb_modul.modul_id=tb_progress_modul.modul_id');
        $this->db->where('tb_modul.materi_id', $materi_id);
        $this->db->where('tb_progress_modul.user_id', $user_id);
        $hasil = $this->db->get();
        return  $hasil;
    }
    
    public function getModulRow($id){
         $this->db->select('modul_id');
         $this->db->from('tb_modul');
         $this->db->where('materi_id', $id);
        $modul = $this->db->get();
        return $modul;
//        return $modul->first_row();
        
 
//        $row = $modul->row(0);
//        return $row;

    }
 
    public function getModulLastRow($id){
        
        $this->db->select('modul_id');
         $this->db->from('tb_modul');
         $this->db->where('materi_id', $id);
         
        $modul = $this->db->get();
        $jml = $modul->num_rows();
        
        $row = $modul->row($jml-1);
        return $row;
         
        //$row = $this->db->select("*")->limit(1)->order_by('id',"DESC")->get("table name")->row();
//echo $row->id;

    }
    
    public function getContent($modul_id){
        
         $this->db->select('*');
         $this->db->from('tb_content');
         $this->db->where('modul_id', $modul_id);
         $this->db->order_by('content_urutan ASC');
        $content = $this->db->get();
        return $content;

    }

    public function getRb($modul_id){
        $this->db->select('*');
         $this->db->from('tb_content');
         $this->db->where('modul_tipe', "rb");
         $this->db->where('modul_id', $modul_id);
         $this->db->order_by('content_urutan ASC');
        $content = $this->db->get();
        return $content;
    }

    public function getJawaban($modul_id){
         $this->db->select('*');
         $this->db->from('tb_jawaban');
         $this->db->where('modul_id', $modul_id);
        return $this->db->get();
        
    }
    
    public function getPogress($user_id){
         $this->db->select('*');
         $this->db->from('tb_belajar, tb_materi ,tb_user');
         $this->db->where('tb_belajar.materi_id = tb_materi.materi_id');
         $this->db->where('tb_belajar.user_id = tb_user.user_id');
         $this->db->where('tb_belajar.user_id', $user_id);
         $prog = $this->db->get();
         return $prog;

    }
    
    public function getStatusBelajar($user_id, $materi_id){
        $this->db->select('*');
         $this->db->from('tb_belajar, tb_materi');
         $this->db->where('tb_belajar.materi_id = tb_materi.materi_id');
         $this->db->where('user_id', $user_id);
         $this->db->where('tb_belajar.materi_id', $materi_id);
        $status = $this->db->get();
        return $status;
    }
    
    public function getStatusModul($user_id, $materi_id, $modul_id){
        $this->db->select('*');
         $this->db->from('tb_progress_modul');
         $this->db->where('user_id', $user_id);
         $this->db->where('materi_id', $materi_id);
          $this->db->where('modul_id', $modul_id);
        $status = $this->db->get();
        return $status;
    }
    
    public function getProject($user_id, $materi_id, $modul_id){
        $this->db->select('*');
         $this->db->from('tb_project');
         $this->db->where('user_id', $user_id);
         $this->db->where('materi_id', $materi_id);
         $this->db->where('modul_id', $modul_id);
        $status = $this->db->get();
        return $status;
    }

        public function getDeadlineMateri($materi_id){
         $this->db->select('materi_deadline');
         $this->db->from('tb_materi');
         $this->db->where('materi_id', $materi_id);
        $content = $this->db->get();
        return $content;

    }
   
    function updateBelajar($where, $table, $data){
        $this->db->where($where);
	$this->db->update($table,$data);
    }
    
    public function hitungProgressModul($materi_id, $user_id){   
      
         $this->db->select('*');
         $this->db->from('tb_progress_modul');
         $this->db->where('user_id', $user_id);
         $this->db->where('materi_id', $materi_id);
         $this->db->where('status', 1);
         $query = $this->db->get();
         
        if($query->num_rows()>0)
        {
          return $query->num_rows();
        }
        else
        {
          return 0;
        }
    }

    public function getReview($materi_id, $user_id){
        $this->db->select('*');
        $this->db->from('tb_rating');
        $this->db->where('user_id', $user_id);
         $this->db->where('materi_id', $materi_id);
         return $this->db->get();
    }

     public function getReqSertifikat($materi_id, $user_id){
        $this->db->select('*');
        $this->db->from('tb_req_sertifikat');
        $this->db->where('user_id', $user_id);
         $this->db->where('materi_id', $materi_id);
         return $this->db->get();
    }

    public function sumRating($materi_id){
        $this->db->select_sum('tb_rating.rating_angka');
        $this->db->from('tb_rating');
        $this->db->where('materi_id',$materi_id);
       
        $query = $this->db->get();
        return $query->row()->rating_angka;
    }

    public function getBarisRating($materi_id){
         $this->db->select('*');
        $this->db->from('tb_rating');
        $this->db->where('materi_id',$materi_id);
         return $this->db->get()->num_rows();
    }
    
    
   
}
