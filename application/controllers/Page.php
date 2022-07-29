<?php defined('BASEPATH') OR die('No direct script access allowed');

require('./application/third_party/phpoffice/vendor/autoload.php');

class Page extends CI_Controller{
  
  function __construct(){
      parent::__construct();
      if($this->session->userdata('masuk') != TRUE){
        $this->session->set_userdata('rurl', current_url());
        redirect('Login/toLogin');
      }
      $this->load->library('Ajax_pagination');
      $this->perPage = 1000000;
      $this->load->model('Alumni_model');
      $active['active'] = $this->Alumni_model->getActive();
        if (($this->session->userdata('akses') == 2 || $this->session->userdata('akses') == 3) && $active['active'][0]['active'] == 0) {
            $this->session->sess_destroy();
            $url = base_url('');
            redirect($url);
        }
      $this->load->model('Admin_model');
  }
  function index(){
        if ($this->session->userdata('akses') == 2 || $this->session->userdata('akses') == 3){
            $nav['nav'] = $this->Alumni_model->getAlumniDropDown();
            $this->load->view('layouts/header', $nav);
        }
        else {
            $this->load->view('layouts/header');
        }
        $this->load->view('menu/dashboard');
        $this->load->view('layouts/footer');
  }

  public function toProfile()
	{
				//Get your db results
        if ($this->session->userdata('akses') != 2 && $this->session->userdata('akses') != 3){
          redirect('page/notFound');
        }
        $status['status'] = $this->Alumni_model->getRoles();
        if($status['status'][0]['roles'] == 'alumni'){
           $this->session->unset_userdata('akses');
           $this->session->set_userdata('akses', '2');
        }
        else if($status['status'][0]['roles'] == 'siswa') {
           $this->session->unset_userdata('akses');
           $this->session->set_userdata('akses', '3');
        }
        $this->load->helper(array('form', 'url'));
				if ($this->session->userdata('akses') == 2 || $this->session->userdata('akses') == 3){
            $nav['nav'] = $this->Alumni_model->getAlumniDropDown();
        }
				$data['information'] = $this->Alumni_model->getAlumniProfilSelf();
				$data['kota'] = $this->Alumni_model->getKota();
				$data['status'] = $this->Alumni_model->getStatus();
				$data['angkatan'] = $this->Alumni_model->getAngkatan();
        $data['tahun'] = $this->Alumni_model->getKondisiTahun();
			
				if ($this->session->userdata('akses') == 2 || $this->session->userdata('akses') == 3){
          $this->load->view('layouts/header', $nav);
        }
        else {
            $this->load->view('layouts/header');
        }
				$this->load->view('alumni/profilSendiri', $data);
				$this->load->view('layouts/footer');
		
	}
  public function toKontak()
	{
				//Get your db results
        if ($this->session->userdata('akses') == 2 || $this->session->userdata('akses') == 3){
            $nav['nav'] = $this->Alumni_model->getAlumniDropDown();
        }
				$data['admin'] = $this->Admin_model->getAdmin();
			
				if ($this->session->userdata('akses') == 2 || $this->session->userdata('akses') == 3){
          $this->load->view('layouts/header', $nav);
        }
        else {
            $this->load->view('layouts/header');
        }
				$this->load->view('menu/kontakAdmin', $data);
				$this->load->view('layouts/footer');
		
	}
  public function toPrestasi()
	{
				//Get your db results
        $this->load->helper(array('form', 'url'));
        $data['angkatan'] = $this->Alumni_model->getAngkatan();
        $data['information'] = $this->Alumni_model->getPrestasi();
        $data['information2'] = $this->Alumni_model->getPrestasiData();
        if ($this->session->userdata('akses') == 2 || $this->session->userdata('akses') == 3){
            $nav['nav'] = $this->Alumni_model->getAlumniDropDown();
        }
				$data['admin'] = $this->Admin_model->getAdmin();
			
				if ($this->session->userdata('akses') == 2 || $this->session->userdata('akses') == 3){
          $this->load->view('layouts/header', $nav);
          // $this->load->view('menu/prestasi', $data);
        }
        else {
            $this->load->view('layouts/header');
            // $this->load->view('menu/adminPrestasi', $data);
        }
        $this->load->view('menu/prestasi', $data);
				$this->load->view('layouts/footer');
		
	}

function fetch_state()
	{
		if($this->input->post('periksaID'))
		{
			echo $this->Alumni_model->fetch_nama($this->input->post('periksaID'));
		}
	}
  
