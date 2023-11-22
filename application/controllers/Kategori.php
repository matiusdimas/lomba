<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        _cekAdmin();
    }

    public function index()
    {
        $data['title'] = 'Lomba | TAMBAH KATEGORI';
        $this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required|min_length[3]|is_unique[lomba.kat_lb]');
        $this->form_validation->set_rules('nama_pj', 'Nama Penanggung Jawab', 'required|min_length[3]');
        $this->form_validation->set_rules('venue', 'Venue', 'required|min_length[3]');
        $this->form_validation->set_rules('total_peserta', 'Total Peserta', 'required|numeric');
        $this->form_validation->set_rules('tanggal_mulai', 'Tanggal Mulai', 'required');
        $this->form_validation->set_rules('waktu_mulai', 'Waktu Mulai', 'required');
        $this->form_validation->set_rules('tanggal_akhir', 'Tanggal Akhir', 'required');
        $this->form_validation->set_rules('waktu_akhir', 'Waktu Akhir', 'required');
        $this->form_validation->set_rules('biaya', 'Biaya Daftar', 'required|numeric');
        $this->form_validation->set_rules('juara1', 'Juara 1', 'required|numeric');
        $this->form_validation->set_rules('juara2', 'Juara 2', 'required|numeric');
        $this->form_validation->set_rules('juara3', 'Juara 3', 'required|numeric');
        if ($this->form_validation->run() == FALSE) {
            $data['halaman'] = 'TAMBAH KATEGORI';
            $this->load->view('templates/header', $data);
            $this->load->view('admin/kategori', $data);
            $this->load->view('templates/footer');
        } else {

            $data = [
                'kat_lb' => $this->input->post('nama_kategori'),
                'max_ps' => $this->input->post('total_peserta'),
                'nama_pj' => $this->input->post('nama_pj'),
                'venue_lb' => $this->input->post('venue'),
                'waktu_lb' => $this->input->post('tanggal_mulai') . ' ' . $this->input->post('waktu_mulai') . ':00',
                'waktu_selesai_lb' => $this->input->post('tanggal_akhir') . ' ' . $this->input->post('waktu_akhir') . ':00',
                'biaya_lb' => $this->input->post('biaya'),
                'juara1' => $this->input->post('juara1'),
                'juara2' => $this->input->post('juara2'),
                'juara3' => $this->input->post('juara3'),
            ];
            $this->Model_Kategori->addKategori($data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Berhasil Menambah Kategori Lomba
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>');
            redirect('kategori/dataKategori');
        }
    }
    public function dataKategori()
    {
        $data['title'] = 'Lomba | Data Kategori';
        $data['kategori'] = $this->Model_Kategori->getKategori()->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('admin/data_kategori', $data);
        $this->load->view('templates/footer');

    }

    public function updateKategori($id)
    {
        $data['title'] = 'Lomba | UBAH KATEGORI';
        $this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required|min_length[3]');
        $this->form_validation->set_rules('nama_pj', 'Nama Penanggung Jawab', 'required|min_length[3]');
        $this->form_validation->set_rules('venue', 'Venue', 'required|min_length[3]');
        $this->form_validation->set_rules('total_peserta', 'Total Peserta', 'required|numeric');
        $this->form_validation->set_rules('tanggal_mulai', 'Tanggal Mulai', 'required');
        $this->form_validation->set_rules('waktu_mulai', 'Waktu Mulai', 'required');
        $this->form_validation->set_rules('tanggal_akhir', 'Tanggal Akhir', 'required');
        $this->form_validation->set_rules('waktu_akhir', 'Waktu Akhir', 'required');
        $this->form_validation->set_rules('biaya', 'Biaya Daftar', 'required|numeric');
        $this->form_validation->set_rules('juara1', 'Juara 1', 'required|numeric');
        $this->form_validation->set_rules('juara2', 'Juara 2', 'required|numeric');
        $this->form_validation->set_rules('juara3', 'Juara 3', 'required|numeric');
        if ($this->form_validation->run() == FALSE) {
            $data['halaman'] = 'UBAH KATEGORI';
            $data['id'] = $id;
            $data['kategori'] = $this->Model_Kategori->getWhereKategori(['id_lb' => $id])->row();
            $this->load->view('templates/header', $data);
            $this->load->view('admin/kategori', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'kat_lb' => $this->input->post('nama_kategori'),
                'max_ps' => $this->input->post('total_peserta'),
                'nama_pj' => $this->input->post('nama_pj'),
                'venue_lb' => $this->input->post('venue'),
                'waktu_lb' => $this->input->post('tanggal_mulai') . ' ' . $this->input->post('waktu_mulai') . ':00',
                'waktu_selesai_lb' => $this->input->post('tanggal_akhir') . ' ' . $this->input->post('waktu_akhir') . ':00',
                'biaya_lb' => $this->input->post('biaya'),
                'juara1' => $this->input->post('juara1'),
                'juara2' => $this->input->post('juara2'),
                'juara3' => $this->input->post('juara3'),
            ];
            $this->Model_Kategori->updateKategori($data, ['id_lb' => $id]);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Berhasil Mengubah Kategori Lomba
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>');
            redirect('kategori/dataKategori');
        }
    }
    public function deleteKategori($id)
    {
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Berhasil Mengapus Kategori Lomba
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>');
        $this->Model_Kategori->deleteKategori(['id_lb' => $id]);
        redirect('kategori/datakategori');
    }
}