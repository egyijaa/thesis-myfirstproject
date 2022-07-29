<?php
class Admin extends CI_Controller{
  function __construct(){
    parent::__construct();
    //validasi jika user belum login
    if($this->session->userdata('masuk') != TRUE){
			$this->session->set_userdata('rurl', current_url());
      redirect('Login/toLogin');
		}
    $this->load->library('Ajax_pagination');
    $this->perPage = 5;
    $this->load->model('Admin_model');
  }

  public function toAdmin()
	{	
		$data = array();
        $username = $this->session->userdata('ses_id');
        //total rows count
        $totalRec = count($this->Admin_model->getRows());
        
        //pagination configuration
        $config['target']      = '#postList';
        $config['base_url']    = base_url().'Admin/ajaxPaginationData';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        $config['link_func']   = 'searchFilter';
        $config['link_func2']   = 'filterAngkatan';
        $config['link_func3']   = 'filterKota';
        $this->ajax_pagination->initialize($config);
        
        //get the posts data
        $data['posts'] = $this->Admin_model->getRows(array('limit'=>$this->perPage));
        $data['result'] = $data['posts'];
        
        //load the view
        $this->load->view('layouts/header');
        $this->load->view('admin/admin', $data);
        $this->load->view('layouts/footer');
	}
  function alumniBaru(){
      $this->load->helper(array('form', 'url'));
      $this->load->model('Alumni_model');
      $data['kelas'] = $this->Admin_model->getKelas();
      $data['angkatan'] = $this->Alumni_model->getAngkatan();
      $this->load->view('layouts/header');
      $this->load->view('admin/alumniBaru',$data);
      $this->load->view('layouts/footer');
  }
  public function save(){
		// Ambil data yang dikirim dari form
    $this->load->library('form_validation');

    $this->form_validation->set_rules('username[]', 'Username', 'required|min_length[6]|max_length[25]|is_unique[alumni.username]',array('is_unique' => 'Terdapat Username yang sudah dipakai! Harap periksa kembali dan gunakan username lain!'));
    $this->form_validation->set_rules('nama[]', 'Nama' ,'required|max_length[255]|min_length[1]');
    $this->form_validation->set_rules('kelas', 'Kelas', 'required');
    $this->form_validation->set_rules('roles', 'Roles', 'required');
    if (isset($_POST['roles'])){
      if ($_POST['roles'] == 'alumni'){
          $this->form_validation->set_rules('angkatan', 'Angkatan', 'required');
      }
    }
    $this->form_validation->set_message('required', 'Harap periksa kembali setiap isi {field}!, Jangan dikosongkan!');
    // $this->form_validation->set_message('is_unique', '{field} sudah dipakai!, Masukkan {field} lain!');
    if ($this->form_validation->run() == FALSE) {
        echo json_encode(['success'=>array(
            'username' => '<div class="btn btn-outline-success btn-sm ml-2" style="pointer-events: none;">Semua Username dapat Digunakan</div>'
                ),'error'=>array(
                    'username' => form_error('username[]', '<div class="btn btn-outline-danger btn-sm ml-2" style="pointer-events: none;">', '</div>'),
                    'nama' => form_error('nama[]', '<div class="btn btn-outline-danger btn-sm ml-2" style="pointer-events: none;">', '</div>'),
                    'kelas' => form_error('kelas', '<div class="btn btn-outline-danger btn-sm ml-2" style="pointer-events: none;">', '</div>'),
                    'roles' => form_error('roles', '<div class="btn btn-outline-danger btn-sm ml-2" style="pointer-events: none;">', '</div>'),
                    'angkatan' => form_error('angkatan', '<div class="btn btn-outline-danger btn-sm ml-2" style="pointer-events: none;">', '</div>')
        )]);
    }
    else {
      echo json_encode(array("message" => "success"));
      date_default_timezone_set("Asia/Bangkok");
      $date = date("Y-m-d H:i:s");
      $roles = $_POST['roles'];
      $username = $_POST['username']; // Ambil data nis dan masukkan ke variabel nis
      $nama = $_POST['nama']; // Ambil data nama dan masukkan ke variabel nama
      if (isset($_POST['angkatan'])){
        $angkatan = $_POST['angkatan']; // Ambil data telp dan masukkan ke variabel telp
      }
      else {
        $angkatan = null; // Ambil data telp dan masukkan ke variabel telp
      }
      $data = array();
      $data2 = array();
      $index = 0; // Set index array awal dengan 0
      foreach($username as $datanis){ // Kita buat perulangan berdasarkan nis sampai data terakhir
        array_push($data, array(
          'USERNAME'=>$datanis,
          'NAMA'=>$nama[$index],  // Ambil dan set data nama sesuai index array dari $index
          'PASS'=>password_hash($datanis, PASSWORD_DEFAULT),  // Ambil dan set data telepon sesuai index array dari $index
          'active'=>1,  // Ambil dan set data alamat sesuai index array dari $index
          'roles'=>$roles, 
        ));
        
        $index++;
      }
        $this->Admin_model->save_batch($data);
        $index2 = 0;
        foreach($username as $datanis){ // Kita buat perulangan berdasarkan nis sampai data terakhir
          array_push($data2, array(
            'USERNAME'=>$datanis,
            'FOTO_PROFIL'=>'default.jpg',
            'ANGKATAN'=>$angkatan,
            'LATEST'=>$date,  // Ambil dan set data nama sesuai index array dari $index
          ));
          
          $index2++;
        }
        $this->Admin_model->save_batch2($data2);
    }
	}