  public function getJumlah()
	{
				//Get your db results
        $filterStatus_item = $this->input->post('filterStatus_item');
        $cek_Sum = $this->Alumni_model->getStatusSum($filterStatus_item);
          $data['SUM'] = $cek_Sum->row_array();
          $cek_Tahun = $this->Alumni_model->getStatusTahun($filterStatus_item);
          $data['TAHUN'] = $cek_Tahun->row_array();
	}

  public function alumni()
	{	   
        $status['status'] = $this->Alumni_model->getRoles();
        if ($this->session->userdata('akses') == 2 || $this->session->userdata('akses') == 3) {
            if($status['status'][0]['roles'] == 'alumni'){
              $this->session->unset_userdata('akses');
              $this->session->set_userdata('akses', '2');
            }
            else if($status['status'][0]['roles'] == 'siswa') {
              $this->session->unset_userdata('akses');
              $this->session->set_userdata('akses', '3');
            }
            $nav['nav'] = $this->Alumni_model->getAlumniDropDown();
        }
        $data['cek'] = $this->Alumni_model->getAlumniCek();
        if($this->session->userdata('akses') == 2 && (($data['cek'][0]['kota'] == null || $data['cek'][0]['kota'] == "") || ($data['cek'][0]['status'] == null || $data['cek'][0]['status'] == ""))){
          $this->load->view('layouts/header',$nav);
          $this->load->view('400/403');
          $this->load->view('layouts/footer');
        }
        elseif ($this->session->userdata('akses') == 3 && (($data['cek'][0]['no_telepon'] == null || $data['cek'][0]['no_telepon'] == "") || ($data['cek'][0]['email'] == null || $data['cek'][0]['email'] == ""))){
          $this->load->view('layouts/header',$nav);
          $this->load->view('400/403');
          $this->load->view('layouts/footer');
        }
        else {
          $data = array();
          $data['angkatan'] = $this->Alumni_model->getAngkatan();
          $data['terakhir'] = $this->Alumni_model->getPublished();
          $data['setatus'] = $this->Alumni_model->getStatus();
          $data['kota'] = $this->Alumni_model->getKota();
          if ($this->session->userdata('akses') == 0 || $this->session->userdata('akses') == 1) {
            $data['setatusTotal'] = $this->Alumni_model->getStatusJumlah();
            $data['tahun'] = $this->Alumni_model->getKondisiTahun();
          }
            //total rows count
            $a = $this->Alumni_model->getRows();
            if($a == false){
                echo $this->session-> set_flashdata('#error-Alumni', '<div class="alert alert-warning" align="center"><h4>Data Tidak Ditemukan!</h4></div>');
                $totalRec = 0;
            }
            else {
                $totalRec = count($this->Alumni_model->getRows());
            }
            
            //pagination configuration
            $config['target']      = '#postList';
            $config['base_url']    = base_url().'Page/ajaxPaginationData';
            $config['total_rows']  = $totalRec;
            $config['per_page']    = $this->perPage;
            $config['link_func']   = 'searchFilter';
            $config['link_func2']   = 'filterAngkatan';
            $config['link_func3']   = 'filterKota';
            $config['link_func4']   = 'filterStatus';
            $this->ajax_pagination->initialize($config);
            
            //get the posts data
            $data['posts'] = $this->Alumni_model->getRows(array('limit'=>$this->perPage));
            $data['result'] = $data['posts'];
            
            //load the view
            if ($this->session->userdata('akses') == 2 || $this->session->userdata('akses') == 3){
              $this->load->view('layouts/header', $nav);
            }
            else {
                $this->load->view('layouts/header');
            }
            $this->load->view('alumni/halaman-alumni', $data);
            $this->load->view('layouts/footer');
        }
	}
  public function siswa()
	{	   
        if ($this->session->userdata('akses') == 2 || $this->session->userdata('akses')== 3){
            redirect('page/alumni');
        }
        $status['status'] = $this->Alumni_model->getRoles();
          $data = array();
          $data['terakhir'] = $this->Alumni_model->getPublished();
          if ($this->session->userdata('akses') == 0 || $this->session->userdata('akses') == 1) {
            $data['setatusTotal'] = $this->Alumni_model->getStatusJumlah();
            $data['tahun'] = $this->Alumni_model->getKondisiTahun();
          }
            //total rows count
            $a = $this->Alumni_model->getRows();
            if($a == false){
                echo $this->session-> set_flashdata('#error-Alumni', '<div class="alert alert-warning" align="center"><h4>Data Tidak Ditemukan!</h4></div>');
                $totalRec = 0;
            }
            else {
                $totalRec = count($this->Alumni_model->getRows());
            }
            
            //pagination configuration
            $config['total_rows']  = $totalRec;
            $config['per_page']    = $this->perPage;
            $config['link_func']   = 'searchFilter';
            $this->ajax_pagination->initialize($config);
            
            //get the posts data
            $data['posts'] = $this->Alumni_model->getRows(array('limit'=>$this->perPage));
            $data['result'] = $data['posts'];
            
            //load the view
            $this->load->view('layouts/header');
            $this->load->view('alumni/siswa', $data);
            $this->load->view('layouts/footer');
	}

