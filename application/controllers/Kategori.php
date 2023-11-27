<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        _cekAdmin();
        _cekRole();
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
        $this->form_validation->set_rules('usia_min', 'Usia Min', 'required|numeric');
        $this->form_validation->set_rules('usia_max', 'Usia Max', 'required|numeric');
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
            $config['upload_path'] = './assets/images/lomba/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['file_name'] = 'img' . time();
            $this->load->library('upload', $config);
            if ($this->form_validation->run() == false) {
                $this->load->view('templates/header', $data);
                $this->load->view('templates/sidebar', $data);
                $this->load->view('templates/topbar', $data);
                $this->load->view('buku/index', $data);
                $this->load->view('templates/footer');
            } else {
                if ($this->upload->do_upload('gambar_lomba')) {
                    $image = $this->upload->data();
                    $gambar = $image['file_name'];
                } else {
                    $gambar = $this->input->post('old_gambar_lomba');
                }
                $data = [
                    'kat_lb' => $this->input->post('nama_kategori'),
                    'max_ps' => $this->input->post('total_peserta'),
                    'nama_pj' => $this->input->post('nama_pj'),
                    'usia_min' => $this->input->post('usia_min'),
                    'usia_max' => $this->input->post('usia_max'),
                    'gambar' => $gambar,
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
        $this->form_validation->set_rules('jumlah_peserta', 'Total Peserta', 'required|numeric');
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
            //konfigurasi sebelum gambar diupload
            $config['upload_path'] = './assets/images/lomba/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['file_name'] = 'img' . time();
            $this->load->library('upload', $config);
            if ($this->form_validation->run() == false) {
                $this->load->view('templates/header', $data);
                $this->load->view('templates/sidebar', $data);
                $this->load->view('templates/topbar', $data);
                $this->load->view('buku/index', $data);
                $this->load->view('templates/footer');
            } else {
                if ($this->upload->do_upload('gambar_lomba')) {
                    $image = $this->upload->data();
                    $gambar = $image['file_name'];
                } else {
                    $gambar = $this->input->post('old_gambar_lomba');
                }

                $data = [
                    'kat_lb' => $this->input->post('nama_kategori'),
                    'max_ps' => $this->input->post('total_peserta'),
                    'total_ps' => $this->input->post('jumlah_peserta'),
                    'nama_pj' => $this->input->post('nama_pj'),
                    'venue_lb' => $this->input->post('venue'),
                    'usia_min' => $this->input->post('usia_min'),
                    'usia_max' => $this->input->post('usia_max'),
                    'gambar' => $gambar,
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