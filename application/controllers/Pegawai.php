<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pegawai extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('status') != 'login' && $this->session->userdata('level') != 'pns') {
			redirect('autentikasi');
		}
		$this->load->model('pegawai_model');
		$this->load->model('fitur_model');
	}

	public function biodata_pegawai()
	{
		$id_pns = $this->session->userdata('id');
        $data_pns['profile'] = $this->pegawai_model->profilPNS($id_pns);
		$this->load->view('templates_pegawai/pegawai_header');
		$this->load->view('templates_pegawai/pegawai_sidebar');
		$this->load->view('templates_pegawai/pegawai_topbar', $data_pns);
        $this->load->view('halaman_pns/pegawai/biodata_pegawai', $data_pns);
        $this->load->view('templates_pegawai/pegawai_footer');	
	}
	
	public function edit_biodata_pegawai()
	{
		$id_pns = $this->session->userdata('id');
        $data_pns['profile'] = $this->pegawai_model->profilPNS($id_pns);
        $data_pns['agama'] = $this->fitur_model->dataAgama();
        $data_pns['status_perkawinan'] = $this->fitur_model->statusPerkawinan();
        $data_pns['jenis_kelamin'] = $this->fitur_model->jenisKelamin();
        $data_pns['tingkat_pendidikan'] =$this->fitur_model->tingkatPendidikan();
		$this->load->view('templates_pegawai/pegawai_header');
		$this->load->view('templates_pegawai/pegawai_sidebar');
		$this->load->view('templates_pegawai/pegawai_topbar', $data_pns);
        $this->load->view('halaman_pns/pegawai/edit_biodata_pegawai', $data_pns);
        $this->load->view('templates_pegawai/pegawai_footer');
	}

	public function proses_update_biodata()
	{
		$this->pegawai_model->UpdateBiodata();
		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil diupdate!</div>');
		redirect('pegawai/biodata_pegawai');
	}
}
