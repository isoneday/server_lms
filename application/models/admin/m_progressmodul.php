<?php

class m_progressmodul extends CI_model{

	public function getProgressModul(){
       
        $this->db->select('*');
         $this->db->from('tb_progress_modul, tb_user, tb_materi, tb_modul');
         $this->db->where('tb_progress_modul.user_id = tb_user.user_id');
		 $this->db->where('tb_progress_modul.materi_id = tb_materi.materi_id');
		 $this->db->where('tb_progress_modul.modul_id = tb_modul.modul_id');
        
         $this->db->order_by('tb_progress_modul.progress_id DESC');
        $status = $this->db->get();
        return $status;
    
    }

	  public function getProgressModulId($progress_id){
       
        $this->db->select('*');
          $this->db->from('tb_progress_modul, tb_user, tb_materi, tb_modul');
         $this->db->where('tb_progress_modul.user_id = tb_user.user_id');
		 $this->db->where('tb_progress_modul.materi_id = tb_materi.materi_id');
		 $this->db->where('tb_progress_modul.modul_id = tb_modul.modul_id');
         $this->db->where('tb_progress_modul.progress_id', $progress_id);
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
	
	public function getModul(){  
         $this->db->select('*');
         $this->db->from('tb_modul'); 
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