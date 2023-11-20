<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->_cekAdmin();
    }

    private function _cekAdmin(){
        $admin = $this->session->userdata('username');
        $this->Model_User->getWhereUser(['username' => $admin])->row();
        if(!$admin){
            $this->session->sess_destroy();
            redirect('/');
        }
    }

    public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header');
            $this->load->view('admin/peserta');
            $this->load->view('templates/footer');
        } else {
            $this->load->view('formsuccess');
        }
    }
}
