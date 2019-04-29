<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class PageHome extends CI_Controller
{

    public function __construct(){
        parent::__construct();
        //$this->load->model("User_model");
        $this->load->library('form_validation');
        $this->load->model('api/user_model');
        $this->load->model('api/product_model');
        $this->load->model('api/productiklan_model');
        $this->load->model('api/event_model');
        $this->load->model('api/eventiklan_model');
        $this->load->model('api/belajar_model');
        $this->load->model('api/kelas_model');
        $this->load->model('api/mitra_model');
        $this->load->model('api/pembayaran_model');
        $this->load->model('api/productfavorit_model');
        $this->load->model('api/m_materi');

    }

    public function index()
    {
        $data["field"] = $this->product_model->getAllField();
        $data["dataList"] = $this->product_model->toArray();

        $this->template->load('admin/pagehome', 'admin/list', $data);
    }

    public function page_form($link)
    {
        $this->template->load('admin/pagehome', 'admin/' . $link);
    }

    public function page_list($link, $isdata)
    {

        if ($isdata == 'materi') {
            $hasil = $this->product_model->getAll();
            if ($hasil->num_rows() > 0) {
                // Bikin respones k emobile
                $data["pesan"] = "datanya ada";
                $data["sukses"] = true;
                $data['data_materi'] = $hasil->result();
            } else {
                $data["pesan"] = "datanya gak ada bang";
                $data["sukses"] = false;
            }
        } else if ($isdata == 'materiiklan') {
            $hasil = $this->productiklan_model->getAll();
            if ($hasil->num_rows() > 0) {
                // Bikin respones k emobile
                $data["pesan"] = "datanya ada";
                $data["sukses"] = true;
                $data['data_iklan'] = $hasil->result();
            } else {
                $data["pesan"] = "datanya gak ada bang";
                $data["sukses"] = false;
            }

        } else if ($isdata == 'user') {
            $hasil = $this->user_model->getAll();
            if ($hasil->num_rows() > 0) {
                // Bikin respones k emobile
                $data["pesan"] = "datanya ada";
                $data["sukses"] = true;
                $data['data_user'] = $hasil->result();
            } else {
                $data["pesan"] = "datanya gak ada bang";
                $data["sukses"] = false;
            }

        } else if ($isdata == 'event') {
            $hasil = $this->event_model->getAll();
            if ($hasil->num_rows() > 0) {
                // Bikin respones k emobile
                $data["pesan"] = "datanya ada";
                $data["sukses"] = true;
                $data['data_event'] = $hasil->result();
            } else {
                $data["pesan"] = "datanya gak ada bang";
                $data["sukses"] = false;
            }

        } else if ($isdata == 'iklanevent') {
            $hasil = $this->eventiklan_model->getAll();
            if ($hasil->num_rows() > 0) {
                // Bikin respones k emobile
                $data["pesan"] = "datanya ada";
                $data["sukses"] = true;
                $data['data_event_iklan'] = $hasil->result();
            } else {
                $data["pesan"] = "datanya gak ada bang";
                $data["sukses"] = false;
            }
        } else if ($isdata == 'belajar') {
            $hasil = $this->belajar_model->getAll();
            if ($hasil->num_rows() > 0) {
                // Bikin respones k emobile
                $data["pesan"] = "datanya ada";
                $data["sukses"] = true;
                $data['data_belajar'] = $hasil->result();
            } else {
                $data["pesan"] = "datanya gak ada bang";
                $data["sukses"] = false;
            }
        } else if ($isdata == 'kelas') {
            $hasil = $this->kelas_model->getAll();
            if ($hasil->num_rows() > 0) {
                // Bikin respones k emobile
                $data["pesan"] = "datanya ada";
                $data["sukses"] = true;
                $data['data_kelas'] = $hasil->result();
            } else {
                $data["pesan"] = "datanya gak ada bang";
                $data["sukses"] = false;
            }
        } else if ($isdata == 'mitra') {
            $hasil = $this->mitra_model->getAll();
            if ($hasil->num_rows() > 0) {
                // Bikin respones k emobile
                $data["pesan"] = "datanya ada";
                $data["sukses"] = true;
                $data['data_mitra'] = $hasil->result();
            } else {
                $data["pesan"] = "datanya gak ada bang";
                $data["sukses"] = false;
            }
        } else if ($isdata == 'pembayaran') {
            //tidak perlu
        }
        echo json_encode($data);
    }

    public function delete_data($link, $id)
    {
        if (!isset($id)) show_404();

        if ($link == "materi") {
            if ($this->product_model->delete($id)) {
                redirect('admin/pagehome/page_list/list/materi');
            }
        }

    }

    public function edit_data($link, $id)
    {
        if ($link == "materi") {
            $data["product"] = $this->product_model->get_materi_by_id($id);
            $this->template->load('admin/pagehome', 'admin/product_edit_form', $data);

            if ($this->input->post('submit')) {
                $this->form_validation->set_rules('materi_nama', 'Nama Materi', 'trim|required');
                $this->form_validation->set_rules('materi_deskripsi', 'Deskripsi Materi', 'trim|required');
                $this->form_validation->set_rules('materi_platform', 'Platform Materi', 'trim|required');
                $this->form_validation->set_rules('materi_gambar', 'Gambar Materi', 'trim');
                $this->form_validation->set_rules('materi_harga', 'Harga Materi', 'trim|required');
                $this->form_validation->set_rules('materi_diskon', 'Diskon Materi', 'trim|required');
                $this->form_validation->set_rules('materi_xp', 'XP Materi', 'trim|required');
                $this->form_validation->set_rules('materi_rating', 'Rating Materi', 'trim|required');
                $this->form_validation->set_rules('materi_jml_modul', 'Jumlah Modul Materi', 'trim|required');
                $this->form_validation->set_rules('materi_waktu', 'Waktu Materi', 'trim|required');
                $this->form_validation->set_rules('materi_deadline', 'Deadline Materi', 'trim|required');
                $this->form_validation->set_rules('materi_level', 'Level Materi', 'trim|required');
                $this->form_validation->set_rules('materi_tgl', 'Tanggal Materi', 'trim|required');
                $this->form_validation->set_rules('materi_jum_siswa', 'Jumlah Siswa', 'trim|required');
                $this->form_validation->set_rules('materi_video', 'Video Materi', 'trim|required');

                if ($this->form_validation->run() == FALSE) {
                    //$data['product'] = $this->product_model->get_materi_by_id($id);
                    //if (!$data["product"]) show_404();
                    //$this->load->view('admin/product/edit_form', $data);
                    $data["product"] = $this->product_model->get_materi_by_id($id);
                    $this->template->load('admin/pagehome', 'admin/product_edit_form', $data);
                } else {
                    $data = array(
                        'materi_nama' => $this->input->post('materi_nama'),
                        'materi_deskripsi' => $this->input->post('materi_deskripsi'),
                        'materi_platform' => $this->input->post('materi_platform'),
                        'materi_gambar' => $_FILES['materi_gambar']['name'],
                        'materi_harga' => $this->input->post('materi_harga'),
                        'materi_diskon' => $this->input->post('materi_diskon'),
                        'materi_xp' => $this->input->post('materi_xp'),
                        'materi_rating' => $this->input->post('materi_rating'),
                        'materi_jml_modul' => $this->input->post('materi_jml_modul'),
                        'materi_waktu' => $this->input->post('materi_waktu'),
                        'materi_deadline' => $this->input->post('materi_deadline'),
                        'materi_level' => $this->input->post('materi_level'),
                        'materi_tgl' => $this->input->post('materi_tgl'),
                        'materi_jum_siswa' => $this->input->post('materi_jum_siswa'),
                        'materi_video' => $this->input->post('materi_video'),
                    );
                    foreach ($_FILES as $key => $value) {
                        move_uploaded_file($value['tmp_name'], "./assets/img/materi/" . $value['name']);
                    }
                    $data = $this->security->xss_clean($data);
                    $result = $this->product_model->edit($data, $id);
                    if ($result) {
                        $this->session->set_flashdata('success', 'Record is Update Successfully!');

                        redirect('admin/pagehome/page_list/list/materi');
                    }
                }
            }

        }
    }

    public function add_data($link)
    {
        if ($link == "materi") {

            if ($this->input->post('submit')) {

                $this->form_validation->set_rules('materi_nama', 'Nama Materi', 'trim|required');
                $this->form_validation->set_rules('materi_deskripsi', 'Deskripsi Materi', 'trim|required');
                $this->form_validation->set_rules('materi_platform', 'Platform Materi', 'trim|required');
                if (empty($_FILES['materi_gambar']['name'])) {
                    $this->form_validation->set_rules('materi_gambar', 'Gambar Materi', 'required');
                }
                $this->form_validation->set_rules('materi_harga', 'Harga Materi', 'trim|required');
                $this->form_validation->set_rules('materi_diskon', 'Diskon Materi', 'trim|required');
                $this->form_validation->set_rules('materi_xp', 'XP Materi', 'trim|required');
                $this->form_validation->set_rules('materi_rating', 'Rating Materi', 'trim|required');
                $this->form_validation->set_rules('materi_jml_modul', 'Jumlah Modul Materi', 'trim|required');
                $this->form_validation->set_rules('materi_waktu', 'Waktu Materi', 'trim|required');
                $this->form_validation->set_rules('materi_deadline', 'Deadline Materi', 'trim|required');
                $this->form_validation->set_rules('materi_level', 'Level Materi', 'trim|required');
                $this->form_validation->set_rules('materi_tgl', 'Tanggal Materi', 'trim|required');
                $this->form_validation->set_rules('materi_jum_siswa', 'Jumlah Siswa', 'trim|required');
                $this->form_validation->set_rules('materi_video', 'Video', 'trim|required');

                if ($this->form_validation->run() == FALSE) {
                    $this->template->load('admin/pagehome', 'admin/' . $form);
                } else {
                    $data = array(
                        'materi_nama' => $this->input->post('materi_nama'),
                        'materi_deskripsi' => $this->input->post('materi_deskripsi'),
                        'materi_platform' => $this->input->post('materi_platform'),
                        'materi_gambar' => "test",
                        'jenis_kelas_id' => $this->input->post('jenis_kelas_id'),
                        'materi_harga' => $this->input->post('materi_harga'),
                        'materi_diskon' => $this->input->post('materi_diskon'),
                        'materi_xp' => $this->input->post('materi_xp'),
                        'materi_rating' => $this->input->post('materi_rating'),
                        'materi_jml_modul' => $this->input->post('materi_jml_modul'),
                        'mitra_id' => $this->input->post('mitra_id'),
                        'materi_waktu' => $this->input->post('materi_waktu'),
                        'materi_deadline' => $this->input->post('materi_deadline'),
                        'materi_level' => $this->input->post('materi_level'),
                        'materi_tgl' => $this->input->post('materi_tgl'),
                        'materi_jum_siswa' => $this->input->post('materi_jum_siswa'),
                        'materi_jum_video' => $this->input->post('materi_video'),
                    );
                    foreach ($_FILES as $key => $value) {
                        move_uploaded_file($value['tmp_name'], "./assets/img/materi/" . $value['name']);
                    }
                    $data = $this->security->xss_clean($data);
                    $result = $this->product_model->add($data);
                    if ($result) {
                        $this->session->set_flashdata('success', 'Record is Added Successfully!');

                        $data["field"] = $this->product_model->getAllField();
                        $data["dataList"] = $this->product_model->toArray();
                        $data["link"] = "materi";
                        $data["linkform"] = "product_new_form";

                        $this->template->load('admin/pagehome', 'admin/list', $data);
                    }
                }

            } else {
                $this->template->load('admin/pagehome', 'admin/' . $form);
            }
        }
        else if ($link == "user") {
            $data = array(
                'user_name' => $this->input->post('user_name'),
                'user_email' => $this->input->post('user_email'),
                'user_password' => $this->input->post('user_password'),
                'user_asal' => $this->input->post('user_asal')
            );
            $data = $this->security->xss_clean($data);
            $result = $this->user_model->add($data);
            if ($result) {
                $res["sukses"] = true;
            } else {
                $res["sukses"] = false;
            }
            echo json_encode($res);
        }
    }

    public function login_user()
    {
        $data1 = $this->input->post('user_email');
        $data2 = $this->input->post('user_password');
        $hasil = $this->user_model->login_user_by_email($data1, $data2);
        if ($hasil->num_rows() > 0) {
            $data["pesan"] = "Login Sukses";
            $data["sukses"] = true;
            $data['data_login'] = $hasil->result();
        } else {
            $data["pesan"] = "Login Gagal";
            $data["sukses"] = false;
        }
        echo json_encode($data);
    }

    public function get_favorite_product()
    {
        $hasil = $this->productfavorit_model->getAll();
        if ($hasil->num_rows() > 0) {
            // Bikin respones k emobile
            $data["pesan"] = "datanya ada";
            $data["sukses"] = true;
            $data['data_favorite'] = $hasil->result();
            foreach ($hasil->result() as $row) {
                $param = $row->materi_id;
            }
            $hasil2 = $this->product_model->get_materi_by_id($param);

            $data['data_favorite2'] = $hasil2->result();
        } else {
            $data["pesan"] = "datanya gak ada bang";
            $data["sukses"] = false;
        }

        echo json_encode($data);
    }

    public function get_modul_judul_by_materi_id(){

        $materi_id = $this->input->post('materi_id');
        $user_id = $this->input->post('user_id');

        $hasil = $this->db->select('*')->from('tb_modul')->where('materi_id', $materi_id)->get();
        $hasil1 = $this->db->select('*')->from('tb_progress_modul')->where(array('user_id'=> $user_id,'materi_id'=> $materi_id))->order_by("modul_id", "asc")->get();

        if ($hasil->num_rows() > 0) {
            // Bikin respones k emobile
            $data["pesan"] = "datanya ada";
            $data["sukses"] = true;
            $data['data_list_modul_by_modul_id'] = $hasil->result();
            $data['data_list_modul_by_modul_id_status'] = $hasil1->result();
        } else {
            $data["pesan"] = "datanya gak ada bang";
            $data["sukses"] = false;
        }
        echo json_encode($data);
    }

    public function get_content_by_modul_id()
    {
        $modul_id = $this->input->post('modul_id');
        $this->db->select('*');
        $this->db->where('modul_id', $modul_id);
        $this->db->order_by("content_urutan", "asc");
        $this->db->from('tb_content');
        $hasil = $this->db->get();

        //$hasil = $this->db->get_where('tb_content', array('modul_id' => $modul_id))->order_by("content_urutan", "asc");
        if ($hasil->num_rows() > 0) {
            // Bikin respones k emobile
            $data["pesan"] = "datanya ada";
            $data["sukses"] = true;
            $data['data_list_content_by_modul_id'] = $hasil->result();
        } else {
            $data["pesan"] = "datanya gak ada bang";
            $data["sukses"] = false;
        }
        echo json_encode($data);
    }

    public function upload_image_bukti()
    {
        $materi_id = $this->input->post('materi_id');

        //$data['pembayaran'] = $this->m_materi->getMateri($materi_id)->result();

        $user_id = $this->input->post('user_id');

        //$data['progress'] = $this->m_materi->getPembayaran($user_id)->result();

        date_default_timezone_set('Asia/Jakarta');

        $date = date('Y/m/d h:i:s a', time());

        $status = "cek";

        $simpan = array(
            "pmby_bukti" => $_FILES['bukti']['name'],
            "pmby_status" => $status,
            "pmby_tanggal" => $date
        );

        foreach ($_FILES as $key => $value) {
            move_uploaded_file($value['tmp_name'], "./bukti_pembayaran/" . $value['name']);
        }

        $where = array("user_id" => $user_id,
            "materi_id " => $materi_id);

        $res = $this->m_materi->updatePembayaran_api($where, 'tb_pembayaran', $simpan);

        //$data['progress'] = $this->m_materi->getPembayaran($user_id)->result();

        if ($res) {
            $data["pesan"] = "Bukti dikirim";
            $data["sukses"] = true;
        } else {
            $data["pesan"] = "Bukti gagal dikirim";
            $data["sukses"] = false;
        }

        echo json_encode($data);

    }

    public function on_buy_learn_viewed()
    {
        $data1 = $this->input->post('user_id');
        $data2 = $this->input->post('materi_id');
        $data3 = $this->input->post('materi_harga');
        $hasil = $this->m_materi->getStatusPembayaran($data1, $data2);
        if ($hasil->num_rows() == 0) {
            if ($data3 == "0") {
                $simpan = array("materi_id" => $data2,
                    "user_id" => $data1,
                    "pmby_bukti" => "-",
                    "pmby_status" => "gratis");
            } else {
                $simpan = array("materi_id" => $data2,
                    "user_id" => $data1,
                    "pmby_bukti" => "-",
                    "pmby_status" => "");
            }
            $res = $this->db->insert('tb_pembayaran', $simpan);
            if ($res) {
                $data["pesan"] = "Data ditambahkan";
                $data["sukses"] = true;
            } else {
                $data["pesan"] = "Data gagal input";
                $data["sukses"] = false;
            }
        } else {
            $data["pesan"] = "Data sudah ada";
            $data["sukses"] = true;
        }
        echo json_encode($data);
    }

    public function get_detail_pmby_by_id()
    {
        $data1 = $this->input->post('user_id');
        $data2 = $this->input->post('materi_id');

        $hasil = $this->m_materi->getStatusPembayaran($data1, $data2);
        if ($hasil->num_rows() > 0) {
            $data["pesan"] = "data pembayaran di dapatkan";
            $data["sukses"] = true;
            $data['data_detail_pembayaran'] = $hasil->result();
        } else {
            $data["pesan"] = "data pembayaran tidak didapatkan";
            $data["sukses"] = false;
        }
        echo json_encode($data);
    }

    public function get_detail_pmby_by_id_user()
    {
        $data1 = $this->input->post('user_id');
        $hasil = $this->m_materi->getPembayaran($data1);

        if ($hasil->num_rows() > 0) {
            $data["pesan"] = "data pembayaran di dapatkan";
            $data["sukses"] = true;
            $data['data_detail_pembayaran_user'] = $hasil->result();
        } else {
            $data["pesan"] = "data pembayaran tidak didapatkan";
            $data["sukses"] = false;
        }
        echo json_encode($data);
    }

    public function get_user(){
        $data1 = $this->input->post('user_id');
        $hasil = $this->user_model->get_user_by_id_api($data1);
        if ($hasil->num_rows() > 0) {
            $data["pesan"] = "Data Sukses";
            $data["sukses"] = true;
            $data['data_user'] = $hasil->result();
        } else {
            $data["pesan"] = "Gagal";
            $data["sukses"] = false;
        }
        echo json_encode($data);
    }

    public function get_list_my_learn(){
        $user_id = $this->input->post('user_id');

        $this->db->select('tb_pembayaran.*,tb_materi.materi_nama,tb_materi.materi_platform,tb_materi.materi_gambar');
        $this->db->from('tb_pembayaran, tb_materi');
        $this->db->where('tb_pembayaran.materi_id=tb_materi.materi_id');
        $this->db->where('tb_pembayaran.user_id', $user_id);
        $hasil=$this->db->get();
        if ($hasil->num_rows() > 0) {
            $data["pesan"] = "Data Sukses";
            $data["sukses"] = true;
            $data['data_list_my_learn'] = $hasil->result();
        } else {
            $data["pesan"] = "Gagal";
            $data["sukses"] = false;
        }
        echo json_encode($data);
    }

    public function get_my_learn_progress(){
        $user_id = $this->input->post('user_id');

        $this->db->select('*');
        $this->db->from('tb_belajar, tb_materi');
        $this->db->where('tb_belajar.materi_id=tb_materi.materi_id');
        $this->db->where('tb_belajar.user_id', $user_id);
        $hasil=$this->db->get();
        if ($hasil->num_rows() > 0) {
            $data["pesan"] = "Data Sukses";
            $data["sukses"] = true;
            $data['data_my_learn'] = $hasil->result();
        } else {
            $data["pesan"] = "Gagal";
            $data["sukses"] = false;
        }
        echo json_encode($data);
    }

    public function get_materi_detail_from_profil(){
        $data2 = $this->input->post('materi_id');
        $hasil = $this->db->get_where('tb_materi',array('materi_id'=>$data2));
        if ($hasil->num_rows() > 0) {
            $data["pesan"] = "Data Sukses";
            $data["sukses"] = true;
            $data['data_detail_materi_from_profil'] = $hasil->result();
        } else {
            $data["pesan"] = "Gagal";
            $data["sukses"] = false;
        }
        echo json_encode($data);
    }

    public function regis_to_table_belajar()
    {
        $user_id = $this->input->post('user_id');
        $materi_id = $this->input->post('materi_id');

        $this->db->select('materi_deadline');
        $this->db->from('tb_materi');
        $this->db->where('materi_id',$materi_id);
        $query1 = $this->db->get();

        $day = "";
        foreach ($query1->result() as $row) {
            $day = $row->materi_deadline;
        }

        $query2=$this->db->select('*')
            ->from('tb_belajar')
            ->where('materi_id',$materi_id)
            ->where('user_id',$user_id)->get();

        if ($query2->num_rows() > 0) {
            // update
            $data = array(
                'last_seen'=>date('Y/m/d h:i:s a', time())
            );
            $data = $this->security->xss_clean($data);
            $result = $this->db->update('tb_belajar',$data);
            if ($result) {
                $res["sukses"] = true;
                $res["pesan"] = "last seen diupdate";
            } else {
                $res["sukses"] = false;
                $res["pesan"] = "last seen gagal diupdate";
            }
        } else {

            $data = array(
                'user_id' => $user_id,
                'materi_id' => $materi_id,
                'belajar_mulai'=>date('Y/m/d h:i:s a', time()),
                'belajar_deadline'=>date('Y/m/d h:i:s a', time()+($day*86400)),
                'last_seen'=>date('Y/m/d h:i:s a', time()),
                'belajar_status' => 'belajar',
                'progress_modul'=>'0'
            );
            $data = $this->security->xss_clean($data);
            $result = $this->db->insert('tb_belajar',$data);
            if ($result) {
                $res["sukses"] = true;
                $res["pesan"] = "kamu terdaftar";
            } else {
                $res["sukses"] = false;
                $res["pesan"] = "kamu gagal terdaftar";
            }

        }
        echo json_encode($res);
    }

    public function save_progress_to_table(){
        $user_id = $this->input->post('user_id');
        $materi_id = $this->input->post('materi_id');
        $modul_id = $this->input->post('modul_id');
        $data = array(
            'user_id'=>$user_id,
            'materi_id'=>$materi_id,
            'modul_id'=>$modul_id,
            'status'=>'0');
        $value = array(
            'user_id'=>$user_id,
            'materi_id'=>$materi_id,
            'modul_id'=>$modul_id);
        $data = $this->security->xss_clean($data);
        $value = $this->security->xss_clean($value);
        $hasil = $this->db->get_where('tb_progress_modul',$value);
        if ($hasil->num_rows()>0){
            $res["sukses"] = false;
            $res["pesan"] = "sudah terdaftar";
        } else{
            $result = $this->db->insert('tb_progress_modul',$data);
            if ($result) {
                $res["sukses"] = true;
                $res["pesan"] = "terdaftar";
            } else {
                $res["sukses"] = false;
                $res["pesan"] = "tidak terdaftar";
            }
        }
        echo json_encode($res);

    }

    public function update_progress_to_table(){
        $user_id = $this->input->post('user_id');
        $materi_id = $this->input->post('materi_id');
        $modul_id = $this->input->post('modul_id');
        $value = array(
            'user_id'=>$user_id,
            'materi_id'=>$materi_id,
            'modul_id'=>$modul_id
        );
        $data = array(
            'status'=>'1');
        $value = $this->security->xss_clean($value);
        $data = $this->security->xss_clean($data);
        $this->db->where($value);
        $result = $this->db->update('tb_progress_modul',$data);
        if ($result) {
            $res["sukses"] = true;
            $res["pesan"] = "terupdate";
        } else {
            $res["sukses"] = false;
            $res["pesan"] = "tidak terupdate";
        }
        echo json_encode($res);
    }

    public function join_event(){
        $data1 = $this->input->post('user_id');
        $data2 = $this->input->post('event_id');

        $cek = $this->db->get_where('tb_join_event',array('user_id'=>$data1,'event_id'=>$data2));
        if ($cek->num_rows()>0){
            $data["pesan"] = "kamu susah terdaftar";
            $data["sukses"] = true;
        } else{
            $simpan = array('user_id'=>$data1, 'event_id'=>$data2);
            $hasil = $this->db->insert('tb_join_event',$simpan);
            if($hasil){
                $data["pesan"] = "kamu susah terdaftar, kami tunggu kedatangan kamu";
                $data["sukses"] = true;
            } else{
                $data["pesan"] = "kamu gagal mendaftar";
                $data["sukses"] = false;
            }
        }


        echo json_encode($data);
    }
}
