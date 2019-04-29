<?php

class m_rating extends CI_model{

	public function getRating(){
       
        $this->db->select('*');
         $this->db->from(' tb_rating, tb_materi, tb_user');
		 $this->db->where('tb_rating.materi_id = tb_materi.materi_id');
		 $this->db->where('tb_rating.user_id = tb_user.user_id');
         $this->db->order_by('tb_rating.rating_id DESC');
        $status = $this->db->get();
        return $status;
    
    }
	
	  public function getRatingId($event_id){
       
        $this->db->select('*');
        $this->db->from(' tb_rating, tb_materi, tb_user');
		$this->db->where('tb_rating.materi_id = tb_materi.materi_id');
		$this->db->where('tb_rating.user_id = tb_user.user_id');
         $this->db->where('tb_rating.rating_id', $rating_id);
        $status = $this->db->get();
        return $status;
    
    }

    public function getMateri(){  
         $this->db->select('*');
         $this->db->from('tb_materi'); 
        $status = $this->db->get();
        return $status;
    }
	
	 public function getUser(){  
         $this->db->select('*');
         $this->db->from('tb_user'); 
        $status = $this->db->get();
        return $status;
    }

      public function delete($tableName,$where){
		
        return $this->db->delete($tableName,$where);
		
    }


   
}