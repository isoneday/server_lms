<?php

class m_modul extends CI_model{

	public function getModul(){
       
        $this->db->select('*');
         $this->db->from('tb_modul, tb_materi');
         $this->db->where('tb_modul.materi_id = tb_materi.materi_id');
         $this->db->order_by('tb_modul.modul_id DESC');
        $status = $this->db->get();
        return $status;
    
    }
	
	  public function getModulId($modul_id){
       
        $this->db->select('*');
		 $this->db->from('tb_modul, tb_materi');
         $this->db->where('tb_modul.materi_id = tb_materi.materi_id');
         $this->db->where('tb_modul.modul_id', $modul_id);
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


    public function updateModul($where, $table, $data){
        $this->db->where($where);
		$this->db->update($table,$data);
    }
}