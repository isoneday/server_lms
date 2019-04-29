<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas_model extends CI_Model
{
    private $_table = "tb_jenis_kelas";

    public $jenis_kelas_id;
	public $jenis_kelas_nama;
	public $jenis_kelas_deskripsi;
    
    public function rules()
    {
        return [
            ['field' => 'jenis_kelas_id',
            'label' => 'ID Kelas',
            'rules' => 'required'],
			
			['field' => 'jenis_kelas_nama',
            'label' => 'Nama Kelas',
            'rules' => 'required'],
			
			['field' => 'jenis_kelas_deskripsi',
            'label' => 'Deskripsi Kelas',
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
        return $this->db->get_where($this->_table, ["jenis_kelas_id" => $id])->row();
    }

    public function add($data)
    {
        /*$post = $this->input->post();
        $this->belajar_id = uniqid();
        $this->user_id = $post["user_id"];
        $this->materi_id = $post["materi_id"];
        $this->belajar_deadline = $post["belajar_deadline"];
        $this->belajar_status = $post["belaja_status"];
        $this->last_seen = $post["last_seen"];
		*/
       // $this->db->insert($this->_table, $this);
		$this->db->insert('tb_jenis_kelas', $data);
			return true;
         }
	
	public function get_kelas_by_id($id){
		$query = $this->db->get_where('tb_jenis_kelas', array('jenis_kelas_id' => $id));
		return $result = $query->row_array();
	}
	
    public function update()
    {
        $post = $this->input->post();
        $this->jenis_kelas_id = $post("id");
        $this->jenis_kelas_nama = $post["jenis_kelas_nama"];
        $this->jenis_kelas_deskripsi = $post["jenis_kelas_deskripsi"];
     
        $this->db->update($this->_table, $this, array('jenis_kelas_id' => $post['id']));
    }
	
	public function edit($data, $id){
			$this->db->where('jenis_kelas_id', $id);
			$this->db->update('tb_jenis_kelas', $data);
			return true;
		}

    public function delete($id)
    {
		
        return $this->db->delete($this->_table, array("jenis_kelas_id" => $id));
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