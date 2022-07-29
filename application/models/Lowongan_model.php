<?php
class Lowongan_model extends CI_Model{
	//cek nip dan password admin
    private $id_lowongan;
    private $judul;
    private $deskripsi;
    private $date;
    private $deadline;
    private $pendidikan;
    private $whatsapp;
    private $instagram;
    private $twitter;

    public function __construct()
    {
            parent::__construct();
            $this->load->model('Alumni_model');
            $this->Alumni_model->username = $this->session->userdata('ses_id');
            date_default_timezone_set("Asia/Bangkok");
            $this->date = date("Y-m-d H:i:s");
            $this->judul = $this->input->post('judul');
            $this->pendidikan = $this->input->post('angkatan');
            $this->deskripsi = $this->input->post('deskripsi');
            $this->whatsapp = $this->input->post('nomornya');
            $this->instagram = $this->input->post('instagramnya');
            $this->twitter = $this->input->post('twitternya');
    }

    public function getLowongan()
    {
        
        if (!empty($this->input->post('nisPass'))){
            $this->id_lowongan = $this->input->post('nisPass');
            $data = $this->db->query("SELECT j.pendidikan as ang, a.nip, a.nama as admin, b.email,l.id_lowongan_pekerjaan, l.judul, l.gambar,l.pendidikan, l.deskripsi, l.active, l.expired,j.pendidikan as pend,
            k.no_telepon, k.instagram, k.twitter FROM lowongan_pekerjaan l INNER JOIN pendidikan j ON l.pendidikan = j.id_pendidikan 
            LEFT JOIN admin a ON l.nip = a.nip LEFT JOIN alumni_profil b ON l.username = b.username LEFT JOIN kontak k ON l.id_lowongan_pekerjaan = k.id_kontak where l.id_lowongan_pekerjaan = '" . $this->id_lowongan . "'");
        }
        else {
            $data = $this->db->query("SELECT a.nama as nama_lengkap, b.no_telepon AS nomor, b.email as email,l.id_lowongan_pekerjaan, l.username, l.judul, l.gambar,l.pendidikan, l.deskripsi, l.published, l.active,l.expired, j.pendidikan as pend,
            k.no_telepon, k.instagram, k.twitter FROM lowongan_pekerjaan l INNER JOIN pendidikan j ON l.pendidikan = j.id_pendidikan 
            LEFT JOIN alumni a ON l.username = a.username LEFT JOIN alumni_profil b ON l.username = b.username LEFT JOIN kontak k ON l.id_lowongan_pekerjaan = k.id_kontak where l.id_lowongan_pekerjaan = (SELECT max(ID_LOWONGAN_PEKERJAAN) FROM lowongan_pekerjaan) AND l.username = '".$this->Alumni_model->username."'");
        }
        return $data->result_array();
    }
    public function getLowonganToEdit()
    {
        if ($this->input->post('deleteAlumninis2')){
            $this->id_lowongan = $this->input->post('deleteAlumninis2');
        }
        else {
            $this->id_lowongan = $this->uri->segment(3);
        }
        $data = $this->db->query("SELECT j.pendidikan as ang, l.id_lowongan_pekerjaan, l.judul, l.gambar,l.pendidikan, l.deskripsi, l.active, l.expired,j.pendidikan as pend,
        k.no_telepon, k.instagram, k.twitter, l.expired FROM lowongan_pekerjaan l INNER JOIN pendidikan j ON l.pendidikan = j.id_pendidikan 
        LEFT JOIN admin a ON l.nip = a.nip LEFT JOIN kontak k ON l.id_lowongan_pekerjaan = k.id_kontak where l.id_lowongan_pekerjaan = '" . $this->id_lowongan . "'");
        return $data->result_array();
    }
    public function getLowonganToDel()
    {
        $this->id_lowongan = $this->input->post('delLowongan');
        $data = $this->db->query("SELECT j.pendidikan as ang, l.id_lowongan_pekerjaan, l.judul, l.gambar,l.pendidikan, l.deskripsi, j.pendidikan as pend,
        k.no_telepon, k.instagram, k.twitter FROM lowongan_pekerjaan l INNER JOIN pendidikan j ON l.pendidikan = j.id_pendidikan 
        LEFT JOIN admin a ON l.nip = a.nip LEFT JOIN kontak k ON l.id_lowongan_pekerjaan = k.id_kontak where l.id_lowongan_pekerjaan = '" . $this->id_lowongan . "'");
        return $data->result_array();
    }
    public function getLowonganAll()
    {
        $data = $this->db->query("SELECT CONCAT(COALESCE(l.NIP,''), COALESCE(l.username,'')) as PUBLISHER, CONCAT(COALESCE(a.nama,''), COALESCE(b.nama,'')) as NAMA, l.gambar FROM lowongan_pekerjaan l LEFT JOIN admin a ON l.nip = a.nip LEFT JOIN alumni b ON l.username = b.username ORDER BY PUBLISHER");
        return $data->result_array();
    }
    public function delLowongan()
    {
        $this->id_lowongan = $this->input->post('delLowongan');
        $this->db->query("DELETE FROM lowongan_pekerjaan WHERE id_lowongan_pekerjaan = '" . $this->id_lowongan . "'");
    }
    public function delAll()
    {
        $this->db->query("DELETE FROM lowongan_pekerjaan");
    }
    function getPublished(){
        $data = $this->db->query("select username, published from lowongan_pekerjaan ORDER by PUBLISHED DESC limit 1");
        return $data->result_array();
    }
    function getRows($params = array()){
        if ($this->session->userdata('akses') != 2 && $this->session->userdata('akses') != 3){
            $this->db->select('l.username as username, CONCAT(COALESCE(l.NIP,""), COALESCE(l.username,"")) as PUBLISHER, CONCAT(COALESCE(a.nama,""), COALESCE(b.nama,"")) as NAMA, j.pendidikan as ang, l.id_lowongan_pekerjaan, l.judul, l.gambar, l.pendidikan, l.deskripsi, SUBSTRING(DESKRIPSI,1,200) as singkat, l.published, l.active,l.expired,COALESCE(k.no_telepon,"") as telepon, COALESCE(SUBSTRING(k.no_telepon, 2, 13),"") as wa, COALESCE(k.instagram,"") as ig, COALESCE(k.twitter,"") as twitter')
                    ->join('pendidikan j','l.pendidikan = j.id_pendidikan','inner')
                    ->join('admin a','l.nip = a.nip','left')
                    ->join('alumni b','l.username = b.username','left')
                    ->join('kontak k','l.id_lowongan_pekerjaan = k.id_kontak')
                    ->order_by('l.published','DESC');
            $this->db->from('lowongan_pekerjaan l');
        }
        else {
            $this->db->select('l.username as username, CONCAT(COALESCE(l.NIP,""), COALESCE(l.username,"")) as PUBLISHER, CONCAT(COALESCE(a.nama,""), COALESCE(b.nama,"")) as NAMA, j.pendidikan as ang, l.id_lowongan_pekerjaan, l.judul, l.gambar, l.pendidikan, l.deskripsi, SUBSTRING(DESKRIPSI,1,200) as singkat, l.published, l.active,l.expired,COALESCE(k.no_telepon,"") as telepon, COALESCE(SUBSTRING(k.no_telepon, 2, 13),"") as wa, COALESCE(k.instagram,"") as ig, COALESCE(k.twitter,"") as twitter')
                    ->join('pendidikan j','l.pendidikan = j.id_pendidikan','inner')
                    ->join('admin a','l.nip = a.nip','left')
                    ->join('alumni b','l.username = b.username','left')
                    ->join('kontak k','l.id_lowongan_pekerjaan = k.id_kontak')
                    ->where('l.active', 1)
                    ->order_by('l.published','DESC');
        $this->db->from('lowongan_pekerjaan l');
        }
        // CONCAT(COALESCE(k.no_telepon,""), CHAR(10) ,COALESCE(k.instagram,""), CHAR(10) , COALESCE(k.twitter,""), CHAR(10) , COALESCE(k.facebook,"")) as Kontak
        
        if(!empty($params['search']['keywords'])){
            $this->db->like('l.judul',$params['search']['keywords']);
            $this->db->or_like('j.pendidikan',$params['search']['keywords']);
            $this->db->or_like('a.nama',$params['search']['keywords']);
            $this->db->or_like('b.nama',$params['search']['keywords']);
        }
        if(!empty($params['search']['filterAngkatan_item']) || !empty($params['search']['keywords2'])){
            $this->db->like('a.nip',$params['search']['filterAngkatan_item']);
            $this->db->like('l.judul',$params['search']['keywords2']);
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
    function getRows2($params = array()){
        $this->db->select('l.username as username, CONCAT(COALESCE(l.NIP,""), COALESCE(l.username,"")) as PUBLISHER, CONCAT(COALESCE(a.nama,""), COALESCE(b.nama,"")) as NAMA, j.pendidikan as ang, l.id_lowongan_pekerjaan, l.judul, l.gambar, l.pendidikan, l.deskripsi, l.active, SUBSTRING(DESKRIPSI,1,200) as singkat, l.published, l.expired,COALESCE(k.no_telepon,"") as telepon, COALESCE(SUBSTRING(k.no_telepon, 2, 13),"") as wa, COALESCE(k.instagram,"") as ig, COALESCE(k.twitter,"") as twitter')
                    ->join('pendidikan j','l.pendidikan = j.id_pendidikan','inner')
                    ->join('admin a','l.nip = a.nip','left')
                    ->join('alumni b','l.username = b.username','left')
                    ->join('kontak k','l.id_lowongan_pekerjaan = k.id_kontak')
                    ->order_by('l.published','DESC')
                    ->where('l.username', $this->Alumni_model->username);
        $this->db->from('lowongan_pekerjaan l');
        // CONCAT(COALESCE(k.no_telepon,""), CHAR(10) ,COALESCE(k.instagram,""), CHAR(10) , COALESCE(k.twitter,""), CHAR(10) , COALESCE(k.facebook,"")) as Kontak
        
        if(!empty($params['search']['keywords'])){
            $userPost = $this->Alumni_model->username;
            $this->db->like('l.judul',$params['search']['keywords'])->where('l.username', $userPost);
            $this->db->or_like('j.pendidikan',$params['search']['keywords'])->where('l.username', $userPost);
            $this->db->or_like('a.nama',$params['search']['keywords'])->where('l.username', $userPost);
            $this->db->or_like('b.nama',$params['search']['keywords'])->where('l.username', $userPost);
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
    public function addLowongan($data)
    {
        $a = $this->session->userdata('akses')=='0'|| $this->session->userdata('akses')=='1';
        extract($data);
        $this->deadline = date( 'Y-m-d H:i:s', strtotime( $this->input->post('deadline') ) );
        if ($a){
            $this->db->set('NIP', $this->Alumni_model->username);
            $this->db->set('JUDUL', $this->judul);
            $this->db->set('PENDIDIKAN', $this->pendidikan);
            $this->db->set('GAMBAR', $gambar);
            $this->db->set('DESKRIPSI', $this->deskripsi);
            $this->db->set('PUBLISHED', $this->date);
            $this->db->set('EXPIRED', $this->deadline);
            $this->db->set('ACTIVE', 1);
            $this->db->insert('lowongan_pekerjaan');
        }
        else {
            $this->db->set('USERNAME', $this->Alumni_model->username);
            $this->db->set('JUDUL', $this->judul);
            $this->db->set('PENDIDIKAN', $this->pendidikan);
            $this->db->set('GAMBAR', $gambar);
            $this->db->set('DESKRIPSI', $this->deskripsi);
            $this->db->set('PUBLISHED', $this->date);
            $this->db->set('EXPIRED', $this->deadline);
            $this->db->set('ACTIVE', 0);
            $this->db->insert('lowongan_pekerjaan');
        }
            $this->db->set('id_kontak',$this->db->insert_id());
            $this->db->insert('kontak');
    }
    public function getidKontak()
    {
        $data = $this->db->query("SELECT id_kontak FROM kontak ORDER BY id_kontak DESC LIMIT 1");
        return $data->result_array();
    }
    public function count()
    {
        $data = $this->db->query("SELECT count(*) as total FROM lowongan_pekerjaan WHERE ID_LOWONGAN_PEKERJAAN is not null");
        return $data->result_array();
    }
    public function autoUpd($data)
    {
        extract($data);
        $this->db->set('no_telepon', $this->whatsapp);
        $this->db->set('instagram',  $this->instagram);
        $this->db->set('twitter',$this->twitter);
        $this->db->where('id_kontak', $id);
        $this->db->update('kontak');
    }
    public function updLowongan($data) {
        date_default_timezone_set("Asia/Bangkok");
        $this->id_lowongan = $this->input->post('nisPass');
        $this->deadline = date( 'Y-m-d H:i:s', strtotime( $this->input->post('deadline') ) );
        $dateN = date_create('1970-01-01 07:00:00');
        $format = date_format($dateN, 'Y-m-d H:i:s');

        extract($data);
        $this->db->set('judul', $this->judul);
        if ($gambar != 'default'){
            $this->db->set('gambar', $gambar);
        }
        $this->db->set('deskripsi', $this->deskripsi);
        $this->db->set('pendidikan', $this->pendidikan);
        if ($this->deadline != $format){
        $this->db->set('expired', $this->deadline);
        }
        $this->db->where('id_lowongan_pekerjaan', $this->id_lowongan);
        $this->db->update('lowongan_pekerjaan');

        $this->db->set('no_telepon', $this->whatsapp);
        $this->db->set('instagram',  $this->instagram);
        $this->db->set('twitter',$this->twitter);
        $this->db->where('id_kontak', $this->id_lowongan);
        $this->db->update('kontak');
        return true;
    }
    public function getPendidikan()
    {
        $data = $this->db->query("SELECT * FROM pendidikan");
        return $data->result_array();
    }
    public function updActive()
    {   
        if(!empty($this->input->post('nisPass'))){
            $this->id_lowongan = $this->input->post('nisPass');
            $this->active = $this->input->post('active');
        }
        else {
            $tmp           = explode('/', $_SERVER['HTTP_REFERER']);
            $end = end($tmp);
            $this->id_lowongan =  $end;
            $this->active = $this->input->post('active');
        }
        $this->db->query("UPDATE lowongan_pekerjaan SET active = '" . $this->active . "' WHERE id_lowongan_pekerjaan = '" . $this->id_lowongan . "'");
    }
    function ambilAktif(){
        if(!empty($this->input->post('nisPass'))){
            $this->id_lowongan = $this->input->post('nisPass');
        }
        else{
            $tmp           = explode('/', $_SERVER['HTTP_REFERER']);
            $end = end($tmp);
            $this->id_lowongan =  $end;
        }
        $query = $this->db->query("SELECT l.id_lowongan_pekerjaan, l.judul, l.active, l.expired, b.email, b.no_telepon as nomor FROM lowongan_pekerjaan l left join alumni_profil b ON l.username = b.username WHERE l.id_lowongan_pekerjaan = '" . $this->id_lowongan . "'");
        return ($query->num_rows() > 0)?$query->result_array():FALSE;
    }
}
