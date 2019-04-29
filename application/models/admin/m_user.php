<?php

class m_user extends CI_model{

	public function getUser(){
       
     
		 $this->db->select('*');
         $this->db->from('tb_user');
         $this->db->order_by('tb_user.user_id DESC');
        $status = $this->db->get();
        return $status;
		
      
    
    }

	  public function getUserId($user_id){
		 $this->db->select('*');
         $this->db->from('tb_user');
         $this->db->where('tb_user.user_id', $user_id);
        $status = $this->db->get();
        return $status;
    
    }
  
      public function delete($tableName,$where){
		
        return $this->db->delete($tableName,$where);
		
    }

  

    public function updateUser($where, $table, $data){
        $this->db->where($where);
    $this->db->update($table,$data);
    }
}