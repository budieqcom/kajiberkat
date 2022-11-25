<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jabatan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('status') != 'login' && $this->session->userdata('level') != 'pns') {
			redirect('autentikasi');
		}
		$this->load->model('pegawai_model');
		$this->load->model('pns_model');
		$this->load->model('jabatan_model');
		$this->load->model('fitur_model');
	}

	public function jabatan()
	{
		$id_pns = $this->session->userdata('id');
		$data_pns['profile'] = $this->pegawai_model->profilPNS($id_pns);
		$data_pns['pns'] = $this->pns_model->dataPNS($id_pns);
		$data_pns['jabatan'] = $this->jabatan_model->dataJabatan($id_pns);
		$this->load->view('templates_pegawai/pegawai_header');
		$this->load->view('templates_pegawai/pegawai_sidebar');
		$this->load->view('templates_pegawai/pegawai_topbar', $data_pns);
		$this->load->view('halaman_pns/jabatan/jabatan', $data_pns);
		$this->load->view('templates_pegawai/pegawai_footer');
	}

	public function tambah_jabatan()
	{
		$id_pns = $this->session->userdata('id');
		$data_pns['profile'] = $this->pegawai_model->profilPNS($id_pns);
		$data_pns['pns'] = $this->pns_model->dataPNS($id_pns);
		$data_pns['golongan'] = $this->fitur_model->golonganRuang();
		$data_pns['kjabatan'] = $this->fitur_model->kelompokJabatan();
		$data_pns['jenis_jabatan'] = $this->fitur_model->Jabatan();
		$data_pns['flag_aktif'] = $this->fitur_model->flagAktif();
		$data_pns['unit_kerja'] = $this->fitur_model->unitKerja();
		$data_pns['jabatan'] = $this->jabatan_model->dataJabatan($id_pns);
		$this->load->view('templates_pegawai/pegawai_header');
		$this->load->view('templates_pegawai/pegawai_sidebar');
		$this->load->view('templates_pegawai/pegawai_topbar', $data_pns);
		$this->load->view('halaman_pns/jabatan/tambah_jabatan', $data_pns);
		$this->load->view('templates_pegawai/pegawai_footer');
	}

	public function proses_tambah_jabatan()
	{
		$this->jabatan_model->prosesTambahJabatan();
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil ditambah!</div>');
		redirect('jabatan/jabatan');
	}

	public function edit_jabatan($id)
	{
		$id_pns = $this->session->userdata('id');
		$data_pns['profile'] = $this->pegawai_model->profilPNS($id_pns);
		$data_pns['golongan'] = $this->fitur_model->golonganRuang();
		$data_pns['kjabatan'] = $this->fitur_model->kelompokJabatan();
		$data_pns['jenis_jabatan'] = $this->fitur_model->Jabatan();
		$data_pns['flag_aktif'] = $this->fitur_model->flagAktif();
		$data_pns['unit_kerja'] = $this->fitur_model->unitKerja();
		$data_pns['edit_jabatan'] = $this->jabatan_model->dataEditJabatan($id);
		$data_pns['jabatan'] = $this->jabatan_model->dataJabatan($id_pns);
		$this->load->view('templates_pegawai/pegawai_header');
		$this->load->view('templates_pegawai/pegawai_sidebar');
		$this->load->view('templates_pegawai/pegawai_topbar', $data_pns);
		$this->load->view('halaman_pns/jabatan/edit_jabatan', $data_pns);
		$this->load->view('templates_pegawai/pegawai_footer');
	}

	public function proses_edit_jabatan()
	{
		$this->jabatan_model->prosesEditJabatan();
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil diupdate!</div>');
		redirect('jabatan/jabatan');
	}

	public function hapus_jabatan($id)
	{
		$this->jabatan_model->hapusJabatan($id);
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Data berhasil dihapus!</div>');
		redirect('jabatan/jabatan');
	}
}
