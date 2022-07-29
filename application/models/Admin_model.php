<?php
class Admin_model extends CI_Model{
	//cek nip dan password admin
    public $nip;
    public $pass;
    public $nama;

    public function getAdminProfil()
    {
        $this->nip = $this->input->post('delAdmin');
        $data = $this->db->query("SELECT DISTINCT a.nip,a.pass,a.active, a.nama, ap.gambar as gambarnya FROM admin a LEFT JOIN broadcast ap
        ON a.nip = ap.nip where a.NIP='" . $this->nip . "'
        UNION 
        SELECT DISTINCT a.nip,a.pass,a.active, a.nama, l.gambar as gambarnya FROM admin a LEFT JOIN lowongan_pekerjaan l ON 
        a.nip= l.nip where a.NIP='" . $this->nip . "'");
        return $data->result_array();
    }
    public function getKelas()
    {
        $data = $this->db->query("SELECT * FROM kelas order by kelas");
        return $data->result_array();
    }
    public function save_batch($data){
		return $this->db->insert_batch('alumni', $data);
	}
    public function save_batch2($data){
		return $this->db->insert_batch('alumni_profil', $data);
	}
    function getRows($params = array()){
        $this->db->select('*')
                    ->where('NIP !=', 'spvsmanta')
                    ->order_by('nama');
        $this->db->from('admin');
        //CONCAT(LEFT(ap.NO_TELEPON,7), "*****", RIGHT(ap.NO_TELEPON,0)) AS no_telepon
        
        if(!empty($params['search']['keywords'])){
            $this->db->like('nama',$params['search']['keywords']);
            $this->db->or_like('nip',$params['search']['keywords']);
        }
        //set start and limit
        if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
            $this->db->limit($params['limit'],$params['start']);
        }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
            $this->db->limit($params['limit']);
        }
        //get records
        $query = $this->db->get();

        //return fetched data
        return ($query->num_rows() > 0)?$query->result_array():FALSE;
    }
	public function delAdmin()
    {
        $this->nip = $this->input->post('delAdmin');
        $this->db->query("DELETE FROM admin WHERE NIP = '" . $this->nip . "'");
    }
    public function getAdmin()
    {
        $this->db->query("select * from admin where nip <> 'spvsmanta'");
    }
    public function addAdmin()
    {

        $this->nip = $this->input->post('NIP');
        $this->nama = $this->input->post('NAMA');
        $this->pass = $this->input->post('PASS');
        $pass = password_hash($this->pass, PASSWORD_DEFAULT);
        $check = $this->db->query("SELECT nip FROM admin WHERE BINARY nip= '" . $this->nip . "'");

        $log = array();
        if($check->num_rows() == 1){
            $log["error"] = "NIP sudah terdaftar! Harap Masukkan NIP yang Lain!";
            return $log;
        }
        //$this->db->query("INSERT INTO alumni(NIS, NAMA, PASS) VALUES('" . $nis . "','" . $nama . "','" . $pass . "',0)");
        $register = $this->db->query("INSERT INTO admin (NIP, NAMA, PASS, active)
                                VALUES ('" . $this->nip . "','" . $this->nama . "','" . $pass . "',0)");
        $log["error"] = $this->db->error();
        if($register){
            $log["error"] = NULL;
        }else{
            $this->db->query("DELETE FROM admin WHERE NIP = ".$this->nip);
        }
        return $log;            
    }
    public function upddata($data) {
        extract($data);
        $this->db->set('NAMA', $nama);
        $this->db->set('PASS', $pass);
        $this->db->where('NIP', $nip);
        $this->db->update('admin');
        return true;
    }
    public function updActive($nip, $active)
    {
        $this->db->query("UPDATE admin SET active = '" . $active . "' WHERE NIP = '" . $nip . "'");
    }
    function auth_admin($username){
		$query=$this->db->query("SELECT * FROM admin WHERE BINARY NIP ='" . $username . "' LIMIT 1");
		return $query;
	}
    public function updPassword($username) {
        $this->nip = $username;
        $this->pass =$this->input->post('modalpass2');
        $pass = password_hash($this->pass, PASSWORD_DEFAULT);
        $this->db->set('pass', $pass);
        $this->db->where('nip', $this->nip);
        $this->db->update('admin');
        return true;
    }
}