	function ajaxPaginationData(){
        $conditions = array();
        
        //calc offset number
        $page = $this->input->post('page');
        if(!$page){
            $offset = 0;
            echo $this->session-> set_flashdata('#error-Alumni', '<div class="alert alert-warning" align="center"><h4>Data Tidak Ditemukan!</h4></div>');
        }else{
            $offset = $page;
        }
        
        //set conditions for search
        $keywords = $this->input->post('keywords');
        $keywords2 = $this->input->post('keywords2');
        $keywords3 = $this->input->post('keywords3');
        $keywords4 = $this->input->post('keywords4');
        $filterKota_item = $this->input->post('filterKota_item');
        $filterAngkatan_item = $this->input->post('filterAngkatan_item');
        $filterStatus_item = $this->input->post('filterStatus_item');
        $sortBy = $this->input->post('sortBy');
        if(!empty($keywords)){
            $conditions['search']['keywords'] = $keywords;
        }
        if(!empty($filterAngkatan_item) || !empty($keywords2) ){
          $conditions['search']['filterAngkatan_item'] = $filterAngkatan_item;
          $conditions['search']['keywords2'] = $keywords2;
        }
        if(!empty($filterKota_item) || !empty($keywords3)){
          $conditions['search']['filterKota_item'] = $filterKota_item;
          $conditions['search']['keywords3'] = $keywords3;
        }
        if(!empty($filterStatus_item) || !empty($keywords4)){
          $conditions['search']['filterStatus_item'] = $filterStatus_item;
          $conditions['search']['keywords4'] = $keywords4;
        }
        if(!empty($sortBy)){
            $conditions['search']['sortBy'] = $sortBy;
        }
        
        //total rows count
        $total_row = $this->Alumni_model->getRows($conditions);
	    	$totalRec = !empty($total_row) ? count($total_row) : count([]);
        
        //pagination configuration
        $config['target']      = '#postList';
        $config['base_url']    = base_url().'Page/ajaxPaginationData';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        $config['link_func']   = 'searchFilter';
        $config['link_func2']   = 'filterAngkatan';
        $config['link_func3']   = 'filterKota';
        $config['link_func4']   = 'filterStatus';
        $this->ajax_pagination->initialize($config);
        
        //set start and limit
        $conditions['start'] = $offset;
        $conditions['limit'] = $this->perPage;
        
        //get posts data
        $data['posts'] = $this->Alumni_model->getRows($conditions);
		
        // $data['filterAngkatan'] = $filterAngkatan_item;
        // $data['filterKota'] = $filterKota_item;
        // $data['filterStatus'] = $filterStatus_item;
        		
        //load the view
		    $this->load->view('alumni/ajax-pagination-data', $data, false);
  }
  function ajaxPaginationData2(){
    
    $data = array();
    $filterStatus_item = $this->input->post('filterStatus_item');
    $data['cek4'] = $this->input->post('filterStatus_item2');
    $data['cek'] = $this->Alumni_model->getStatusTahun($filterStatus_item);
    $data['cek2'] = $this->Alumni_model->getStatusTahun2($filterStatus_item);
    $data['cek3'] = $this->Alumni_model->getStatusSum($filterStatus_item);
    $config['target2']      = '#postList2';
    $config['base_url']    = base_url().'Page/ajaxPaginationData2';
    $this->ajax_pagination->initialize($config);
    
    //load the view
    $this->load->view('alumni/ajax-chart', $data, false);
}

