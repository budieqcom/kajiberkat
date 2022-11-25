<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Halaman_admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('status') != 'login' && $this->session->userdata('level') != 'admin') {
			redirect('autentikasi');
		}
		$this->load->model('admin_model');
		$this->load->model('fitur_model');
		$this->load->model('cuti_model');
	}

	public function index()
	{
		if ($this->session->userdata('level') != 'admin') 
		{
			redirect('autentikasi');
		} 
		else 
		{
			$id_admin = $this->session->userdata('id');
			$data_admin['user'] = $this->admin_model->profilAdmin($id_admin);
			$data_admin['jumlah_admin'] = $this->admin_model->jumlahAdmin();
			$data_admin['jumlah_hakim'] = $this->admin_model->jumlahHakim();
			$data_admin['jumlah_pegawai'] = $this->admin_model->jumlahPegawai();
			$data_admin['kenaikan_pangkat'] = $this->admin_model->kenaikanPangkat();
			$data_admin['rekap_cuti'] = $this->admin_model->rekapCuti();
			$data_admin['jumlah_cuti'] = $this->admin_model->jumlahCuti();
			$data_admin['detil_cuti'] = $this->admin_model->detilCuti();
			$data_admin['jumlah_izin'] = $this->admin_model->jumlahIzin();	
			$data_admin['detil_izin'] = $this->admin_model->detilIzin();
			$data_admin['jumlah_hadir'] = $this->admin_model->jumlahHadir();
			$data_admin['status_kehadiran'] = $this->admin_model->statusKehadiran();
			$data_admin['kgb'] = $this->admin_model->kgb();
			$this->load->view('templates_admin/admin_header');
			$this->load->view('templates_admin/admin_sidebar');
			$this->load->view('templates_admin/admin_topbar', $data_admin);
			$this->load->view('halaman_admin/dashboard_admin', $data_admin);
			$this->load->view('templates_admin/admin_footer');
		}
	}

	public function daftar_user()
	{
		if ($this->session->userdata('level') != 'admin') 
		{
			redirect('autentikasi');
		} 
		else 
		{
			$id_admin = $this->session->userdata('id');
			$data_admin['user'] = $this->admin_model->profilAdmin($id_admin);
			$data_admin['daftar_user'] = $this->admin_model->daftarUser();
			$this->load->view('templates_admin/admin_header');
			$this->load->view('templates_admin/admin_sidebar');
			$this->load->view('templates_admin/admin_topbar', $data_admin);
			$this->load->view('halaman_admin/daftar_user', $data_admin);
			$this->load->view('templates_admin/admin_footer');
		}
	}

	public function update_profil_admin()
	{
		if ($this->session->userdata('level') != 'admin') 
		{
			redirect('autentikasi');
		} 
		else 
		{
			$id_admin = $this->session->userdata('id');
			$data_admin['user'] = $this->admin_model->profilAdmin($id_admin);
			$this->load->view('templates_admin/admin_header');
			$this->load->view('templates_admin/admin_sidebar');
			$this->load->view('templates_admin/admin_topbar', $data_admin);
			$this->load->view('halaman_admin/profil_admin', $data_admin);
			$this->load->view('templates_admin/admin_footer');
		}
	}

	public function proses_update_profil_admin()
	{
		if ($this->session->userdata('level') != 'admin') 
		{
			redirect('autentikasi');
		} 
		else 
		{
			$data_admin['user'] = $this->admin_model->modelUpdateAdmin();
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil diupdate!</div>');
			redirect('Halaman_admin/daftar_user');
		}
	}

	public function cetak_blanko_kgb($id_pegawai)
	{
		$data_admin['data_pegawai'] = $this->fitur_model->dataPegawaiId($id_pegawai);
		$data_admin['data_blanko_kgb'] = $this->admin_model->dataBlankoKGB($id_pegawai);
		$data_admin['masa_kerja'] = $this->cuti_model->masaKerja($id_pegawai);
		// var_dump($data_admin['data_blanko_kgb']);
		$this->load->view('halaman_admin/cetak_blanko_kgb', $data_admin);
	}

	public function tambah_user()
	{
		if ($this->session->userdata('level') != 'admin') 
		{
			redirect('autentikasi');
		} 
		else 
		{
			$id_admin = $this->session->userdata('id');
			$data_admin['user'] = $this->admin_model->profilAdmin($id_admin);
			$this->load->view('templates_admin/admin_header');
			$this->load->view('templates_admin/admin_sidebar');
			$this->load->view('templates_admin/admin_topbar', $data_admin);
			$this->load->view('halaman_admin/tambah_user');
			$this->load->view('templates_admin/admin_footer');
		}
	}

	public function proses_tambah_user()
	{
		if ($this->session->userdata('level') != 'admin') {
			redirect('autentikasi');
		} 
		else 
		{
			$this->admin_model->modelTambahUser();
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil ditambah!</div>');
			redirect('Halaman_admin/daftar_user');
		}
	}

	public function hapus_user($id, $level)
	{
		if ($this->session->userdata('level') != 'admin') 
		{
			redirect('autentikasi');
		} 
		else 
		{
			$this->admin_model->modelHapusUser($id, $level);
			$this->session->set_flashdata(
				'pesan',
				'<div class="alert alert-danger alert-dismissible fade show" role="alert">Data berhasil dihapus!</div>'
			);
			redirect('Halaman_admin/daftar_user');
		}
	}

	public function detail_user($id)
	{
		if ($this->session->userdata('level') != 'admin') 
		{
			redirect('autentikasi');
		} 
		else 
		{
			$id_admin = $this->session->userdata('id');
			$data_admin['user'] = $this->admin_model->profilAdmin($id_admin);
			$data_admin['data_user'] = $this->fitur_model->dataPegawaiId($id);
			$this->load->view('templates_admin/admin_header');
			$this->load->view('templates_admin/admin_sidebar');
			$this->load->view('templates_admin/admin_topbar', $data_admin);
			$this->load->view('halaman_admin/user/data_user', $data_admin);
			$this->load->view('templates_admin/admin_footer');
		}	
	}
}
