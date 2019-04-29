<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Progressmodul_model extends CI_Model
{
    private $_table = "tb_progress_modul";

    public $progress_id;
    public $user_id;
    public $materi_id;
    public $modul_id;
    public $status;
   
    
    public function rules()
    {
        return [
            ['field' => 'user_id',
            'label' => 'ID User',
            'rules' => 'required'],

            ['field' => 'materi_id',
            'label' => 'ID Materi',
            'rules' => 'required'],
			
			['field' => 'modul_id',
            'label' => 'ID Modul',
            'rules' => 'required'],

             ['field' => 'status',
            'label' => 'Status Modul',
            'rules' => 'required'],

        ];
    }

    public function getAll()
    {
//        return $this->db->get($this->_table)->result();
        return $this->db->get($this->_table);
    }

	public function getAllField()
	{
		return $this->db->list_fields($this->_table);
	}

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["progress_id" => $id])->row();
    }

    public function add($data)
    {
		$this->db->insert('tb_progress_modul', $data);
			return true;
         }
	
	public function get_user_by_id($id){
		$query = $this->db->get_where('tb_progress_modul', array('progress_id' => $id));
		return $result = $query->row_array();
	}
	
    public function update()
    {
        $post = $this->input->post();
        $this->progress_id = $post("id");
        $this->materi_id= $post["materi_id"];
        $this->modul_id = $post["modul_id"];
        $this->status = $post["status"];
       
		$this->db->update($this->_table, $this, array('progress_id' => $post['id']));
       
    }
	
	public function edit($data, $id){
			$this->db->where('progress_id', $id);
			$this->db->update('tb_progress_modul', $data);
			return true;
		}

    public function delete($id)
    {
		$this-> _deleteImage($id);
        return $this->db->delete($this->_table, array("progress_id" => $id));
    }
	
	private function _uploadImage()
	{
    $config['upload_path']          = './upload/progressmodul/';
    $config['allowed_types']        = 'gif|jpg|png';
    $config['file_name']            = $this->progress_id;
    $config['overwrite']			= true;
    $config['max_size']             = 1024; // 1MB
    // $config['max_width']            = 1024;
    // $config['max_height']           = 768;

    $this->load->library('upload', $config);

    if ($this->upload->do_upload('materi_gambar')) {
        return $this->upload->data("file_name");
    }
    
    return "default.jpg";
	}

	public function toArray(){
		$qu1 = $this->db->query('SELECT * FROM '.$this->_table);
		$result =  $qu1->result_array();
		$arrReturn = array_values($result);
		return $arrReturn;
	}
}
