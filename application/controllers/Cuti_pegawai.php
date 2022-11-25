<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cuti_pegawai extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('status') != 'login' && $this->session->userdata('level') != 'admin') 
		{
            redirect('autentikasi');
        }
        $this->load->model('admin_model');
        $this->load->model('pegawai_model');
        $this->load->model('cuti_model');
        $this->load->model('fitur_model');
    }

    public function daftar_cuti_pegawai()
    {
        $id_pegawai = $this->session->userdata('id');
        $data_pns['profile'] = $this->pegawai_model->profilPNS($id_pegawai);
        $data_pns['data_pegawai'] = $this->fitur_model->dataPegawaiId($id_pegawai);
        $data_pns['daftar_cuti'] = $this->cuti_model->daftarCuti($id_pegawai);
        $data_pns['sisa_cuti'] = $this->cuti_model->cekSisaCutiTahunan($id_pegawai);
        $this->load->view('templates_pegawai/pegawai_header');
        $this->load->view('templates_pegawai/pegawai_sidebar');
        $this->load->view('templates_pegawai/pegawai_topbar', $data_pns);
        $this->load->view('halaman_pns/cuti/cuti', $data_pns);
        $this->load->view('templates_pegawai/pegawai_footer');
    }

    public function tambah_cuti_pegawai()
    {
        $id_pegawai = $this->session->userdata('id');
        $data_pns['profile'] = $this->pegawai_model->profilPNS($id_pegawai);
        $data_pns['data_pegawai'] = $this->fitur_model->dataPegawaiId($id_pegawai);
        $data_pns['jenis_cuti'] = $this->fitur_model->jenisCuti();
        $data_pns['lokasi_cuti'] = $this->fitur_model->lokasiCuti();
        $data_pns['data_cuti'] = $this->cuti_model->daftarCuti($id_pegawai);
        $data_pns['sisa_cuti'] = $this->cuti_model->cekSisaCutiTahunan($id_pegawai);
        $data_pns['data_semua_pegawai'] = $this->fitur_model->dataPegawai();
        $this->load->view('templates_pegawai/pegawai_header');
		$this->load->view('templates_pegawai/pegawai_sidebar');
		$this->load->view('templates_pegawai/pegawai_topbar', $data_pns);
        $this->load->view('halaman_pns/cuti/tambah_cuti', $data_pns);
        $this->load->view('templates_pegawai/pegawai_footer');
    }

    public function proses_tambah_cuti() 
    {
        $id_pegawai = $this->input->post('id_pegawai');
        $this->cuti_model->prosesTambahCuti($id_pegawai);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil ditambah!</div>');
        redirect('cuti_pegawai/daftar_cuti_pegawai/');
    }

    public function edit_cuti($id, $id_pegawai)
    {
        $id_pegawai = $this->session->userdata('id');
        $data_pns['profile'] = $this->pegawai_model->profilPNS($id_pegawai);
        $data_pns['data_pegawai'] = $this->fitur_model->dataPegawaiId($id_pegawai);
        $data_pns['jenis_cuti'] = $this->fitur_model->jenisCuti();
        $data_pns['lokasi_cuti'] = $this->fitur_model->lokasiCuti();
        $data_pns['data_cuti'] = $this->cuti_model->dataCutiID($id);
        $data_pns['sisa_cuti'] = $this->cuti_model->cekSisaCutiTahunan($id_pegawai);
        $data_pns['data_semua_pegawai'] = $this->fitur_model->dataPegawai();
        $this->load->view('templates_pegawai/pegawai_header');
		$this->load->view('templates_pegawai/pegawai_sidebar');
		$this->load->view('templates_pegawai/pegawai_topbar', $data_pns);
        $this->load->view('halaman_pns/cuti/edit_cuti', $data_pns);
        $this->load->view('templates_pegawai/pegawai_footer');
    }

    public function proses_edit_cuti()
    {
        $id = $this->input->post('id');
        $id_pegawai = $this->input->post('id_pegawai');
        $this->cuti_model->prosesEditCuti($id, $id_pegawai);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil diupdate!</div>');
        redirect('cuti_pegawai/daftar_cuti_pegawai/');
    }

    public function hapus_cuti($id, $id_pegawai)
    {
        $this->cuti_model->prosesHapusCuti($id);
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Data cuti berhasil dihapus!</div>');
        redirect('cuti_pegawai/daftar_cuti_pegawai');
    }
}
