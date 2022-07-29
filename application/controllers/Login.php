<?php
class Login extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('form'); 
		$this->load->model('Alumni_model');
		$this->load->model('Admin_model');
	}
	function index()
	{
		if ($this->session->userdata('masuk', TRUE)) {
			redirect('page');
		}
		else{
			$this->load->view('layouts/header');
			$this->load->view('depan/loginRegister');
		}
	}
	function toLogin()
	{
		if ($this->session->userdata('masuk', TRUE)) {
			redirect('page');
		}
		else{
			$this->load->view('layouts/header');
			$this->load->view('depan/v_login');
		}
	}
	function toRegister()
	{
		if ($this->session->userdata('masuk', TRUE)) {
			redirect('page');
		}
		else{
			$this->load->helper(array('form', 'url'));
        	$this->load->library('form_validation');
			$this->load->library('email');
			$data['angkatan'] = $this->Alumni_model->getAngkatan();
			$this->load->view('layouts/header');
			$this->load->view('depan/v_register', $data);
			$this->load->view('layouts/footer');
		}
		
	}

	function auth()
	{
		$username = htmlspecialchars($this->input->post('username', TRUE), ENT_QUOTES);
		$password =$this->input->post('password');
		$cek_admin = $this->Admin_model->auth_admin($username);
		$cek_alumni = $this->Alumni_model->auth_alumni($username);

		if ($cek_admin->num_rows() > 0) { //jika login sebagai admin
			$data = $cek_admin->row_array();
			if (password_verify($password,$data['PASS']) && $data['active'] == 1){
				$this->session->set_userdata('masuk', TRUE);
				if ($username == 'spvsmanta'){
					$this->session->set_userdata('akses', '0');
				}
				else {
					$this->session->set_userdata('akses', '1');
				}	
				$this->session->set_userdata('ses_id', $data['NIP']);
				$this->session->set_userdata('ses_nama', $data['NAMA'].' (Admin)');
				redirect($this->session->userdata('rurl'));
			}
			else {
				if (password_verify($password,$data['PASS']) && $data['active'] == 0) {
					echo $this -> session -> set_flashdata('#error-msg', '<div class="alert alert-warning" align="center">Akun Admin Belum Aktif, Harap Konfirmasi ke Super Admin (Egy Ijaa) Selaku Developer!</div>');
				} else {
					echo $this -> session -> set_flashdata('#error-msg', '<div class="alert alert-danger" align="center">Password salah/tidak sesuai!</div>');
				}
				redirect('Login/toLogin');
			}
		}else if ($cek_alumni->num_rows() > 0){ 
			$data = $cek_alumni->row_array();
			if (password_verify($password,$data['PASS']) && $data['active'] == 1){
				$this->session->set_userdata('masuk', TRUE);
				if ($data['roles'] == 'alumni'){
					$this->session->set_userdata('akses', '2');
				}
				if ($data['roles'] == 'siswa'){
					$this->session->set_userdata('akses', '3');
				}
				$this->session->set_userdata('ses_id', $data['username']);
				$this->session->set_userdata('ses_nama', $data['NAMA']);
				$this->session->set_userdata('ses_foto', $data['foto_profil']);
				redirect($this->session->userdata('rurl'));
			}
			else {
				if (password_verify($password,$data['PASS']) && $data['active'] == 0) {
					echo $this -> session -> set_flashdata('#error-msg', '<div class="alert alert-warning" align="center">Akun Belum Aktif, Harap Konfirmasi ke Pihak Sekolah/Admin! atau tunggu Maksimal 2x24 jam!</div>');
				} else {
					echo $this -> session -> set_flashdata('#error-msg', '<div class="alert alert-danger" align="center">Password salah/tidak sesuai!</div>');
				}
				redirect('Login/toLogin');
			}
		}
		else {  
			echo $this->session-> set_flashdata('#error-msg', '<div class="alert alert-danger" align="center">Username Belum Terdaftar!</div>');
			redirect('Login/toLogin');
		}
	}
	function logout()
	{
		$this->session->sess_destroy();
		$url = base_url('');
		redirect($url);
	}
	public function alumniBaru2()
	{	
		
		$this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
		$this->load->library('email');
        

        $this->form_validation->set_rules('NIS', 'Username', 'required|min_length[5]|max_length[20]|is_unique[alumni.username]');
        $this->form_validation->set_rules('EMAIL', 'Email', 'required|is_unique[alumni_profil.email]|valid_email',array('valid_email' => 'Email : '.$this->input->post('EMAIL').' tidak valid!'));
		$this->form_validation->set_rules('NAMA', 'Nama' ,'required|max_length[255]|min_length[5]');
		$this->form_validation->set_rules('ANGKATAN', 'Angkatan', 'required');
        $this->form_validation->set_rules('PASS', 'Password', 'required|min_length[6]', array('min_length' => 'Minimal 6 karakter!'));
        $this->form_validation->set_rules('passwordConfirmation', 'Konfirmasi Password', 'required|matches[PASS]|min_length[6]', ['matches'=>'Password dan Konfirmasi password tidak sama', 'min_length' => 'Minimal 6 karakter!']);

        $this->form_validation->set_message('required', 'Harap isi {field}!, Jangan dikosongkan!');
		$this->form_validation->set_message('is_unique', '{field} sudah dipakai!, Masukkan {field} lain!');

        if ($this->form_validation->run() == FALSE) {
            echo json_encode(['success'=>array(
                'NIS' => '<div class="btn btn-outline-success btn-sm ml-2" style="pointer-events: none;">Username dapat Digunakan</div>',
                'EMAIL' => '<div class="btn btn-outline-success btn-sm ml-2" style="pointer-events: none;">Email Dapat Digunakan</div>',
				'PASS' => '<div class="btn btn-outline-success btn-sm ml-2" style="pointer-events: none;">Password memenuhi Syarat!</div>',
				'passwordConfirmation' => '<div class="btn btn-outline-success btn-sm ml-2" style="pointer-events: none;">Konfirmasi Password memenuhi Syarat!</div>'
            ),'error'=>array(
                'NIS' => form_error('NIS', '<div class="btn btn-outline-danger btn-sm ml-2" style="pointer-events: none;">', '</div>'),
                'EMAIL' => form_error('EMAIL', '<div class="btn btn-outline-danger btn-sm ml-2" style="pointer-events: none;">', '</div>'),
				'NAMA' => form_error('NAMA', '<div class="btn btn-outline-danger btn-sm ml-2" style="pointer-events: none;">', '</div>'),
				'ANGKATAN' => form_error('ANGKATAN', '<div class="btn btn-outline-danger btn-sm ml-2" style="pointer-events: none;">', '</div>'),
				'PASS' => form_error('PASS', '<div class="btn btn-outline-danger btn-sm ml-2" style="pointer-events: none;">', '</div>'),
				'passwordConfirmation' => form_error('passwordConfirmation', '<div class="btn btn-outline-danger btn-sm ml-2" style="pointer-events: none;">', '</div>')
			)]);
        }
		else {
			$trigger = $this->Alumni_model->addAlumni();
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
				
				$data['nama'] = $this->input->post('NAMA');
				$data['nis'] = $this->input->post('NIS');
				$data['email'] = 'mailto:'.$this->input->post('EMAIL');
				$data['angkatan'] = $this->input->post('ANGKATAN');

				$this->email->from('smanegeri3ptk@gmail.com', 'New User : '.$this->input->post('NAMA'));
				$this->email->to('smanegeri3ptk@gmail.com'); 

				$this->email->subject('Akun Baru');
				$this->email->message($this->load->view('emails/akunbaru',$data, true));
			if (isset($trigger["error"])) {
				echo json_encode(array("message" => "failed", "error" => $trigger["error"]));
			} else {
				echo json_encode(array("message" => "success"));
				$this->email->send();
			}
		}
	}
	public function cek(){
		$this->load->view('emails/broadcastBaru');
	}
}
