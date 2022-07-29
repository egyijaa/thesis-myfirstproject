<?php
class Broadcast_model extends CI_Model{
	//cek nip dan password admin

    private $id_broadcast;
    private $judul;
    private $konten;
    private $date;

    public function __construct()
    {
            parent::__construct();
            $this->load->model('Admin_model');
            $this->Admin_model->nip = $this->session->userdata('ses_id');
            date_default_timezone_set("Asia/Bangkok");
            $this->date = date("Y-m-d H:i:s");
            $this->judul = $this->input->post('judul');
            $this->pendidikan = $this->input->post('angkatan');
            $this->konten = $this->input->post('konten');
    }
    public function ambilEmail(){
        $data = $this->db->query("SELECT email from alumni_profil WHERE email <> null OR email <> ''");
        return $data->result_array();
    }
    public function hitungEmail(){
        $data2 = $this->db->query("SELECT COUNT(email) as email from alumni_profil WHERE email <> null OR email <> ''");
        return $data2->result_array();
    }
    public function addBroadcast($data)
    {
        $this->judul = $this->input->post('judul');
        $gambar = $data['gambar'];
        $this->konten = $this->input->post('konten');
        if (!empty($this->input->post('deadline'))){
            $this->deadline = date( 'Y-m-d H:i:s', strtotime( $this->input->post('deadline')));
            $this->db->query("INSERT INTO broadcast (NIP, JUDUL, GAMBAR, KONTEN, PUBLISHED, expired) VALUES('" . $this->Admin_model->nip . "','" . $this->judul . "','" . $gambar . "','" . $this->konten . "', '" . $this->date . "', '" . $this->deadline . "')");
        }
        else {
            $this->db->query("INSERT INTO broadcast (NIP, JUDUL, GAMBAR, KONTEN, PUBLISHED) VALUES('" . $this->Admin_model->nip . "','" . $this->judul . "','" . $gambar . "','" . $this->konten . "', '" . $this->date . "')");
        }
    }
    public function delBroadcast()
    {
        $this->id_broadcast = $this->input->post('delBroadcast');
        $this->db->query("DELETE FROM broadcast WHERE id_broadcast = '" . $this->id_broadcast . "'");
    }
    function getGambar(){
        $data = $this->db->query("SELECT judul,published,gambar,expired FROM broadcast WHERE (gambar <> 'default.jpg' and expired > now()) OR (gambar <> 'default.jpg' and expired is null) ORDER BY PUBLISHED desc;");
        return $data->result_array();
    }
    function getPublished(){
        $data = $this->db->query("select id_broadcast, published from broadcast ORDER BY published DESC limit 1");
        return $data->result_array();
    }
    function getRows($params = array()){
        $this->db->select('a.nama,b.id_broadcast, b.nip, b.judul, b.gambar, b.konten, b.published, b.expired')
                    ->join('admin a','b.nip = a.nip','inner')
                    ->order_by('b.published', 'DESC');
        $this->db->from('broadcast b');
        //CONCAT(LEFT(ap.NO_TELEPON,7), "*****", RIGHT(ap.NO_TELEPON,0)) AS no_telepon
        
        if(!empty($params['search']['keywords'])){
            $this->db->like('a.nama',$params['search']['keywords']);
            $this->db->or_like('b.judul',$params['search']['keywords']);
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
    public function getBroadcast()
    {
        if (!empty($this->input->post('delBroadcast'))){
            $this->id_broadcast = $this->input->post('delBroadcast');
            $data = $this->db->query("SELECT a.nama,b.id_broadcast, b.nip, b.judul, b.gambar, b.konten, b.published, b.expired FROM broadcast b INNER JOIN admin a ON b.nip = a.nip WHERE b.id_broadcast = '" . $this->id_broadcast . "' ORDER BY b.published DESC");
        }
        else {
            $data = $this->db->query("SELECT a.nama,b.id_broadcast, b.nip, b.judul, b.gambar, b.konten, b.published, b.expired FROM broadcast b INNER JOIN admin a ON b.nip = a.nip WHERE b.id_broadcast = (SELECT max(id_broadcast) FROM broadcast)");
        }
        return $data->result_array();
    }
    public function getBroadcastAll()
    {
        $data = $this->db->query("SELECT NIP, gambar from broadcast");
        return $data->result_array();
    }
    public function delAll()
    {
        $this->db->query("DELETE FROM broadcast");
    }
    public function getAdmin()
    {
        if ($this->session->userdata('akses')=='1') {
            $data = $this->db->query('SELECT DISTINCT b.NIP, a.NAMA FROM broadcast b left join admin a on b.NIP = a.NIP where b.NIP != "spvsmanta" ORDER BY a.NAMA');
        }
        else {
            $data = $this->db->query('SELECT DISTINCT b.NIP, a.NAMA FROM broadcast b left join admin a on b.NIP = a.NIP ORDER BY a.NAMA');
        }
        return $data->result_array();
    }

    public function addcomment()
 	{
 		$field  = array('username' => $this->input->post('user_name'),
                        'post_id' => $this->input->post('post_id'), 
 						'comments' => $this->input->post('mainComment'), 
 					'createdOn'=>date('Y-m-d H:i:s')
 			);
 		$this->db->insert('comments', $field);
 		if ($this->db->affected_rows() >0) {
 			# code...
 			return true;
 		}
 		else{
 			return false;
 		}
 	}

 	public function comment_replies($cid)
 	{
 		# code...
 		$query= $this->db->select('')
 						->from('comments_replies')
 						->where('comments_replies.comment_id',$cid)
 						->get();
 		if ($query->num_rows()>0) {
 			# code...
 			return $query->result();
 		}
 		else{
 				return false;
 		}
 	}

    public function affected_comment($uid,$post_id,$comment)
	{
		 $one_post=$this->db->select()
							->from('comments')
							->where('comments.username',$uid)
                            ->where('comments.post_id',$post_id)
							->where('comments.comments',$comment)
							->order_by('comments.id_comment','DESC')
							->limit(1)
							->get();
		   return $one_post->row();	
	}

	public function Count_Comment()
	{
		$all_users=$this->db->select()
						    ->get('comments');
		return $all_users->num_rows();
	}

	public function Count_replies()
	{
		$all_users=$this->db->select()
						    ->get('comments_replies');
		return $all_users->num_rows();
	}

 	public function addreply()
 	{

 		$field  = array('comment_id' => $this->input->post('commentid'), 
 						'reply' => $this->input->post('replycomment'),
                         'username' => $this->input->post('user'), 
 						'createdOn'=>date('Y-m-d H:i:s')
 			);
 		$this->db->insert('comments_replies', $field);
 		if ($this->db->affected_rows() >0) {
 			# code...
 			return true;
 		}
 		else{
 			return false;
 		}
 	}

 	public function allComment()
	{
		$all_users=$this->db->select('')
							->from('comments')
                            ->where('post_id', $this->input->post('post_id2'))
						    ->order_by('id_comment', 'DESC')
						    ->get();
		return $all_users->result();
	}
}
