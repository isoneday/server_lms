<?php

class m_kelas extends CI_model{

	public function getKelas(){
       
        $this->db->select('*');
         $this->db->from('tb_jenis_kelas');
         $this->db->order_by('tb_jenis_kelas.jenis_kelas_id DESC');
        $status = $this->db->get();
        return $status;
    
    }
	
	  public function getKelasId($jenis_kelas_id){
       
        $this->db->select('*');
         $this->db->from('tb_jenis_kelas');
         $this->db->order_by('tb_jenis_kelas.jenis_kelas_id DESC');
         $this->db->where('tb_jenis_kelas.jenis_kelas_id', $jenis_kelas_id);
        $status = $this->db->get();
        return $status;
    
    }

      public function delete($tableName,$where){
		
        return $this->db->delete($tableName,$where);
		
    }


    public function updateKelas($where, $table, $data){
        $this->db->where($where);
		$this->db->update($table,$data);
    }
}