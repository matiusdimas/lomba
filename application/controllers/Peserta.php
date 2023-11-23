<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Peserta extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        _cekAdmin();
    }

    public function index()
    {
        $data['title'] = 'Lomba | TAMBAH PESERTA';
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required|min_length[3]');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|min_length[3]');
        $this->form_validation->set_rules('tanggal_lahir', 'tanggal_lahir', 'required|min_length[3]');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('no_hp', 'no_hp', 'required|numeric');
        $this->form_validation->set_rules('kategori_lomba', 'Kategori Lomba', 'required|numeric');
        $this->form_validation->set_rules('biaya', 'Biaya Daftar', 'required|numeric');
        if ($this->form_validation->run() == FALSE) {
            $data['halaman'] = 'TAMBAH PESERTA';
            $data['kategori'] = $this->Model_Kategori->getKategori()->result_array();
            $this->load->view('templates/header', $data);
            $this->load->view('admin/peserta', $data);
            $this->load->view('templates/footer');
        } else {
            $checkLomba = $this->Model_Kategori->getWhereKategori(['id_lb' => $this->input->post('kategori_lomba')])->row()->max_ps;
            $checkPeserta = count($this->Model_Peserta->getWherePeserta(['id_lb' => $this->input->post('kategori_lomba')])->result_array());
            if ($checkLomba < $checkPeserta + 1) {
                $this->session->set_flashdata('pesan', '<div class="position-absolute alert alert-danger alert-dismissible fade show" role="alert">
            Tidak Berhasil Karena Maksimal Peserta Sudah Terpenuhi
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>');
                redirect('peserta');
            }
            $data = [
                'nama_ps' => $this->input->post('nama_lengkap'),
                'hp_ps' => $this->input->post('no_hp'),
                'alamat_ps' => $this->input->post('alamat'),
                'jk_ps' => $this->input->post('jenis_kelamin'),
                'id_lb' => $this->input->post('kategori_lomba'),
                'tgl_lahir' => $this->input->post('tanggal_lahir'),
                'bayar' => $this->input->post('biaya'),
            ];
            $this->Model_Peserta->addPeserta($data);
            $this->addToKategori($data['id_lb']);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Berhasil Menambah Peserta
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>');
            redirect('peserta/datapeserta');
        }
    }
    public function dataPeserta()
    {
        $data['title'] = 'Lomba | Data Peserta';
        $data['kategori'] = $this->Model_Kategori->getKategori()->result_array();
        $data['peserta'] = $this->Model_Peserta->getPeserta()->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('admin/data_peserta', $data);
        $this->load->view('templates/footer');

    }

    public function updatePeserta($id)
    {
        $data['title'] = 'Lomba | UBAH PESERTA';
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required|min_length[3]');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|min_length[3]');
        $this->form_validation->set_rules('tanggal_lahir', 'tanggal_lahir', 'required|min_length[3]');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('no_hp', 'no_hp', 'required|numeric');
        $this->form_validation->set_rules('juara', 'Juara', 'required|numeric');
        if ($this->form_validation->run() == FALSE) {
            $data['halaman'] = 'UBAH PESERTA';
            $data['id'] = $id;
            $data['kategori'] = $this->Model_Kategori->getKategori()->result_array();

            $data['peserta'] = $this->Model_Peserta->getWherePeserta(['no_ps' => $id])->row();
            $this->load->view('templates/header', $data);
            $this->load->view('admin/peserta', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nama_ps' => $this->input->post('nama_lengkap'),
                'hp_ps' => $this->input->post('no_hp'),
                'alamat_ps' => $this->input->post('alamat'),
                'jk_ps' => $this->input->post('jenis_kelamin'),
                'tgl_lahir' => $this->input->post('tanggal_lahir'),
                'juara' => $this->input->post('juara'),
            ];
            $this->Model_Peserta->updatePeserta($data, ['no_ps' => $id]);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Berhasil Mengubah Peserta
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>');
            redirect('peserta/datapeserta');
        }
    }
    public function deletePeserta($id)
    {
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Berhasil Mengapus Peserta
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>');
        $this->Model_Peserta->deletePeserta(['no_ps' => $id]);
        redirect('peserta/datapeserta');
    }

    private function addToKategori($data)
    {
        $peserta = $this->Model_Peserta->getWherePeserta(['id_lb' => $data])->result_array();
        $datas = [
            'total_ps' => count($peserta)
        ];
        return $this->Model_Kategori->updateKategori($datas, ['id_lb' => $data]);
    }
}