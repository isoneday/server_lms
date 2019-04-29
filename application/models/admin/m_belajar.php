<?php

class m_belajar extends CI_model{

	public function getBelajar(){
       
        $this->db->select('*');
         $this->db->from('tb_belajar, tb_user, tb_materi');
         $this->db->where('tb_belajar.user_id = tb_user.user_id');
		 $this->db->where('tb_belajar.materi_id = tb_materi.materi_id');
         $this->db->order_by('tb_belajar.belajar_id DESC');
        $status = $this->db->get();
        return $status;
    
    }

	  public function getBelajarId($belajar_id){
       
        $this->db->select('*');
        $this->db->from('tb_belajar, tb_user, tb_materi');
         $this->db->where('tb_belajar.user_id = tb_user.user_id');
		 $this->db->where('tb_belajar.materi_id = tb_materi.materi_id');
         $this->db->where('tb_belajar.belajar_id', $belajar_id);
        $status = $this->db->get();
        return $status;
    
    }
    public function getUser(){  
         $this->db->select('*');
         $this->db->from('tb_user'); 
        $status = $this->db->get();
        return $status;
    }
	
	public function getMateri(){  
         $this->db->select('*');
         $this->db->from('tb_materi'); 
        $status = $this->db->get();
        return $status;
    }


      public function delete($tableName,$where){
		
        return $this->db->delete($tableName,$where);
		
    }

    public function updateMateri($where, $table, $data){
        $this->db->where($where);
    $this->db->update($table,$data);
    }
}