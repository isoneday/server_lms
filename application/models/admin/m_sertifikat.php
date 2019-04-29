<?php

class m_sertifikat extends CI_model{

	public function getSertifikat(){
       
        $this->db->select('*');
         $this->db->from('tb_req_sertifikat, tb_user, tb_materi');
         $this->db->where('tb_req_sertifikat.user_id = tb_user.user_id');
		 $this->db->where('tb_req_sertifikat.materi_id = tb_materi.materi_id');
		
         $this->db->order_by('tb_req_sertifikat.req_id DESC');
        $status = $this->db->get();
        return $status;
    
    }
	
	  public function getSertifikatId($req_id){
       
        $this->db->select('*');
       $this->db->from('tb_req_sertifikat, tb_user, tb_materi');
         $this->db->where('tb_req_sertifikat.user_id = tb_user.user_id');
		 $this->db->where('tb_req_sertifikat.materi_id = tb_materi.materi_id');
         $this->db->where('tb_req_sertifikat.req_id', $req_id);
        $status = $this->db->get();
        return $status;
    
    }
	
	 public function getGambarSertifikat($req_id, $materi_id, $user_id){
       
        $this->db->select('*');
	    $this->db->from('tb_req_sertifikat, tb_user, tb_materi');
         $this->db->where('tb_req_sertifikat.user_id = tb_user.user_id');
		 $this->db->where('tb_req_sertifikat.materi_id = tb_materi.materi_id');
		 $this->db->where('tb_req_sertifikat.materi_id', $materi_id);
         $this->db->where('tb_req_sertifikat.req_id', $req_id);
		 $this->db->where('tb_req_sertifikat.user_id', $user_id);
        $status = $this->db->get();
        return $status;
    
    }
	
	  public function getUserId($user_id){  
         $this->db->select('*');
         $this->db->from('tb_user'); 
		 $this->db->where('user_id' ,$user_id);
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


    public function updateSertifikat($where, $table, $data){
        $this->db->where($where);
		$this->db->update($table,$data);
    }
}