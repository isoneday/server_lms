<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_modul extends CI_model {

    public function getModul($id){
         $this->db->select('*');
         $this->db->from('tb_modul');
         $this->db->where('materi_id', $id);
        $modul = $this->db->get();
        return $modul;

    }
    
    public function getContent($modul_id){
         $this->db->select('*');
         $this->db->from('tb_content');
         $this->db->where('modul_id', $modul_id);
         $this->db->order_by('content_urutan ASC');
        $content = $this->db->get();
        return $content;

    }
}
