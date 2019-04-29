<?php

class m_mitra extends CI_model{

	public function getMitra(){
       
        $this->db->select('*');
         $this->db->from('tb_mitra');
         $this->db->order_by('tb_mitra.mitra_id DESC');
        $status = $this->db->get();
        return $status;
    
    }
	
	  public function getMitraId($mitra_id){
       
       $this->db->select('*');
         $this->db->from('tb_mitra');
         $this->db->where('tb_mitra.mitra_id', $mitra_id);
        $status = $this->db->get();
        return $status;
    
    }

      public function delete($tableName,$where){
		
        return $this->db->delete($tableName,$where);
		
    }


    public function updateMitra($where, $table, $data){
        $this->db->where($where);
		$this->db->update($table,$data);
    }
}