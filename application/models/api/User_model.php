<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model
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
                'label' => 'Email User'],

            ['field' => 'user_password',
                'label' => 'Password User',
                'rules' => 'required'],

            ['field' => 'user_image',
                'label' => 'Gambar User',
                'rules' => 'numeric'],

            ['field' => 'user_date',
                'label' => 'Tanggal User',
                'rules' => 'date'],

            ['field' => 'user_asal',
                'label' => 'Asal User',
                'rules' => 'required'],

            ['field' => 'user_XP',
                'label' => 'XP User',
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
        return $this->db->get_where($this->_table, ["user_id" => $id])->row();
    }

    public function add($data)
    {
        $this->db->insert('tb_user', $data);
        return true;
    }

    public function get_user_by_id($id)
    {
        $query = $this->db->get_where('tb_user', array('user_id' => $id));
        return $result = $query->row_array();
    }

    public function update()
    {
        $post = $this->input->post();
        $this->user_id = $post("id");
        $this->user_name = $post["user_name"];
        $this->user_email = $post["user_email"];
        $this->user_password = $post["user_password"];

        if (!empty($_FILES["user_image"]["name"])) {
            $this->user_image = $this->_uploadImage();
        } else {
            $this->user_image = $post["old_image"];
        }
        $this->user_date = $post["user_date"];
        $this->user_asal = $post["user_asal"];
        $this->user_xp = $post["user_xp"];


        $this->db->update($this->_table, $this, array('user_id' => $post['id']));

    }

    public function edit($data, $id)
    {
        $this->db->where('user_id', $id);
        $this->db->update('tb_user', $data);
        return true;
    }

    public function delete($id)
    {
        $this->_deleteImage($id);
        return $this->db->delete($this->_table, array("user_id" => $id));
    }

    private function _uploadImage()
    {
        $config['upload_path'] = './upload/user/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['file_name'] = $this->user_id;
        $config['overwrite'] = true;
        $config['max_size'] = 1024; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('materi_gambar')) {
            return $this->upload->data("file_name");
        }

        return "default.jpg";
    }

    private function _deleteImage($id)
    {
        $user = $this->getById($id);
        if ($user->user_image != "default.jpg") {
            $filename = explode(".", $user->user_image)[0];
            return array_map('unlink', glob(FCPATH . "upload/user/$filename.*"));
        }
    }

    public function toArray()
    {
        $qu1 = $this->db->query('SELECT * FROM ' . $this->_table);
        $result = $qu1->result_array();
        $arrReturn = array_values($result);
        return $arrReturn;
    }

    public function login_user_by_email($email, $user_password)
    {
        return $this->db->get_where('tb_user', array('user_email' => $email, 'user_password' => $user_password));
    }

    public function get_user_by_id_api($id)
    {
        $query = $this->db->get_where('tb_user', array('user_id' => $id));
        return $query;
    }
}
