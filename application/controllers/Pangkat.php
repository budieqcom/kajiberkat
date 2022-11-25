<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pangkat extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('status') != 'login' && $this->session->userdata('level') != 'pns') {
			redirect('autentikasi');
		}
		$this->load->model('pegawai_model');
		$this->load->model('pns_model');
		$this->load->model('pangkat_model');
		$this->load->model('fitur_model');
	}

	public function pangkat()
	{
		$id_pns = $this->session->userdata('id');
		$data_pns['profile'] = $this->pegawai_model->profilPNS($id_pns);
		$data_pns['pns'] =$this->pns_model->dataPNS($id_pns);
		$data_pns['pangkat'] = $this->pangkat_model->dataPangkat($id_pns);
		$this->load->view('templates_pegawai/pegawai_header');
		$this->load->view('templates_pegawai/pegawai_sidebar');
		$this->load->view('templates_pegawai/pegawai_topbar', $data_pns);
        $this->load->view('halaman_pns/pangkat/pangkat', $data_pns);
        $this->load->view('templates_pegawai/pegawai_footer');
	}

	public function tambah_pangkat()
	{
		$id_pns = $this->session->userdata('id');
		$data_pns['profile'] = $this->pegawai_model->profilPNS($id_pns);
		$data_pns['pns'] = $this->pns_model->dataPNS($id_pns);
		$data_pns['jenis_pangkat'] = $this->fitur_model->jenisPangkat();
		$data_pns['golongan_ruang'] = $this->fitur_model->golonganRuang();
		$this->load->view('templates_pegawai/pegawai_header');
		$this->load->view('templates_pegawai/pegawai_sidebar');
		$this->load->view('templates_pegawai/pegawai_topbar', $data_pns);
        $this->load->view('halaman_pns/pangkat/tambah_pangkat', $data_pns);
        $this->load->view('templates_pegawai/pegawai_footer');	
	} 

	public function proses_tambah_pangkat()
	{
		$this->pangkat_model->tambahPangkat();
		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil ditambah!</div>');
		redirect('pangkat/pangkat');
	}
	
	public function edit_pangkat($id)
	{
		$id_pns = $this->session->userdata('id');
		$data_pns['profile'] = $this->pegawai_model->profilPNS($id_pns);
		$data_pns['edit_pangkat'] = $this->pangkat_model->dataEditPangkat($id);
		$data_pns['jenis_pangkat'] = $this->fitur_model->jenisPangkat();
		$data_pns['golongan_ruang'] = $this->fitur_model->golonganRuang();
		$this->load->view('templates_pegawai/pegawai_header');
		$this->load->view('templates_pegawai/pegawai_sidebar');
		$this->load->view('templates_pegawai/pegawai_topbar', $data_pns);
        $this->load->view('halaman_pns/pangkat/edit_pangkat', $data_pns);
        $this->load->view('templates_pegawai/pegawai_footer');	
	}

	public function proses_edit_pangkat()
	{
		$this->pangkat_model->prosesEditPangkat();
		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil diupdate!</div>');
		redirect('pangkat/pangkat');
	}

	public function hapus_pangkat($id)
	{
		$this->pangkat_model->hapusPangkat($id);
		$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">Data berhasil dihapus!</div>');
		redirect('pangkat/pangkat');
	}
}
