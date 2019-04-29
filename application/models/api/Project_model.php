<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Project_model extends CI_Model
{
    private $_table = "tb_project";

    public $project_id;
    public $user_id;
    public $materi_id;
    public $modul_id;
    public $project_nama;
   
    
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

             ['field' => 'project_nama',
            'label' => 'Nama Project',
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
        return $this->db->get_where($this->_table, ["project_id" => $id])->row();
    }

    public function add($data)
    {
		$this->db->insert('tb_project', $data);
			return true;
         }
	
	public function get_user_by_id($id){
		$query = $this->db->get_where('tb_project', array('project_id' => $id));
		return $result = $query->row_array();
	}
	
    public function update()
    {
        $post = $this->input->post();
        $this->project_id = $post("id");
        $this->materi_id= $post["materi_id"];
        $this->modul_id = $post["modul_id"];
        $this->project_nama = $post["project_nama"];
       
		$this->db->update($this->_table, $this, array('project_id' => $post['id']));
       
    }
	
	public function edit($data, $id){
			$this->db->where('project_id', $id);
			$this->db->update('tb_project', $data);
			return true;
		}

    public function delete($id)
    {
		$this-> _deleteImage($id);
        return $this->db->delete($this->_table, array("project_id" => $id));
    }


	public function toArray(){
		$qu1 = $this->db->query('SELECT * FROM '.$this->_table);
		$result =  $qu1->result_array();
		$arrReturn = array_values($result);
		return $arrReturn;
	}
}
