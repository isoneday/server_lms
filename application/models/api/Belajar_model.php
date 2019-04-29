<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Belajar_model extends CI_Model
{
    private $_table = "tb_belajar";

    public $belajar_id;
    public $user_id;
    public $materi_id;
    public $belajar_deadline;
    public $belajar_status;
    public $last_seen;
    public $progress_modul;

    public function rules()
    {
        return [
            ['field' => 'belajar_id',
                'label' => 'ID Belajar',
                'rules' => 'required'],

            ['field' => 'user_id',
                'label' => 'ID User',
                'rules' => 'required'],

            ['field' => 'materi_id',
                'label' => 'Harga Materi',
                'rules' => 'required'],

            ['field' => 'belajar_deadline',
                'label' => 'Deadline Belajar',
                'rules' => 'required'],

            ['field' => 'belajar_status',
                'label' => 'Status Belajar',
                'rules' => 'required'],

            ['field' => 'last_seen',
                'label' => 'Last Seen',
                'rules' => 'required'],

            ['field' => 'progress_modul',
                'label' => 'Progress Modul',
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
        return $this->db->get_where($this->_table, ["belajar_id_id" => $id])->row();
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
        $this->db->insert('tb_belajar', $data);
        return true;
    }

    public function get_belajar_by_id($id)
    {
        $query = $this->db->get_where('tb_belajar', array('belajar_id' => $id));
        return $result = $query->row_array();
    }

    public function update()
    {
        $post = $this->input->post();
        $this->belajar_id = $post("id");
        $this->user_id = $post["user_id"];
        $this->materi_id = $post["materi_id"];
        $this->belajar_deadline = $post["belajar_deadline"];
        $this->belajar_status = $post["belaja_status"];
        $this->last_seen = $post["last_seen"];
        $this->progress_modul = $post["progress_modul"];
        $this->db->update($this->_table, $this, array('materi_id' => $post['id']));
    }

    public function edit($data, $id)
    {
        $this->db->where('belajar_id', $id);
        $this->db->update('tb_belajar', $data);
        return true;
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("belajar_id" => $id));
    }

    public function toArray()
    {
        $qu1 = $this->db->query('SELECT * FROM ' . $this->_table);
        $result = $qu1->result_array();
        $arrReturn = array_values($result);
        return $arrReturn;
    }

    public function getAllField()
    {
        return $this->db->list_fields($this->_table);
    }




}