<?php

class m_materi extends CI_model{

	public function getMateri(){
       
        $this->db->select('*');
         $this->db->from('tb_materi, tb_jenis_kelas, tb_mitra');
         $this->db->where('tb_materi.jenis_kelas_id = tb_jenis_kelas.jenis_kelas_id');
         $this->db->where('tb_materi.mitra_id = tb_mitra.mitra_id');
         $this->db->order_by('tb_materi.materi_id DESC');
        $status = $this->db->get();
        return $status;
    
    }

    public function getJenisKelas(){  
         $this->db->select('*');
         $this->db->from('tb_jenis_kelas'); 
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

    public function getMateriId($materi_id){
       
        $this->db->select('*');
         $this->db->from('tb_materi, tb_jenis_kelas, tb_mitra');
         $this->db->where('tb_materi.jenis_kelas_id = tb_jenis_kelas.jenis_kelas_id');
         $this->db->where('tb_materi.mitra_id = tb_mitra.mitra_id');
         $this->db->where('tb_materi.materi_id', $materi_id);
        $status = $this->db->get();
        return $status;
    
    }

    public function updateMateri($where, $table, $data){
        $this->db->where($where);
    $this->db->update($table,$data);
    }
}