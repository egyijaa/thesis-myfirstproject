<?php
class Lowongan extends CI_Controller
{
    function __construct()
	{
		parent::__construct();
        if($this->session->userdata('masuk') != TRUE){
			$this->session->set_userdata('rurl', current_url());
            redirect('Login/toLogin');
		}
        $this->perPage = 10;
        $this->load->library('Ajax_pagination');
        $this->load->model('Lowongan_model');
        $this->load->model('Alumni_model');
        $active['active'] = $this->Alumni_model->getActive();
        if (($this->session->userdata('akses') == 2 || $this->session->userdata('akses') == 3) && $active['active'][0]['active'] == 0) {
            $this->session->sess_destroy();
            $url = base_url('');
            redirect($url);
        }
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
		$config['validation'] = TRUE;
        $this->email->initialize($config);
	}
    function toLowongan()
	{   
        if ($this->session->userdata('akses') != 2 && $this->session->userdata('akses')!= 3){
            redirect('Lowongan/toLowongan2');
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
        $this->perPage = 6;
        $data = array();
        $this->load->helper(array('form', 'url'));
        $nav['nav'] = $this->Alumni_model->getAlumniDropDown();
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
            $data['information'] = $this->Lowongan_model->getPendidikan();
            $data['terakhir'] = $this->Lowongan_model->getPublished();
            $data['total'] = $this->Lowongan_model->count();
            $a = $this->Lowongan_model->getRows();
            if($a == false){
                echo $this->session-> set_flashdata('#error-Lowongan', '<div class="alert alert-warning" align="center"><h4>Data Tidak Ditemukan!</h4></div>');
                $totalRec = 0;
            }
            else {
                $totalRec = count($this->Lowongan_model->getRows());
            }
            
            //pagination configuration
            $config['target']      = '#postList';
            $config['base_url']    = base_url().'Lowongan/ajaxPaginationData';
            $config['total_rows']  = $totalRec;
            $config['per_page']    = $this->perPage;
            $config['link_func']   = 'searchFilter';
            $this->ajax_pagination->initialize($config);
            
            //get the posts data
            $data['posts'] = $this->Lowongan_model->getRows(array('limit'=>$this->perPage));
                $this->load->view('layouts/header',$nav);
                $this->load->view('lowongan/lowongan_dash', $data);
                $this->load->view('layouts/footer');
        }
				
	}
    function toEditLowongan()
	{ 
        if ($this->session->userdata('akses') == 3){
            redirect('Lowongan/toLowongan');
        }
        else {
            $data = array();
            $this->load->helper(array('form', 'url'));
            if ($this->session->userdata('akses') == 2){
                $nav['nav'] = $this->Alumni_model->getAlumniDropDown();
            }
            $data['information'] = $this->Lowongan_model->getPendidikan();
            $data['posts'] = $this->Lowongan_model->getLowonganToEdit();
            if ($this->session->userdata('akses') == 2){
                $this->load->view('layouts/header', $nav);
            }
            else {
                $this->load->view('layouts/header');
            }
            $this->load->view('lowongan/editLowongan', $data);
            $this->load->view('layouts/footer');
        }		
	}
  function ajaxPaginationData(){
        $this->perPage = 6;
        $conditions = array();
            
        //calc offset number
        $page = $this->input->post('page');
        if(!$page){
            $offset = 0;
            echo $this->session-> set_flashdata('#error-Lowongan', '<div class="alert alert-warning" align="center"><h4>Data Tidak Ditemukan!</h4></div>');
        }else{
            $offset = $page;
        }
        //set conditions for search
        $keywords = $this->input->post('keywords');
        if(!empty($keywords)){
            $conditions['search']['keywords'] = $keywords;
        }
        
        //total rows count
        $total_row = $this->Lowongan_model->getRows($conditions);
        $totalRec = !empty($total_row) ? count($total_row) : count([]);
        
        //pagination configuration
        $config['target']      = '#postList';
        $config['base_url']    = base_url().'Lowongan/ajaxPaginationData';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        $config['link_func']   = 'searchFilter';
        $this->ajax_pagination->initialize($config);
        
        //set start and limit
        $conditions['start'] = $offset;
        $conditions['limit'] = $this->perPage;
        
        //get posts data
        $data['posts'] = $this->Lowongan_model->getRows($conditions);
        //load the view
        $this->load->view('lowongan/ajax-user', $data, false);
    }
    function toLowongan2()
	{ 
        if ($this->session->userdata('akses')== 3){
            redirect('Lowongan/toLowongan');
        }
        else {
            $data = array();
            $this->load->helper(array('form', 'url'));
            if ($this->session->userdata('akses') == 2){
                $nav['nav'] = $this->Alumni_model->getAlumniDropDown();
            }
            $data['information'] = $this->Lowongan_model->getPendidikan();
            $data['terakhir'] = $this->Lowongan_model->getPublished();
            $data['total'] = $this->Lowongan_model->count();
            if ($this->session->userdata('akses') != 2){
                $a = $this->Lowongan_model->getRows();
            }
            else {
                $a = $this->Lowongan_model->getRows2();
            }
            if($a == false){
                echo $this->session-> set_flashdata('#error-Lowongan', '<div class="alert alert-warning" align="center"><h4>Data Tidak Ditemukan!</h4></div>');
                $totalRec = 0;
            }
            else {
                if ($this->session->userdata('akses') != 2){
                    $totalRec = count($this->Lowongan_model->getRows());
                }
                else {
                    $totalRec = count($this->Lowongan_model->getRows2());
                }
            }
            
            //pagination configuration
            $config['target']      = '#postList';
            $config['base_url']    = base_url().'Lowongan/ajaxPaginationData2';
            $config['total_rows']  = $totalRec;
            $config['per_page']    = $this->perPage;
            $config['link_func']   = 'searchFilter';
            $config['link_func2']   = 'filterAngkatan';
            $this->ajax_pagination->initialize($config);
            
            //get the posts data
            if ($this->session->userdata('akses') != 2){
                $data['posts'] = $this->Lowongan_model->getRows(array('limit'=>$this->perPage));
            }
            else {
                $data['posts'] = $this->Lowongan_model->getRows2(array('limit'=>$this->perPage));
            }
            if ($this->session->userdata('akses') == 2){
                $this->load->view('layouts/header', $nav);
            }
            else {
                $this->load->view('layouts/header');
            }
            $this->load->view('lowongan/lowongan', $data);
            $this->load->view('layouts/footer');
                    
        }
	}
    function ajaxPaginationData2(){
        $conditions = array();
            
        //calc offset number
        $page = $this->input->post('page');
        if(!$page){
            $offset = 0;
            echo $this->session-> set_flashdata('#error-Lowongan', '<div class="alert alert-warning" align="center"><h4>Data Tidak Ditemukan!</h4></div>');
        }else{
            $offset = $page;
        }
        //set conditions for search
        $keywords = $this->input->post('keywords');
        $keywords2 = $this->input->post('keywords2');
        $filterAngkatan_item = $this->input->post('filterAngkatan_item');
        if(!empty($keywords)){
            $conditions['search']['keywords'] = $keywords;
        }
        if(!empty($filterAngkatan_item) || !empty($keywords2) ){
            $conditions['search']['filterAngkatan_item'] = $filterAngkatan_item;
            $conditions['search']['keywords2'] = $keywords2;
          }
        
        //total rows count
        if ($this->session->userdata('akses') != 2){
            $total_row = $this->Lowongan_model->getRows($conditions);
        }
        else {
            $total_row = $this->Lowongan_model->getRows2($conditions);
        }
        $totalRec = !empty($total_row) ? count($total_row) : count([]);
        
        //pagination configuration
        $config['target']      = '#postList';
        $config['base_url']    = base_url().'Lowongan/ajaxPaginationData2';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        $config['link_func']   = 'searchFilter';
        $config['link_func2']   = 'filterAngkatan';
        $this->ajax_pagination->initialize($config);
        
        //set start and limit
        $conditions['start'] = $offset;
        $conditions['limit'] = $this->perPage;
        
        //get posts data
        if ($this->session->userdata('akses') != 2){
            $data['posts'] = $this->Lowongan_model->getRows($conditions);
        }
        else {
            $data['posts'] = $this->Lowongan_model->getRows2($conditions);
        }
        //load the view
        $data['filterAngkatan'] = $filterAngkatan_item;
        $this->load->view('lowongan/ajax-lowongan', $data, false);
    }
    public function validate_image() {
        $check = TRUE;
        if ((!isset($_FILES['gambar'])) || $_FILES['gambar']['size'] == 0) {
            $this->form_validation->set_message('validate_image', 'The {field} field is required');
            $check = FALSE;
        }
        else if (isset($_FILES['gambar']) && $_FILES['gambar']['size'] != 0) {
            $allowedExts = array("gif", "jpeg", "jpg", "png", "JPG", "JPEG", "GIF", "PNG");
            $allowedTypes = array(IMAGETYPE_PNG, IMAGETYPE_JPEG, IMAGETYPE_GIF);
            $extension = pathinfo($_FILES["gambar"]["name"], PATHINFO_EXTENSION);
            $detectedType = exif_imagetype($_FILES['gambar']['tmp_name']);
            $type = $_FILES['gambar']['type'];
            if (!in_array($detectedType, $allowedTypes)) {
                $this->form_validation->set_message('validate_image', 'Invalid Image Content!');
                $check = FALSE;
            }
            if(filesize($_FILES['gambar']['tmp_name']) > 3100000) {
                $this->form_validation->set_message('validate_image', 'Ukuran Gambar Maksimal 3MB!');
                $check = FALSE;
            }
            if(!in_array($extension, $allowedExts)) {
                $this->form_validation->set_message('validate_image', "Extension file tidak didukung : {$extension}.");
                $check = FALSE;
            }
        }
        return $check;
    }
    