	function ajaxPaginationData(){
        $conditions = array();
        
        //calc offset number
        $page = $this->input->post('page');
        if(!$page){
            $offset = 0;
        }else{
            $offset = $page;
        }
        
        //set conditions for search
        $keywords = $this->input->post('keywords');
        $sortBy = $this->input->post('sortBy');
        if(!empty($keywords)){
            $conditions['search']['keywords'] = $keywords;
        }
        
        //total rows count
        $total_row = $this->Admin_model->getRows($conditions);
	    	$totalRec = !empty($total_row) ? count($total_row) : count([]);
        
        //pagination configuration
        $config['target']      = '#postList';
        $config['base_url']    = base_url().'Admin/ajaxPaginationData';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        $config['link_func']   = 'searchFilter';
        $config['link_func2']   = 'filterAngkatan';
        $config['link_func3']   = 'filterKota';
        $this->ajax_pagination->initialize($config);
        
        //set start and limit
        $conditions['start'] = $offset;
        $conditions['limit'] = $this->perPage;
        
        //get posts data
        $data['posts'] = $this->Admin_model->getRows($conditions);
        		
        //load the view
		$this->load->view('admin/ajax-admin', $data, false);
  }

  public function updateActive()
  {
      $nip = $this->input->post('nip');
      $active = $this->input->post('active');
      $this->Admin_model->updActive($nip, $active);
      $output['message'] = 'Success';
      echo json_encode($output);
  }

  public function delAdmin()
    {
        $result =$this->Admin_model->getAdminProfil();
        $data['result'] = $result;
        foreach($result as $row) 
        {
          $filePath = $row["gambarnya"];
          $ada = 'assets/image/broadcast/'.$filePath;
          $ada2 = 'assets/image/lowongan/'.$filePath;
          if ($filePath != 'default.jpg'){
            if (file_exists($filePath)){
                unlink($ada);
              }
          }
          if (file_exists($filePath)){
            unlink($ada2);
          }
        }
        $this->Admin_model->delAdmin();
        header('Location: ' . base_url() . "Admin/toAdmin");
    }
    public function adminBaru()
	{
		$trigger = $this->Admin_model->addAdmin();
        
		if (isset($trigger["error"])) {
			echo json_encode(array("message" => "failed", "error" => $trigger["error"]));
		} else {
			echo json_encode(array("message" => "success"));
		}
	}
}
