<?php

class c_event extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->model('m_event');
        
        if($this->session->userdata('status') != "login"){
            redirect("c_login");
        }
    }
            
    function index(){
        $data['iklan'] = $this->m_event->getIklan();
        $data['event'] = $this->m_event->getEventTerbaru();
        $this->template->load('header','event',$data);
    }
    
    function eventKota(){
        $data['iklan'] = $this->m_event->getIklan();
        $data['event'] = $this->m_event->getEventKota();
        $this->template->load('header','event',$data);
    }
    
    function detailEvent(){
        $id = $this->uri->segment(3);
        $data['detailevent'] = $this->m_event->getEvent($id);

        $this->template->load('header','detailEvent',$data);
        
    }
    
    public function search_keyword(){
        $data['iklan'] = $this->m_event->getIklan();
      
       $keyword = $this->input->post('keyword');
       $data['event'] = $this->m_event->searchEvent($keyword);
       
       $this->template->load('header','event',$data);
    }
    
     public function email()
    {
         $id = $this->uri->segment(3);
        $data['detailevent'] = $this->m_event->getEvent($id);
        
         $user_name = $this->session->userdata('user_name');
         $email = $this->session->userdata('email');
         $user_id = $this->session->userdata('user_id');
         
         $event['join'] = $this->m_event->getJoinEvent($id, $user_id);
        
        
      // Konfigurasi email
        $config = [
               'mailtype'  => 'html',
               'charset'   => 'utf-8',
               'protocol'  => 'smtp',
               'smtp_host' => 'ssl://smtp.gmail.com',
               'smtp_user' => 'tiarahermayanti10.2@gmail.com',    // Ganti dengan email gmail kamu
               'smtp_pass' => 'justsmantri',      // Password gmail kamu
               'smtp_port' => 465,
               'crlf'      => "\r\n",
               'newline'   => "\r\n"
           ];

        // Load library email dan konfigurasinya
        $this->load->library('email', $config);

        // Email dan nama pengirim
        $this->email->from('tiarahermayanti10.2@gmail.com', 'Herror');

        // Email penerima
        $this->email->to($email); // Ganti dengan email tujuan kamu
        
        foreach ($data['detailevent']->result() as $key){
        // Lampiran email, isi dengan url/path file
        $this->email->attach('http://localhost:8080/server_lms/assets/img/event/' . $key->event_tiket);

        // Subject email
        $this->email->subject('Tiket untuk event' . $key->event_nama);

        // Isi email
        $this->email->message("Salam ". $user_name ."<br> Anda telah terdaftar dalam Event ". $key->event_nama . "oleh ". $key->mitra_nama .
                "<br> Berikut adalah tiket Anda untuk menghadiri Acara ini : <br>");
        }
        // Tampilkan pesan sukses atau error
        if ($this->email->send()) {
             echo '<script language="javascript">';
            echo 'alert("Tiket event akan dikirim ke email ");';
             echo 'window.location= "'.base_url('index.php/c_event').'";';
            echo '</script>';
        } else {
            echo '<script language="javascript">';
            echo 'alert("Email Tidak Terkirim");';
             echo 'window.location= "'.base_url('index.php/c_event').'";';
            echo '</script>';
        }
        
        if($event['join']->num_rows() == NULL){
        $simpanJoin = array(
                    "user_id" => $user_id,
                    "event_id" =>$id,
                    
              );
        $this->db->insert('tb_join_event', $simpanJoin);
        
        //kurang kuota
        $data['kuota'] = $this->m_event->getEvent($id);
        foreach ($data['kuota']->result() as $k){
            $kuota = $k->event_kuota;
        }
        $upKuota = array(
                        "event_kuota" => $kuota-1,
                        
                  );

            $where = array("event_id"=>$id);

            $this->m_event->updateKuota($where, 'tb_event', $upKuota);
        }
 
    }
}
