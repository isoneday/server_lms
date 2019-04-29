<?php

class m_content extends CI_model{

	public function getContent(){
       
        $this->db->select('*');
         $this->db->from('tb_content, tb_modul');
         $this->db->where('tb_content.modul_id = tb_modul.modul_id');
         $this->db->order_by('tb_content.content_urutan DESC');
        $status = $this->db->get();
        return $status;
    
    }
	
	  public function getContentId($content_urutan){
       
        $this->db->select('*');
         $this->db->from('tb_content, tb_modul');
         $this->db->where('tb_content.modul_id = tb_modul.modul_id');
         $this->db->where('tb_content.content_urutan', $content_urutan);
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


    public function updateContent($where, $table, $data){
        $this->db->where($where);
		$this->db->update($table,$data);
    }
}