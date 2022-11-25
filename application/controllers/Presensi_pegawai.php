<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Presensi_pegawai extends CI_Controller
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
        $this->load->model('presensi_model');
        $this->load->model('fitur_model');
    }

    public function index()
    {
        $id_pegawai = $this->session->userdata('id');
        $data_pns['profile'] = $this->pegawai_model->profilPNS($id_pegawai);
        $data_pns['data_pegawai'] = $this->fitur_model->dataPegawaiId($id_pegawai);
        $data_pns['qrcode'] = $this->presensi_model->viewKode($id_pegawai);
        $this->load->view('templates_pegawai/pegawai_header');
        $this->load->view('templates_pegawai/pegawai_sidebar');
        $this->load->view('templates_pegawai/pegawai_topbar', $data_pns);
        $this->load->view('halaman_pns/presensi/presensi', $data_pns);
        $this->load->view('templates_pegawai/pegawai_footer');
        
    }

    public function buat_kode_presensi($id_pegawai)
    {
        $data_pns['data_pegawai'] = $this->fitur_model->dataPegawaiId($id_pegawai);
        $nip_pegawai = $data_pns['data_pegawai']['nip'];
        $tgl_sekarang = date('Y-m-d');
        $kode_presensi = $nip_pegawai.'-'.date("Ymd");
        
        $this->load->library('ciqrcode');
        $config['cacheable'] = true;
        $config['cachedir'] = '\dokumen_qrcode\cache'; 
        $config['errorlog'] = '\dokumen_qrcode\error';
        $config['imagedir'] = '\dokumen_qrcode\qrcode';
        $config['quality'] = true;
        $config['size'] = '1024';
        $config['black'] = array(224,255,255);
        $config['white'] = array(70,130,180);
        $this->ciqrcode->initialize($config);
        $qrcode_name = $kode_presensi.'.png';
        $params['data'] = $kode_presensi;
        $params['level'] = 'H';
        $params['size'] = 10;
        $params['savename'] = FCPATH.$config['imagedir'].$qrcode_name;
        $this->ciqrcode->generate($params);

        $data_kode = ['id' => '',
                    'id_pegawai' => $id_pegawai,
                    'kode' => $qrcode_name,
                    'tanggal' => $tgl_sekarang];
        $this->db->insert('qrcode_presensi', $data_kode);

        redirect('presensi_pegawai');
    }

    public function apel_senin()
    {
        echo "Halaman presensi pegawai apel senin";
    }

    public function apel_jumat()
    {
        echo "Halaman presensi pegawai apel jumat";
    }
}
