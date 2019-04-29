<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_materi extends CI_model {

    public function getIklan(){
        
        $iklan = $this->db->query('SELECT * FROM tb_iklan_materi;');
        return $iklan;
    }
    
    public function getMateriTerbaru(){
         $this->db->select('*');
         $this->db->from('tb_materi, tb_jenis_kelas');
        $this->db->where('tb_jenis_kelas.jenis_kelas_id=tb_materi.jenis_kelas_id');
        $this->db->order_by('tb_materi.materi_tgl DESC');
        $materi = $this->db->get();
        return $materi;
        
    }
    
    public function getMateriTerlaris(){
         $this->db->select('*');
         $this->db->from('tb_materi, tb_jenis_kelas');
        $this->db->where('tb_jenis_kelas.jenis_kelas_id=tb_materi.jenis_kelas_id');
        $this->db->order_by('tb_materi.materi_jum_siswa DESC');
        $materi = $this->db->get();
        return $materi;

    }

    public function getMateriGratis(){
         $this->db->select('*');
         $this->db->from('tb_materi, tb_jenis_kelas');
        $this->db->where('tb_jenis_kelas.jenis_kelas_id=tb_materi.jenis_kelas_id');
        $this->db->where('tb_materi.materi_harga',0);
        $this->db->order_by('tb_materi.materi_jum_siswa DESC');
        $materi = $this->db->get();
        return $materi;

    }
    
    public function getMateri($id){
         $this->db->select('*');
         $this->db->from('tb_materi, tb_jenis_kelas, tb_mitra');
         $this->db->where('tb_jenis_kelas.jenis_kelas_id=tb_materi.jenis_kelas_id');
         $this->db->where('tb_materi.mitra_id=tb_mitra.mitra_id');
         $this->db->where('tb_materi.materi_id', $id);
        $materi = $this->db->get();
        return $materi;

    }
    
    function search($keyword){
        $this->db->select('*'); 
        $this->db->from('tb_materi, tb_jenis_kelas');
        $this->db->where('tb_jenis_kelas.jenis_kelas_id=tb_materi.jenis_kelas_id');
        $this->db->like('tb_materi.materi_nama', $keyword);
        return $this->db->get();
    }
    
    function getPembayaran($user_id){
         $this->db->select('*');
         $this->db->from('tb_pembayaran, tb_materi, tb_user');
         $this->db->where('tb_pembayaran.materi_id=tb_materi.materi_id');
         $this->db->where('tb_pembayaran.user_id=tb_user.user_id');
         $this->db->where('tb_pembayaran.user_id', $user_id);
        $materi = $this->db->get();
        return $materi;

    }
    
    function getStatusPembayaran($user_id, $materi_id){
         $this->db->select('*');
         $this->db->from('tb_pembayaran');
         $this->db->where('user_id', $user_id);
         $this->db->where('materi_id', $materi_id);
        $materi = $this->db->get();
        return $materi;

    }
    
    function getDetailPembayaran($user_id, $materi_id){
         $this->db->select('*');
         $this->db->from('tb_pembayaran, tb_materi, tb_user');
         $this->db->where('tb_pembayaran.materi_id=tb_materi.materi_id');
         $this->db->where('tb_pembayaran.user_id=tb_user.user_id');
         $this->db->where('tb_pembayaran.user_id', $user_id);
         $this->db->where('tb_pembayaran.materi_id', $materi_id);
        $materi = $this->db->get();
        return $materi;

    }
    
    function updatePembayaran($where, $table, $data){
        $this->db->where($where);
	$this->db->update($table,$data);
    }

    public function totSiswa($materi_id){
         $this->db->select('*');
         $this->db->from('tb_belajar');
         $this->db->where('materi_id', $materi_id);
         $materi = $this->db->get();
         
        if($materi->num_rows()>0){
          return $materi->num_rows();
        }
        else{
          return 0;
        }
          
    }
    
}