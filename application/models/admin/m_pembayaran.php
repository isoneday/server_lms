<?php

class m_pembayaran extends CI_model{

	public function getPembayaran(){
       
        $this->db->select('*');
         $this->db->from('tb_pembayaran, tb_user, tb_materi');
         $this->db->where('tb_pembayaran.user_id = tb_user.user_id');
		 $this->db->where('tb_pembayaran.materi_id = tb_materi.materi_id');
        
         $this->db->order_by('tb_pembayaran.pmby_id DESC');
        $status = $this->db->get();
        return $status;
    
    }

	  public function getPembayaranId($pmby_id){
       
        $this->db->select('*');
         $this->db->from('tb_pembayaran, tb_user, tb_materi');
         $this->db->where('tb_pembayaran.user_id = tb_user.user_id');
		 $this->db->where('tb_pembayaran.materi_id = tb_materi.materi_id');
         $this->db->where('tb_pembayaran.pmby_id', $pmby_id);
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

    public function updatePembayaran($where, $table, $data){
        $this->db->where($where);
    $this->db->update($table,$data);
    }
}