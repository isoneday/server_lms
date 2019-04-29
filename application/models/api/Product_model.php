<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model
{
    private $_table = "tb_materi";

    public $materi_id;
    public $materi_nama;
    public $materi_deskripsi;
    public $materi_platform;
    public $materi_gambar = "default.jpg";
    public $jenis_kelas_id;
    public $materi_harga;
    public $materi_diskon;
    public $materi_xp;
    public $materi_rating;
    public $materi_jml_modul;
    public $mitra_id;
    public $materi_waktu;
    public $materi_deadline;
    public $materi_level;
    public $materi_tgl;
    public $materi_jum_siswa;

    public function rules()
    {
        return [
            ['field' => 'materi_nama',
                'label' => 'Nama Materi',
                'rules' => 'required'],

            ['field' => 'materi_deskripsi',
                'label' => 'Deskripsi Materi'],

            ['field' => 'materi_platform',
                'label' => 'Platform Materi',
                'rules' => 'required'],

            ['field' => 'materi_harga',
                'label' => 'Harga Materi',
                'rules' => 'numeric'],

            ['field' => 'materi_diskon',
                'label' => 'Diskon Materi',
                'rules' => 'numeric'],

            ['field' => 'materi_XP',
                'label' => 'XP Materi',
                'rules' => 'required'],

            ['field' => 'materi_jml_modul',
                'label' => 'Jumlah Modul Materi',
                'rules' => 'numeric'],

            ['field' => 'materi_waktu',
                'label' => 'Waktu Materi',
                'rules' => 'required'],

            ['field' => 'materi_deadline',
                'label' => 'Deadline Materi',
                'rules' => 'required'],

            ['field' => 'materi_level',
                'label' => 'Level Materi',
                'rules' => 'required'],

            ['field' => 'materi_tgl',
                'label' => 'Tanggal Materi',
                'rules' => 'required'],

            ['field' => 'materi_jum_siswa',
                'label' => 'Jumlah Siswa ',
                'rules' => 'required'],

            ['field' => 'materi_video',
                'label' => 'Video Materi',
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
        $this->db->insert('tb_materi', $data);
        return true;
    }

    public function get_materi_by_id($id)
    {
        $query = $this->db->get_where('tb_materi', array('materi_id' => $id));
        return $result = $query->row_array();
    }

    public function update()
    {
        $post = $this->input->post();
        $this->materi_id = $post("id");
        $this->materi_nama = $post["materi_nama"];
        $this->materi_deskripsi = $post["materi_deskripsi"];
        $this->materi_platform = $post["materi_platform"];

        if (!empty($_FILES["materi_gambar"]["name"])) {
            $this->materi_gambar = $this->_uploadImage();
        } else {
            $this->materi_gambar = $post["old_image"];
        }
        $this->jenis_kelas_id = $post["jenis_kelas_id"];
        $this->materi_harga = $post["materi_harga"];
        $this->materi_diskon = $post["materi_diskon"];
        $this->materi_xp = $post["materi_xp"];
        $this->materi_rating = $post["materi_rating"];
        $this->materi_jml_modul = $post["materi_jml_modul"];
        $this->mitra_id = $post["mitra_id"];
        $this->materi_waktu = $post["materi_waktu"];
        $this->materi_deadline = $post["materi_deadline"];
        $this->materi_level = $post["materi_level"];
        $this->materi_tgl = $post["materi_tgl"];
        $this->materi_jum_siswa = $post["materi_jum_siswa"];
        $this->materi_video = $post["materi_video"];

        $this->db->update($this->_table, $this, array('materi_id' => $post['id']));
    }

    public function edit($data, $id)
    {
        $this->db->where('materi_id', $id);
        $this->db->update('tb_materi', $data);
        return true;
    }

    public function delete($id)
    {
        $this->_deleteImage($id);
        return $this->db->delete($this->_table, array("materi_id" => $id));
    }

    private function _uploadImage()
    {
        $config['upload_path'] = './upload/product/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['file_name'] = $this->materi_id;
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
        $product = $this->getById($id);
        if ($product->materi_gambar != "default.jpg") {
            $filename = explode(".", $product->materi_gambar)[0];
            return array_map('unlink', glob(FCPATH . "upload/product/$filename.*"));
        }
    }

    public function toArray()
    {
        $qu1 = $this->db->query('SELECT * FROM ' . $this->_table);
        $result = $qu1->result_array();
        $arrReturn = array_values($result);
        return $arrReturn;
    }

}
