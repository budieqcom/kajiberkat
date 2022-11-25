<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Halaman_pns extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('status') != 'login' && $this->session->userdata('level') != 'pns') {
			redirect('autentikasi');
		}
		$this->load->model('pegawai_model');
		$this->load->model('pns_model');
		$this->load->model('fitur_model');
	}

	public function index()
	{
        $id_pns = $this->session->userdata('id');
        $data_pns['profile'] = $this->pegawai_model->profilPNS($id_pns);
        $data_pns['jlh_pangkat'] = $this->pegawai_model->jumlahDataPangkat($id_pns);
        $data_pns['jlh_jabatan'] = $this->pegawai_model->jumlahDataJabatan($id_pns);
        $data_pns['jlh_kgb'] = $this->pegawai_model->jumlahDataKGB($id_pns);
        $this->load->view('templates_pegawai/pegawai_header');
		$this->load->view('templates_pegawai/pegawai_sidebar');
		$this->load->view('templates_pegawai/pegawai_topbar', $data_pns);
        $this->load->view('halaman_pns/dashboard_pns',$data_pns);
        $this->load->view('templates_pegawai/pegawai_footer');
	}

	public function pns()
	{
		$id_pns = $this->session->userdata('id');
		$data_pns['profile'] = $this->pegawai_model->profilPNS($id_pns);
		$data_pns['pns'] =$this->pns_model->dataPNS($id_pns);
		$this->load->view('templates_pegawai/pegawai_header');
		$this->load->view('templates_pegawai/pegawai_sidebar');
		$this->load->view('templates_pegawai/pegawai_topbar', $data_pns);
        $this->load->view('halaman_pns/pns/pns', $data_pns);
        $this->load->view('templates_pegawai/pegawai_footer');
	}

	public function edit_pns()
	{
		$id_pns = $this->session->userdata('id');
		$data_pns['profile'] = $this->pegawai_model->profilPNS($id_pns);
		$data_pns['pns'] = $this->pns_model->dataPNS($id_pns);
		$data_pns['golongan'] = $this->fitur_model->golonganRuang();
		$data_pns['kjabatan'] = $this->fitur_model->kelompokJabatan();
		$data_pns['jabatan'] = $this->fitur_model->Jabatan();
		$this->load->view('templates_pegawai/pegawai_header');
		$this->load->view('templates_pegawai/pegawai_sidebar');
		$this->load->view('templates_pegawai/pegawai_topbar', $data_pns);
        $this->load->view('halaman_pns/pns/edit_pns', $data_pns);
        $this->load->view('templates_pegawai/pegawai_footer');	
	}

	public function proses_update_pns()
	{
		$this->pns_model->updatePNS();
		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil diupdate!</div>');
		redirect('halaman_pns/pns');
	}
}
