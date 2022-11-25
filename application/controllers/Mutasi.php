<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mutasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('status') != 'login' && $this->session->userdata('level') != 'admin') {
            redirect('autentikasi');
        }
        $this->load->model('admin_model');
        $this->load->model('mutasi_model');
        $this->load->model('fitur_model');
    }

    public function daftar_mutasi()
    {
        if ($this->session->userdata('level') != 'admin') {
            redirect('autentikasi');
        } else {
            $id_admin = $this->session->userdata('id');
            $data_admin['user'] = $this->admin_model->profilAdmin($id_admin);
            $data_admin['data_mutasi'] = $this->mutasi_model->daftarMutasi();
            $this->load->view('templates_admin/admin_header');
            $this->load->view('templates_admin/admin_sidebar');
            $this->load->view('templates_admin/admin_topbar', $data_admin);
            $this->load->view('halaman_admin/mutasi/mutasi', $data_admin);
            $this->load->view('templates_admin/admin_footer');
        }
    }

    public function tambah_mutasi()
    {
        if ($this->session->userdata('level') != 'admin') {
            redirect('autentikasi');
        } else {
            $id_admin = $this->session->userdata('id');
            $data_admin['user'] = $this->admin_model->profilAdmin($id_admin);
            $data_admin['data_pegawai'] = $this->fitur_model->dataPegawai();
            $data_admin['jenis_mutasi'] = $this->fitur_model->jenisMutasi();
            $data_admin['data_mutasi'] = $this->mutasi_model->daftarMutasi();
            $this->load->view('templates_admin/admin_header');
            $this->load->view('templates_admin/admin_sidebar');
            $this->load->view('templates_admin/admin_topbar', $data_admin);
            $this->load->view('halaman_admin/mutasi/tambah_mutasi', $data_admin);
            $this->load->view('templates_admin/admin_footer');
        }
    }

    public function proses_tambah_mutasi()
    {
        if ($this->session->userdata('level') != 'admin') {
            redirect('autentikasi');
        } else {
            $this->mutasi_model->prosesTambahMutasi();
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil ditambah!</div>');
            redirect('mutasi/daftar_mutasi');
        }
    }

    public function edit_mutasi($id)
    {
        if ($this->session->userdata('level') != 'admin') {
            redirect('autentikasi');
        } else {
            $id_admin = $this->session->userdata('id');
            $data_admin['user'] = $this->admin_model->profilAdmin($id_admin);
            $data_admin['data_pegawai'] = $this->fitur_model->dataPegawai();
            $data_admin['jenis_mutasi'] = $this->fitur_model->jenisMutasi();
            $data_admin['data_mutasi'] = $this->mutasi_model->dataEditMutasi($id);
            $this->load->view('templates_admin/admin_header');
            $this->load->view('templates_admin/admin_sidebar');
            $this->load->view('templates_admin/admin_topbar', $data_admin);
            $this->load->view('halaman_admin/mutasi/edit_mutasi', $data_admin);
            $this->load->view('templates_admin/admin_footer');
        }
    }
    
    public function proses_edit_mutasi()
    {
		$this->mutasi_model->prosesEditMutasi();
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil diupdate!</div>');
            redirect('mutasi/daftar_mutasi');
	}
	
	public function hapus_mutasi($id)
	{
		$this->mutasi_model->prosesHapusMutasi($id);
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Data berhasil diupdate!</div>');
            redirect('mutasi/daftar_mutasi');
	}
}
