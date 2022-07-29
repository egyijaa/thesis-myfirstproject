<?php
class Profil_model extends CI_Model{
	//cek nip dan password admin
    private $email;
    private $tanggal_lahir;
    private $no_telepon;
    private $alamat_asal;
    private $alamat_sekarang;
    private $kota_sekarang;
    private $status;
    private $keterangan;
    private $date;
    private $wa;
    private $ig;
    private $twitter;
    private $line;

    public function __construct()
    {
            // Memanggil konstruktor CI_Model
            parent::__construct();
            $this->load->model('Alumni_model');
            $this->Alumni_model->username = $this->input->post('username');
            $this->Alumni_model->nama = $this->input->post('nama');
            $this->Alumni_model->pass = $this->input->post('pass');
            date_default_timezone_set("Asia/Bangkok");
            $this->date = date("Y-m-d H:i:s");
    }

    public function upddata($data) {
        $this->email = $this->input->post('email');
        $this->tanggal_lahir = $this->input->post('tanggal_lahir');
        $this->no_telepon = $this->input->post('no_telepon');
        if ($this->session->userdata('akses') == 2){
            $this->status = $this->input->post('status');
            $this->alamat_sekarang = $this->input->post('alamat_sekarang');
            $this->alamat_asal = $this->input->post('alamat_asal');
            $this->kota_sekarang = $this->input->post('kota_sekarang');
            $this->keterangan = $this->input->post('keterangan');
        }
        $result = $this->Alumni_model->getAlumniProfilSelf();
        $log = array();
        foreach($result as $row) 
        { 
            if ($this->email == $row["email"]){
                $this->db->set('email', $this->email);
            }
            else{
                $check2 = $this->db->query("SELECT email FROM alumni_profil WHERE email = '" . $this->email . "'");
                if($check2->num_rows() > 0){
                    $log["error"] = "Email Sudah Terdaftar! Harap Gunakan Email lain!";
                    $log["kode"] = "1";
                    return $log;
                }
                else {
                    $this->db->set('email', $this->email);
                }
            }
            if ($this->no_telepon == $row["no_telepon"]){
                $this->db->set('no_telepon', $this->no_telepon);
            }
            else{
                $check3 = $this->db->query("SELECT no_telepon FROM alumni_profil WHERE no_telepon = '" . $this->no_telepon . "'");
                if($check3->num_rows() > 0){
                    $log["error"] = "Nomor Telepon Sudah Digunakan! Harap Gunakan Nomor lain!";
                    $log["kode"] = "2";
                    return $log;
                }
                else {
                    $this->db->set('no_telepon', $this->no_telepon);
                }
            }
            $this->db->set('tanggal_lahir', $this->tanggal_lahir);
            $this->db->set('foto_profil', $data['foto_profil']);
            if ($this->session->userdata('akses') == 2){
                $this->db->set('alamat_asal', $this->alamat_asal);
                $this->db->set('alamat_sekarang', $this->alamat_sekarang);
                $this->db->set('kota_sekarang', $this->kota_sekarang);
                $this->db->set('status', $this->status);
                $this->db->set('keterangan', $this->keterangan);
            }
            $this->db->set('latest', $this->date);
            $this->db->where('username', $this->Alumni_model->username);
            $this->db->update('alumni_profil');

            $this->db->set('nama',  $this->Alumni_model->nama);
            $this->db->where('username', $this->Alumni_model->username);
            $this->db->update('alumni');
            $log["error"] = NULL;
            return $log;
        }
    }
    public function delAvatar($data) {
        extract($data);
        $this->Alumni_model->username = $this->input->post('nis');
        $this->db->set('foto_profil', $foto_profil);
        $this->db->where('username', $this->Alumni_model->username);
        $this->db->update('alumni_profil');
        echo $this->db->last_query();
        return true;
    }
    function auth_alumni($username){
		$query=$this->db->query("SELECT a.USERNAME, a.PASS as PASS, b.EMAIL as email, b.NO_TELEPON as telepon from alumni a left join alumni_profil b on a.username = b.username WHERE b.username ='" . $username . "'");
		return $query;
    }
    public function updPassword() {
        $this->Alumni_model->username = $this->input->post('nisPass');
        $this->Alumni_model->pass = $this->input->post('inputpasswordBaru');
        $pass = password_hash($this->Alumni_model->pass, PASSWORD_DEFAULT);
        $this->db->set('pass', $pass);
        $this->db->where('username', $this->Alumni_model->username);
        $this->db->update('alumni');

        $this->db->set('latest',  $this->date);
        $this->db->where('username', $this->Alumni_model->username);
        $this->db->update('alumni_profil');
        return true;
    }
    public function updSosmed() {
        $this->wa = $this->input->post('wa');
        $this->ig = $this->input->post('ig');
        $this->twitter = $this->input->post('twitter');
        $this->line = $this->input->post('line');
        $this->Alumni_model->username = $this->input->post('nisPass2');
        $result = $this->Alumni_model->getAlumniProfilSelf();
        $log = array();
        foreach($result as $row) 
        {       
                if ($this->wa == ''){
                    $this->db->set('whatsapp', null);
                }
                else {
                    if ($this->input->post('wa') == $row["whatsapp"]){
                        $this->db->set('whatsapp', $this->wa);
                    }
                    else{
                        $check = $this->db->query("SELECT whatsapp FROM sosmed_alumni WHERE whatsapp = '" . $this->wa . "'");
                        if($check->num_rows() > 0){
                            $log["error"] = "Nomor whatsapp sudah terpakai!, harap masukkan nomor whatsapp yang lain!";
                            return $log;
                        }
                        else {
                            $this->db->set('whatsapp', $this->wa);
                        }
                    }
                }
                if ($this->ig == ''){
                    $this->db->set('instagram', null);
                }
                else {
                    if ($this->input->post('ig') == $row["instagram"]){
                        $this->db->set('instagram', $this->ig);
                    }
                    else{
                        $check2 = $this->db->query("SELECT instagram FROM sosmed_alumni WHERE instagram = '" . $this->ig . "'");
                        if($check2->num_rows() > 0){
                            $log["error"] = "Id Instagram sudah terpakai!, harap masukkan Id Instagram yang lain!";
                            return $log;
                        }
                        else {
                            $this->db->set('instagram', $this->ig);
                        }
                    }
                }
                if ($this->twitter == ''){
                    $this->db->set('twitter', null);
                }
                else {
                    if ($this->input->post('twitter') == $row["twitter"]){
                        $this->db->set('twitter', $this->twitter);
                    }
                    else{
                        $check3 = $this->db->query("SELECT twitter FROM sosmed_alumni WHERE twitter = '" . $this->twitter . "'");
                        if($check3->num_rows() > 0){
                            $log["error"] = "Id Twitter sudah terpakai!, harap masukkan Id Twitter yang lain!";
                            return $log;
                        }
                        else {
                            $this->db->set('twitter', $this->twitter);
                        }
                    }
                }
                if ($this->line == ''){
                    $this->db->set('line', null);
                }
                else {
                    if ($this->input->post('line') == $row["line"]){
                        $this->db->set('line', $this->line);
                    }
                    else{
                        $check4 = $this->db->query("SELECT line FROM sosmed_alumni WHERE line = '" . $this->line . "'");
                        if($check4->num_rows() > 0){
                            $log["error"] = "Id Line sudah terpakai!, harap masukkan Id Line yang lain!";
                            return $log;
                        }
                        else {
                            $this->db->set('line', $this->line);
                        }
                    }
                }
            $this->db->where('username', $this->Alumni_model->username);
            $this->db->update('sosmed_alumni');
    
            $this->db->set('latest', $this->date);
            $this->db->where('username', $this->Alumni_model->username);
            $this->db->update('alumni_profil');
            $log["error"] = NULL;
            return $log;
        }
    }
    public function updTahunSaya()
    {   
        $this->Alumni_model->username = $this->session->userdata('ses_id');
        $this->active = $this->input->post('tahunUbah');
        $this->db->query("UPDATE alumni_profil SET ANGKATAN = '" . $this->active . "' where username = '".$this->Alumni_model->username."'");
    }
    public function updUsernameSaya()
    {   
        $this->Alumni_model->username = $this->session->userdata('ses_id');
        $this->active = $this->input->post('userNamenya');
        $this->db->query("UPDATE alumni SET username = '" . $this->active . "' where username = '".$this->Alumni_model->username."'");
    }
}
