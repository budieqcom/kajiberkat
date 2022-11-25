<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Autentikasi extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('autentikasi_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		if ($this->session->userdata('status') == 'login' && $this->session->userdata('level') == 'admin') 
		{
			redirect('halaman_admin');
		} 
		else if ($this->session->userdata('status') == 'login' && $this->session->userdata('level') == 'hakim')
		{
			redirect('halaman_pns');
		}
		else if ($this->session->userdata('status') == 'login' && $this->session->userdata('level') == 'pegawai')
		{
			redirect('halaman_pns');
		}
		else 
		{
			$this->form_validation->set_rules('user', 'User', 'required|trim');
			$this->form_validation->set_rules('pass', 'Pass', 'required|trim');
			if ($this->form_validation->run() == false)
			{
				$data['judul'] = "Halaman Login";
				$this->load->view('templates_login/autentikasi_header', $data);
				$this->load->view('templates_login/autentikasi_content');
				$this->load->view('templates_login/autentikasi_footer');
			}
		}
	}

	public function login()
	{
		$username = $this->input->post('user');
		$password = md5($this->input->post('pass'));
		$cekLoginAdmin = $this->autentikasi_model->prosesLoginAdmin($username, $password);
		if ($cekLoginAdmin) 
		{
			$session_admin = array(
				'id' => $cekLoginAdmin['id'],
				'nama_lengkap' => $cekLoginAdmin['nama_lengkap'],
				'nip' => $cekLoginAdmin['nip'],
				'level' => $cekLoginAdmin['level'],
				'status' => 'login'
			);
			$this->session->set_userdata($session_admin);
			if ($cekLoginAdmin['level'] == 'admin')
			{
				redirect('halaman_admin');
			}
		} 
		else 
		{
			$username = $this->input->post('user');
			$password = $this->input->post('pass');
			$cekLoginPegawai = $this->autentikasi_model->prosesLoginPegawai($username, $password);
			if ($cekLoginPegawai) 
			{
				$session_pegawai = array(
					'id' => $cekLoginPegawai['id'],
					'nama_lengkap' => $cekLoginPegawai['nama_lengkap'],
					'nip' => $cekLoginPegawai['nip'],
					'level' => $cekLoginPegawai['level'],
					'status' => 'login'
				);
				$this->session->set_userdata($session_pegawai);
				if ($cekLoginPegawai['level'] == 'hakim' || $cekLoginPegawai['level'] == 'pegawai')
				{
					redirect('halaman_pns');
				}
			} 
			else 
			{
				$this->session->set_flashdata('pesan',
				'<div class="alert alert-danger alert-dismissible fade show" role="alert">Username atau password yang dimasukan salah!</div>');
				redirect('autentikasi');
			}
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('id');
		$this->session->unset_userdata('nip');
		$this->session->unset_userdata('status');
		$this->session->unset_userdata('level');
		$this->session->set_flashdata('pesan',
		'<div class="alert alert-success alert-dismissible fade show" role="alert">Kamu telah keluar!</div>');
		redirect('autentikasi');
	}
}
