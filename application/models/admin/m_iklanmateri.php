<?php

class m_iklanmateri extends CI_model{

	public function getIklanMateri(){
       
        $this->db->select('*');
         $this->db->from('tb_iklan_materi, tb_mitra, tb_materi');
        $this->db->where('tb_iklan_materi.mitra_id = tb_mitra.mitra_id');
		 $this->db->where('tb_iklan_materi.materi_id = tb_materi.materi_id');
        
         $this->db->order_by('tb_iklan_materi.iklan_m_id DESC');
        $status = $this->db->get();
        return $status;
    
    }

	  public function getIklanMateriId($iklan_m_id){
       
        $this->db->select('*');
        $this->db->from('tb_iklan_materi, tb_mitra, tb_materi');
         $this->db->where('tb_iklan_materi.mitra_id = tb_mitra.mitra_id');
		 $this->db->where('tb_iklan_materi.materi_id = tb_materi.materi_id');
         $this->db->where('tb_iklan_materi.iklan_m_id', $iklan_m_id);
        $status = $this->db->get();
        return $status;
    
    }
    public function getMitra(){  
         $this->db->select('*');
         $this->db->from('tb_mitra'); 
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

 
    public function updateIklanMateri($where, $table, $data){
        $this->db->where($where);
    $this->db->update($table,$data);
    }
}