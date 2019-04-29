<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Content_model extends CI_Model
{
    private $_table = "tb_content";

    public $content_urutan;
    public $modul_id;
    public $modul_tipe;
    public $content_isi;

    
    public function rules()
    {
        return [
            ['field' => 'modul_id',
            'label' => 'ID Modul',
            'rules' => 'required'],

            ['field' => 'modul_tipe',
            'label' => 'Tipe Modul',
            'rules' => 'required'],

             ['field' => 'content_isi',
            'label' => 'Isi Content',
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
        return $this->db->get_where($this->_table, ["content_urutan" => $id])->row();
    }

    public function add($data)
    {
		$this->db->insert('tb_content', $data);
			return true;
         }
	
	public function get_content_by_id($id){
		$query = $this->db->get_where('tb_content', array('content_urutan' => $id));
		return $result = $query->row_array();
	}
	
    public function update()
    {
        $post = $this->input->post();
        $this->content_urutan = $post("id");
        $this->modul_id = $post["modul_id"];
        $this->modul_tipe = $post["modul_tipe"];
        $this->content_isi = $post["content_isi"];
		
		$this->db->update($this->_table, $this, array('content_urutan' => $post['id']));
       
    }
	
	public function edit($data, $id){
			$this->db->where('content_urutan', $id);
			$this->db->update('tb_content', $data);
			return true;
		}

    public function delete($id)
    {
		$this-> _deleteImage($id);
        return $this->db->delete($this->_table, array("content_urutan" => $id));
    }
	
	

	public function toArray(){
		$qu1 = $this->db->query('SELECT * FROM '.$this->_table);
		$result =  $qu1->result_array();
		$arrReturn = array_values($result);
		return $arrReturn;
	}
}
