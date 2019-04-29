<?php 
 
class M_login extends CI_Model{	
	function tampil_data(){
		return $this->db->get("tb_admin");
	}

	function cek_login($table,$where){		
		return $this->db->get_where($table, $where);
	}	
}