<?php

class m_project extends CI_model{

	public function getProject(){
       
        $this->db->select('*');
         $this->db->from('tb_project, tb_user, tb_materi, tb_modul');
         $this->db->where('tb_project.user_id = tb_user.user_id');
		 $this->db->where('tb_project.materi_id = tb_materi.materi_id');
		 $this->db->where('tb_project.modul_id = tb_modul.modul_id');
        
         $this->db->order_by('tb_project.project_id DESC');
        $status = $this->db->get();
        return $status;
    
    }

	  public function getProjectId($project_id){
       
        $this->db->select('*');
         $this->db->from('tb_project, tb_user, tb_materi, tb_modul');
         $this->db->where('tb_project.user_id = tb_user.user_id');
		 $this->db->where('tb_project.materi_id = tb_materi.materi_id');
		 $this->db->where('tb_project.modul_id = tb_modul.modul_id');
         $this->db->where('tb_project.project_id', $project_id);
        $status = $this->db->get();
        return $status;
    
    }
    public function getUser(){  
         $this->db->select('*');
         $this->db->from('tb_user'); 
        $status = $this->db->get();
        return $status;
    }
	
	public function getMateri(){  
         $this->db->select('*');
         $this->db->from('tb_materi'); 
        $status = $this->db->get();
        return $status;
    }
	
	public function getModul(){  
         $this->db->select('*');
         $this->db->from('tb_modul'); 
        $status = $this->db->get();
        return $status;
    }


    
}