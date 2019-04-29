<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Productfavorit_model extends CI_Model
{
    private $_table = "tb_user";

    public $user_id;
    public $user_name;
    public $user_email;
    public $user_password;
    public $user_image = "default.jpg";
    public $user_date;
    public $user_asal;
    public $user_xp;
    
    public function rules()
    {
        return [
            ['field' => 'user_name',
            'label' => 'Nama User',
            'rules' => 'required'],

            ['field' => 'user_email',
            'label' => 'Email User',
			'rules' => 'required'],

            ['field' => 'user_password',
            'label' => 'Password User',
            'rules' => 'required'],

            ['field' => 'user_image',
            'label' => 'Gambar User'],

            ['field' => 'user_date',
            'label' => 'Tanggal',
            'rules' => 'numeric'],

             ['field' => 'user_asal',
            'label' => 'Asal User',
            'rules' => 'required'],

            ['field' => 'user_xp',
            'label' => 'XP User',
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
        return $this->db->get_where($this->_table, ["user_id" => $id])->row();
    }

	public function get_user_by_id($id){
		$query = $this->db->get_where('tb_user', array('user_id' => $id));
		return $result = $query->row_array();
	}
	
    public function delete($id)
    {
		$this-> _deleteImage($id);
        return $this->db->delete($this->_table, array("user_id" => $id));
    }
	
	private function _uploadImage()
	{
    $config['upload_path']          = './upload/user/';
    $config['allowed_types']        = 'gif|jpg|png';
    $config['file_name']            = $this->user_id;
    $config['overwrite']			= true;
    $config['max_size']             = 1024; // 1MB
    // $config['max_width']            = 1024;
    // $config['max_height']           = 768;

    $this->load->library('upload', $config);

    if ($this->upload->do_upload('user_image')) {
        return $this->upload->data("file_name");
    }
    
    return "default.jpg";
	}
	
	private function _deleteImage($id)
	{
    $user = $this->getById($id);
    if ($user->user_image != "default.jpg") {
	    $filename = explode(".", $user->user_image)[0];
		return array_map('unlink', glob(FCPATH."upload/user/$filename.*"));
    }
	}
}