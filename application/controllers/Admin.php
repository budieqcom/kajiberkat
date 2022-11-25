<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('status') != 'login' && $this->session->userdata('level') != 'pns') {
			redirect('autentikasi');
		}
		$this->load->model('admin_model');
		$this->load->model('pegawai_model');
		$this->load->model('alamat_model');
		$this->load->model('pasangan_model');
		$this->load->model('pns_model');
		$this->load->model('anak_model');
		$this->load->model('ortu_model');
		$this->load->model('saudara_model');
		$this->load->model('cpns_model');
		$this->load->model('pns_model');
		$this->load->model('pangkat_model');
		$this->load->model('jabatan_model');
		$this->load->model('kgb_model');
		$this->load->model('fitur_model');
	}

	public function pegawai($id_pegawai)
	{
		if ($this->session->userdata('level') != 'admin') 
		{
			redirect('autentikasi');
		} 
		else 
		{
			$id_admin = $this->session->userdata('id');
			$data_admin['user'] = $this->admin_model->profilAdmin($id_admin);
			$data_admin['data_user'] = $this->fitur_model->dataPegawaiId($id_pegawai);
			$data_admin['profile'] =$this->pegawai_model->profilPNS($id_pegawai);
			$this->load->view('templates_admin/admin_header');
			$this->load->view('templates_admin/admin_sidebar');
			$this->load->view('templates_admin/admin_topbar', $data_admin);
			$this->load->view('halaman_admin/pegawai/biodata_pegawai', $data_admin);
			$this->load->view('templates_admin/admin_footer');
		}
	}

	public function edit_pegawai($id_pegawai)
	{
		if ($this->session->userdata('level') != 'admin') 
		{
				redirect('autentikasi');
		} 
		else 
		{
			$id_admin = $this->session->userdata('id');
			$data_admin['user'] = $this->admin_model->profilAdmin($id_admin);
			$data_admin['data_user'] = $this->fitur_model->dataPegawaiId($id_pegawai);
			$data_admin['profile'] =$this->pegawai_model->profilPNS($id_pegawai);
			$data_admin['agama'] = $this->fitur_model->dataAgama();
        	$data_admin['status_perkawinan'] = $this->fitur_model->statusPerkawinan();
        	$data_admin['jenis_kelamin'] = $this->fitur_model->jenisKelamin();
        	$data_admin['tingkat_pendidikan'] =$this->fitur_model->tingkatPendidikan();
			$this->load->view('templates_admin/admin_header');
			$this->load->view('templates_admin/admin_sidebar');
			$this->load->view('templates_admin/admin_topbar', $data_admin);
			$this->load->view('halaman_admin/pegawai/edit_biodata_pegawai', $data_admin);
			$this->load->view('templates_admin/admin_footer');
		}	
	}

	public function proses_update_pegawai($id_pegawai)
	{
		$this->pegawai_model->UpdateBiodata();
		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">Data pegawai berhasil diupdate!</div>');
		redirect('admin/pegawai/'.$id_pegawai);
	}

	public function alamat($id_pegawai)
	{
		if ($this->session->userdata('level') != 'admin') 
		{
			redirect('autentikasi');
		} 
		else 
		{
			$id_admin = $this->session->userdata('id');
			$data_admin['user'] = $this->admin_model->profilAdmin($id_admin);
			$data_admin['data_user'] = $this->fitur_model->dataPegawaiId($id_pegawai);
			$data_admin['data_alamat'] =$this->alamat_model->dataAlamat($id_pegawai);
			$this->load->view('templates_admin/admin_header');
			$this->load->view('templates_admin/admin_sidebar');
			$this->load->view('templates_admin/admin_topbar', $data_admin);
			$this->load->view('halaman_admin/alamat/alamat', $data_admin);
			$this->load->view('templates_admin/admin_footer');
		}
	}

	public function tambah_alamat($id_pegawai)
	{
		if ($this->session->userdata('level') != 'admin') 
		{
			redirect('autentikasi');
		} 
		else 
		{
			$id_admin = $this->session->userdata('id');
			$data_admin['user'] = $this->admin_model->profilAdmin($id_admin);
			$data_admin['data_user'] = $this->fitur_model->dataPegawaiId($id_pegawai);
			$data_admin['pns'] = $this->pns_model->dataPNS($id_pegawai);
			$data_admin['jenis_alamat'] = $this->fitur_model->jenisAlamat();
			$this->load->view('templates_admin/admin_header');
			$this->load->view('templates_admin/admin_sidebar');
			$this->load->view('templates_admin/admin_topbar', $data_admin);
			$this->load->view('halaman_admin/alamat/tambah_alamat', $data_admin);
			$this->load->view('templates_admin/admin_footer');
		}
	}

	public function proses_tambah_alamat($id_pegawai)
	{
		$this->alamat_model->prosesTambahAlamat();
		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil ditambah!</div>');
		redirect('admin/alamat/'.$id_pegawai);
	}

	public function edit_alamat($id_pegawai, $id)
	{
		if ($this->session->userdata('level') != 'admin') 
		{
			redirect('autentikasi');
		} 
		else 
		{
			$id_admin = $this->session->userdata('id');
			$data_admin['user'] = $this->admin_model->profilAdmin($id_admin);
			$data_admin['data_user'] = $this->fitur_model->dataPegawaiId($id_pegawai);
			$data_admin['pns'] = $this->pns_model->dataPNS($id_pegawai);
			$data_admin['data_alamat'] = $this->alamat_model->dataEditAlamat($id);
			$data_admin['jenis_alamat'] = $this->fitur_model->jenisAlamat();
			$this->load->view('templates_admin/admin_header');
			$this->load->view('templates_admin/admin_sidebar');
			$this->load->view('templates_admin/admin_topbar', $data_admin);
			$this->load->view('halaman_admin/alamat/edit_alamat', $data_admin);
			$this->load->view('templates_admin/admin_footer');
		}
	}

	public function proses_edit_alamat($id_pegawai)
	{
		$this->alamat_model->prosesEditAlamat();
		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil diupdate!</div>');
		redirect('admin/alamat/'.$id_pegawai);
	}

	public function hapus_alamat($id_pegawai, $id)
	{
		$this->alamat_model->hapusAlamat($id);
		$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">Data berhasil dihapus!</div>');
		redirect('admin/alamat/'.$id_pegawai);
	}

	public function pasangan($id_pegawai)
	{
		if ($this->session->userdata('level') != 'admin') 
		{
			redirect('autentikasi');
		} 
		else 
		{
			$id_admin = $this->session->userdata('id');
			$data_admin['user'] = $this->admin_model->profilAdmin($id_admin);
			$data_admin['data_user'] = $this->fitur_model->dataPegawaiId($id_pegawai);
			$data_admin['profile'] =$this->pegawai_model->profilPNS($id_pegawai);
			$data_admin['data_pasangan'] = $this->pasangan_model->dataPasangan($id_pegawai);
			$this->load->view('templates_admin/admin_header');
			$this->load->view('templates_admin/admin_sidebar');
			$this->load->view('templates_admin/admin_topbar', $data_admin);
			$this->load->view('halaman_admin/pasangan/pasangan', $data_admin);
			$this->load->view('templates_admin/admin_footer');
		}
	}

	public function tambah_pasangan($id_pegawai)
	{
		if ($this->session->userdata('level') != 'admin') 
		{
			redirect('autentikasi');
		} 
		else 
		{
			$id_admin = $this->session->userdata('id');
			$data_admin['user'] = $this->admin_model->profilAdmin($id_admin);
			$data_admin['data_user'] = $this->fitur_model->dataPegawaiId($id_pegawai);
			$data_admin['profile'] = $this->pegawai_model->profilPNS($id_pegawai);
			$data_admin['pns'] = $this->pns_model->dataPNS($id_pegawai);
			$data_admin['hubungan_keluarga'] = $this->fitur_model->hubunganKeluarga();
			$data_admin['pekerjaan'] = $this->fitur_model->pekerjaan();
			$data_admin['agama'] = $this->fitur_model->agama();
			$data_admin['status_kesehatan'] = $this->fitur_model->statusSehat();
			$data_admin['pendidikan'] = $this->fitur_model->pendidikan();
			$data_admin['masih_hidup'] = $this->fitur_model->masihHidup();
			$data_admin['berhak_tunjangan'] = $this->fitur_model->berhakTunjangan();
			$data_admin['status_perkawinan'] = $this->fitur_model->statusPerkawinan();
			$this->load->view('templates_admin/admin_header');
			$this->load->view('templates_admin/admin_sidebar');
			$this->load->view('templates_admin/admin_topbar', $data_admin);
			$this->load->view('halaman_admin/pasangan/tambah_pasangan', $data_admin);
			$this->load->view('templates_admin/admin_footer');
		}
	}

	public function proses_tambah_pasangan($id_pegawai)
	{
		$this->pasangan_model->prosesTambahPasangan();
		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil ditambah!</div>');
		redirect('admin/pasangan/'.$id_pegawai);
	}

	public function edit_pasangan($id_pegawai,$id_pasangan)
	{
		if ($this->session->userdata('level') != 'admin') 
		{
			redirect('autentikasi');
		} 
		else 
		{
			$id_admin = $this->session->userdata('id');
			$data_admin['user'] = $this->admin_model->profilAdmin($id_admin);
			$data_admin['data_user'] = $this->fitur_model->dataPegawaiId($id_pegawai);
			$data_admin['profile'] = $this->pegawai_model->profilPNS($id_pegawai);
			$data_admin['pns'] = $this->pns_model->dataPNS($id_pegawai);
			$data_admin['data_pasangan'] = $this->pasangan_model->dataEditPasangan($id_pasangan);
			$data_admin['hubungan_keluarga'] = $this->fitur_model->hubunganKeluarga();
			$data_admin['pekerjaan'] = $this->fitur_model->pekerjaan();
			$data_admin['agama'] = $this->fitur_model->agama();
			$data_admin['status_kesehatan'] = $this->fitur_model->statusSehat();
			$data_admin['pendidikan'] = $this->fitur_model->pendidikan();
			$data_admin['masih_hidup'] = $this->fitur_model->masihHidup();
			$data_admin['berhak_tunjangan'] = $this->fitur_model->berhakTunjangan();
			$data_admin['status_perkawinan'] = $this->fitur_model->statusPerkawinan();
			$this->load->view('templates_admin/admin_header');
			$this->load->view('templates_admin/admin_sidebar');
			$this->load->view('templates_admin/admin_topbar', $data_admin);
			$this->load->view('halaman_admin/pasangan/edit_pasangan', $data_admin);
			$this->load->view('templates_admin/admin_footer');
		}
	}

	public function proses_edit_pasangan($id_pegawai)
	{
		$this->pasangan_model->prosesEditPasangan();
		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil diupdate!</div>');
		redirect('admin/pasangan/'.$id_pegawai);
	}

	public function hapus_pasangan($id_pegawai, $id_pasangan)
	{
		$this->pasangan_model->hapusPasangan($id_pasangan);
		$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">Data berhasil dihapus!</div>');
		redirect('admin/pasangan/'.$id_pegawai);
	}

	public function anak($id_pegawai)
	{
		if ($this->session->userdata('level') != 'admin') 
		{
			redirect('autentikasi');
		} 
		else 
		{
			$id_admin = $this->session->userdata('id');
			$data_admin['user'] = $this->admin_model->profilAdmin($id_admin);
			$data_admin['data_user'] = $this->fitur_model->dataPegawaiId($id_pegawai);
			$data_admin['profile'] =$this->pegawai_model->profilPNS($id_pegawai);
			$data_admin['data_anak'] = $this->anak_model->dataAnak($id_pegawai);
			$this->load->view('templates_admin/admin_header');
			$this->load->view('templates_admin/admin_sidebar');
			$this->load->view('templates_admin/admin_topbar', $data_admin);
			$this->load->view('halaman_admin/anak/anak', $data_admin);
			$this->load->view('templates_admin/admin_footer');
		}
	}

	public function tambah_anak($id_pegawai)
	{
		if ($this->session->userdata('level') != 'admin') 
		{
			redirect('autentikasi');
		} 
		else 
		{
			$id_admin = $this->session->userdata('id');
			$data_admin['user'] = $this->admin_model->profilAdmin($id_admin);
			$data_admin['data_user'] = $this->fitur_model->dataPegawaiId($id_pegawai);
			$data_admin['profile'] =$this->pegawai_model->profilPNS($id_pegawai);
			$data_admin['pns'] = $this->pns_model->dataPNS($id_pegawai);
			$data_admin['hubungan_keluarga'] = $this->fitur_model->hubunganAnak();
        	$data_admin['jenis_kelamin'] = $this->fitur_model->jenisKelamin();
        	$data_admin['pekerjaan'] = $this->fitur_model->pekerjaan();
        	$data_admin['agama'] = $this->fitur_model->agama();
        	$data_admin['status_kesehatan'] = $this->fitur_model->statusSehat();
        	$data_admin['pendidikan'] = $this->fitur_model->pendidikan();
        	$data_admin['masih_hidup'] = $this->fitur_model->masihHidup();
        	$data_admin['berhak_tunjangan'] = $this->fitur_model->berhakTunjangan();
        	$data_admin['status_perkawinan'] = $this->fitur_model->statusPerkawinan();
			$this->load->view('templates_admin/admin_header');
			$this->load->view('templates_admin/admin_sidebar');
			$this->load->view('templates_admin/admin_topbar', $data_admin);
			$this->load->view('halaman_admin/anak/tambah_anak', $data_admin);
			$this->load->view('templates_admin/admin_footer');
		}
	}

	public function proses_tambah_anak($id_pegawai)
	{
		$this->anak_model->prosesTambahAnak();
		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil ditambah!</div>');
		redirect('admin/anak/'.$id_pegawai);
	}

	public function edit_anak($id_pegawai, $id)
	{
		if ($this->session->userdata('level') != 'admin') 
		{
			redirect('autentikasi');
		} 
		else 
		{
			$id_admin = $this->session->userdata('id');
			$data_admin['user'] = $this->admin_model->profilAdmin($id_admin);
			$data_admin['data_user'] = $this->fitur_model->dataPegawaiId($id_pegawai);
			$data_admin['profile'] =$this->pegawai_model->profilPNS($id_pegawai);
			$data_admin['pns'] = $this->pns_model->dataPNS($id_pegawai);
			$data_admin['data_anak'] = $this->anak_model->dataEditAnak($id);
			$data_admin['hubungan_keluarga'] = $this->fitur_model->hubunganAnak();
        	$data_admin['jenis_kelamin'] = $this->fitur_model->jenisKelamin();
        	$data_admin['pekerjaan'] = $this->fitur_model->pekerjaan();
        	$data_admin['agama'] = $this->fitur_model->agama();
        	$data_admin['status_kesehatan'] = $this->fitur_model->statusSehat();
        	$data_admin['pendidikan'] = $this->fitur_model->pendidikan();
        	$data_admin['masih_hidup'] = $this->fitur_model->masihHidup();
        	$data_admin['berhak_tunjangan'] = $this->fitur_model->berhakTunjangan();
        	$data_admin['status_perkawinan'] = $this->fitur_model->statusPerkawinan();
			$this->load->view('templates_admin/admin_header');
			$this->load->view('templates_admin/admin_sidebar');
			$this->load->view('templates_admin/admin_topbar', $data_admin);
			$this->load->view('halaman_admin/anak/edit_anak', $data_admin);
			$this->load->view('templates_admin/admin_footer');
		}
	}

	public function proses_edit_anak($id_pegawai)
	{
		$this->anak_model->prosesEditAnak();
		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil diupdate!</div>');
		redirect('admin/anak/'.$id_pegawai);
	}

	public function hapus_anak($id_pegawai, $id_anak)
	{
		$this->anak_model->hapusAnak($id_anak);
		$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">Data berhasil dihapus!</div>');
		redirect('admin/anak/'.$id_pegawai);
	}

	public function ortu($id_pegawai)
	{
		if ($this->session->userdata('level') != 'admin') 
		{
			redirect('autentikasi');
		} 
		else 
		{
			$id_admin = $this->session->userdata('id');
			$data_admin['user'] = $this->admin_model->profilAdmin($id_admin);
			$data_admin['data_user'] = $this->fitur_model->dataPegawaiId($id_pegawai);
			$data_admin['data_ortu'] = $this->ortu_model->dataOrtu($id_pegawai);
			$this->load->view('templates_admin/admin_header');
			$this->load->view('templates_admin/admin_sidebar');
			$this->load->view('templates_admin/admin_topbar', $data_admin);
			$this->load->view('halaman_admin/ortu/ortu', $data_admin);
			$this->load->view('templates_admin/admin_footer');
		}
	}

	public function tambah_ortu($id_pegawai)
	{
		if ($this->session->userdata('level') != 'admin') 
		{
			redirect('autentikasi');
		} 
		else 
		{
			$id_admin = $this->session->userdata('id');
			$data_admin['user'] = $this->admin_model->profilAdmin($id_admin);
			$data_admin['data_user'] = $this->fitur_model->dataPegawaiId($id_pegawai);
			$data_admin['data_ortu'] = $this->ortu_model->dataOrtu($id_pegawai);
			$data_admin['hubungan_keluarga'] = $this->fitur_model->hubunganOrtu();
			$data_admin['pekerjaan'] = $this->fitur_model->pekerjaan();
			$data_admin['agama'] = $this->fitur_model->agama();
			$data_admin['status_kesehatan'] = $this->fitur_model->statusSehat();
			$data_admin['masih_hidup'] = $this->fitur_model->masihHidup();
			$data_admin['status_perkawinan'] = $this->fitur_model->statusPerkawinan();
			$data_admin['pns'] = $this->pns_model->dataPNS($id_pegawai);
			$data_admin['hubungan_keluarga'] = $this->fitur_model->hubunganOrtu();
			$data_admin['pekerjaan'] = $this->fitur_model->pekerjaan();
			$data_admin['agama'] = $this->fitur_model->agama();
			$data_admin['status_kesehatan'] = $this->fitur_model->statusSehat();
			$data_admin['masih_hidup'] = $this->fitur_model->masihHidup();
			$data_admin['status_perkawinan'] = $this->fitur_model->statusPerkawinan();
			$this->load->view('templates_admin/admin_header');
			$this->load->view('templates_admin/admin_sidebar');
			$this->load->view('templates_admin/admin_topbar', $data_admin);
			$this->load->view('halaman_admin/ortu/tambah_ortu', $data_admin);
			$this->load->view('templates_admin/admin_footer');
		}
	}

	public function proses_tambah_ortu($id_pegawai)
	{
		$this->ortu_model->prosesTambahOrtu();
		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil ditambah!</div>');
		redirect('admin/ortu/'.$id_pegawai);
	}

	public function edit_ortu($id_pegawai, $id)
	{
		if ($this->session->userdata('level') != 'admin') 
		{
			redirect('autentikasi');
		} 
		else 
		{
			$id_admin = $this->session->userdata('id');
			$data_admin['user'] = $this->admin_model->profilAdmin($id_admin);
			$data_admin['data_user'] = $this->fitur_model->dataPegawaiId($id_pegawai);
			$data_admin['data_ortu'] = $this->ortu_model->dataEditOrtu($id);
			$data_admin['hubungan_keluarga'] = $this->fitur_model->hubunganOrtu();
			$data_admin['pekerjaan'] = $this->fitur_model->pekerjaan();
			$data_admin['agama'] = $this->fitur_model->agama();
			$data_admin['status_kesehatan'] = $this->fitur_model->statusSehat();
			$data_admin['masih_hidup'] = $this->fitur_model->masihHidup();
			$data_admin['status_perkawinan'] = $this->fitur_model->statusPerkawinan();
			$data_admin['pns'] = $this->pns_model->dataPNS($id_pegawai);
			$data_admin['hubungan_keluarga'] = $this->fitur_model->hubunganOrtu();
			$data_admin['pekerjaan'] = $this->fitur_model->pekerjaan();
			$data_admin['agama'] = $this->fitur_model->agama();
			$data_admin['status_kesehatan'] = $this->fitur_model->statusSehat();
			$data_admin['masih_hidup'] = $this->fitur_model->masihHidup();
			$data_admin['status_perkawinan'] = $this->fitur_model->statusPerkawinan();
			$this->load->view('templates_admin/admin_header');
			$this->load->view('templates_admin/admin_sidebar');
			$this->load->view('templates_admin/admin_topbar', $data_admin);
			$this->load->view('halaman_admin/ortu/edit_ortu', $data_admin);
			$this->load->view('templates_admin/admin_footer');
		}
	}

	public function proses_edit_ortu($id_pegawai)
	{
		$this->ortu_model->prosesEditOrtu();
		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil diupdate!</div>');
		redirect('admin/ortu/'.$id_pegawai);
	}

	public function hapus_ortu($id_pegawai, $id)
	{
		$this->ortu_model->hapusOrtu($id);
		$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">Data berhasil dihapus!</div>');
		redirect('admin/ortu/'.$id_pegawai);	
	}

	public function saudara($id_pegawai)
	{
		if ($this->session->userdata('level') != 'admin') 
		{
			redirect('autentikasi');
		} 
		else 
		{
			$id_admin = $this->session->userdata('id');
			$data_admin['user'] = $this->admin_model->profilAdmin($id_admin);
			$data_admin['data_user'] = $this->fitur_model->dataPegawaiId($id_pegawai);
			$data_admin['data_saudara'] = $this->saudara_model->dataSaudara($id_pegawai);
			$this->load->view('templates_admin/admin_header');
			$this->load->view('templates_admin/admin_sidebar');
			$this->load->view('templates_admin/admin_topbar', $data_admin);
			$this->load->view('halaman_admin/saudara/saudara', $data_admin);
			$this->load->view('templates_admin/admin_footer');
		}
	}

	public function tambah_saudara($id_pegawai)
	{
		if ($this->session->userdata('level') != 'admin') 
		{
			redirect('autentikasi');
		} 
		else 
		{
			$id_admin = $this->session->userdata('id');
			$data_admin['user'] = $this->admin_model->profilAdmin($id_admin);
			$data_admin['data_user'] = $this->fitur_model->dataPegawaiId($id_pegawai);
			$data_admin['pns'] = $this->pns_model->dataPNS($id_pegawai);
			$data_admin['hubungan_keluarga'] = $this->fitur_model->hubunganSaudara();
			$data_admin['jenis_kelamin'] = $this->fitur_model->jenisKelamin();
			$data_admin['pekerjaan'] = $this->fitur_model->pekerjaan();
			$data_admin['agama'] = $this->fitur_model->agama();
			$data_admin['status_kesehatan'] = $this->fitur_model->statusSehat();
			$data_admin['masih_hidup'] = $this->fitur_model->masihHidup();
			$data_admin['status_perkawinan'] = $this->fitur_model->statusPerkawinan();
			$data_admin['pendidikan'] = $this->fitur_model->tingkatPendidikan();
			$this->load->view('templates_admin/admin_header');
			$this->load->view('templates_admin/admin_sidebar');
			$this->load->view('templates_admin/admin_topbar', $data_admin);
			$this->load->view('halaman_admin/saudara/tambah_saudara', $data_admin);
			$this->load->view('templates_admin/admin_footer');
		}
	}

	public function proses_tambah_saudara($id_pegawai)
	{
		$this->saudara_model->prosesTambahSaudara();
		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil ditambah!</div>');
		redirect('admin/saudara/'.$id_pegawai);
	}

	public function edit_saudara($id_pegawai, $id)
	{
		if ($this->session->userdata('level') != 'admin') 
		{
			redirect('autentikasi');
		} 
		else 
		{
			$id_admin = $this->session->userdata('id');
			$data_admin['user'] = $this->admin_model->profilAdmin($id_admin);
			$data_admin['data_user'] = $this->fitur_model->dataPegawaiId($id_pegawai);
			$data_admin['pns'] = $this->pns_model->dataPNS($id_pegawai);
			$data_admin['data_saudara'] = $this->saudara_model->dataEditSaudara($id);
			$data_admin['hubungan_keluarga'] = $this->fitur_model->hubunganSaudara();
			$data_admin['jenis_kelamin'] = $this->fitur_model->jenisKelamin();
			$data_admin['pekerjaan'] = $this->fitur_model->pekerjaan();
			$data_admin['agama'] = $this->fitur_model->agama();
			$data_admin['status_kesehatan'] = $this->fitur_model->statusSehat();
			$data_admin['masih_hidup'] = $this->fitur_model->masihHidup();
			$data_admin['status_perkawinan'] = $this->fitur_model->statusPerkawinan();
			$data_admin['pendidikan'] = $this->fitur_model->tingkatPendidikan();
			$this->load->view('templates_admin/admin_header');
			$this->load->view('templates_admin/admin_sidebar');
			$this->load->view('templates_admin/admin_topbar', $data_admin);
			$this->load->view('halaman_admin/saudara/edit_saudara', $data_admin);
			$this->load->view('templates_admin/admin_footer');
		}
	}

	public function proses_edit_saudara($id_pegawai)
	{
		$this->saudara_model->prosesEditSaudara();
		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil diupdate!</div>');
		redirect('admin/saudara/'.$id_pegawai);	
	}

	public function hapus_saudara($id_pegawai, $id)
	{
		$this->saudara_model->hapusSaudara($id);
		$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">Data berhasil dihapus!</div>');
		redirect('admin/saudara/'.$id_pegawai);
	}

	public function cpns($id_pegawai)
	{
		if ($this->session->userdata('level') != 'admin') 
		{
			redirect('autentikasi');
		} 
		else 
		{
			$id_admin = $this->session->userdata('id');
			$data_admin['user'] = $this->admin_model->profilAdmin($id_admin);
			$data_admin['data_user'] = $this->fitur_model->dataPegawaiId($id_pegawai);
			$data_admin['cpns'] =$this->cpns_model->dataCPNS($id_pegawai);
			$this->load->view('templates_admin/admin_header');
			$this->load->view('templates_admin/admin_sidebar');
			$this->load->view('templates_admin/admin_topbar', $data_admin);
			$this->load->view('halaman_admin/cpns/cpns', $data_admin);
			$this->load->view('templates_admin/admin_footer');
		}
	}

	public function edit_cpns($id_pegawai)
	{
		if ($this->session->userdata('level') != 'admin') 
		{
			redirect('autentikasi');
		} 
		else 
		{
			$id_admin = $this->session->userdata('id');
			$data_admin['user'] = $this->admin_model->profilAdmin($id_admin);
			$data_admin['data_user'] = $this->fitur_model->dataPegawaiId($id_pegawai);
			$data_admin['cpns'] =$this->cpns_model->dataCPNS($id_pegawai);
			$data_admin['golongan'] = $this->fitur_model->golonganRuang();
			$this->load->view('templates_admin/admin_header');
			$this->load->view('templates_admin/admin_sidebar');
			$this->load->view('templates_admin/admin_topbar', $data_admin);
			$this->load->view('halaman_admin/cpns/edit_cpns', $data_admin);
			$this->load->view('templates_admin/admin_footer');
		}		
	}

	public function proses_update_cpns($id_pegawai)
	{
		$this->cpns_model->updateCPNS();
		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil diupdate!</div>');
		redirect('admin/cpns/'.$id_pegawai);
	}

	public function pns($id_pegawai)
	{
		if ($this->session->userdata('level') != 'admin') 
		{
			redirect('autentikasi');
		} 
		else 
		{
			$id_admin = $this->session->userdata('id');
			$data_admin['user'] = $this->admin_model->profilAdmin($id_admin);
			$data_admin['data_user'] = $this->fitur_model->dataPegawaiId($id_pegawai);
			$data_admin['pns'] =$this->pns_model->dataPNS($id_pegawai);
			$this->load->view('templates_admin/admin_header');
			$this->load->view('templates_admin/admin_sidebar');
			$this->load->view('templates_admin/admin_topbar', $data_admin);
			$this->load->view('halaman_admin/pns/pns', $data_admin);
			$this->load->view('templates_admin/admin_footer');
		}
	}

	public function edit_pns($id_pegawai)
	{
		if ($this->session->userdata('level') != 'admin') 
		{
			redirect('autentikasi');
		} 
		else 
		{
			$id_admin = $this->session->userdata('id');
			$data_admin['user'] = $this->admin_model->profilAdmin($id_admin);
			$data_admin['data_user'] = $this->fitur_model->dataPegawaiId($id_pegawai);
			$data_admin['pns'] =$this->pns_model->dataPNS($id_pegawai);
			$data_admin['golongan'] = $this->fitur_model->golonganRuang();
			$data_admin['kjabatan'] = $this->fitur_model->kelompokJabatan();
			$data_admin['jabatan'] = $this->fitur_model->Jabatan();
			$this->load->view('templates_admin/admin_header');
			$this->load->view('templates_admin/admin_sidebar');
			$this->load->view('templates_admin/admin_topbar', $data_admin);
			$this->load->view('halaman_admin/pns/edit_pns', $data_admin);
			$this->load->view('templates_admin/admin_footer');
		}
	}      

	public function proses_update_pns($id_pegawai)
	{
		$this->pns_model->updatePNS();
		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil diupdate!</div>');
		redirect('admin/pns/'.$id_pegawai);
	}

	public function pangkat($id_pegawai)
	{
		if ($this->session->userdata('level') != 'admin') 
		{
			redirect('autentikasi');
		} 
		else 
		{
			$id_admin = $this->session->userdata('id');
			$data_admin['user'] = $this->admin_model->profilAdmin($id_admin);
			$data_admin['data_user'] = $this->fitur_model->dataPegawaiId($id_pegawai);
			$data_admin['pangkat'] = $this->pangkat_model->dataPangkat($id_pegawai);
			$this->load->view('templates_admin/admin_header');
			$this->load->view('templates_admin/admin_sidebar');
			$this->load->view('templates_admin/admin_topbar', $data_admin);
			$this->load->view('halaman_admin/pangkat/pangkat', $data_admin);
			$this->load->view('templates_admin/admin_footer');
		}
	}

	public function tambah_pangkat($id_pegawai)
	{
		if ($this->session->userdata('level') != 'admin') 
		{
			redirect('autentikasi');
		} 
		else 
		{
			$id_admin = $this->session->userdata('id');
			$data_admin['user'] = $this->admin_model->profilAdmin($id_admin);
			$data_admin['data_user'] = $this->fitur_model->dataPegawaiId($id_pegawai);
			$data_admin['pns'] = $this->pns_model->dataPNS($id_pegawai);
			$data_admin['jenis_pangkat'] = $this->fitur_model->jenisPangkat();
			$data_admin['golongan_ruang'] = $this->fitur_model->golonganRuang();
			$this->load->view('templates_admin/admin_header');
			$this->load->view('templates_admin/admin_sidebar');
			$this->load->view('templates_admin/admin_topbar', $data_admin);
			$this->load->view('halaman_admin/pangkat/tambah_pangkat', $data_admin);
			$this->load->view('templates_admin/admin_footer');
		}
	}

	public function proses_tambah_pangkat($id_pegawai)
	{
		$this->pangkat_model->tambahPangkat();
		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil ditambah!</div>');
		redirect('admin/pangkat/'.$id_pegawai);
	}

	public function edit_pangkat($id_pegawai, $id)
	{
		if ($this->session->userdata('level') != 'admin') 
		{
			redirect('autentikasi');
		} 
		else 
		{
			$id_admin = $this->session->userdata('id');
			$data_admin['user'] = $this->admin_model->profilAdmin($id_admin);
			$data_admin['data_user'] = $this->fitur_model->dataPegawaiId($id_pegawai);
			$data_admin['edit_pangkat'] = $this->pangkat_model->dataEditPangkat($id);
			$data_admin['jenis_pangkat'] = $this->fitur_model->jenisPangkat();
			$data_admin['golongan_ruang'] = $this->fitur_model->golonganRuang();
			$this->load->view('templates_admin/admin_header');
			$this->load->view('templates_admin/admin_sidebar');
			$this->load->view('templates_admin/admin_topbar', $data_admin);
			$this->load->view('halaman_admin/pangkat/edit_pangkat', $data_admin);
			$this->load->view('templates_admin/admin_footer');
		}
	}

	public function proses_edit_pangkat($id_pegawai)
	{
		$this->pangkat_model->prosesEditPangkat();
		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil diupdate!</div>');
		redirect('admin/pangkat/'.$id_pegawai);
	}

	public function hapus_pangkat($id_pegawai, $id)
	{
		$this->pangkat_model->hapusPangkat($id);
		$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">Data berhasil dihapus!</div>');
		redirect('admin/pangkat/'.$id_pegawai);
	}

	public function jabatan($id_pegawai)
	{
		if ($this->session->userdata('level') != 'admin') 
		{
			redirect('autentikasi');
		} 
		else 
		{
			$id_admin = $this->session->userdata('id');
			$data_admin['user'] = $this->admin_model->profilAdmin($id_admin);
			$data_admin['data_user'] = $this->fitur_model->dataPegawaiId($id_pegawai);
			$data_admin['pns'] = $this->pns_model->dataPNS($id_pegawai);
			$data_admin['jabatan'] = $this->jabatan_model->dataJabatan($id_pegawai);
			$this->load->view('templates_admin/admin_header');
			$this->load->view('templates_admin/admin_sidebar');
			$this->load->view('templates_admin/admin_topbar', $data_admin);
			$this->load->view('halaman_admin/jabatan/jabatan', $data_admin);
			$this->load->view('templates_admin/admin_footer');
		}
	}

	public function tambah_jabatan($id_pegawai)
	{
		if ($this->session->userdata('level') != 'admin') 
		{
			redirect('autentikasi');
		} 
		else 
		{
			$id_admin = $this->session->userdata('id');
			$data_admin['user'] = $this->admin_model->profilAdmin($id_admin);
			$data_admin['data_user'] = $this->fitur_model->dataPegawaiId($id_pegawai);
			$data_admin['pns'] = $this->pns_model->dataPNS($id_pegawai);
			$data_admin['golongan'] = $this->fitur_model->golonganRuang();
			$data_admin['kjabatan'] = $this->fitur_model->kelompokJabatan();
			$data_admin['jenis_jabatan'] = $this->fitur_model->Jabatan();
			$data_admin['flag_aktif'] = $this->fitur_model->flagAktif();
			$data_admin['unit_kerja'] = $this->fitur_model->unitKerja();
			$data_admin['jabatan'] = $this->jabatan_model->dataJabatan($id_pegawai);
			$this->load->view('templates_admin/admin_header');
			$this->load->view('templates_admin/admin_sidebar');
			$this->load->view('templates_admin/admin_topbar', $data_admin);
			$this->load->view('halaman_admin/jabatan/tambah_jabatan', $data_admin);
			$this->load->view('templates_admin/admin_footer');
		}
	}

	public function proses_tambah_jabatan($id_pegawai)
	{
		$this->jabatan_model->prosesTambahJabatan();
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil ditambah!</div>');
		redirect('admin/jabatan/'.$id_pegawai);
	}

	public function edit_jabatan($id_pegawai, $id)
	{
		if ($this->session->userdata('level') != 'admin') 
		{
			redirect('autentikasi');
		} 
		else 
		{
			$id_admin = $this->session->userdata('id');
			$data_admin['user'] = $this->admin_model->profilAdmin($id_admin);
			$data_admin['data_user'] = $this->fitur_model->dataPegawaiId($id_pegawai);
			$data_admin['golongan'] = $this->fitur_model->golonganRuang();
			$data_admin['kjabatan'] = $this->fitur_model->kelompokJabatan();
			$data_admin['jenis_jabatan'] = $this->fitur_model->Jabatan();
			$data_admin['flag_aktif'] = $this->fitur_model->flagAktif();
			$data_admin['unit_kerja'] = $this->fitur_model->unitKerja();
			$data_admin['edit_jabatan'] = $this->jabatan_model->dataEditJabatan($id);
			$data_admin['jabatan'] = $this->jabatan_model->dataJabatan($id_pegawai);
			$this->load->view('templates_admin/admin_header');
			$this->load->view('templates_admin/admin_sidebar');
			$this->load->view('templates_admin/admin_topbar', $data_admin);
			$this->load->view('halaman_admin/jabatan/edit_jabatan', $data_admin);
			$this->load->view('templates_admin/admin_footer');
		}
	}

	public function proses_edit_jabatan($id_pegawai)
	{
		$this->jabatan_model->prosesEditJabatan();
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil diupdate!</div>');
		redirect('admin/jabatan/'.$id_pegawai);
	}

	public function hapus_jabatan($id_pegawai, $id)
	{
		$this->jabatan_model->hapusJabatan($id);
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Data berhasil dihapus!</div>');
		redirect('admin/jabatan/'.$id_pegawai);
	}

	public function kgb($id_pegawai)
	{
		if ($this->session->userdata('level') != 'admin') 
		{
			redirect('autentikasi');
		} 
		else 
		{
			$id_admin = $this->session->userdata('id');
			$data_admin['user'] = $this->admin_model->profilAdmin($id_admin);
			$data_admin['data_user'] = $this->fitur_model->dataPegawaiId($id_pegawai);
			$data_admin['pns'] = $this->pns_model->dataPNS($id_pegawai);
			$data_admin['kgb'] = $this->kgb_model->dataKGB($id_pegawai); 
			$this->load->view('templates_admin/admin_header');
			$this->load->view('templates_admin/admin_sidebar');
			$this->load->view('templates_admin/admin_topbar', $data_admin);
			$this->load->view('halaman_admin/kgb/kgb', $data_admin);
			$this->load->view('templates_admin/admin_footer');
		}
	}

	public function tambah_kgb($id_pegawai)
	{
		if ($this->session->userdata('level') != 'admin') 
		{
			redirect('autentikasi');
		} 
		else 
		{
			$id_admin = $this->session->userdata('id');
			$data_admin['user'] = $this->admin_model->profilAdmin($id_admin);
			$data_admin['data_user'] = $this->fitur_model->dataPegawaiId($id_pegawai);
			$data_admin['pns'] = $this->pns_model->dataPNS($id_pegawai);
			$data_admin['golongan'] = $this->fitur_model->golonganRuang();
			$this->load->view('templates_admin/admin_header');
			$this->load->view('templates_admin/admin_sidebar');
			$this->load->view('templates_admin/admin_topbar', $data_admin);
			$this->load->view('halaman_admin/kgb/tambah_kgb', $data_admin);
			$this->load->view('templates_admin/admin_footer');
		}
	}

	public function proses_tambah_kgb($id_pegawai)
	{
		$this->kgb_model->prosesTambahKGB();
		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil ditambah!</div>');
		redirect('admin/kgb/'.$id_pegawai);
	}

	public function edit_kgb($id_pegawai, $id)
	{
		if ($this->session->userdata('level') != 'admin') 
		{
			redirect('autentikasi');
		} 
		else 
		{
			$id_admin = $this->session->userdata('id');
			$data_admin['user'] = $this->admin_model->profilAdmin($id_admin);
			$data_admin['data_user'] = $this->fitur_model->dataPegawaiId($id_pegawai);
			$data_admin['pns'] = $this->pns_model->dataPNS($id_pegawai);
			$data_admin['golongan'] = $this->fitur_model->golonganRuang();
			$data_admin['data_kgb'] = $this->kgb_model->editDataKGB($id);
			$this->load->view('templates_admin/admin_header');
			$this->load->view('templates_admin/admin_sidebar');
			$this->load->view('templates_admin/admin_topbar', $data_admin);
			$this->load->view('halaman_admin/kgb/edit_kgb', $data_admin);
			$this->load->view('templates_admin/admin_footer');
		}
	}

	public function proses_edit_kgb($id_pegawai)
	{
		$this->kgb_model->prosesEditKGB();
		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil diupdate!</div>');
		redirect('admin/kgb/'.$id_pegawai);
	}

	public function hapus_kgb($id_pegawai, $id)
	{
		$this->kgb_model->hapusKGB($id);
		$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">Data berhasil dihapus!</div>');
		redirect('admin/kgb/'.$id_pegawai);
	}
}
