<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Perizinan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('status') != 'login' && $this->session->userdata('level') != 'admin') 
		{
            redirect('autentikasi');
        }
        $this->load->model('admin_model');
        $this->load->model('pegawai_model');
        $this->load->model('cuti_model');
        $this->load->model('izin_model');
        $this->load->model('fitur_model');
    }

    public function daftar_pegawai()
    {
        if ($this->session->userdata('level') != 'admin') 
        {
            redirect('autentikasi');
        }
        else
        {
            $id_admin = $this->session->userdata('id');
            $data_admin['user'] = $this->admin_model->profilAdmin($id_admin);
            $data_admin['daftar_pegawai'] = $this->fitur_model->dataPegawai();
            $this->load->view('templates_admin/admin_header');
            $this->load->view('templates_admin/admin_sidebar');
            $this->load->view('templates_admin/admin_topbar', $data_admin);
            $this->load->view('halaman_admin/cuti/daftar_pegawai', $data_admin);
            $this->load->view('templates_admin/admin_footer');
        }
    }

    public function daftar_cuti($id_pegawai)
    {
        if ($this->session->userdata('level') != 'admin') 
		{
            redirect('autentikasi');
        } 
		else 
		{
            $id_admin = $this->session->userdata('id');
            $data_admin['user'] = $this->admin_model->profilAdmin($id_admin);
            $data_admin['data_pegawai'] = $this->fitur_model->dataPegawaiId($id_pegawai);
            $data_admin['daftar_cuti'] = $this->cuti_model->daftarCuti($id_pegawai);
            $data_admin['sisa_cuti'] = $this->cuti_model->cekSisaCutiTahunan($id_pegawai);
            $this->load->view('templates_admin/admin_header');
            $this->load->view('templates_admin/admin_sidebar');
            $this->load->view('templates_admin/admin_topbar', $data_admin);
            $this->load->view('halaman_admin/cuti/daftar_cuti', $data_admin);
            $this->load->view('templates_admin/admin_footer');
        }
    }

	public function tambah_cuti($id_pegawai)
	{
		if ($this->session->userdata('level') != 'admin') 
		{
            redirect('autentikasi');
        } 
		else 
		{
            $id_admin = $this->session->userdata('id');
            $data_admin['user'] = $this->admin_model->profilAdmin($id_admin);
            $data_admin['data_pegawai'] = $this->fitur_model->dataPegawaiId($id_pegawai);
            $data_admin['jenis_cuti'] = $this->fitur_model->jenisCuti();
            $data_admin['lokasi_cuti'] = $this->fitur_model->lokasiCuti();
            $data_admin['data_cuti'] = $this->cuti_model->daftarCuti($id_pegawai);
            $data_admin['sisa_cuti'] = $this->cuti_model->cekSisaCutiTahunan($id_pegawai);
            $data_admin['data_semua_pegawai'] = $this->fitur_model->dataPegawai();
            $this->load->view('templates_admin/admin_header');
            $this->load->view('templates_admin/admin_sidebar');
            $this->load->view('templates_admin/admin_topbar', $data_admin);
            $this->load->view('halaman_admin/cuti/tambah_cuti', $data_admin);
            $this->load->view('templates_admin/admin_footer');
		}
	}
	
	public function proses_tambah_cuti($id_pegawai)
	{
		 if ($this->session->userdata('level') != 'admin') 
		{
            redirect('autentikasi');
        } 
		else 
		{
            $data_admin['data_pegawai'] = $this->fitur_model->dataPegawaiId($id_pegawai);
			$this->cuti_model->prosesTambahCuti($id_pegawai);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data cuti berhasil ditambah!</div>');
			redirect('perizinan/daftar_cuti/'.$id_pegawai);
		}
	}
	
    public function cetak_cuti($id, $id_pegawai)
    {
        $data_admin['data_pegawai'] = $this->fitur_model->dataPegawaiId($id_pegawai);
        $data_admin['data_cuti'] = $this->cuti_model->detilMohonCuti($id);
        $data_admin['masa_kerja'] = $this->cuti_model->masaKerja($id_pegawai);
        $data_admin['sisa_cuti'] = $this->cuti_model->cekSisaCutiTahunan($id_pegawai);
        $this->load->view('halaman_admin/cuti/cetak_surat_cuti', $data_admin);
    }

	public function edit_cuti($id, $id_pegawai)
	{
		if ($this->session->userdata('level') != 'admin') 
		{
            redirect('autentikasi');
        } 
		else 
		{
			$id_admin = $this->session->userdata('id');
            $data_admin['user'] = $this->admin_model->profilAdmin($id_admin);
            $data_admin['data_pegawai'] = $this->fitur_model->dataPegawaiId($id_pegawai);
            $data_admin['lokasi_cuti'] = $this->fitur_model->lokasiCuti();
            $data_admin['jenis_cuti'] = $this->fitur_model->jenisCuti();
            $data_admin['sisa_cuti'] = $this->cuti_model->cekSisaCutiTahunan($id_pegawai);
            $data_admin['data_semua_pegawai'] = $this->fitur_model->dataPegawai();
            $data_admin['data_cuti'] = $this->cuti_model->dataCutiID($id);
            $this->load->view('templates_admin/admin_header');
            $this->load->view('templates_admin/admin_sidebar');
            $this->load->view('templates_admin/admin_topbar', $data_admin);
            $this->load->view('halaman_admin/cuti/edit_cuti', $data_admin);
            $this->load->view('templates_admin/admin_footer');
		}
	}

    public function proses_edit_cuti($id, $id_pegawai)
    {
        $data_admin['data_pegawai'] = $this->fitur_model->dataPegawaiId($id_pegawai);
        $this->cuti_model->prosesEditCuti($id, $id_pegawai);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil diupdate!</div>');
        redirect('perizinan/daftar_cuti/'.$id_pegawai);
    }

    public function hapus_cuti($id, $id_pegawai)
    {
        $this->cuti_model->prosesHapusCuti($id);
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Data cuti berhasil dihapus!</div>');
        redirect('perizinan/daftar_cuti/'.$id_pegawai);
        
    } 

    public function sisa_cuti($id_pegawai)
    {
        if ($this->session->userdata('level') != 'admin') 
        {
            redirect('autentikasi');
        } 
        else 
        {
            $id_admin = $this->session->userdata('id');
            $data_admin['user'] = $this->admin_model->profilAdmin($id_admin);
            $data_admin['data_pegawai'] = $this->fitur_model->dataPegawaiId($id_pegawai);
            $data_admin['sisa_cuti'] = $this->cuti_model->cekSisaCutiTahunan($id_pegawai);
            $this->load->view('templates_admin/admin_header');
            $this->load->view('templates_admin/admin_sidebar');
            $this->load->view('templates_admin/admin_topbar', $data_admin);
            $this->load->view('halaman_admin/cuti/sisa_cuti', $data_admin);
            $this->load->view('templates_admin/admin_footer');
        }
    }

    public function proses_sisa_cuti($id_pegawai)
    {
        if ($this->session->userdata('level') != 'admin')
        {
            redirect('autentikasi');
        }
        else
        {
            $this->cuti_model->prosesSisaCuti($id_pegawai);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data sisa cuti tahunan telah diupdate!</div>');
            redirect('perizinan/daftar_cuti/'.$id_pegawai);
        }
    }

    public function daftar_mohon_cuti()
    {
        if ($this->session->userdata('level') != 'admin')
        {
            redirect('autentikasi');
        }
        else
        {
            $id_admin = $this->session->userdata('id');
            $data_admin['user'] = $this->admin_model->profilAdmin($id_admin);
            $data_admin['daftar_mohon_cuti'] = $this->cuti_model->daftarMohonCuti();
            $data_admin['jumlah_mohon_cuti'] = $this->cuti_model->jumlahMohonCuti();
            $this->load->view('templates_admin/admin_header');
            $this->load->view('templates_admin/admin_sidebar');
            $this->load->view('templates_admin/admin_topbar', $data_admin);
            $this->load->view('halaman_admin/cuti/daftar_mohon_cuti', $data_admin);
            $this->load->view('templates_admin/admin_footer');
        }
    }

    public function daftar_cuti_pegawai()
    {
        if ($this->session->userdata('level') != 'admin')
        {
            redirect('autentikasi');
        }
        else
        {
            $id_admin = $this->session->userdata('id');
            $data_admin['user'] = $this->admin_model->profilAdmin($id_admin);
            $data_admin['daftar_cuti'] = $this->cuti_model->daftarCutiPegawai();
            $data_admin['jumlah_mohon_cuti'] = $this->cuti_model->jumlahMohonCuti();
            $this->load->view('templates_admin/admin_header');
            $this->load->view('templates_admin/admin_sidebar');
            $this->load->view('templates_admin/admin_topbar', $data_admin);
            $this->load->view('halaman_admin/cuti/daftar_cuti_pegawai', $data_admin);
            $this->load->view('templates_admin/admin_footer');
        }
    }

    public function setuju_mohon_cuti($id, $id_pegawai)
    {
        if ($this->session->userdata('level') != 'admin')
        {
            redirect('autentikasi');
        }
        else
        {
            $id_admin = $this->session->userdata('id');
            $data_admin['user'] = $this->admin_model->profilAdmin($id_admin);
            $data_admin['data'] = $this->cuti_model->detilMohonCuti($id);
            $this->load->view('templates_admin/admin_header');
            $this->load->view('templates_admin/admin_sidebar');
            $this->load->view('templates_admin/admin_topbar', $data_admin);
            $this->load->view('halaman_admin/cuti/setuju_mohon_cuti', $data_admin);
            $this->load->view('templates_admin/admin_footer');
        }   
    }

    public function proses_setuju_cuti($id, $id_pegawai)
    {
        if ($this->session->userdata('level') != 'admin')
        {
            redirect('autentikasi');
        }
        else
        {
            $this->cuti_model->prosesSetujuCuti($id, $id_pegawai);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Permohonan cuti telah disetujui!</div>');
            redirect('perizinan/daftar_cuti_pegawai/');
        }
    }

    public function hapus_mohon_cuti($id)
    {
        if ($this->session->userdata('level') != 'admin')
        {
            redirect('autentikasi');
        }
        else
        {
            $this->cuti_model->hapusMohonCuti($id);
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Permohonan cuti tidak disetujui!</div>');
            redirect('perizinan/daftar_mohon_cuti');

        }
    }

    public function daftar_izin($id_pegawai)
    {
        if ($this->session->userdata('level') != 'admin') 
		{
            redirect('autentikasi');
        } 
		else 
		{
            $id_admin = $this->session->userdata('id');
            $data_admin['user'] = $this->admin_model->profilAdmin($id_admin);
            $data_admin['data_pegawai'] = $this->fitur_model->dataPegawaiId($id_pegawai);
            $data_admin['daftar_izin'] = $this->izin_model->daftarIzin($id_pegawai);
            $this->load->view('templates_admin/admin_header');
            $this->load->view('templates_admin/admin_sidebar');
            $this->load->view('templates_admin/admin_topbar', $data_admin);
            $this->load->view('halaman_admin/izin/daftar_izin', $data_admin);
            $this->load->view('templates_admin/admin_footer');
        }
    }

    public function tambah_izin($id_pegawai)
    {
        if ($this->session->userdata('level') != 'admin') 
		{
            redirect('autentikasi');
        } 
		else 
		{
            $id_admin = $this->session->userdata('id');
            $data_admin['user'] = $this->admin_model->profilAdmin($id_admin);
            $data_admin['data_pegawai'] = $this->fitur_model->dataPegawaiId($id_pegawai);
            $data_admin['lokasi_cuti'] = $this->fitur_model->lokasiCuti();
            $data_admin['data_semua_pegawai'] = $this->fitur_model->dataPegawai();
            $this->load->view('templates_admin/admin_header');
            $this->load->view('templates_admin/admin_sidebar');
            $this->load->view('templates_admin/admin_topbar', $data_admin);
            $this->load->view('halaman_admin/izin/tambah_izin', $data_admin);
            $this->load->view('templates_admin/admin_footer');
		}
    }

    public function proses_tambah_izin($id_pegawai)
    {
        $this->izin_model->prosesTambahIzin($id_pegawai);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil ditambah!</div>');
        redirect('perizinan/daftar_izin/'.$id_pegawai);
    }

    public function edit_izin($id, $id_pegawai)
    {
        if ($this->session->userdata('level') != 'admin') 
		{
            redirect('autentikasi');
        } 
		else 
		{
            $id_admin = $this->session->userdata('id');
            $data_admin['user'] = $this->admin_model->profilAdmin($id_admin);
            $data_admin['data_pegawai'] = $this->fitur_model->dataPegawaiId($id_pegawai);
            $data_admin['lokasi_cuti'] = $this->fitur_model->lokasiCuti();
            $data_admin['data_izin'] = $this->izin_model->dataIzinId($id);
            $data_admin['data_semua_pegawai'] = $this->fitur_model->dataPegawai();
            $this->load->view('templates_admin/admin_header');
            $this->load->view('templates_admin/admin_sidebar');
            $this->load->view('templates_admin/admin_topbar', $data_admin);
            $this->load->view('halaman_admin/izin/edit_izin', $data_admin);
            $this->load->view('templates_admin/admin_footer');
		}
    }

    public function proses_edit_izin($id)
    {
        $id_pegawai = $this->input->post('id_pegawai');
        $this->izin_model->prosesEditIzin($id, $id_pegawai);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil diupdate!</div>');
        redirect('perizinan/daftar_izin/'.$id_pegawai);
    }

    public function hapus_izin($id, $id_pegawai)
    {
        if ($this->session->userdata('level') != 'admin') 
		{
            redirect('autentikasi');
        } 
		else 
		{
            $this->izin_model->prosesHapusIzin($id);
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Data izin sudah dihapus!</div>');
            redirect('perizinan/daftar_izin/'.$id_pegawai);
		}
    }

    public function cetak_izin($id, $id_pegawai)
    {
        $data_admin['data_pegawai'] = $this->fitur_model->dataPegawaiId($id_pegawai);
        $data_admin['data_izin'] = $this->izin_model->detilMohonIzin($id);
        $data_admin['masa_kerja'] = $this->izin_model->masaKerja($id_pegawai);
        $this->load->view('halaman_admin/izin/cetak_surat_izin', $data_admin);
    }

    public function daftar_izin_pegawai()
    {
        if ($this->session->userdata('level') != 'admin')
        {
            redirect('autentikasi');
        }
        else
        {
            $id_admin = $this->session->userdata('id');
            $data_admin['user'] = $this->admin_model->profilAdmin($id_admin);
            $data_admin['daftar_izin'] = $this->izin_model->daftarIzinPegawai();
            $data_admin['jumlah_mohon_izin'] = $this->izin_model->jumlahMohonIzin();
            $this->load->view('templates_admin/admin_header');
            $this->load->view('templates_admin/admin_sidebar');
            $this->load->view('templates_admin/admin_topbar', $data_admin);
            $this->load->view('halaman_admin/izin/daftar_izin_pegawai', $data_admin);
            $this->load->view('templates_admin/admin_footer');
        }
    }

    public function daftar_mohon_izin()
    {
        if ($this->session->userdata('level') != 'admin')
        {
            redirect('autentikasi');
        }
        else
        {
            $id_admin = $this->session->userdata('id');
            $data_admin['user'] = $this->admin_model->profilAdmin($id_admin);
            $data_admin['daftar_mohon_izin'] = $this->izin_model->daftarMohonIzin();
            $data_admin['jumlah_mohon_izin'] = $this->izin_model->jumlahMohonIzin();
            $this->load->view('templates_admin/admin_header');
            $this->load->view('templates_admin/admin_sidebar');
            $this->load->view('templates_admin/admin_topbar', $data_admin);
            $this->load->view('halaman_admin/izin/daftar_mohon_izin', $data_admin);
            $this->load->view('templates_admin/admin_footer');
        }
    }

    public function setuju_mohon_izin($id, $id_pegawai)
    {
        if ($this->session->userdata('level') != 'admin')
        {
            redirect('autentikasi');
        }
        else
        {
            $id_admin = $this->session->userdata('id');
            $data_admin['user'] = $this->admin_model->profilAdmin($id_admin);
            $data_admin['data'] = $this->izin_model->detilMohonIzin($id);
            $this->load->view('templates_admin/admin_header');
            $this->load->view('templates_admin/admin_sidebar');
            $this->load->view('templates_admin/admin_topbar', $data_admin);
            $this->load->view('halaman_admin/izin/setuju_mohon_izin', $data_admin);
            $this->load->view('templates_admin/admin_footer');
        }   
    }

    public function proses_setuju_izin($id, $id_pegawai)
    {
        if ($this->session->userdata('level') != 'admin')
        {
            redirect('autentikasi');
        }
        else
        {
            $this->izin_model->prosesSetujuIzin($id, $id_pegawai);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Permohonan izin telah disetujui!</div>');
            redirect('perizinan/daftar_izin_pegawai/');
        }
    }
}
