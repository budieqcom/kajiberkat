<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Saudara extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('status') != 'login' && $this->session->userdata('level') != 'pns') {
			redirect('autentikasi');
		}
		$this->load->model('pegawai_model');
		$this->load->model('saudara_model');
		$this->load->model('pns_model');
		$this->load->model('fitur_model');
	}

	public function saudara()
	{
		$id_pns = $this->session->userdata('id');
        $data_pns['profile'] = $this->pegawai_model->profilPNS($id_pns);
        $data_pns['data_saudara'] = $this->saudara_model->dataSaudara($id_pns);
		$this->load->view('templates_pegawai/pegawai_header');
		$this->load->view('templates_pegawai/pegawai_sidebar');
		$this->load->view('templates_pegawai/pegawai_topbar', $data_pns);
        $this->load->view('halaman_pns/saudara/saudara', $data_pns);
        $this->load->view('templates_pegawai/pegawai_footer');
	}

	public function tambah_saudara()
	{
		$id_pns = $this->session->userdata('id');
        $data_pns['profile'] = $this->pegawai_model->profilPNS($id_pns);
        $data_pns['pns'] = $this->pns_model->dataPNS($id_pns);
        $data_pns['hubungan_keluarga'] = $this->fitur_model->hubunganSaudara();
        $data_pns['jenis_kelamin'] = $this->fitur_model->jenisKelamin();
        $data_pns['pekerjaan'] = $this->fitur_model->pekerjaan();
        $data_pns['pendidikan'] = $this->fitur_model->tingkatPendidikan();
        $data_pns['agama'] = $this->fitur_model->agama();
        $data_pns['status_kesehatan'] = $this->fitur_model->statusSehat();
        $data_pns['masih_hidup'] = $this->fitur_model->masihHidup();
        $data_pns['status_perkawinan'] = $this->fitur_model->statusPerkawinan();
 		$this->load->view('templates_pegawai/pegawai_header');
		$this->load->view('templates_pegawai/pegawai_sidebar');
		$this->load->view('templates_pegawai/pegawai_topbar', $data_pns);
        $this->load->view('halaman_pns/saudara/tambah_saudara', $data_pns);
        $this->load->view('templates_pegawai/pegawai_footer');	
	}

	public function proses_tambah_saudara()
	{
		$this->saudara_model->prosesTambahSaudara();
		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil ditambah!</div>');
		redirect('saudara/saudara');
	}

	public function edit_saudara($id)
	{
		$id_pns = $this->session->userdata('id');
        $data_pns['profile'] = $this->pegawai_model->profilPNS($id_pns);
        $data_pns['pns'] = $this->pns_model->dataPNS($id_pns);
        $data_pns['data_saudara'] = $this->saudara_model->dataEditSaudara($id);
        $data_pns['hubungan_keluarga'] = $this->fitur_model->hubunganSaudara();
        $data_pns['jenis_kelamin'] = $this->fitur_model->jenisKelamin();
        $data_pns['pekerjaan'] = $this->fitur_model->pekerjaan();
        $data_pns['pendidikan'] = $this->fitur_model->tingkatPendidikan();
        $data_pns['agama'] = $this->fitur_model->agama();
        $data_pns['status_kesehatan'] = $this->fitur_model->statusSehat();
        $data_pns['masih_hidup'] = $this->fitur_model->masihHidup();
        $data_pns['status_perkawinan'] = $this->fitur_model->statusPerkawinan();
 		$this->load->view('templates_pegawai/pegawai_header');
		$this->load->view('templates_pegawai/pegawai_sidebar');
		$this->load->view('templates_pegawai/pegawai_topbar', $data_pns);
        $this->load->view('halaman_pns/saudara/edit_saudara', $data_pns);
        $this->load->view('templates_pegawai/pegawai_footer');
	}

	public function proses_edit_saudara()
	{
		$this->saudara_model->prosesEditSaudara();
		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil diupdate!</div>');
		redirect('saudara/saudara');	
	}

	public function hapus_saudara($id)
	{
		$this->saudara_model->hapusSaudara($id);
		$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">Data berhasil dihapus!</div>');
		redirect('saudara/saudara');
	}
}
