<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Report extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('status') != 'login' && $this->session->userdata('level') != 'pns') {
			redirect('autentikasi');
		}
		$this->load->model('admin_model');
		$this->load->model('pegawai_model');
        $this->load->model('pns_model');
        $this->load->model('report_model');
		$this->load->model('fitur_model');
    }

    public function duk()
    {
        if ($this->session->userdata('level') != 'admin') 
		{
			redirect('autentikasi');
		} 
		else 
		{
			$id_admin = $this->session->userdata('id');
			$data_admin['user'] = $this->admin_model->profilAdmin($id_admin);
            $data_admin['nominatif'] = $this->report_model->duk();
			$this->load->view('templates_admin/admin_header');
			$this->load->view('templates_admin/admin_sidebar');
			$this->load->view('templates_admin/admin_topbar', $data_admin);
			$this->load->view('halaman_admin/report/nominatif', $data_admin);
			$this->load->view('templates_admin/admin_footer');
		}
    }

	public function cetak_duk() 
	{
		header("Content-type: application/vnd-ms-excel");
		header("Content-Disposition: attachment; filename=report_duk.xls");
		$data_admin['nominatif'] = $this->report_model->duk();
		$this->load->view('halaman_admin/report/cetak_duk', $data_admin);
	}

	public function bezetting()
    {
        if ($this->session->userdata('level') != 'admin') 
		{
			redirect('autentikasi');
		} 
		else 
		{
			$id_admin = $this->session->userdata('id');
			$data_admin['user'] = $this->admin_model->profilAdmin($id_admin);
			$data_admin['bezetting'] = $this->report_model->bezetting();
			$this->load->view('templates_admin/admin_header');
			$this->load->view('templates_admin/admin_sidebar');
			$this->load->view('templates_admin/admin_topbar', $data_admin);
			$this->load->view('halaman_admin/report/bezetting', $data_admin);
			$this->load->view('templates_admin/admin_footer');
		}
    }

	public function cetak_bezetting() 
	{
		header("Content-type: application/vnd-ms-excel");
		header("Content-Disposition: attachment; filename=report_bezetting.xls");
		$data_admin['bezetting'] = $this->report_model->bezetting();
		$this->load->view('halaman_admin/report/cetak_bezetting', $data_admin);
	}

	public function presensi_harian()
	{
		if ($this->session->userdata('level') != 'admin')
		{
			redirect('autentikasi');
		}
		else
		{
			$periode = tgl_sql($this->input->post('periode'));
			if ($periode != "--")
            {
				$id_admin = $this->session->userdata('id');
				$data_admin['user'] = $this->admin_model->profilAdmin($id_admin);
				$data_admin['daftar_pegawai'] = $this->fitur_model->dataPegawai();
				$data_admin['presensi_harian'] = $this->report_model->presensiHarian($periode);
				$data_admin['period'] = $periode;
				$this->load->view('templates_admin/admin_header');
				$this->load->view('templates_admin/admin_sidebar');
				$this->load->view('templates_admin/admin_topbar', $data_admin);
				$this->load->view('halaman_admin/report/presensi_harian', $data_admin);
				$this->load->view('templates_admin/admin_footer');
			}
			else
			{
				$periode = date("Y-m-d");
				$id_admin = $this->session->userdata('id');
				$data_admin['user'] = $this->admin_model->profilAdmin($id_admin);
				$data_admin['daftar_pegawai'] = $this->fitur_model->dataPegawai();
				$data_admin['presensi_harian'] = $this->report_model->presensiHarian($periode);
				$data_admin['period'] = $periode;
				$this->load->view('templates_admin/admin_header');
				$this->load->view('templates_admin/admin_sidebar');
				$this->load->view('templates_admin/admin_topbar', $data_admin);
				$this->load->view('halaman_admin/report/presensi_harian', $data_admin);
				$this->load->view('templates_admin/admin_footer');
			}
		}
	}

	public function cetak_presensi_harian($periode  = null)
	{
		if ($periode)
		{
			header("Content-type: application/vnd-ms-excel");
			header("Content-Disposition: attachment; filename=report_presensi_".$periode.".xls");
			$data_admin['presensi_harian'] = $this->report_model->presensiHarian($periode);
			$data_admin['period'] = $periode;
			$this->load->view('halaman_admin/report/cetak_presensi_harian', $data_admin);
		}
	}

	public function presensi_pegawai()
	{
		if ($this->session->userdata('level') != 'admin')
		{
			redirect('autentikasi');
		}
		else
		{
			$periode = bulan_sql($this->input->post('periode'));
			$id_pegawai = $this->input->post('id_pegawai');
			if ($periode != "-")
			{
				$data_admin['period'] = $periode;	
			}
			else
			{
				$periode = "";
				$data_admin['period'] = $periode;
			}
			$id_admin = $this->session->userdata('id');
			$data_admin['user'] = $this->admin_model->profilAdmin($id_admin);
			$data_admin['daftar_pegawai'] = $this->fitur_model->dataPegawai();
			$data_admin['presensi_pegawai'] = $this->report_model->presensiPegawai($periode, $id_pegawai);
			$this->load->view('templates_admin/admin_header');
			$this->load->view('templates_admin/admin_sidebar');
			$this->load->view('templates_admin/admin_topbar', $data_admin);
			$this->load->view('halaman_admin/report/presensi_pegawai', $data_admin);
			$this->load->view('templates_admin/admin_footer');
		}
	}

	public function cetak_presensi_pegawai($periode, $id_pegawai)
	{
		header("Content-type: application/vnd-ms-excel");
		header("Content-Disposition: attachment; filename=report_presensi_pegawai_".$periode.".xls");
		$data_admin['presensi_pegawai'] = $this->report_model->presensiPegawai($periode, $id_pegawai);
		$data_admin['period'] = $periode;
		$this->load->view('halaman_admin/report/cetak_presensi_pegawai', $data_admin);
	}

	public function presensi_apel_senin()
	{
		if ($this->session->userdata('level') != 'admin')
		{
			redirect('autentikasi');
		}
		else
		{
			$periode = tgl_sql($this->input->post('periode'));
			if ($periode != "--")
            {
				$id_admin = $this->session->userdata('id');
				$data_admin['user'] = $this->admin_model->profilAdmin($id_admin);
				$data_admin['daftar_pegawai'] = $this->fitur_model->dataPegawai();
				$data_admin['presensi_senin'] = $this->report_model->presensiApelSenin($periode);
				$data_admin['period'] = $periode;
				$this->load->view('templates_admin/admin_header');
				$this->load->view('templates_admin/admin_sidebar');
				$this->load->view('templates_admin/admin_topbar', $data_admin);
				$this->load->view('halaman_admin/report/presensi_apel_senin', $data_admin);
				$this->load->view('templates_admin/admin_footer');
			}
			else
			{
				$periode = date("Y-m-d");
				$id_admin = $this->session->userdata('id');
				$data_admin['user'] = $this->admin_model->profilAdmin($id_admin);
				$data_admin['daftar_pegawai'] = $this->fitur_model->dataPegawai();
				$data_admin['presensi_senin'] = $this->report_model->presensiApelSenin($periode);
				$data_admin['period'] = $periode;
				$this->load->view('templates_admin/admin_header');
				$this->load->view('templates_admin/admin_sidebar');
				$this->load->view('templates_admin/admin_topbar', $data_admin);
				$this->load->view('halaman_admin/report/presensi_apel_senin', $data_admin);
				$this->load->view('templates_admin/admin_footer');
			}
		}
	}

	public function cetak_presensi_apel_senin($periode  = null)
	{
		if ($periode)
		{
			header("Content-type: application/vnd-ms-excel");
			header("Content-Disposition: attachment; filename=report_presensi_senin".$periode.".xls");
			$data_admin['presensi_senin'] = $this->report_model->presensiApelSenin($periode);
			$data_admin['period'] = $periode;
			$this->load->view('halaman_admin/report/cetak_presensi_apel_senin', $data_admin);
		}
	}

	public function presensi_apel_jumat()
	{
		if ($this->session->userdata('level') != 'admin')
		{
			redirect('autentikasi');
		}
		else
		{
			$periode = tgl_sql($this->input->post('periode'));
			if ($periode != "--")
            {
				$id_admin = $this->session->userdata('id');
				$data_admin['user'] = $this->admin_model->profilAdmin($id_admin);
				$data_admin['daftar_pegawai'] = $this->fitur_model->dataPegawai();
				$data_admin['presensi_jumat'] = $this->report_model->presensiApelJumat($periode);
				$data_admin['period'] = $periode;
				$this->load->view('templates_admin/admin_header');
				$this->load->view('templates_admin/admin_sidebar');
				$this->load->view('templates_admin/admin_topbar', $data_admin);
				$this->load->view('halaman_admin/report/presensi_apel_jumat', $data_admin);
				$this->load->view('templates_admin/admin_footer');
			}
			else
			{
				$periode = date("Y-m-d");
				$id_admin = $this->session->userdata('id');
				$data_admin['user'] = $this->admin_model->profilAdmin($id_admin);
				$data_admin['daftar_pegawai'] = $this->fitur_model->dataPegawai();
				$data_admin['presensi_jumat'] = $this->report_model->presensiApelJumat($periode);
				$data_admin['period'] = $periode;
				$this->load->view('templates_admin/admin_header');
				$this->load->view('templates_admin/admin_sidebar');
				$this->load->view('templates_admin/admin_topbar', $data_admin);
				$this->load->view('halaman_admin/report/presensi_apel_jumat', $data_admin);
				$this->load->view('templates_admin/admin_footer');
			}
		}
	}

	public function cetak_presensi_apel_jumat($periode  = null)
	{
		if ($periode)
		{
			header("Content-type: application/vnd-ms-excel");
			header("Content-Disposition: attachment; filename=report_presensi_jumat".$periode.".xls");
			$data_admin['presensi_jumat'] = $this->report_model->presensiApelJumat($periode);
			$data_admin['period'] = $periode;
			$this->load->view('halaman_admin/report/cetak_presensi_apel_jumat', $data_admin);
		}
	}
}
