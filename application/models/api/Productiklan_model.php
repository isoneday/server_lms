<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Productiklan_model extends CI_Model
{
    private $_table = "tb_iklan_materi";

    public $iklan_m_id;
    public $iklan_m_gambar;
    public $mitra_id;
    public $materi_id;
	public $iklan_tgl_mulai;
	public $iklan_tgl_selesai;
    
    public function rules()
    {
        return [
            ['field' => 'iklan_m_gambar',
            'label' => 'Gambar Iklan Materi',
            'rules' => 'required'],
			
			['field' => 'mitra_id',
            'label' => 'ID Mitra',
            'rules' => 'required'],
			
			['field' => 'materi_id',
            'label' => 'ID Materi',
            'rules' => 'required'],
			
			['field' => 'iklan_tgl_mulai',
            'label' => 'Tanggal Mulai Iklan Materi',
            'rules' => 'required'],
			
			['field' => 'iklan_tgl_selesai',
            'label' => 'Tanggal Selesai Iklan Materi',
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
        return $this->db->get_where($this->_table, ["iklan_m_id" => $id])->row();
    }

    public function add($data)
    {
        /*$post = $this->input->post();
        $this->materi_id = uniqid();
        $this->materi_nama = $post["materi_nama"];
        $this->materi_deskripsi = $post["materi_deskripsi"];
        $this->materi_platform = $post["materi_platform"];
		$this->materi_gambar = $this->_uploadImage();
		$this->materi_gambar = $post["materi_gambar"];
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
		$this->db->insert('tb_iklan_materi', $data);
			return true;
         }
	
	function getmateriiklan($mitra_id, $materi_id) {
		$this->db->select('*');
		$this->db->from('tb_iklan_materi, tb_mitra, tb_materi');
		$this->db->where('tb_iklan_materi, tb_mitra, tb_materi');
		$this->db->where('tb_iklan_materi.mitra_id = tb_mitra.mitra_id');
		$this->db->where('tb_iklan_materi.materi_id = tb_materi.mitra_id');
		$this->db->where('tb_iklan_materi.mitra_id', $mitra_id);
		$this->db->where('tb_iklan_materi.materi_id', $materi_id);
		$materi = $this->db->get();
		return $materi;
	}
		
	//public function get_iklan_by_id($id){
		//$query = $this->db->get_where('tb_iklan_materi', array('iklan_m_id' => $id));
		//return $result = $query->row_array();
	//}
	
    public function update()
    {
        $post = $this->input->post();
        $this->iklan_m_id = $post("id");
		if (!empty($_FILES["iklan_m_gambar"]["name"])) {
		$this->iklan_m_gambar = $this->_uploadImage();
		} else {
		$this->iklan_m_gambar = $post["old_image"];
		}
       
        $this->mitra_id = $post["mitra_id"];
        $this->materi_id = $post["materi_id"];
        $this->iklan_tgl_mulai = $post["iklan_tgl_mulai"];
        $this->iklan_tgl_selesai = $post["iklan_tgl_selesai"];
		
		$this->db->update($this->_table, $this, array('iklan_m_id' => $post['id']));
       
    }
	
	public function edit($data, $id){
			$this->db->where('iklan_m_id', $id);
			$this->db->update('tb_iklan_materi', $data);
			return true;
		}

    public function delete($id)
    {
		$this-> _deleteImage($id);
        return $this->db->delete($this->_table, array("iklan_m_id" => $id));
    }
	
	private function _uploadImage()
	{
    $config['upload_path']          = './upload/productiklan/';
    $config['allowed_types']        = 'gif|jpg|png';
    $config['file_name']            = $this->iklan_m_id;
    $config['overwrite']			= true;
    $config['max_size']             = 1024; // 1MB
    // $config['max_width']            = 1024;
    // $config['max_height']           = 768;

    $this->load->library('upload', $config);

    if ($this->upload->do_upload('iklan_m_gambar')) {
        return $this->upload->data("file_name");
    }
    
    return "default.jpg";
	}
	
	private function _deleteImage($id)
	{
    $productiklan = $this->getById($id);
    if ($productiklan->iklan_m_gambar != "default.jpg") {
	    $filename = explode(".", $productiklan->iklan_m_gambar)[0];
		return array_map('unlink', glob(FCPATH."upload/productiklan/$filename.*"));
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