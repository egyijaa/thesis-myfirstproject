<?php
class Broadcast extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('masuk') != TRUE){
			$this->session->set_userdata('rurl', current_url());
            redirect('Login/toLogin');
		}
        $this->load->library('Ajax_pagination');
        if ($this->session->userdata('akses') != 2 && $this->session->userdata('akses') != 3) {
            $this->perPage = 100000;
        }
        else {
            $this->perPage = 6;
        }
        $this->load->model('Broadcast_model');
        $this->load->model('Alumni_model');
        $active['active'] = $this->Alumni_model->getActive();
        if (($this->session->userdata('akses') == 2 || $this->session->userdata('akses') == 3) && $active['active'][0]['active'] == 0) {
            $this->session->sess_destroy();
            $url = base_url('');
            redirect($url);
        }
	}
	public function toBroadcast()
	{
    $data = array();
    if ($this->session->userdata('akses') == 2 || $this->session->userdata('akses') == 3){
        $nav['nav'] = $this->Alumni_model->getAlumniDropDown();
    }
    $data['terakhir'] = $this->Broadcast_model->getPublished();
    $data['gambar'] = $this->Broadcast_model->getGambar();
    
    $a = $this->Broadcast_model->getRows();
    if($a == false){
        echo $this->session-> set_flashdata('#error-broadcast', '<div class="alert alert-warning" align="center"><h4>Data Tidak Ditemukan!</h4></div>');
        $totalRec = 0;
    }
    else {
        $totalRec = count($this->Broadcast_model->getRows());
    }
    
    //pagination configuration
    $config['target']      = '#postList';
    $config['base_url']    = base_url().'Broadcast/ajaxPaginationData';
    $config['total_rows']  = $totalRec;
    $config['per_page']    = $this->perPage;
    $config['link_func']   = 'searchFilter';
    $this->ajax_pagination->initialize($config);
    
    //get the posts data
    $data['posts'] = $this->Broadcast_model->getRows(array('limit'=>$this->perPage));
        if ($this->session->userdata('akses') != 2 && $this->session->userdata('akses') != 3){
            $this->load->view('layouts/header');
            $this->load->view('broadcast/broadcast_admin', $data);
            $this->load->view('layouts/footer');
        }
        else {
            $this->load->view('layouts/header',$nav);
            $this->load->view('broadcast/broadcast_user', $data);
            $this->load->view('layouts/footer');
        }
	}
    function ajaxPaginationData(){
        $conditions = array();
            
        //calc offset number
        $page = $this->input->post('page');
        if(!$page){
            $offset = 0;
            echo $this->session-> set_flashdata('#error-broadcast', '<div class="alert alert-warning" align="center"><h4>Data Tidak Ditemukan!</h4></div>');
        }else{
            $offset = $page;
        }
        //set conditions for search
        $keywords = $this->input->post('keywords');
        if(!empty($keywords)){
            $conditions['search']['keywords'] = $keywords;
        }
        
        //total rows count
        $total_row = $this->Broadcast_model->getRows($conditions);
        $totalRec = !empty($total_row) ? count($total_row) : count([]);
        
        //pagination configuration
        $config['target']      = '#postList';
        $config['base_url']    = base_url().'Broadcast/ajaxPaginationData';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        $config['link_func']   = 'searchFilter';
        $this->ajax_pagination->initialize($config);
        
        //set start and limit
        $conditions['start'] = $offset;
        $conditions['limit'] = $this->perPage;
        
        //get posts data
        $data['posts'] = $this->Broadcast_model->getRows($conditions);
        //load the view
        if ($this->session->userdata('akses') != 2 && $this->session->userdata('akses') != 3){
            $this->load->view('broadcast/ajax-admin', $data, false);
        }
        else {
            $this->load->view('broadcast/ajax-user', $data, false);
        }
    }
    function Hapus(){
        if (isset($_POST['delBroadcast'])) {
            $result =$this->Broadcast_model->getBroadcast();
            $data['result'] = $result;
			foreach($result as $row) {};
            $filePath = $row["gambar"];
            if ($filePath != 'default.jpg'){
                unlink('assets/image/broadcast/'.$filePath);
            }
            $this->Broadcast_model->delBroadcast();
        }
        header( "refresh:0.7;url=toBroadcast" );
    }
    function HapusAll(){
        if (isset($_POST['delAll'])) {
            $result =$this->Broadcast_model->getBroadcastAll();
            $data['result'] = $result;
			foreach($result as $row) 
            {
                $filePath = $row["gambar"];
                if ($filePath != 'default.jpg'){
                    unlink('assets/image/broadcast/'.$filePath);
                }
            };
            $this->Broadcast_model->delAll();
        }
        header( "refresh:0.7;url=toBroadcast" );
    }
    function Tambah(){
            $config['upload_path']   = 'assets/image/broadcast/'; 
            $config['allowed_types'] = "gif|jpg|jpeg|png";
            $config['max_width']     = 6000; 
            $config['max_height']    = 6000; 
            $file_name = $_FILES["gambar"]["name"]; 
            $newfile_name= str_replace(' ', '_', $file_name);
            $config['file_name']      = $newfile_name; 
            $this->upload->initialize($config);
            $data['gambar'] = $this->upload->data('file_name');
            if (! $this->upload->do_upload('gambar')){
                $data['gambar'] = 'default.jpg';
            }
            else{
                $data1 = $this->upload->data();
            }
            $this->Broadcast_model->addBroadcast($data);
            $this->kirimEmail();
            header( "refresh:0.7;url=toBroadcast" );
    }
    function kirimEmail(){
        $result = $this->Broadcast_model->ambilEmail();
        $result2 = $this->Broadcast_model->hitungEmail();
        $databaru = array();
        for ($x = 0; $x < $result2[0]['email']; $x++) {
            $databaru[$x] = $result[$x]['email'];
        }
        $result3 = $this->Broadcast_model->getBroadcast();
        foreach($result3 as $row) {
        };
        $data['id'] = $row["id_broadcast"];
        $data['nama'] = $row["nama"];
        $data['judul'] = $row["judul"];
        $data['konten'] = $row["konten"];
        $data['publish'] = $row["published"];
        $data['expired'] = $row["expired"];

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
        
        $this->email->from('smanegeri3ptk@gmail.com', 'SMA Negeri 3 Pontianak');
        $this->email->to('egyijaa@gmail.com');
        //$this->email->to($databaru);

        $this->email->subject('Email Test');
        $this->email->message($this->load->view('emails/broadcastBaru',$data, true));

        $this->email->send();
}
    public function addcomment()
	{
		# code...
		$result= $this->Broadcast_model->addcomment();
		if ($result) {
			# code...
			$user_id = $this->input->post('user_name'); 
			$post_id = $this->input->post('post_id'); 
	 		$comment = $this->input->post('mainComment'); 
	 		$letasrow=$this->Broadcast_model->affected_comment($user_id,$post_id,$comment);
 			if ($letasrow) {
 				# code...
 				echo json_encode($letasrow);
 			}


		}
		return true;
	}

	public function addreply()
	{
		# code...
		$result= $this->Broadcast_model->addreply();
		return true;
 		
	}

	public function allComment()
	{
		# code...
        $response='';
        $response1='';
	    $result= $this->Broadcast_model->allComment();
        foreach ($result as  $value) {
        # code...
            $result1= $this->Broadcast_model->comment_replies($value->id_comment);
            if ($result1) {
      	# code...
			    foreach ($result1 as  $value1) {
			# code...
				$response1.= '<div class="comment">
				
                <div class="row">
                <div class="col-4"></div>
				<div class="usercomment mb-1 col-8 card-title1"><small class="badge badge-secondary">&nbsp;'.$value1->username.'</small>='.$value1->reply.'<span class="text-muted" style="font-size: 10px;"><sup>'.date("d-M-Y H:i", strtotime($value->createdOn)).'</sup></span></div>
                </div>
				</div>';                       
			    }
	        }
      		$response.= '<div class="comment border border-info rounded mb-1 pb-2">
                        <div class="user ml-2 text-danger mt-2"><span class="text-sm badge badge-success">'.$value->username.'</span><span class="text-muted text-xs"> '.date("d-M-Y H:i", strtotime($value->createdOn)).'</span></div>
                        <div class="usercomment card-title1 ml-4">'.$value->comments.'</div>
						
						<div class="reply ml-4"><a href="javascript:void(0)" class="btn btn-primary card-title1" data-commentID='.$value->id_comment.' onclick="reply(this)">Balas</a></div>
						<div class="replies">'.$response1.'</div>					
					</div>';                       
         	$response1='';
        }
		echo json_encode($response);
	}
}
