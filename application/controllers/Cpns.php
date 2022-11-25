<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cpns extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('status') != 'login' && $this->session->userdata('level') != 'pns') {
			redirect('autentikasi');
		}
		$this->load->model('pegawai_model');
		$this->load->model('cpns_model');
		$this->load->model('pns_model');
		$this->load->model('fitur_model');
	}

	public function cpns()
	{
		$id_pns = $this->session->userdata('id');
		$data_pns['profile'] = $this->pegawai_model->profilPNS($id_pns);
		$data_pns['cpns'] =$this->cpns_model->dataCPNS($id_pns);
		$this->load->view('templates_pegawai/pegawai_header');
		$this->load->view('templates_pegawai/pegawai_sidebar');
		$this->load->view('templates_pegawai/pegawai_topbar', $data_pns);
        $this->load->view('halaman_pns/cpns/cpns', $data_pns);
        $this->load->view('templates_pegawai/pegawai_footer');
	}

	public function edit_cpns()
	{
		$id_pns = $this->session->userdata('id');
		$data_pns['profile'] = $this->pegawai_model->profilPNS($id_pns);
		$data_pns['cpns'] = $this->cpns_model->dataCPNS($id_pns);
		$data_pns['golongan'] = $this->fitur_model->golonganRuang();
		$this->load->view('templates_pegawai/pegawai_header');
		$this->load->view('templates_pegawai/pegawai_sidebar');
		$this->load->view('templates_pegawai/pegawai_topbar', $data_pns);
        $this->load->view('halaman_pns/cpns/edit_cpns', $data_pns);
        $this->load->view('templates_pegawai/pegawai_footer');	
	}

	public function proses_update_cpns()
	{
		$this->cpns_model->updateCPNS();
		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil diupdate!</div>');
		redirect('cpns/cpns');
	}
}
