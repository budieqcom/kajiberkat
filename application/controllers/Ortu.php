<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ortu extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('status') != 'login' && $this->session->userdata('level') != 'pns') {
			redirect('autentikasi');
		}
		$this->load->model('pegawai_model');
		$this->load->model('ortu_model');
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

	public function ortu()
	{
		$id_pns = $this->session->userdata('id');
        $data_pns['profile'] = $this->pegawai_model->profilPNS($id_pns);
        $data_pns['data_ortu'] = $this->ortu_model->dataOrtu($id_pns);
		$this->load->view('templates_pegawai/pegawai_header');
		$this->load->view('templates_pegawai/pegawai_sidebar');
		$this->load->view('templates_pegawai/pegawai_topbar', $data_pns);
        $this->load->view('halaman_pns/ortu/ortu', $data_pns);
        $this->load->view('templates_pegawai/pegawai_footer');
	}

	public function tambah_ortu()
	{
		$id_pns = $this->session->userdata('id');
        $data_pns['profile'] = $this->pegawai_model->profilPNS($id_pns);
        $data_pns['pns'] = $this->pns_model->dataPNS($id_pns);
        $data_pns['hubungan_keluarga'] = $this->fitur_model->hubunganOrtu();
        $data_pns['pekerjaan'] = $this->fitur_model->pekerjaan();
        $data_pns['agama'] = $this->fitur_model->agama();
        $data_pns['status_kesehatan'] = $this->fitur_model->statusSehat();
        $data_pns['masih_hidup'] = $this->fitur_model->masihHidup();
        $data_pns['status_perkawinan'] = $this->fitur_model->statusPerkawinan();
 		$this->load->view('templates_pegawai/pegawai_header');
		$this->load->view('templates_pegawai/pegawai_sidebar');
		$this->load->view('templates_pegawai/pegawai_topbar', $data_pns);
        $this->load->view('halaman_pns/ortu/tambah_ortu', $data_pns);
        $this->load->view('templates_pegawai/pegawai_footer');	
	}

	public function proses_tambah_ortu()
	{
		$this->ortu_model->prosesTambahOrtu();
		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil ditambah!</div>');
		redirect('ortu/ortu');
	}

	public function edit_ortu($id)
	{
		$id_pns = $this->session->userdata('id');
        $data_pns['profile'] = $this->pegawai_model->profilPNS($id_pns);
        $data_pns['pns'] = $this->pns_model->dataPNS($id_pns);
        $data_pns['data_ortu'] = $this->ortu_model->dataEditOrtu($id);
        $data_pns['hubungan_keluarga'] = $this->fitur_model->hubunganOrtu();
        $data_pns['pekerjaan'] = $this->fitur_model->pekerjaan();
        $data_pns['agama'] = $this->fitur_model->agama();
        $data_pns['status_kesehatan'] = $this->fitur_model->statusSehat();
        $data_pns['masih_hidup'] = $this->fitur_model->masihHidup();
        $data_pns['status_perkawinan'] = $this->fitur_model->statusPerkawinan();
 		$this->load->view('templates_pegawai/pegawai_header');
		$this->load->view('templates_pegawai/pegawai_sidebar');
		$this->load->view('templates_pegawai/pegawai_topbar', $data_pns);
        $this->load->view('halaman_pns/ortu/edit_ortu', $data_pns);
        $this->load->view('templates_pegawai/pegawai_footer');	
	}

	public function proses_edit_ortu()
	{
		$this->ortu_model->prosesEditOrtu();
		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil diupdate!</div>');
		redirect('ortu/ortu');
	}

	public function hapus_ortu($id)
	{
		$this->ortu_model->hapusOrtu($id);
		$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">Data berhasil dihapus!</div>');
		redirect('ortu/ortu');	
	}
}
