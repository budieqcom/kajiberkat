<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kgb extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('status') != 'login' && $this->session->userdata('level') != 'pns') {
			redirect('autentikasi');
		}
		$this->load->model('pegawai_model');
		$this->load->model('pns_model');
		$this->load->model('kgb_model');
		$this->load->model('fitur_model');
	}

	public function kgb()
	{
		$id_pns = $this->session->userdata('id');
		$data_pns['profile'] = $this->pegawai_model->profilPNS($id_pns);
		$data_pns['pns'] = $this->pns_model->dataPNS($id_pns);
		$data_pns['kgb'] = $this->kgb_model->dataKGB($id_pns); 
		$this->load->view('templates_pegawai/pegawai_header');
		$this->load->view('templates_pegawai/pegawai_sidebar');
		$this->load->view('templates_pegawai/pegawai_topbar', $data_pns);
        $this->load->view('halaman_pns/kgb/kgb', $data_pns);
        $this->load->view('templates_pegawai/pegawai_footer');
	}

	public function tambah_kgb()
	{
		$id_pns = $this->session->userdata('id');
		$data_pns['profile'] = $this->pegawai_model->profilPNS($id_pns);
		$data_pns['pns'] = $this->pns_model->dataPNS($id_pns);
		$data_pns['golongan'] = $this->fitur_model->golonganRuang();
		$this->load->view('templates_pegawai/pegawai_header');
		$this->load->view('templates_pegawai/pegawai_sidebar');
		$this->load->view('templates_pegawai/pegawai_topbar', $data_pns);
        $this->load->view('halaman_pns/kgb/tambah_kgb', $data_pns);
        $this->load->view('templates_pegawai/pegawai_footer');
	}

	public function proses_tambah_kgb()
	{
		$this->kgb_model->prosesTambahKGB();
		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil ditambah!</div>');
		redirect('kgb/kgb');
	}

	public function edit_kgb($id)
	{
		$id_pns = $this->session->userdata('id');
		$data_pns['profile'] = $this->pegawai_model->profilPNS($id_pns);
		$data_pns['pns'] = $this->pns_model->dataPNS($id_pns);
		$data_pns['golongan'] = $this->fitur_model->golonganRuang();
		$data_pns['data_kgb'] = $this->kgb_model->editDataKGB($id);
		$this->load->view('templates_pegawai/pegawai_header');
		$this->load->view('templates_pegawai/pegawai_sidebar');
		$this->load->view('templates_pegawai/pegawai_topbar', $data_pns);
        $this->load->view('halaman_pns/kgb/edit_kgb', $data_pns);
        $this->load->view('templates_pegawai/pegawai_footer');
	}

	public function proses_edit_kgb()
	{
		$this->kgb_model->prosesEditKGB();
		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil diupdate!</div>');
		redirect('kgb/kgb');
	}

	public function hapus_kgb($id)
	{
		$this->kgb_model->hapusKGB($id);
		$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">Data berhasil dihapus!</div>');
		redirect('kgb/kgb');
	}
}
