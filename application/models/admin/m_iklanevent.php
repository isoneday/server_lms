<?php

class m_iklanevent extends CI_model{

	public function getIklanEvent(){
       
        $this->db->select('*');
         $this->db->from('tb_iklan_event, tb_event, tb_mitra');
         $this->db->where('tb_iklan_event.event_id = tb_event.event_id');
		  $this->db->where('tb_iklan_event.mitra_id = tb_mitra.mitra_id');
         $this->db->order_by('tb_iklan_event.iklan_e_id DESC');
        $status = $this->db->get();
        return $status;
    
    }
	
	  public function getIklanEventId($iklan_e_id){
       
        $this->db->select('*');
         $this->db->from('tb_iklan_event, tb_event, tb_mitra');
         $this->db->where('tb_iklan_event.event_id = tb_event.event_id');
		  $this->db->where('tb_iklan_event.mitra_id = tb_mitra.mitra_id');
         $this->db->where('tb_iklan_event.iklan_e_id', $iklan_e_id);
        $status = $this->db->get();
        return $status;
    
    }

    public function getEvent(){  
         $this->db->select('*');
         $this->db->from('tb_event'); 
        $status = $this->db->get();
        return $status;
    }
	
	  public function getMitra(){  
         $this->db->select('*');
         $this->db->from('tb_mitra'); 
        $status = $this->db->get();
        return $status;
    }

      public function delete($tableName,$where){
		
        return $this->db->delete($tableName,$where);
		
    }


    public function updateIklanEvent($where, $table, $data){
        $this->db->where($where);
		$this->db->update($table,$data);
    }
}