  public function updateActive()
  {
      $this->Alumni_model->updActive();
      $result =$this->Alumni_model->ambilAktif();
      $output['message'] = 'Success';
      echo json_encode($output);
      foreach ($result as $row){
        if ($row['active'] == 1 && !empty($row['email'])){
        $this->load->library('email');
        $config['protocol']    = 'smtp';
				$config['smtp_host']    = 'ssl://smtp.gmail.com';
				$config['smtp_port']    = '465';
				$config['smtp_timeout'] = '7';
				$config['smtp_user']    = 'smanegeri3ptk@gmail.com';
				$config['smtp_pass']    = 'egyijaa06';
				$config['charset']    = 'utf-8';
				$config['newline']    = "\r\n";
				$config['mailtype'] = 'html'; // or html
				$config['validation'] = TRUE; // bool whether to validate email or not      

				$this->email->initialize($config);
				$data['nama'] = $row['nama'];
				$data['username'] = $row['username'];

				$this->email->from('smanegeri3ptk@gmail.com', 'New User : '.$row['nama']);
				$this->email->to($row['email']); 

				$this->email->subject('Akun Baru');
				$this->email->message($this->load->view('emails/akunaktif',$data, true));
        $this->email->send();
        }
      }
  }
  public function updateStatus()
  {
      $this->Alumni_model->updStatus();
      $output['message'] = 'Success';
  }
  public function updateTahunA()
  {
      $this->Alumni_model->updKondisiTahun();
      $output['message'] = 'Success';
  }
  public function updateActiveSelf()
  {   
      date_default_timezone_set("Asia/Jakarta");
      $result =$this->Alumni_model->ambilAktif();
      $now = date("Y-m-d H:i:s"); 
        foreach ($result as $row){
          $created =  date("d-m-Y H:i", strtotime($row['latest']));
          $expire_date = date('Y-m-d H:i',strtotime('+15 seconds',strtotime($created)));
          if ($now>$expire_date) { //if current time is greater then created time
            $this->load->view('emails/notif');
          }
          else {
            if ($row['active'] == 1){
              $this->load->view('emails/notfound');
            }
            else {
              $this->Alumni_model->updActive();
              $this->load->library('email');
              $config['protocol']    = 'smtp';
              $config['smtp_host']    = 'ssl://smtp.gmail.com';
              $config['smtp_port']    = '465';
              $config['smtp_timeout'] = '7';
              $config['smtp_user']    = 'smanegeri3ptk@gmail.com';
              $config['smtp_pass']    = 'egyijaa06';
              $config['charset']    = 'utf-8';
              $config['newline']    = "\r\n";
              $config['mailtype'] = 'html'; // or html
              $config['validation'] = TRUE; // bool whether to validate email or not      

              $this->email->initialize($config);
              $data['nama'] = $row['nama'];
              $data['username'] = $row['username'];

              $this->email->from('smanegeri3ptk@gmail.com', 'New User : '.$row['nama']);
              $this->email->to($row['email']); 

              $this->email->subject('Akun Baru');
              $this->email->message($this->load->view('emails/akunaktif',$data, true));
              $this->email->send();
              $this->load->view('emails/success');
            }
          } 
        }
  }

