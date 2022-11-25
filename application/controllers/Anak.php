<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Anak extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('status') != 'login' && $this->session->userdata('level') != 'pns') {
			redirect('autentikasi');
		}
		$this->load->model('pegawai_model');
		$this->load->model('anak_model');
		$this->load->model('pns_model');
		$this->load->model('fitur_model');
	}
	
	public function anak()
	{
		$id_pns = $this->session->userdata('id');
        $data_pns['profile'] = $this->pegawai_model->profilPNS($id_pns);
        $data_pns['data_anak'] = $this->anak_model->dataAnak($id_pns);
		$this->load->view('templates_pegawai/pegawai_header');
		$this->load->view('templates_pegawai/pegawai_sidebar');
		$this->load->view('templates_pegawai/pegawai_topbar', $data_pns);
        $this->load->view('halaman_pns/anak/anak', $data_pns);
        $this->load->view('templates_pegawai/pegawai_footer');	
	}

	public function tambah_anak()
	{
		$id_pns = $this->session->userdata('id');
        $data_pns['profile'] = $this->pegawai_model->profilPNS($id_pns);
        $data_pns['pns'] = $this->pns_model->dataPNS($id_pns);
        $data_pns['hubungan_keluarga'] = $this->fitur_model->hubunganAnak();
        $data_pns['jenis_kelamin'] = $this->fitur_model->jenisKelamin();
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
        $this->load->view('halaman_pns/anak/tambah_anak', $data_pns);
        $this->load->view('templates_pegawai/pegawai_footer');	
	}

	public function proses_tambah_anak()
	{
		$this->anak_model->prosesTambahAnak();
		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil ditambah!</div>');
		redirect('anak/anak');
	}

	public function edit_anak($id)
	{
		$id_pns = $this->session->userdata('id');
        $data_pns['profile'] = $this->pegawai_model->profilPNS($id_pns);
        $data_pns['pns'] = $this->pns_model->dataPNS($id_pns);
        $data_pns['data_anak'] = $this->anak_model->dataEditAnak($id);
        $data_pns['hubungan_keluarga'] = $this->fitur_model->hubunganAnak();
        $data_pns['jenis_kelamin'] = $this->fitur_model->jenisKelamin();
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
        $this->load->view('halaman_pns/anak/edit_anak', $data_pns);
        $this->load->view('templates_pegawai/pegawai_footer');	
	}

	public function proses_edit_anak()
	{
		$this->anak_model->prosesEditAnak();
		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil diupdate!</div>');
		redirect('anak/anak');
	}

	public function hapus_anak($id)
	{
		$this->anak_model->hapusAnak($id);
		$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">Data berhasil dihapus!</div>');
		redirect('anak/anak');
	}
}
