<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Mitra_model extends CI_Model
{
    private $_table = "tb_mitra";

    public $mitra_id;
	public $mitra_nama;
	public $mitra_alamat;
	public $mitra_email;
	public $mitra_nohp;
	public $mitra_website;
	public $mitra_gambar;
	public $jenis_kelas_deskripsi;
    
    public function rules()
    {
        return [
            ['field' => 'mitra_id',
            'label' => 'ID Mitra',
            'rules' => 'required'],
			
			['field' => 'mitra_nama',
            'label' => 'Nama Mitra',
            'rules' => 'required'],
			
			['field' => 'mitra_alamat',
            'label' => 'Alamat Mitra',
            'rules' => 'required'],
			
			['field' => 'mitra_email',
            'label' => 'Email Mitra',
            'rules' => 'required'],
			
			['field' => 'mitra_nohp',
            'label' => 'No.Hp Mitra',
            'rules' => 'required'],
			
			['field' => 'mitra_website',
            'label' => 'Nama Mitra',
            'rules' => 'required'],
			
			['field' => 'mitra_gambar',
            'label' => 'Gambar Mitra',
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
        return $this->db->get_where($this->_table, ["mitra_id" => $id])->row();
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
		$this->db->insert('tb_mitra', $data);
			return true;
         }
	
	public function get_mitra_by_id($id){
		$query = $this->db->get_where('tb_mitra', array('mitra_id' => $id));
		return $result = $query->row_array();
	}
	
    public function update()
    {
        $post = $this->input->post();
        $this->mitra_id = $post("id");
        $this->mitra_nama = $post["mitra_nama"];
		$this->mitra_alamat = $post["mitra_alamat"];
		$this->mitra_email = $post["mitra_email"];
		$this->mitra_nobp = $post["mitra_nobp"];
		$this->mitra_gambar = $post["mitra_gambar"];
       
     
        $this->db->update($this->_table, $this, array('mitra_id' => $post['id']));
    }
	
	public function edit($data, $id){
			$this->db->where('mitra_id', $id);
			$this->db->update('tb_mitra', $data);
			return true;
		}

    public function delete($id)
    {
	
        return $this->db->delete($this->_table, array("mitra_id" => $id));
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