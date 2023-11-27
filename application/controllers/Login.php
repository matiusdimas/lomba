<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function index()
    {
        if ($this->session->userdata('username')) {
            redirect('admin');
        }
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('login');
        } else {
            $password = $this->input->post('password');
            $data = [
                'username' => $this->input->post('username'),
            ];
            $user = $this->Model_User->getWhereUser($data)->row();
            if (!$user || password_verify($user->password, $password)) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Username Atau Password Salah
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>');
                redirect('login');
            } else {
                $this->session->set_userdata(['username' => $data['username']]);
                redirect('admin');
            }
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('/');
    }

    public function register()
    {
        if ($this->session->userdata('username')) {
            redirect('admin');
        }
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[admin.username]');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('no_hp', 'No Hp', 'required|numeric');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('register');
        } else {
            $data = [
                'username' => $this->input->post('username'),
                'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
                'nama' => $this->input->post('nama'),
                'alamat' => $this->input->post('alamat'),
                'no_hp' => $this->input->post('no_hp'),
                'role' => 'USER',
            ];
            $this->Model_User->addUser($data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Daftar Berhasil Silahkan Login
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>');
            redirect('login');
        }
    }
}
