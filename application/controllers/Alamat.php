<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Alamat extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('status') != 'login' && $this->session->userdata('level') != 'pns') {
			redirect('autentikasi');
		}
		$this->load->model('pegawai_model');
		$this->load->model('alamat_model');
		$this->load->model('pns_model');
		$this->load->model('fitur_model');
	}

	public function alamat()
	{
		$id_pns = $this->session->userdata('id');
		$data_pns['profile'] = $this->pegawai_model->profilPNS($id_pns);
		$data_pns['data_alamat'] =$this->alamat_model->dataAlamat($id_pns);
		$this->load->view('templates_pegawai/pegawai_header');
		$this->load->view('templates_pegawai/pegawai_sidebar');
		$this->load->view('templates_pegawai/pegawai_topbar', $data_pns);
        $this->load->view('halaman_pns/alamat/alamat', $data_pns);
        $this->load->view('templates_pegawai/pegawai_footer');	
	}

	public function tambah_alamat()
	{
		$id_pns = $this->session->userdata('id');
        $data_pns['profile'] = $this->pegawai_model->profilPNS($id_pns);
        $data_pns['pns'] = $this->pns_model->dataPNS($id_pns);
        $data_pns['jenis_alamat'] = $this->fitur_model->jenisAlamat();
        $this->load->view('templates_pegawai/pegawai_header');
		$this->load->view('templates_pegawai/pegawai_sidebar');
		$this->load->view('templates_pegawai/pegawai_topbar', $data_pns);
        $this->load->view('halaman_pns/alamat/tambah_alamat', $data_pns);
        $this->load->view('templates_pegawai/pegawai_footer');
	}

	public function proses_tambah_alamat()
	{
		$this->alamat_model->prosesTambahAlamat();
		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil ditambah!</div>');
		redirect('alamat/alamat');
	}

	public function edit_alamat($id)
	{
		$id_pns = $this->session->userdata('id');
        $data_pns['profile'] = $this->pegawai_model->profilPNS($id_pns);
        $data_pns['pns'] = $this->pns_model->dataPNS($id_pns);
		$data_pns['jenis_alamat'] = $this->fitur_model->jenisAlamat();
		$data_pns['data_alamat'] = $this->alamat_model->dataEditAlamat($id);
        $this->load->view('templates_pegawai/pegawai_header');
		$this->load->view('templates_pegawai/pegawai_sidebar');
		$this->load->view('templates_pegawai/pegawai_topbar', $data_pns);
        $this->load->view('halaman_pns/alamat/edit_alamat', $data_pns);
        $this->load->view('templates_pegawai/pegawai_footer');
	}

	public function proses_edit_alamat()
	{
		$this->alamat_model->prosesEditAlamat();
		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil diupdate!</div>');
		redirect('alamat/alamat');
	}

	public function hapus_alamat($id)
	{
		$this->alamat_model->hapusAlamat($id);
		$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">Data berhasil dihapus!</div>');
		redirect('alamat/alamat');
	}
}
