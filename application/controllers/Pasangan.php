<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pasangan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('status') != 'login' && $this->session->userdata('level') != 'pns') {
			redirect('autentikasi');
		}
		$this->load->model('pegawai_model');
		$this->load->model('pasangan_model');
		$this->load->model('pns_model');
		$this->load->model('fitur_model');
	}

	public function pasangan()
	{
		$id_pns = $this->session->userdata('id');
        $data_pns['profile'] = $this->pegawai_model->profilPNS($id_pns);
        $data_pns['data_pasangan'] = $this->pasangan_model->dataPasangan($id_pns);
		$this->load->view('templates_pegawai/pegawai_header');
		$this->load->view('templates_pegawai/pegawai_sidebar');
		$this->load->view('templates_pegawai/pegawai_topbar', $data_pns);
        $this->load->view('halaman_pns/pasangan/pasangan', $data_pns);
        $this->load->view('templates_pegawai/pegawai_footer');	
	}

	public function tambah_pasangan()
	{
		$id_pns = $this->session->userdata('id');
        $data_pns['profile'] = $this->pegawai_model->profilPNS($id_pns);
        $data_pns['pns'] = $this->pns_model->dataPNS($id_pns);
        $data_pns['hubungan_keluarga'] = $this->fitur_model->hubunganKeluarga();
        $data_pns['pekerjaan'] = $this->fitur_model->pekerjaan();
        $data_pns['agama'] = $this->fitur_model->agama();
        $data_pns['status_kesehatan'] = $this->fitur_model->statusSehat();
        $data_pns['pendidikan'] = $this->fitur_model->pendidikan();
        $data_pns['masih_hidup'] = $this->fitur_model->masihHidup();
        $data_pns['berhak_tunjangan'] = $this->fitur_model->berhakTunjangan();
        $data_pns['status_perkawinan'] = $this->fitur_model->statusPerkawinan();
 		$this->load->view('templates_pegawai/pegawai_header');
		$this->load->view('templates_pegawai/pegawai_sidebar');
		$this->load->view('templates_pegawai/pegawai_topbar', $data_pns);
        $this->load->view('halaman_pns/pasangan/tambah_pasangan', $data_pns);
        $this->load->view('templates_pegawai/pegawai_footer');	
	}

	public function proses_tambah_pasangan()
	{
		$this->pasangan_model->prosesTambahPasangan();
		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil ditambah!</div>');
		redirect('pasangan/pasangan');
	}

	public function edit_pasangan($id)
	{
		$id_pns = $this->session->userdata('id');
        $data_pns['profile'] = $this->pegawai_model->profilPNS($id_pns);
        $data_pns['pns'] = $this->pns_model->dataPNS($id_pns);
        $data_pns['data_pasangan'] = $this->pasangan_model->dataEditPasangan($id);
        $data_pns['hubungan_keluarga'] = $this->fitur_model->hubunganKeluarga();
        $data_pns['pekerjaan'] = $this->fitur_model->pekerjaan();
        $data_pns['agama'] = $this->fitur_model->agama();
        $data_pns['status_kesehatan'] = $this->fitur_model->statusSehat();
        $data_pns['pendidikan'] = $this->fitur_model->pendidikan();
        $data_pns['masih_hidup'] = $this->fitur_model->masihHidup();
        $data_pns['berhak_tunjangan'] = $this->fitur_model->berhakTunjangan();
        $data_pns['status_perkawinan'] = $this->fitur_model->statusPerkawinan();
 		$this->load->view('templates_pegawai/pegawai_header');
		$this->load->view('templates_pegawai/pegawai_sidebar');
		$this->load->view('templates_pegawai/pegawai_topbar', $data_pns);
        $this->load->view('halaman_pns/pasangan/edit_pasangan', $data_pns);
        $this->load->view('templates_pegawai/pegawai_footer');	
	}

	public function proses_edit_pasangan()
	{
		$this->pasangan_model->prosesEditPasangan();
		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil diupdate!</div>');
		redirect('pasangan/pasangan');
	}

	public function hapus_pasangan($id)
	{
		$this->pasangan_model->hapusPasangan($id);
		$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">Data berhasil dihapus!</div>');
		redirect('pasangan/pasangan');
	}
}
