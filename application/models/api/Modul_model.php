<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Modul_model extends CI_Model
{
    private $_table = "tb_modul";

    public $materi_id;
    public $modul_id;
    public $modul_judul;
    
    public function rules()
    {
        return [
		

			['field' => 'materi_id',
            'label' => 'ID Materi',
            'rules' => 'required'],
			
            ['field' => 'modul_id',
            'label' => 'ID Modul',
            'rules' => 'required'],
			
			 ['field' => 'modul_judul',
            'label' => 'Judul Modul',
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
        return $this->db->get_where($this->_table, ["materi_id" => $id])->row();
    }

    public function add($data)
    {
		$this->db->insert('tb_modul', $data);
			return true;
         }
	
	public function get_materi_by_id($id){
		$query = $this->db->get_where('tb_modul', array('materi_id' => $id));
		return $result = $query->row_array();
	}
	
    public function update()
    {
        $post = $this->input->post();
        $this->materi_id = $post("id");
        $this->modul_id = $post["modul_id"];
		$this->modul_judul = $post["modul_judul"];

		$this->db->update($this->_table, $this, array('materi_id' => $post['id']));

    }
	
	public function edit($data, $id){
			$this->db->where('materi_id', $id);
			$this->db->update('tb_modul', $data);
			return true;
		}

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("materi_id" => $id));
    }
	
	public function toArray(){
		$qu1 = $this->db->query('SELECT * FROM '.$this->_table);
		$result =  $qu1->result_array();
		$arrReturn = array_values($result);
		return $arrReturn;
	}
}
