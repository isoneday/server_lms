<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran_model extends CI_Model
{
    private $_table = "tb_pembayaran";

    public $pmby_id;
    public $user_id;
    public $materi_id;
    public $pmby_bukti;
    public $pmby_status;
    public $pmby_tanggal;
    public $pmby_batas;
    
    public function rules()
    {
        return [
            ['field' => 'user_id',
            'label' => 'ID User',
            'rules' => 'required'],
			
			 ['field' => 'materi_id',
            'label' => 'ID Materi',
            'rules' => 'required'],
			
			 ['field' => 'pmby_bukti',
            'label' => 'Bukti Pembayaran',
            'rules' => 'required'],
			
			 ['field' => 'pmby_status',
            'label' => 'Status Pembayaran',
            'rules' => 'required'],
			
			 ['field' => 'pmby_tanggal',
            'label' => 'Tanggal Pembayaran',
            'rules' => 'required'],
			
			 ['field' => 'pmby_batas',
            'label' => 'Batas Pembayaran',
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
        return $this->db->get_where($this->_table, ["pmby_id" => $id])->row();
    }

    public function add($data)
    {
		$this->db->insert('tb_pembayaran', $data);
			return true;
         }
	
	public function get_pmby_by_id($id){
		$query = $this->db->get_where('tb_pembayaran', array('pmby_id' => $id));
		return $result = $query->row_array();
	}
	
    public function update()
    {
        $post = $this->input->post();
        $this->pmby_id = $post("id");
		$this->user_id = $post["user_id"];
		$this->materi_id = $post["materi_id"];
		
		if (!empty($_FILES["pmby_bukti"]["name"])) {
		$this->pmby_bukti = $this->_uploadImage();
		} else {
		$this->pmby_bukti = $post["old_image"];
		}
		$this->pmby_status = $post["pmby_status"];
		$this->pmby_tanggal = $post["pmby_tanggal"];
        $this->pmby_batas = $post["pmby_batas"];
		
		$this->db->update($this->_table, $this, array('pmby_id' => $post['id']));
       
    }
	
	public function edit($data, $id){
			$this->db->where('pmby_id', $id);
			$this->db->update('tb_pembayaran', $data);
			return true;
		}

    public function delete($id)
    {
		$this-> _deleteImage($id);
        return $this->db->delete($this->_table, array("pmby_id" => $id));
    }
	
	private function _uploadImage()
	{
    $config['upload_path']          = './upload/pembayaran/';
    $config['allowed_types']        = 'gif|jpg|png';
    $config['file_name']            = $this->pmby_id;
    $config['overwrite']			= true;
    $config['max_size']             = 1024; // 1MB
    // $config['max_width']            = 1024;
    // $config['max_height']           = 768;

    $this->load->library('upload', $config);

    if ($this->upload->do_upload('pmby_bukti')) {
        return $this->upload->data("file_name");
    }
    
    return "default.jpg";
	}
	
	private function _deleteImage($id)
	{
		$pembayaran = $this->getById($id);
		if ($pembayaran->pmby_bukti != "default.jpg") {
			$filename = explode(".", $pembayaran->pmby_bukti)[0];
			return array_map('unlink', glob(FCPATH."upload/pembayaran/$filename.*"));
		}
	}
	
	public function toArray(){
		$qu1 = $this->db->query('SELECT * FROM '.$this->_table);
		$result =  $qu1->result_array();
		$arrReturn = array_values($result);
		return $arrReturn;
	}
	

}
