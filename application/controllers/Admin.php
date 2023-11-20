<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->_cekAdmin();
    }

    private function _cekAdmin()
    {
        $admin = $this->session->userdata('username');
        $this->Model_User->getWhereUser(['username' => $admin])->row();
        if (!$admin) {
            $this->session->sess_destroy();
            redirect('/');
        }
    }

    public function index()
    {
        $data['title'] = 'Lomba | Dashboard';
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('admin/index', $data);
            $this->load->view('templates/footer');
        } else {
            $this->load->view('formsuccess');
        }
    }
    public function peserta()
    {
        $data['title'] = 'Lomba | Form Peserta';
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('admin/peserta', $data);
            $this->load->view('templates/footer');
        } else {
            $this->load->view('formsuccess');
        }
    }
    public function dataPeserta()
    {
        $data['title'] = 'Lomba | Data Peserta';
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('admin/data_peserta', $data);
            $this->load->view('templates/footer');
        } else {
            $this->load->view('formsuccess');
        }
    }
    public function kategori()
    {
        $data['title'] = 'Lomba | TAMBAH KATEGORI';
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('admin/kategori', $data);
            $this->load->view('templates/footer');
        } else {
            $this->load->view('formsuccess');
        }
    }
    public function dataKategori()
    {
        $data['title'] = 'Lomba | Data Kategori';
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('admin/data_kategori', $data);
            $this->load->view('templates/footer');
        } else {
            $this->load->view('formsuccess');
        }
    }
}
