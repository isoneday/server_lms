<?php

class m_event extends CI_model{

	public function getEvent(){
       
        $this->db->select('*');
         $this->db->from('tb_event, tb_mitra');
         $this->db->where('tb_event.mitra_id = tb_mitra.mitra_id');
         $this->db->order_by('tb_event.event_id DESC');
        $status = $this->db->get();
        return $status;
    
    }
	
	  public function getEventId($event_id){
       
        $this->db->select('*');
         $this->db->from('tb_event, tb_mitra');
         $this->db->where('tb_event.mitra_id = tb_mitra.mitra_id');
         $this->db->where('tb_event.event_id', $event_id);
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


    public function updateEvent($where, $table, $data){
        $this->db->where($where);
		$this->db->update($table,$data);
    }
}