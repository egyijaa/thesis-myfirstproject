<?php
class Alumni_model extends CI_Model{
	//cek nip dan password admin
    public $username;
    public $nama;
    public $pass;
    public $active;
    public $roles;
    
    public function getRoles(){
        $this->username = $this->session->userdata('ses_id');
        $data = $this->db->query("SELECT username, roles FROM alumni where username ='" . $this->username . "'");
        return $data->result_array();    
    }
    public function getActive(){
        $this->username = $this->session->userdata('ses_id');
        $data = $this->db->query("SELECT username, active FROM alumni where username ='" . $this->username . "'");
        return $data->result_array();    
    }
    public function getAlumniProfilSelf()
    {
        $this->username = $this->session->userdata('ses_id');
        if ($this->session->userdata('akses') == 3) {
            $data = $this->db->query("SELECT a.username,a.pass,a.active, a.roles, ap.foto_profil, a.nama as nama_lengkap,
            ap.email, ap.latest, ap.no_telepon, ap.tanggal_lahir, sos.whatsapp, COALESCE(SUBSTRING(sos.whatsapp, 2, 13),'') as wa, sos.instagram, sos.twitter,sos.line FROM alumni a LEFT JOIN alumni_profil ap 
            ON a.username = ap.username LEFT JOIN sosmed_alumni sos ON a.username = sos.username where a.username ='" . $this->username . "'");
        }
        else {
            $data = $this->db->query("SELECT a.username,a.pass,a.active, a.roles, ap.foto_profil, a.nama as nama_lengkap,
            j.angkatan, ap.email, ap.alamat_asal, ap.alamat_sekarang, ap.latest, k.kota, ap.no_telepon, ap.tanggal_lahir,s.status, ap.keterangan, sos.whatsapp, COALESCE(SUBSTRING(sos.whatsapp, 2, 13),'') as wa, sos.instagram, sos.twitter,sos.line FROM alumni a LEFT JOIN alumni_profil ap 
            ON a.username = ap.username LEFT JOIN angkatan j ON ap.angkatan = j.id_angkatan LEFT JOIN status s ON ap.status = s.id_status LEFT JOIN kota k ON 
            ap.kota_sekarang = k.id_kota LEFT JOIN sosmed_alumni sos ON a.username = sos.username where a.username ='" . $this->username . "'");
        }
        return $data->result_array();
    }
    public function getAlumniCek()
    {
        $this->username = $this->session->userdata('ses_id');
        $data = $this->db->query("SELECT a.nama as nama_lengkap, a.roles,
        k.kota, ap.no_telepon, ap.email, s.status FROM alumni a LEFT JOIN alumni_profil ap 
        ON a.username = ap.username LEFT JOIN status s ON ap.status = s.id_status LEFT JOIN kota k ON 
        ap.kota_sekarang = k.id_kota where a.username ='" . $this->username . "'");
        return $data->result_array();
    }
    public function getAlumniDropDown()
    {
        $this->username = $this->session->userdata('ses_id');
        $data = $this->db->query("SELECT a.username,ap.foto_profil, a.nama as nama_lengkap,
        j.angkatan, ap.latest FROM alumni a LEFT JOIN alumni_profil ap 
        ON a.username = ap.username LEFT JOIN angkatan j ON ap.angkatan = j.id_angkatan where a.username ='" . $this->username . "'");
        return $data->result_array();
    }

    public function getAlumniProfilOther()
    {
        if (!empty($this->uri->segment(3))) {
            $this->username = $this->uri->segment(3);
        }
        else {
            $this->username = $this->input->post('lihatProfil');
        }
        $data = $this->db->query("SELECT a.username,a.pass,a.active, a.roles, ap.foto_profil, a.nama as nama_lengkap,
        j.angkatan, ap.email, ap.alamat_asal, ap.alamat_sekarang, ap.latest, k.kota, ap.no_telepon, ap.tanggal_lahir,s.status, ap.keterangan, sos.whatsapp, COALESCE(SUBSTRING(sos.whatsapp, 2, 13),'') as wa, sos.instagram, sos.twitter,sos.line FROM alumni a LEFT JOIN alumni_profil ap 
        ON a.username = ap.username LEFT JOIN angkatan j ON ap.angkatan = j.id_angkatan LEFT JOIN status s ON ap.status = s.id_status LEFT JOIN kota k ON 
        ap.kota_sekarang = k.id_kota LEFT JOIN sosmed_alumni sos ON a.username = sos.username where a.username ='" . $this->username . "'");
        return $data->result_array();
    }
    public function getAlumniAll()
    {
        $data = $this->db->query("SELECT a.username,a.pass,a.active, a.roles, ap.foto_profil, a.nama as nama_lengkap,
        j.angkatan, ap.email, ap.alamat_asal, ap.alamat_sekarang, k.kota, ap.no_telepon, ap.tanggal_lahir,s.status, ap.keterangan FROM alumni a LEFT JOIN alumni_profil ap 
        ON a.username = ap.username LEFT JOIN angkatan j ON ap.angkatan = j.id_angkatan LEFT JOIN status s ON ap.status = s.id_status LEFT JOIN kota k ON 
        ap.kota_sekarang = k.id_kota");
        return $data->result_array();
    }
    public function getAlumniLowongan()
    {
        $this->username = $this->input->post('delAlumni');
        $query = $this->db->query("SELECT a.username, l.gambar FROM alumni a LEFT JOIN alumni_profil ap 
        ON a.username = ap.username LEFT JOIN status s ON ap.status = s.id_status LEFT JOIN kota k ON 
        ap.kota_sekarang = k.id_kota LEFT JOIN lowongan_pekerjaan l ON ap.username = l.username where a.username ='" . $this->username . "'");
        return $query;
    }
    public function getAlumniFoto()
    {
        $this->username = $this->input->post('delAlumni');
        $query  = $this->db->query("SELECT a.username, ap.foto_profil FROM alumni a LEFT JOIN alumni_profil ap 
        ON a.username = ap.username where a.username ='" . $this->username . "'");
        return $query;
    }
    public function getLowonganAll()
    {
        $data = $this->db->query("SELECT l.username, b.nama, l.gambar FROM lowongan_pekerjaan l LEFT JOIN alumni b ON l.username = b.username where l.username != ''  ORDER BY b.nama");
        return $data->result_array();
    }
    public function delAll()
    {
        $this->db->query("DELETE FROM alumni");
    }
    public function delAlumni()
    {
        $this->username = $this->input->post('delAlumni');
        $this->db->query("DELETE FROM alumni WHERE username = '" . $this->username . "'");
    }
    function getAll(){
        $this->db->select('a.username, a.pass, a.active, a.roles, ap.foto_profil, a.nama as nama_lengkap, j.angkatan, ap.email, ap.alamat_asal, ap.alamat_sekarang, k.kota, ap.no_telepon, ap.tanggal_lahir,s.status, ap.keterangan,sos.whatsapp,sos.instagram,sos.twitter,sos.line')
                    ->join('alumni_profil ap','a.username = ap.username','left')
                    ->join('angkatan j','ap.angkatan = j.id_angkatan','left')
                    ->join('status s','ap.status = s.id_status','left')
                    ->join('kota k','ap.kota_sekarang = k.id_kota','left')
                    ->join('sosmed_alumni sos','a.username = sos.username','left')
                    ->order_by('ap.angkatan')
                    ->order_by('nama_lengkap');
        $this->db->from('alumni a');
        return $this->db->get();
    }
    function getPublished(){
        $data = $this->db->query("select username, latest from alumni_profil ORDER by latest DESC limit 1");
        return $data->result_array();
    }
    function getRows($params = array()){
        $wherenya = 'alumni';
        if ($this->uri->uri_string() == 'page/siswa'){
            $wherenya = 'siswa';
        }
        $this->db->select('a.username, a.pass, a.active, a.roles, ap.foto_profil, a.nama as nama_lengkap, j.angkatan, ap.email, ap.alamat_asal, ap.alamat_sekarang, k.kota, ap.no_telepon, ap.tanggal_lahir,s.status, ap.keterangan,sos.whatsapp,sos.instagram,sos.twitter,sos.line')
                    ->join('alumni_profil ap','a.username = ap.username','left')
                    ->join('angkatan j','ap.angkatan = j.id_angkatan','left')
                    ->join('status s','ap.status = s.id_status','left')
                    ->join('kota k','ap.kota_sekarang = k.id_kota','left')
                    ->join('sosmed_alumni sos','a.username = sos.username','left')
                    ->where('a.roles', $wherenya)
                    ->order_by('ap.angkatan','desc')
                    ->order_by('nama_lengkap');
        $this->db->from('alumni a');
        //CONCAT(LEFT(ap.NO_TELEPON,7), "*****", RIGHT(ap.NO_TELEPON,0)) AS no_telepon
        if ($this->uri->uri_string() == 'page/siswa'){
            if(!empty($params['search']['keywords'])){
                $this->db->like('a.nama',$params['search']['keywords']);
            }
        }
        else {
            if(!empty($params['search']['keywords'])){
                $this->db->like('a.nama',$params['search']['keywords']);
            }
            if(!empty($params['search']['filterAngkatan_item']) || !empty($params['search']['keywords2'])){
                $this->db->like('j.angkatan',$params['search']['filterAngkatan_item']);
            }
            if(!empty($params['search']['filterKota_item']) || !empty($params['search']['keywords3'])){
                $this->db->like('k.kota',$params['search']['filterKota_item']);
            }
            if(!empty($params['search']['filterStatus_item']) || !empty($params['search']['keywords4'])){
                $this->db->like('s.status',$params['search']['filterStatus_item']);
            }
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
    public function addAlumni()
    {
        $this->username = $this->input->post('NIS');
        $this->nama = $this->input->post('NAMA');
        $this->pass = $this->input->post('PASS');
        $pass = password_hash($this->pass, PASSWORD_DEFAULT);
        $email = $this->input->post('EMAIL');
        $angkatan =  $this->input->post('ANGKATAN');
        date_default_timezone_set("Asia/Bangkok");
        $date = date("Y-m-d H:i:s");

        $angkatan = $this->db->query("SELECT ID_ANGKATAN FROM angkatan WHERE angkatan = '" . $angkatan . "'");
        $angkatan = $angkatan->row_array()["ID_ANGKATAN"];

        $check = $this->db->query("SELECT username FROM alumni WHERE BINARY username = '" . $this->username . "'");
        $check2 = $this->db->query("SELECT email FROM alumni_profil WHERE email = '" . $email . "'");

        $log = array();
        if($check->num_rows() == 1){
            $log["error"] = "Username sudah terdaftar!";
            return $log;
        }
        else if($check2->num_rows() > 0){
            $log["error"] = "Email Sudah Terpakai, mohon pakai email lain!";
            return $log;
        }
            $register = $this->db->query("INSERT INTO alumni (username, NAMA, PASS, active, roles)
                                VALUES ('" . $this->username . "','" . $this->nama . "','" . $pass . "',0,'alumni')");
        $log["error"] = $this->db->error();
        if($register){
            $status1['status1'] = $this->ambilTahunCheck();
            $this->db->query("INSERT INTO alumni_profil (username, EMAIL, ANGKATAN, LATEST, FOTO_PROFIL, tahun)
                    VALUES ('" . $this->username . "','" . $email . "','" . $angkatan . "','" . $date . "','default.jpg','" . $status1['status1'][0]['tahun'] . "')");
            $this->db->query("INSERT INTO sosmed_alumni (username)
            VALUES ('" . $this->username . "')");
            $log["error"] = NULL;
        }else{
            $this->db->query("DELETE FROM alumni WHERE username = '" . $this->username . "'");
        }
        return $log;
    }
    function ambilTahunCheck(){
		$data = $this->db->query("SELECT tahun FROM alumni_profil limit 1");
        return $data->result_array();
    }
    public function updActive()
    {   
        date_default_timezone_set("Asia/Bangkok");
        if(!empty($this->input->post('username'))){
            $this->username = $this->input->post('username');
            $this->active = $this->input->post('active');
        }
        else {
            $this->username =  $this->uri->segment(3);
            $this->active = 1;
        }
        $this->db->query("UPDATE alumni SET active = '" . $this->active . "' WHERE username = '" . $this->username . "'");
        $this->db->query("UPDATE alumni_profil SET latest = '" . date("Y-m-d H:i:s") . "' WHERE username = '" . $this->username . "'");
    }
    public function updStatus()
    {   
        date_default_timezone_set("Asia/Bangkok");
        $this->username = $this->input->post('username');
        $this->roles = $this->input->post('roles');
        $status1['status1'] = $this->check1();
        $status2['status2'] = $this->check2();
        if($status1['status1'][0]['tahun'] != $status2['status2'][0]['tahun']){
            $this->db->query("UPDATE alumni_profil SET tahun = '" . $status2['status2'][0]['tahun'] . "' WHERE username = '" . $this->username . "'");
        }
        $this->db->query("UPDATE alumni SET roles = '" . $this->roles . "' WHERE username = '" . $this->username . "'");
        $this->db->query("UPDATE alumni_profil SET latest = '" . date("Y-m-d H:i:s") . "' WHERE username = '" . $this->username . "'");      
    }
    function check1(){
        $this->username = $this->input->post('username');
		$data = $this->db->query("SELECT tahun FROM alumni_profil WHERE username = '" . $this->username . "'");
        return $data->result_array();
    }
    function check2(){
        $this->roles = $this->input->post('roles');
        $data2 = $this->db->query("SELECT a.roles, b.tahun FROM alumni a left join alumni_profil b ON a.username = b.username where a.roles = '".$this->roles."' limit 1");
        return $data2->result_array();
    }
    function auth_alumni($username){
		$query=$this->db->query("SELECT a.username, a.NAMA, a.active, a.PASS, a.active, a.roles, ap.foto_profil from alumni a LEFT JOIN alumni_profil ap  ON a.username = ap.username WHERE BINARY a.username ='" . $username . "'LIMIT 1");
		return $query;
    }
    function ambilAktif(){
        if (!empty($this->input->post('username'))){
            $this->username = $this->input->post('username');
        }
        else{
            $this->username =  $this->uri->segment(3);
        }
        $query = $this->db->query("SELECT a.username, a.nama, b.email, a.active, a.roles, b.latest FROM alumni a left join alumni_profil b ON a.username = b.username WHERE a.username = '" . $this->username . "'");
        return ($query->num_rows() > 0)?$query->result_array():FALSE;
    }
    public function getAngkatan()
    {
        $data = $this->db->query("SELECT * FROM angkatan");
        return $data->result_array();
    }
    public function getKota()
    {
        $data = $this->db->query("SELECT * FROM kota order by kota asc");
        return $data->result_array();
    }
    public function getKondisiTahun()
    {
        if ($this->session->userdata('akses') == 2 || $this->session->userdata('akses') == 3) {
            $this->username = $this->session->userdata('ses_id');
            $data = $this->db->query("SELECT tahun FROM alumni_profil where username = '".$this->username."'");
        }
        else {
            $this->roles = 'alumni';
            if ($this->uri->uri_string() == 'page/siswa'){
                $this->roles = 'siswa';
            }
            $data = $this->db->query("SELECT a.roles, b.tahun FROM alumni a left join alumni_profil b ON a.username = b.username where a.roles = '".$this->roles."' limit 1");
        }
        return $data->result_array();
    }
    public function updKondisiTahun()
    {   
        $this->active = $this->input->post('tahun');
        $this->roles = 'alumni';
        if (isset($_POST['tahun2'])){
            $this->active = $this->input->post('tahun2');
            $this->roles = 'siswa';
        }
        $this->db->query("UPDATE alumni_profil b LEFT JOIN alumni a ON a.username = b.username SET b.tahun = '" . $this->active . "' WHERE a.roles = '" . $this->roles . "'");
    }
    public function resetPassword()
    {   
        $this->username = $this->input->post('delPass');
        $this->pass = 'smanta_ptk';
        $pass = password_hash($this->pass, PASSWORD_DEFAULT);
        $this->db->query("UPDATE alumni SET pass = '" . $pass . "' WHERE username = '" . $this->username . "'");
    }
    public function getStatus()
    {
        $data = $this->db->query("SELECT * FROM status order by status asc");
        return $data->result_array();
    }
    public function getStatusJumlah()
    {
        $data = $this->db->query("SELECT b.roles,
        sum(case when a.STATUS = '1' then 1 else 0 end) AS pertama,
        sum(case when a.STATUS = '2' then 1 else 0 end) AS kedua,
        sum(case when a.STATUS = '3' then 1 else 0 end) AS ketiga,
        sum(case when a.STATUS = '4' then 1 else 0 end) AS keempat,
        sum(case when a.STATUS = '5' then 1 else 0 end) AS kelima,
        sum(case when a.STATUS = '6' then 1 else 0 end) AS keenam,
        sum(case when a.STATUS = '7' then 1 else 0 end) AS ketujuh,
        sum(case when a.STATUS = '8' then 1 else 0 end) AS kedelapan,
        sum(case when a.STATUS = '9' then 1 else 0 end) AS kesembilan,
        sum(case when a.STATUS = '10' then 1 else 0 end) AS kesepuluh,
        sum(case when a.STATUS = '11' then 1 else 0 end) AS kesebelas,
        sum(case when a.STATUS = '12' then 1 else 0 end) AS keduabelas
    FROM alumni b left join alumni_profil a on b.username=a.username where b.roles = 'alumni'");
        return $data->result_array();
    }
    public function getStatusSum($filterStatus_item)
    {
        $data = $this->db->query("SELECT sum(case when STATUS = '" . $filterStatus_item . "' then 1 else 0 end) AS pertama, b.roles
        FROM alumni b left join alumni_profil a on b.username=a.username where b.roles = 'alumni'");
        return $data->result_array();
    }
    public function getStatusTahun($filterStatus_item)
    {
        $data = $this->db->query("SELECT p.ID_ANGKATAN As EventKey , p.angkatan As EventName, count(c.ANGKATAN) As Assignee_Count
        from alumni a left join alumni_profil c on a.username=c.username left join angkatan p  ON c.angkatan = p.id_angkatan where c.STATUS = '" . $filterStatus_item . "' and a.roles = 'alumni'
        GROUP BY p.ID_ANGKATAN,p.angkatan;");
        $num['num'] = $data->num_rows();
        return $data->result_array();
    }
    public function getStatusTahun2($filterStatus_item)
    {
        $data = $this->db->query("SELECT p.ID_ANGKATAN As EventKey , p.angkatan As EventName, count(c.ANGKATAN) As Assignee_Count
        from alumni a left join alumni_profil c on a.username=c.username left join angkatan p  ON c.angkatan = p.id_angkatan where c.STATUS = '" . $filterStatus_item . "' and a.roles = 'alumni'
        GROUP BY p.ID_ANGKATAN,p.angkatan;");
        return $data;
    }
    public function getPrestasi()
    {
        $data = $this->db->query("SELECT * FROM prestasi");
        return $data->result_array();
    }
    public function getPrestasiData()
    {
        $data = $this->db->query("SELECT a.judul, a.tanggal, a.validasi, b.nama, c.angkatan, d.prestasi, d.id_prestasi FROM alumni_prestasi a left join alumni b on a.username=b.username left join angkatan c on a.id_angkatan=c.id_angkatan left join prestasi d on a.id_prestasi=d.id_prestasi");
        return $data->result_array();
    }
    function fetch_nama($periksaID)
    {   
       $this->db->select('a.nama, a.username')
                    ->join('alumni_profil b','a.username = b.username','left')
                    ->join('angkatan c','b.angkatan = c.id_angkatan','left')
                    ->where('b.angkatan',$periksaID);
        $this->db->from('alumni a');
        $query = $this->db->get();
        $output = '<option value="">Pilih Nama</option>';
        foreach($query->result() as $row){
            $output .= '<option value="'.$row->username.'">'.$row->nama.'</option>';
        }
        return $output;
    }
}
