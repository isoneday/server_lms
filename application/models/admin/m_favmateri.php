<?php

class m_favmateri extends CI_model{

	public function getFavMateri(){
       
        $this->db->select('*');
         $this->db->from('tb_materi, tb_user, tb_fav_materi');
         $this->db->where('tb_fav_materi.materi_id = tb_materi.materi_id');
		 $this->db->where('tb_fav_materi.user_id = tb_user.user_id');
         $this->db->order_by('tb_fav_materi.fav_id DESC');
        $status = $this->db->get();
        return $status;
    }

      public function delete($tableName,$where){
		
        return $this->db->delete($tableName,$where);
		
    }

    public function getFavMateriId($fav_id){
       
        $this->db->select('*');
         $this->db->from('tb_materi, tb_user, tb_fav_materi');
         $this->db->where('tb_fav_materi.materi_id = tb_materi.materi_id');
		 $this->db->where('tb_fav_materi.user_id = tb_user.user_id');
         $this->db->where('tb_fav_materi.fav_id', $fav_id);
        $status = $this->db->get();
        return $status;
    
    }

}