<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_user extends CI_model {

    function tampil_data(){
        return $this->db->get('tb_user');
    }
    
    function cek_login($table, $where){
        return $this->db->get_where($table, $where);
    }
    
}
