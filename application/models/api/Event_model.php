<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Event_model extends CI_Model
{
    private $_table = "tb_event";

    public $event_id;
    public $event_nama;
	public $event_tgl_mulai;
	public $event_tgl_selesai;
	public $event_kuota;
	public $event_kota;
	public $event_jenis;
    public $event_deskripsi;
    public $event_gambar = "default.jpg";
    public $event_xp;
    public $mitra_id;
   
    public function rules()
    {
        return [
            ['field' => 'event_nama',
            'label' => 'Nama Event',
            'rules' => 'required'],
			
			['field' => 'event_tgl_mulai',
            'label' => 'Tanggal Mulai Event',
            'rules' => 'required'],
			
			['field' => 'event_tgl_selesai',
            'label' => 'Tanggal Selesai Event',
            'rules' => 'required'],
			
			['field' => 'event_kuota',
            'label' => 'Kuota Event',
            'rules' => 'required'],
			
			['field' => 'event_kota',
            'label' => 'Kota Event',
            'rules' => 'required'],
			
			['field' => 'event_jenis',
            'label' => 'Jenis Event',
            'rules' => 'required'],

            ['field' => 'event_deskripsi',
            'label' => 'Deskripsi Materi'],

             ['field' => 'event_XP',
            'label' => 'XP Event',
            'rules' => 'required'],

            ['field' => 'mitra_id',
            'label' => 'ID Mitra',
            'rules' => 'numeric'],
			
			 ['field' => 'event_video',
            'label' => 'Video Event',
            'rules' => 'required'],

			 ['field' => 'event_alamat',
            'label' => 'Alamat Event',
            'rules' => 'required'],
			
			 ['field' => 'event_tiket',
            'label' => 'Tiket Event',
            'rules' => 'required'],


        ];
    }

    public function getAll()
    {
//        return $this->db->get($this->_table)->result();
        return $this->db->get($this->_table);
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["event_id" => $id])->row();
    }

    public function add($data)
    {
        /*$post = $this->input->post();
        $this->materi_id = uniqid();
        $this->materi_nama = $post["materi_nama"];
        $this->materi_deskripsi = $post["materi_deskripsi"];
        $this->materi_platform = $post["materi_platform"];
        $this->jenis_kelas_id = $post["jenis_kelas_id"];
        $this->materi_harga = $post["materi_harga"];
        $this->materi_diskon = $post["materi_diskon"];
        $this->materi_xp = $post["materi_xp"];
        $this->materi_rating = $post["materi_rating"];
        $this->materi_jml_modul = $post["materi_jml_modul"];
        $this->mitra_id = $post["mitra_id"];
        $this->materi_waktu = $post["materi_waktu"];
        $this->materi_deadline = $post["materi_deadline"];
        $this->materi_level = $post["materi_level"];
        $this->materi_tgl = $post["materi_tgl"];
        $this->materi_jum_siswa = $post["materi_jum_siswa"];
		*/
       // $this->db->insert($this->_table, $this);
		$this->db->insert('tb_event', $data);
			return true;
         }
	
	public function get_event_by_id($id){
		$query = $this->db->get_where('tb_event', array('event_id' => $id));
		return $result = $query->row_array();
	}
	
    public function update()
    {
        $post = $this->input->post();
        $this->event_id = $post("id");
        $this->event_nama = $post["event_nama"];
		$this->event_tgl_mulai = $post["event_tgl_mulai"];
		$this->event_tgl_selesai = $post["event_tgl_selesai"];
		$this->event_kuota = $post["event_kuota"];
		$this->event_kota = $post["event_kota"];
		$this->event_jenis = $post["event_jenis"];
        $this->event_deskripsi = $post["event_deskripsi"];
        $this->event_gambar = $post["event_gambar"];
        $this->event_xp = $post["event_xp"];
        $this->mitra_id = $post["mitra_id"];
        $this->event_video = $post["event_video"];
		$this->event_tiket = $post["event_tiket"];
		
		if (!empty($_FILES["event_gambar"]["name"])) {
		$this->image = $this->_uploadImage();
		} else {
		$this->image = $post["old_image"];
		}
        $this->db->update($this->_table, $this, array('event_id' => $post['id']));
    }
	
	public function edit($data, $id){
			$this->db->where('event_id', $id);
			$this->db->update('tb_event', $data);
			return true;
		}

    public function delete($id)
    {
		$this-> _deleteImage($id);
        return $this->db->delete($this->_table, array("event_id" => $id));
    }
	
	private function _uploadImage()
	{
    $config['upload_path']          = './upload/event/';
    $config['allowed_types']        = 'gif|jpg|png';
    $config['file_name']            = $this->event_id;
    $config['overwrite']			= true;
    $config['max_size']             = 1024; // 1MB
    // $config['max_width']            = 1024;
    // $config['max_height']           = 768;

    $this->load->library('upload', $config);

    if ($this->upload->do_upload('event_gambar')) {
        return $this->upload->data("file_name");
    }
    
    return "default.jpg";
	}
	
	private function _deleteImage($id)
	{
    $product = $this->getById($id);
    if ($event->event_gambar != "default.jpg") {
	    $filename = explode(".", $event->event_gambar)[0];
		return array_map('unlink', glob(FCPATH."upload/event/$filename.*"));
    }
	}
	
	public function toArray(){
		$qu1 = $this->db->query('SELECT * FROM '.$this->_table);
		$result =  $qu1->result_array();
		$arrReturn = array_values($result);
		return $arrReturn;
	}
	
	public function getAllField()
	{
		return $this->db->list_fields($this->_table);
	}
}