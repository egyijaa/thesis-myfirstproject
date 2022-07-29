<?php
class Login_model extends CI_Model{
	//cek nip dan password admin
    private $username;
    private $nip;
    private $nama;
    private $pass;
    private $email;
    private $angkatan;
    private $telepon;

	function auth_admin($username,$password){
		$query=$this->db->query("SELECT * FROM admin WHERE NIP ='" . $username . "' AND BINARY PASS = BINARY '" . $password . "' AND BINARY active = '1'  LIMIT 1");
		return $query;
	}

	//cek nim dan password alumni
	function auth_alumni($username,$password){
		$query=$this->db->query("SELECT a.username, a.NAMA, a.active, a.PASS, a.active, ap.foto_profil from alumni a LEFT JOIN alumni_profil ap  ON a.username = ap.username WHERE a.username ='" . $username . "' AND BINARY a.active = '1'  LIMIT 1");
		$row = $query->row();
        print_r($row->pass);
        die();
        if (password_verify($password,$row->pass)) {
            return $row;
        } else {
            return false;
        }
    }
    function ambilAktif($username){
        $query = $this->db->query("SELECT username, nama, pass, active FROM alumni WHERE username = '" . $username . "' UNION ALL SELECT nip, nama, pass, active FROM admin where nip = '" . $username . "'");
        return ($query->num_rows() > 0)?$query->result_array():FALSE;
    }
    function ambilNohp($username){
        $this->db ->select('no_telepon');
        $this->db ->where('username',$username);
        $this->db->from('alumni_profil');
        $query = $this->db->get();
        return ($query->num_rows() > 0)?$query->result_array():FALSE;
    }
    public function getAngkatan()
    {
        $data = $this->db->query("SELECT * FROM angkatan");
        return $data->result_array();
    }
    public function getPendidikan()
    {
        $data = $this->db->query("SELECT * FROM pendidikan");
        return $data->result_array();
    }
    public function getStatus()
    {
        $data = $this->db->query("SELECT * FROM status");
        return $data->result_array();
    }

    public function getKota()
    {
        $data = $this->db->query("SELECT * FROM kota order by KOTA");
        return $data->result_array();
    }
}
