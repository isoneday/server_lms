<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_profile extends CI_model {

    public function getJoinBelajar($user_id){
        
         $this->db->select('*');
         $this->db->from('tb_belajar, tb_materi');
         $this->db->where('tb_belajar.materi_id = tb_materi.materi_id');
         $this->db->where('tb_belajar.user_id', $user_id);
         $prog = $this->db->get();
         return $prog;

    }
    
    public function getJoinEvent($user_id){
        
         $this->db->select('*');
         $this->db->from('tb_join_event, tb_event');
         $this->db->where('tb_join_event.event_id = tb_event.event_id');
         $this->db->where('tb_join_event.user_id', $user_id);
         $prog = $this->db->get();
         return $prog;

    }
    
    public function getBelajarStatus($user_id){
        
         $this->db->select('belajar_status');
         $this->db->from('tb_belajar');
        $this->db->where('user_id', $user_id);
         $prog = $this->db->get();
         return $prog;

    }
    
    function update($where, $table, $data){
        $this->db->where($where);
	$this->db->update($table,$data);
    }
    
     public function sumXp($user_id){
        $this->db->select_sum('tb_materi.materi_xp');
        $this->db->from('tb_materi,tb_belajar, tb_user');
        $this->db->where('tb_belajar.materi_id = tb_materi.materi_id');
        $this->db->where('tb_belajar.user_id = tb_user.user_id');
        $this->db->where('tb_belajar.user_id', $user_id);
        $this->db->where('tb_belajar.belajar_status', 'selesai');
       
        $query = $this->db->get();
        return $query->row()->materi_xp;
//        return $query;
        
    }
}

