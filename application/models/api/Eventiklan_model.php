<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Eventiklan_model extends CI_Model
{
    private $_table = "tb_iklan_event";

    public $iklan_e_id;
    public $iklan_e_gambar;
    public $iklan_e_tgl_mulai;
    public $iklan_e_tgl_selesai;
    public $event_id;
    public $mitra_id;

    public function rules()
    {
        return [
            ['field' => 'iklan_e_gambar',
            'label' => 'Gambar Iklan Event',
            'rules' => 'required'],

            ['field' => 'iklan_e_tgl_mulai',
            'label' => 'Tanggal Mulai Iklan Event',
			'rules' => 'required'],
			
			 ['field' => 'iklan_e_tgl_selesai',
            'label' => 'Tanggal Selesai Iklan Event',
			'rules' => 'required'],
			
            ['field' => 'event_id',
            'label' => 'ID Event',
            'rules' => 'required'],

            ['field' => 'mitra_id',
            'label' => 'ID Mitra ',
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
        return $this->db->get_where($this->_table, ["iklan_e_id" => $id])->row();
    }

    public function add($data)
    {
        /*$post = $this->input->post();
        $this->iklan_e_id = uniqid();
		$this->iklan_e_gambar = $post["iklan_e_gambar"];
        $this->iklan_e_tgl_mulai = $post["iklan_e_tgl_mulai"];
        $this->iklan_e_tgl_selesai = $post["iklan_e_tgl_selesai"];
        $this->event_id = $post["event_id"];
        $this->mitra_id = $post["mitra_id"];
		*/
       // $this->db->insert($this->_table, $this);
		$this->db->insert('tb_iklan_event', $data);
			return true;
         }
	
	public function get_iklan_e_by_id($id){
		$query = $this->db->get_where('tb_iklan_event', array('iklan_e_id' => $id));
		return $result = $query->row_array();
	}
	
    public function update()
    {
        $post = $this->input->post();
        $this->iklan_e_id = $post("id");
		if (!empty($_FILES["iklan_e_gambar"]["name"])) {
		$this->iklan_e_gambar = $this->_uploadImage();
		} else {
		$this->iklan_e_gambar = $post["old_image"];
		}
        $this->iklan_e_tgl_mulai = $post["iklan_e_tgl_mulai"];
        $this->iklan_e_tgl_selesai = $post["iklan_e_tgl_selesai"];
        $this->event_id = $post["event_id"];
		$this->mitra_id = $post["mitra_id"];
		
		$this->db->update($this->_table, $this, array('iklan_e_id' => $post['id']));
       
    }
	
	public function edit($data, $id){
			$this->db->where('iklan_e_id', $id);
			$this->db->update('tb_iklan_event', $data);
			return true;
		}

    public function delete($id)
    {
		$this-> _deleteImage($id);
        return $this->db->delete($this->_table, array("iklan_e_id" => $id));
    }
	
	private function _uploadImage()
	{
    $config['upload_path']          = './upload/eventiklan/';
    $config['allowed_types']        = 'gif|jpg|png';
    $config['file_name']            = $this->iklan_e_id;
    $config['overwrite']			= true;
    $config['max_size']             = 1024; // 1MB
    // $config['max_width']            = 1024;
    // $config['max_height']           = 768;

    $this->load->library('upload', $config);

    if ($this->upload->do_upload('iklan_e_id')) {
        return $this->upload->data("file_name");
    }
    
    return "default.jpg";
	}
	
	private function _deleteImage($id)
	{
    $eventiklan = $this->getById($id);
    if ($eventiklan->iklan_e_gambar!= "default.jpg") {
	    $filename = explode(".", $eventiklan->iklan_e_gambar)[0];
		return array_map('unlink', glob(FCPATH."upload/eventiklan/$filename.*"));
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