  public function delAlumni()
    { 
      $username = $this->input->post('delAlumni');
      $cek_alumni = $this->Alumni_model->auth_alumni($username);
      if ($cek_alumni->num_rows() != 0){
          $result =$this->Alumni_model->getAlumniLowongan();
          $result2 =$this->Alumni_model->getAlumniFoto();
          $data =  $result->row_array();
          $data2 = $result2->row_array();
          $filePath = $data["gambar"];
          if ($filePath != 'blank.jpg' && ($filePath != null || $filePath != '')){
            unlink('assets/image/lowongan/'.$filePath);
          }
          $filePath2 = $data2["foto_profil"];
          if ($filePath2 != 'default.jpg'){
            unlink('assets/image/foto_profil/'.$filePath2);
          }
          $this->Alumni_model->delAlumni();
          echo $this -> session -> set_flashdata('pesanHapus', '<div class="alert alert-warning" align="center"><i class="fas fa-check-double"></i> Akun dengan username : '.$username.' Berhasil Dihapus!</div>');
      }
      else {
        echo $this -> session -> set_flashdata('pesanHapus', '<div class="alert alert-danger" align="center">Akun dengan username : '.$username.' Tidak Ada atau Sudah Dihapus!</div>');
      }
      redirect(base_url().'page/alumni');
    }
    public function toProfilebyOther()
	{
				//Get your db results
        if ($this->session->userdata('akses') == 2 || $this->session->userdata('akses') == 3){
          $nav['nav'] = $this->Alumni_model->getAlumniDropDown();
        }
				$data['information2'] = $this->Alumni_model->getAlumniProfilOther();
				$data['kota'] = $this->Alumni_model->getKota();
				$data['status'] = $this->Alumni_model->getStatus();
			
				if ($this->session->userdata('akses') == 2 || $this->session->userdata('akses') == 3){
          $this->load->view('layouts/header', $nav);
        }
        else {
            $this->load->view('layouts/header');
        }
				$this->load->view('alumni/profilLain', $data);
				$this->load->view('layouts/footer');
		
	}
    public function delAll()
    {   
      $result =$this->Alumni_model->getAlumniAll();
      $result2 =$this->Alumni_model->getLowonganAll();
      foreach($result as $row) 
      {
        $filePath = $row["foto_profil"];
        if ($filePath != 'default.jpg'){
          unlink('assets/image/foto_profil/'.$filePath);
        }
      }
      foreach($result2 as $row) 
      {
        $filePath = $row["gambar"];
        unlink('assets/image/lowongan/'.$filePath);
      }
        $this->Alumni_model->delAll();
        header('Location: ' . base_url() . "page/alumni");
    }
    
    public function notFound()
    {   
      if ($this->session->userdata('akses') == 2 || $this->session->userdata('akses') == 3){
        $nav['nav'] = $this->Alumni_model->getAlumniDropDown();
        $this->load->view('layouts/header', $nav);
      }
      else {
          $this->load->view('layouts/header');
      }
      $this->load->view('400/404');
      $this->load->view('layouts/footer');
    }
    public function resetPassword()
  	{
      $this->Alumni_model->resetPassword();
      header('Location: ' . base_url() . "page/alumni");
	  }
    public function ubahPasswordAdmin()
  	{
      $this->load->model('Admin_model');
      $username = $this->session->userdata('ses_id');
      $password = $this->input->post('modalpass');
      $cek_admin = $this->Admin_model->auth_admin($username);
      $data = $cek_admin->row_array();
      if (password_verify($password,$data['PASS'])){
          $this->Admin_model->updPassword($username);
          echo json_encode(array("message" => "success"));
      }
      else {
          echo json_encode(array("message" => "failed", "error" => 'Password Lama salah/tidak sesuai!'));
      }
	  }
}
