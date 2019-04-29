<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_event extends CI_model {

    public function getIklan(){
        
        $iklan = $this->db->query('SELECT * FROM tb_iklan_event;');
        return $iklan;
    }
    
    public function getEventTerbaru(){
         $this->db->select('*');
         $this->db->from('tb_event, tb_mitra');
        $this->db->where('tb_event.mitra_id=tb_mitra.mitra_id');
        $this->db->order_by('tb_event.event_tgl_mulai DESC');
        $event = $this->db->get();
        return $event;
        
    }
    
    public function getEventKota(){
         $this->db->select('*');
         $this->db->from('tb_event, tb_mitra');
        $this->db->where('tb_event.mitra_id=tb_mitra.mitra_id');
        $this->db->order_by('tb_event.event_kota ASC');
        $event = $this->db->get();
        return $event;
        
    }
    
    public function getEvent($id){
         $this->db->select('*');
         $this->db->from('tb_event, tb_mitra');
        $this->db->where('tb_event.mitra_id=tb_mitra.mitra_id');
         $this->db->where('tb_event.event_id', $id);
        $event = $this->db->get();
        return $event;

    }
    
    public function searchEvent($keyword){
        $this->db->select('*'); 
         $this->db->from('tb_event, tb_mitra');
        $this->db->where('tb_event.mitra_id=tb_mitra.mitra_id');
        $this->db->like('tb_event.event_nama', $keyword);
        return $this->db->get();
    }
    
    public function getJoinEvent($event_id, $user_id){
        $this->db->select('*'); 
         $this->db->from('tb_join_event');
        $this->db->where('event_id', $event_id);
        $this->db->where('user_id', $user_id);
        return $this->db->get();
    }
    
    function updateKuota($where, $table, $data){
        $this->db->where($where);
	$this->db->update($table,$data);
    }
}