<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Setting extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('status') != 'login' && $this->session->userdata('level') != 'admin') 
		{
            redirect('autentikasi');
        }
        $this->load->model('admin_model');
        // $this->load->model('pegawai_model');
        // $this->load->model('presensi_model');
        $this->load->model('fitur_model');
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
            $data_admin['kode_pa'] = $this->fitur_model->kodePA();
            $data_admin['nama_pa'] = $this->fitur_model->namaPA();
            $data_admin['alamat_pa'] = $this->fitur_model->alamatPA();
            $data_admin['kode_satker'] = $this->fitur_model->kodeSatker();
            $this->load->view('templates_admin/admin_header');
            $this->load->view('templates_admin/admin_sidebar');
            $this->load->view('templates_admin/admin_topbar', $data_admin);
            $this->load->view('halaman_admin/setting/setting', $data_admin);
            $this->load->view('templates_admin/admin_footer');
        }
        
    }
}
