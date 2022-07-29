<?php
class Profil extends CI_Controller
{
    function __construct()
	{
		parent::__construct();
        if($this->session->userdata('masuk') != TRUE){
			$this->session->set_userdata('rurl', current_url());
            redirect('Login/toLogin');
		}
		$this->load->model('Profil_model');
        $this->load->model('Alumni_model');
	}
    public function updProfil()
    {   
        $this->load->library('form_validation');
        $username = $this->session->userdata('ses_id');
        $password = $this->input->post('inputpasswordKonfirmasi3');
        $cek_alumni = $this->Profil_model->auth_alumni($username);
        $datacek = $cek_alumni->row_array();
        if (password_verify($password,$datacek['PASS'])){
            if (isset($_FILES['profilePic']) && $_FILES['profilePic']['size'] != 0) {
                $config['upload_path']   = 'assets/image/foto_profil/'; 
                $config['allowed_types'] = "gif|jpg|jpeg|png";
                $config['overwrite'] = TRUE;
                $config['max_width']     = 6000; 
                $config['max_height']    = 6000; 
                $username = $this->input->post('username');
                $file_extension = pathinfo($_FILES["profilePic"]["name"], PATHINFO_EXTENSION);
                $config['file_name']      = $username.'.'.$file_extension; 
                $this->upload->initialize($config);
            }
            else {
                $data = array(
                    'username' => $username,
                    'nama' => $this->input->post('nama'),
                    'foto_profil' => 'default.jpg',
                );
            }
                $this->form_validation->set_rules('profilePic', 'Gambar', 'callback_validate_image');
                $this->form_validation->set_rules('nama', 'Nama', 'required|max_length[100]');
                if(trim($datacek['telepon']) != trim($this->input->post('no_telepon'))){
                    $this->form_validation->set_rules('no_telepon', 'Nomor Telepon', 'required|numeric|min_length[10]|max_length[13]|is_unique[alumni_profil.no_telepon]', array('numeric' => 'Tolong hanya masukkan angka!', 'max_length' => 'Melebihi batas standar nomor! Periksa Kembali'));
                } else {
                    $this->form_validation->set_rules('no_telepon', 'Nomor Telepon', 'required|numeric|min_length[10]|max_length[13]', array('numeric' => 'Tolong hanya masukkan angka!', 'max_length' => 'Melebihi batas standar nomor! Periksa Kembali'));
                }
                if(trim($datacek['email']) != trim($this->input->post('email'))){
                    $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[alumni_profil.email]',array('valid_email' => 'Email : '.$this->input->post('email').' tidak valid!'));
                } else {
                    $this->form_validation->set_rules('email', 'Email', 'required|valid_email',array('valid_email' => 'Email : '.$this->input->post('email').' tidak valid!'));
                }
                $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir' , 'required');
                if ($this->session->userdata('akses') == 2){
                    $this->form_validation->set_rules('kota_sekarang', 'Domisili', 'required');
                    $this->form_validation->set_rules('status', 'Status Pekerjaan', 'required');
                    $this->form_validation->set_rules('keterangan', 'Keterangan', 'required', ['required'=>'Keterangan dari status pekerjaan harap diperjelas']);
                    $this->form_validation->set_rules('alamat_asal', 'Alamat Asal', 'max_length[255]');
                    $this->form_validation->set_rules('alamat_sekarang', 'Alamat Domisili', 'max_length[255]');
                }
                
                $this->form_validation->set_message('required', 'Harap isi {field}!, Jangan dikosongkan!');
                $this->form_validation->set_message('is_unique', '{field} sudah dipakai!, Masukkan {field} lain!');

                if ($this->form_validation->run() == FALSE) {
                    if ($this->session->userdata('akses') == 2){
                        echo json_encode(['success'=>array(
                            'profilePic' => '<div class="btn btn-outline-success btn-sm ml-2" style="pointer-events: none;">Gambar Dapat Digunakan</div>',
                            'no_telepon' => '<div class="btn btn-outline-success btn-sm ml-2" style="pointer-events: none;">Nomor Telepon Dapat Digunakan</div>',
                            'email' => '<div class="btn btn-outline-success btn-sm ml-2" style="pointer-events: none;">Email Dapat Digunakan</div>'
                        ),'error'=>array(
                            'profilePic' => form_error('profilePic', '<div class="btn btn-outline-danger btn-sm ml-2" style="pointer-events: none;">', '</div>'),
                            'nama' => form_error('nama', '<div class="btn btn-outline-danger btn-sm ml-2" style="pointer-events: none;">', '</div>'),
                            'no_telepon' => form_error('no_telepon', '<div class="btn btn-outline-danger btn-sm ml-2" style="pointer-events: none;">', '</div>'),
                            'email' => form_error('email', '<div class="btn btn-outline-danger btn-sm ml-2" style="pointer-events: none;">', '</div>'),
                            'tanggal_lahir' => form_error('tanggal_lahir', '<div class="btn btn-outline-danger btn-sm ml-2" style="pointer-events: none;">', '</div>'),
                            'kota_sekarang' => form_error('kota_sekarang', '<div class="btn btn-outline-danger btn-sm ml-2" style="pointer-events: none;">', '</div>'),
                            'status' => form_error('status', '<div class="btn btn-outline-danger btn-sm ml-2" style="pointer-events: none;">', '</div>'),
                            'keterangan' => form_error('keterangan', '<div class="btn btn-outline-danger btn-sm ml-2" style="pointer-events: none;">', '</div>'),
                            'alamat_asal' => form_error('alamat_asal', '<div class="btn btn-outline-danger btn-sm ml-2" style="pointer-events: none;">', '</div>'),
                            'alamat_sekarang' => form_error('alamat_sekarang', '<div class="btn btn-outline-danger btn-sm ml-2" style="pointer-events: none;">', '</div>')
                        )]);
                    }
                    else {
                        echo json_encode(['success'=>array(
                            'profilePic' => '<div class="btn btn-outline-success btn-sm ml-2" style="pointer-events: none;">Gambar Dapat Digunakan</div>',
                            'no_telepon' => '<div class="btn btn-outline-success btn-sm ml-2" style="pointer-events: none;">Nomor Telepon Dapat Digunakan</div>',
                            'email' => '<div class="btn btn-outline-success btn-sm ml-2" style="pointer-events: none;">Email Dapat Digunakan</div>'
                        ),'error'=>array(
                            'profilePic' => form_error('profilePic', '<div class="btn btn-outline-danger btn-sm ml-2" style="pointer-events: none;">', '</div>'),
                            'nama' => form_error('nama', '<div class="btn btn-outline-danger btn-sm ml-2" style="pointer-events: none;">', '</div>'),
                            'no_telepon' => form_error('no_telepon', '<div class="btn btn-outline-danger btn-sm ml-2" style="pointer-events: none;">', '</div>'),
                            'email' => form_error('email', '<div class="btn btn-outline-danger btn-sm ml-2" style="pointer-events: none;">', '</div>')
                        )]);
                    }
                }
                else {
                    if (isset($_FILES['profilePic']) && $_FILES['profilePic']['size'] != 0) {
                        if (file_exists(FCPATH.'assets/image/foto_profil/'.$username.'.jpg')) //use absolute path eg. FCPATH . 'profile-photos/' . $id . '.jpg'
                        {
                            $file_extension = 'jpg';
                            rename(FCPATH.'assets/image/foto_profil/'.$username.'.jpg', FCPATH.'assets/image/foto_profil/'.$username.'old.jpg');
                            //absolute path too
                        }
                        elseif (file_exists(FCPATH.'assets/image/foto_profil/'.$username.'.png')) //use absolute path eg. FCPATH . 'profile-photos/' . $id . '.png'
                        {
                            $file_extension = 'png';
                            rename(FCPATH.'assets/image/foto_profil/'.$username.'.png', FCPATH.'assets/image/foto_profil/'.$username.'old.png');//absolute path too
                        }
                        elseif (file_exists(FCPATH.'assets/image/foto_profil/'.$username.'.gif')) //use absolute path eg. FCPATH . 'profile-photos/' . $id . '.png'
                        {
                            $file_extension = 'gif';
                            rename(FCPATH.'assets/image/foto_profil/'.$username.'.gif', FCPATH.'assets/image/foto_profil/'.$username.'old.gif');//absolute path too
                        }
                        elseif (file_exists(FCPATH.'assets/image/foto_profil/'.$username.'.jpeg'))//use absolute path eg. FCPATH . 'profile-photos/' . $nis . '.jpeg'
                        {
                            $file_extension = 'jpeg';
                            rename(FCPATH.'assets/image/foto_profil/'.$username.'.jpeg', FCPATH.'assets/image/foto_profil/'.$username.'old.jpeg');//absolute path
                        }

                        $data = array(
                            'username' => $username,
                            'nama' => $this->input->post('nama'),
                            'foto_profil' => $this->upload->data('file_name'),
                        );
                        if (! $this->upload->do_upload('profilePic')){
                            $filePath = FCPATH.'assets/image/foto_profil/'.$username.'old.'.$file_extension;
                            if (empty($_FILES['profilePic']['name'])){
                                if (file_exists($filePath)){
                                    rename(FCPATH.'assets/image/foto_profil/'.$username.'old.'.$file_extension, FCPATH.'assets/image/foto_profil/'.$username.'.'.$file_extension);
                                    $data['foto_profil'] = $data['foto_profil'].$file_extension;
                                }
                                else {
                                    $data['foto_profil'] = 'default.jpg';
                                }
                            }
                        }
                        else{
                            $data1 = $this->upload->data();
                            $filePath = FCPATH.'assets/image/foto_profil/'.$username.'old.'.$file_extension;
                            if (file_exists($filePath)){
                                unlink(FCPATH.'assets/image/foto_profil/'.$username.'old.'.$file_extension);
                            }
                        }
                        $this->session->set_userdata('ses_id', $data['username']);
                        $this->session->set_userdata('ses_foto', $data['foto_profil']);
                        $this->session->set_userdata('ses_nama', $data['nama']);
                    }
                    $trigger = $this->Profil_model->upddata($data);
                    if (isset($trigger["error"])) {
                        echo json_encode(array("pesan" => "failed", "gagal" => $trigger["error"], "kode" => $trigger["kode"]));
                    } else {
                        echo json_encode(array("pesan" => "success"));
                    }
                }    
            }
            else {
                echo json_encode(array("message" => "failed", "error" => 'Password Salah!'));
            }
    }
    public function validate_image() {
        $check = TRUE;
        if (isset($_FILES['profilePic']) && $_FILES['profilePic']['size'] != 0) {
            $allowedExts = array("gif", "jpeg", "jpg", "png", "JPG", "JPEG", "GIF", "PNG");
            $allowedTypes = array(IMAGETYPE_PNG, IMAGETYPE_JPEG, IMAGETYPE_GIF);
            $extension = pathinfo($_FILES["profilePic"]["name"], PATHINFO_EXTENSION);
            $detectedType = exif_imagetype($_FILES['profilePic']['tmp_name']);
            $type = $_FILES['profilePic']['type'];
            if (!in_array($detectedType, $allowedTypes)) {
                $this->form_validation->set_message('validate_image', 'Invalid Image Content!');
                $check = FALSE;
            }
            if(filesize($_FILES['profilePic']['tmp_name']) > 310000) {
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
    public function delAvatar(){
        if($_POST["action"] == "remove_file"){
            $filePath = $_POST["path"];
            if(file_exists($filePath)){
                unlink($filePath);
                $data['foto_profil'] = 'default.jpg';
                $this->Profil_model->delAvatar($data);
                $this->session->set_userdata('ses_foto', $data['foto_profil']);
            }
            else{
                print_r($_SERVER['DOCUMENT_ROOT']);
                die();
            }
        }
    }
    public function updPassword(){
            $username = $this->input->post('nisPass');
            $password = $this->input->post('inputpasswordLama');
            $cek_alumni = $this->Profil_model->auth_alumni($username);
            $data = $cek_alumni->row_array();
            if (password_verify($password,$data['PASS'])){
                $this->Profil_model->updPassword();
                echo json_encode(array("message" => "success"));
            }
            else {
                echo json_encode(array("message" => "failed", "error" => 'Password Lama salah/tidak sesuai!'));
            }
    }
    public function updSosmed(){
        $username = $this->session->userdata('ses_id');
        $password = $this->input->post('inputpasswordKonfirmasi2');
        $cek_alumni = $this->Profil_model->auth_alumni($username);
        $data = $cek_alumni->row_array();
        if (password_verify($password,$data['PASS'])){
            $trigger = $this->Profil_model->updSosmed();
            if (isset($trigger["error"])) {
                echo json_encode(array("message" => "failed", "error" => $trigger["error"]));
            } else {
                echo json_encode(array("message" => "success"));
            }
        }
        else {
            echo json_encode(array("message" => "failed", "error" => 'Password Lama salah/tidak sesuai! Password : '.$password));
        }
    }
    public function updateTahunSaya()
    {
        $this->Profil_model->updTahunSaya();
        $output['message'] = 'Success';
    }
    public function updateUsernameSaya()
    {
        $this->load->library('form_validation');
        $username = $this->session->userdata('ses_id');
        $cek_alumni = $this->Profil_model->auth_alumni($username);
        $datacek = $cek_alumni->row_array();
        if(trim($datacek['USERNAME']) != trim($this->input->post('userNamenya'))){
            $this->form_validation->set_rules('userNamenya', 'Username', 'required|max_length[25]|is_unique[alumni.username]|min_length[6]',array('is_unique' => 'Username : '.$this->input->post('userNamenya').' sudah digunakan!'));
        } else {
            $this->form_validation->set_rules('userNamenya', 'Username', 'required|max_length[25]|min_length[6]');
        }
        if ($this->form_validation->run() == FALSE) {
            echo json_encode(['error'=>array(
                'Username' => form_error('userNamenya', '<div class="btn btn-outline-danger btn-sm ml-2" style="pointer-events: none;">', '</div>')
            )]);
        }
        else {
            $this->Profil_model->updUsernameSaya();
            $this->session->unset_userdata('ses_id');
            $this->session->set_userdata('ses_id', $this->input->post('userNamenya'));
            echo json_encode(array("pesan" => "success"));
        }
    }
}
?>