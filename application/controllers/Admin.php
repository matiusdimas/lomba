<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        _cekAdmin();
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

}
