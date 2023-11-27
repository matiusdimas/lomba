<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Panitia extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        _cekAdmin();
        _cekRole();
    }


    public function index()
    {
        $data['role_query'] = $this->input->get('role');
        $data['title'] = 'Lomba | DATA USER';
        if ($data['role_query'] !== null) {
            $data['user'] = $this->Model_User->getWhereUser(['role' => $data['role_query']])->result_array();
        } else {
            $data['user'] = $this->Model_User->getUser()->result_array();
        }
        $data['role'] = $this->Model_User->getUser()->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('admin/panitia', $data);
        $this->load->view('templates/footer');
    }
    public function tambah()
    {
        $data['title'] = 'Lomba | TAMBAH USER';
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[admin.username]');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('role', 'Role', 'required|min_length[3]');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('no_hp', 'No Hp', 'required|numeric');
        if ($this->form_validation->run() == FALSE) {
            $data['halaman'] = 'TAMBAH PESERTA';
            $data['user'] = $this->Model_User->getUser()->result_array();
            $this->load->view('templates/header', $data);
            $this->load->view('admin/tambahPanitia', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'username' => $this->input->post('username'),
                'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
                'nama' => $this->input->post('nama'),
                'alamat' => $this->input->post('alamat'),
                'no_hp' => $this->input->post('no_hp'),
                'role' => $this->input->post('role'),
            ];
            $this->Model_User->addUser($data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Berhasil Menambah User
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>');
            redirect('panitia');
        }
    }

    public function delete($id)
    {
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Berhasil Mengapus USer
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>');
        $this->Model_User->deleteUser(['id' => $id]);
        redirect('panitia');
    }

}