    function Tambah()
    {       
        $this->load->library('form_validation');
        if (!empty($_FILES["gambar"]["name"])){
            $config['upload_path']   = 'assets/image/lowongan/'; 
            $config['allowed_types'] = "gif|jpg|jpeg|png";
            $config['max_width']     = 6000; 
            $config['max_height']    = 6000;
            $file_name = $_FILES["gambar"]["name"]; 
            $newfile_name= str_replace(' ', '_', $file_name);
            $config['file_name']      = $newfile_name; 
            $this->upload->initialize($config);
        }
        if (!empty($_FILES["gambar"]["name"])){
            $data['gambar'] = $this->upload->data('file_name');
        }
        else {
            $data['gambar'] = 'default.jpg';
        }

        $this->form_validation->set_rules('judul', 'Judul', 'required|min_length[5]|max_length[50]');
        $this->form_validation->set_rules('angkatan', 'Angkatan', 'required');
        $this->form_validation->set_rules('deadline', 'Deadline', 'required');
        $this->form_validation->set_rules('gambar', 'Gambar', 'callback_validate_image');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|min_length[10]');

        $this->form_validation->set_message('required', 'Harap isi {field}!, Jangan dikosongkan!');

            if ($this->form_validation->run() == FALSE) {
                echo json_encode(['success'=>array(
                    'judul' => '<div class="text-success text-sm" style="pointer-events: none;"> Judul memenuhi Syarat</div>'
                ),'error'=>array(
                    'judul' => form_error('judul', '<div class="text-danger text-sm" style="pointer-events: none;">', '</div>'),
                    'angkatan' => form_error('angkatan', '<div class="text-danger text-sm" style="pointer-events: none;">', '</div>'),
                    'gambar' => form_error('gambar', '<div class="text-danger text-sm" style="pointer-events: none;">', '</div>'),
                    'deadline' => form_error('deadline', '<div class="text-danger ml-2 text-sm" style="pointer-events: none;">', '</div>'),
                    'deskripsi' => form_error('deskripsi', '<div class="text-danger ml-2 text-sm" style="pointer-events: none;">', '</div>')
                )]);
            }
            else {
                echo json_encode(array("message" => "success"));
                if (!$this->upload->do_upload('gambar')){
                    $data['gambar'] = "blank.jpg";
                }
                else {
                    $data1 = $this->upload->data();
                }
                $this->Lowongan_model->addLowongan($data);
                $result = $this->Lowongan_model->getidKontak();
                $data['result'] = $result;
                foreach($result as $row) {
                    $data['id'] = $row["id_kontak"];
                    $this->Lowongan_model->autoUpd($data);
                };
                if ($this->session->userdata('akses')=='2'){
                    $result2 = $this->Lowongan_model->getLowongan();
                    foreach($result2 as $row) {
                    };
                    $data['id'] = $row["id_lowongan_pekerjaan"];
                    $data['nomor'] = $row["nomor"];
                    $data['email'] = $row["email"];
                    $data['nama'] = $row["nama_lengkap"];
                    $data['judul'] = $row["judul"];
                    $data['deskripsi'] = $row["deskripsi"];
                    $data['poster'] = $row["gambar"];
                    $data['publish'] = $row["published"];
                    $data['active'] = $row["active"];
                    $data['expired'] = $row["expired"];

                    $this->email->from('smanegeri3ptk@gmail.com', 'Dari : '.$row["nama_lengkap"]);
                    $this->email->to('smanegeri3ptk@gmail.com'); 
                    $this->email->subject('Lowongan Baru');
                    $this->email->message($this->load->view('emails/lowonganBaru',$data, true));
                    $this->email->send();
                    $this->email->from('smanegeri3ptk@gmail.com', 'Dari : Admin PASMANTAP SMAN3PTK');
                    $this->email->to($row["email"]); 
                    $this->email->subject('Lowongan Baru');
                    $this->email->message($this->load->view('emails/lowonganBaru-user',$data, true));
                    $this->email->send();
                }
            }
        
    }
    function Edit()
    {       
        $this->load->library('form_validation');
        $result = $this->Lowongan_model->getLowongan();
        foreach($result as $row){ }
        if (!empty($_FILES["gambar"]["name"])){
            $config['upload_path']   = 'assets/image/lowongan/'; 
            $config['allowed_types'] = "gif|jpg|jpeg|png";
            $config['max_width']     = 6000; 
            $config['max_height']    = 6000;
            $file_name = $_FILES["gambar"]["name"]; 
            $newfile_name= str_replace(' ', '_', $file_name);
                $filePath = $row["gambar"];
                    if ($newfile_name == $filePath){
                        $baru = 'Baru_'.$newfile_name;
                        $config['file_name']      = $baru; 
                    }
                    else {
                        $config['file_name']      = $newfile_name; 
                    }
            $this->upload->initialize($config);
        }
        if (!empty($_FILES["gambar"]["name"])){
            $data['gambar'] = $this->upload->data('file_name');
        }
        else {
            $data['gambar'] = 'default';
        }
        $this->form_validation->set_rules('judul', 'Judul', 'required|min_length[5]|max_length[50]');
        $this->form_validation->set_rules('angkatan', 'Angkatan', 'required');
        $this->form_validation->set_rules('deadline', 'Deadline', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|min_length[10]');

        $this->form_validation->set_message('required', 'Harap isi {field}!, Jangan dikosongkan!');
        if ($this->form_validation->run() == FALSE) {
            echo json_encode(['success'=>array(
                'judul' => '<div class="text-success text-sm" style="pointer-events: none;"> Judul memenuhi Syarat</div>'
            ),'error'=>array(
                'judul' => form_error('judul', '<div class="text-danger text-sm" style="pointer-events: none;">', '</div>'),
                'angkatan' => form_error('angkatan', '<div class="text-danger text-sm" style="pointer-events: none;">', '</div>'),
                'deadline' => form_error('deadline', '<div class="text-danger ml-2 text-sm" style="pointer-events: none;">', '</div>'),
                'deskripsi' => form_error('deskripsi', '<div class="text-danger ml-2 text-sm" style="pointer-events: none;">', '</div>')
            )]);
        }
        else {
            echo json_encode(array("message" => "success"));
            if (!empty($_FILES["gambar"]["name"])){
                if (! $this->upload->do_upload('gambar')){
                    foreach($result as $row) 
                    {
                        $data['gambar'] = $row["gambar"];
                    }
                }
                else{
                    foreach($result as $row) 
                    {
                    $filePath = $row["gambar"];
                    unlink('assets/image/lowongan/'.$filePath);
                    }
                    $data1 = $this->upload->data();
                }
            }
            $this->Lowongan_model->updLowongan($data);
            if ($this->session->userdata('akses')!='2' && $row["nip"] != $this->session->userdata('ses_id') && $row["email"] != null){
                $data['id'] = $row["id_lowongan_pekerjaan"];
                $data['email'] = $row["email"];
                $data['nama'] = $this->session->userdata('ses_nama');
                $data['judul'] = $row["judul"];
                $data['active'] = $row["active"];
                $data['expired'] = $row["expired"];

                $this->email->from('smanegeri3ptk@gmail.com', 'Dari : '.$this->session->userdata('ses_nama'));
                $this->email->to($row["email"]); 
                $this->email->subject('Lowongan Diupdate');
                $this->email->message($this->load->view('emails/lowonganUpdate',$data, true));
                $this->email->send();
            }
        }
    }
    public function updateActive()
  {
      $this->Lowongan_model->updActive();
      $result =$this->Lowongan_model->ambilAktif();
      $output['message'] = 'Success';
      echo json_encode($output);
      foreach ($result as $row){
        if ($row['active'] == 1 && !empty($row['email'])){
				$data['id'] = $row['id_lowongan_pekerjaan'];
				$data['judul'] = $row['judul'];
				$data['nomor'] = $row['nomor'];
				$data['expired'] = $row['expired'];

				$this->email->from('smanegeri3ptk@gmail.com', 'Lowongan Aktif : '.$row['judul']);
				$this->email->to($row['email']); 

				$this->email->subject('Lowongan Dipublikasikan/Aktif');
				$this->email->message($this->load->view('emails/lowonganAktif',$data, true));
                $this->email->send();
        }
      }
  }
    function Hapus(){
        if (isset($_POST['delLowongan'])) {
            $result =$this->Lowongan_model->getLowonganToDel();
            $data['result'] = $result;
			foreach($result as $row) {
            $filePath = $row["gambar"];
            unlink('assets/image/lowongan/'.$filePath);
            };
            $this->Lowongan_model->delLowongan();
        }
            header( "refresh:0.7;url=toLowongan2" );
    }
    function HapusAll(){
        if (isset($_POST['delAll'])) {
            $result =$this->Lowongan_model->getLowonganAll();
            $data['result'] = $result;
            foreach($result as $row) 
            {
                $filePath = $row["gambar"];
                unlink('assets/image/lowongan/'.$filePath);
            };
            $this->Lowongan_model->delAll();
        }
        header( "refresh:0.7;url=toLowongan2" );
    }
}
?>