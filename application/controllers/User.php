<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        _cekAdmin();
    }
    public function index()
    {
        $data['title'] = 'Lomba | Dashboard';
        $data['peserta'] = $this->Model_Peserta->getPeserta()->result_array();
        $data['lomba'] = $this->Model_Kategori->getKategori()->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }
    public function profile()
    {
        $this->form_validation->set_rules('password', 'Password', 'trim');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('no_hp', 'No Hp', 'required|numeric');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Lomba | Profile';
            $data['user'] = $this->Model_User->getWhereUser(['username' => $this->session->userdata('username')])->row();
            $this->load->view('templates/header', $data);
            $this->load->view('user/profile', $data);
            $this->load->view('templates/footer');
        } else {
            if ($this->input->post('password') !== null) {
                $password = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
            } else {
                $password = $this->input->post('old_password');
            }
            $data = [
                'password' => $password,
                'nama' => $this->input->post('nama'),
                'alamat' => $this->input->post('alamat'),
                'no_hp' => $this->input->post('no_hp'),
            ];
            $this->Model_User->updateUser($data, ['username' => $this->session->userdata('username')]);
            $this->session->set_flashdata('pesan', '<div class="position-absolute alert alert-success alert-dismissible fade show" role="alert">
            Berhasil Update Profile
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>');
            redirect('user/profile');
        }
    }

    public function detail($id)
    {
        $data['title'] = 'Lomba | Detail Lomba';
        $data['peserta'] = $this->Model_Peserta->getWherePeserta(['id_lb' => $id])->result_array();
        $data['lomba'] = $this->Model_Kategori->getWhereKategori(['id_lb' => $id])->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('user/detail', $data);
        $this->load->view('templates/footer');
    }
}
