<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Izin_pegawai extends CI_Controller
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
        $this->load->model('izin_model');
        $this->load->model('fitur_model');
    }

    public function daftar_izin_pegawai()
    {
        $id_pegawai = $this->session->userdata('id');
        $data_pns['profile'] = $this->pegawai_model->profilPNS($id_pegawai);
        $data_pns['data_pegawai'] = $this->fitur_model->dataPegawaiId($id_pegawai);
        $data_pns['daftar_izin'] = $this->izin_model->daftarIzin($id_pegawai);
        $this->load->view('templates_pegawai/pegawai_header');
        $this->load->view('templates_pegawai/pegawai_sidebar');
        $this->load->view('templates_pegawai/pegawai_topbar', $data_pns);
        $this->load->view('halaman_pns/izin/izin', $data_pns);
        $this->load->view('templates_pegawai/pegawai_footer');
    }

    public function tambah_izin()
    {
        $id_pegawai = $this->session->userdata('id');
        $data_pns['profile'] = $this->pegawai_model->profilPNS($id_pegawai);
        $data_pns['data_pegawai'] = $this->fitur_model->dataPegawaiId($id_pegawai);
        $data_pns['lokasi_cuti'] = $this->fitur_model->lokasiCuti();
        $data_pns['data_semua_pegawai'] = $this->fitur_model->dataPegawai();
        $this->load->view('templates_pegawai/pegawai_header');
		$this->load->view('templates_pegawai/pegawai_sidebar');
		$this->load->view('templates_pegawai/pegawai_topbar', $data_pns);
        $this->load->view('halaman_pns/izin/tambah_izin', $data_pns);
        $this->load->view('templates_pegawai/pegawai_footer');
    }

    public function proses_tambah_izin()
    {
        $id_pegawai = $this->input->post('id_pegawai');
        $this->izin_model->prosesTambahIzin($id_pegawai);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil ditambah!</div>');
        redirect('izin_pegawai/daftar_izin_pegawai');
    }
    
    public function edit_izin($id, $id_pegawai)
    {
        $data_pns['profile'] = $this->pegawai_model->profilPNS($id_pegawai);
        $data_pns['data_pegawai'] = $this->fitur_model->dataPegawaiId($id_pegawai);
        $data_pns['lokasi_cuti'] = $this->fitur_model->lokasiCuti();
        $data_pns['data_izin'] = $this->izin_model->dataIzinId($id);
        $data_pns['data_semua_pegawai'] = $this->fitur_model->dataPegawai();
        $this->load->view('templates_pegawai/pegawai_header');
		$this->load->view('templates_pegawai/pegawai_sidebar');
		$this->load->view('templates_pegawai/pegawai_topbar', $data_pns);
        $this->load->view('halaman_pns/izin/edit_izin', $data_pns);
        $this->load->view('templates_pegawai/pegawai_footer');
    }

    public function proses_edit_izin()
    {
        $id = $this->input->post('id');
        $id_pegawai = $this->input->post('id_pegawai');
        $this->izin_model->prosesEditIzin($id, $id_pegawai);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil diupdate!</div>');
        redirect('izin_pegawai/daftar_izin_pegawai/');
    }

    public function hapus_izin($id, $id_pegawai)
    {
        $this->izin_model->prosesHapusIzin($id);
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Data izin sudah dihapus!</div>');
        redirect('izin_pegawai/daftar_izin_pegawai');
    }
}
