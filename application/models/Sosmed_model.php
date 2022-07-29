<?php
class Sosmed_model extends Alumni_model{
    private $wa;
    private $ig;
    private $twitter;
    private $line;
    private $date;

    public function __construct()
    {
            // Memanggil konstruktor CI_Model
            parent::__construct();
            $this->load->model('Alumni_model');
    }

    public function updSosmed() {
        date_default_timezone_set("Asia/Bangkok");
        $this->date = date("Y-m-d H:i:s");
        $this->wa = $this->input->post('wa');
        $this->ig = $this->input->post('ig');
        $this->twitter = $this->input->post('twitter');
        $this->line = $this->input->post('line');
        $this->Profil_model->username = $this->input->post('nisPass2');

        // print_r($this->nis.'+++++hai egy');
        // die();
        // extract($data);
        $this->db->set('whatsapp', $this->wa);
        $this->db->set('instagram', $this->ig);
        $this->db->set('twitter', $this->twitter);
        $this->db->set('line', $this->line);
        $this->db->where('username', $this->Profil_model->username);
        $this->db->update('sosmed_alumni');

        $this->db->set('latest', $this->date);
        $this->db->where('username', $this->Profil_model->username);
        $this->db->update('alumni_profil');
        return true;
    }
}
