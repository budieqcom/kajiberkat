<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Presensi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // if ($this->session->userdata('status') != 'login' && $this->session->userdata('level') != 'admin') 
	// 	{
        //    redirect('autentikasi');
       //  }
        $this->load->model('admin_model');
        $this->load->model('pegawai_model');
        $this->load->model('presensi_model');
        $this->load->model('fitur_model');
    }

    // public function cetak_qrcode_apel()
    // {
    //     if ($this->session->userdata('level') != 'admin')
    //     {
    //         redirect('autentikasi');
    //     }
    //     else
    //     {
    //         $id_admin = $this->session->userdata('id');
    //         $data_admin['user'] = $this->admin_model->profilAdmin($id_admin);
    //         $data_admin['daftar_pegawai'] = $this->fitur_model->dataPegawai();
    //         $this->load->view('templates_admin/admin_header');
    //         $this->load->view('templates_admin/admin_sidebar');
    //         $this->load->view('templates_admin/admin_topbar', $data_admin);
    //         $this->load->view('halaman_admin/presensi/cetak_qrcode_apel', $data_admin);
    //         $this->load->view('templates_admin/admin_footer');
    //     }
    // }

    public function qr_apel()
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
            $data_admin['kode_satker'] = $this->fitur_model->kodeSatker();
            $data_admin['qr_satker'] = $this->fitur_model->qrSatker();
            if (empty($data_admin['qr_satker']['value']))
            {
                $kode_satker = $data_admin['kode_satker']['value'];
                $this->load->library('ciqrcode');
                $config['cacheable'] = true;
                $config['cachedir'] = '\dokumen_config\cache'; 
                $config['errorlog'] = '\dokumen_config\error';
                $config['imagedir'] = '\dokumen_config\config';
                $config['quality'] = true;
                $config['size'] = '1024';
                $config['black'] = array(224,255,255);
                $config['white'] = array(70,130,180);
                $this->ciqrcode->initialize($config);
                $qrcode_name = $kode_satker.'.png';
                $params['data'] = $kode_satker;
                $params['level'] = 'H';
                $params['size'] = 10;
                $params['savename'] = FCPATH.$config['imagedir'].$qrcode_name;
                $this->ciqrcode->generate($params);
                $data_qr = ['value' => $config['imagedir'].$qrcode_name];
                $this->db->where('id', $data_admin['qr_satker']['id']);
                $this->db->update('sys_config', $data_qr);
            }
            $this->load->view('templates_admin/admin_header');
            $this->load->view('templates_admin/admin_sidebar');
            $this->load->view('templates_admin/admin_topbar', $data_admin);
            $this->load->view('halaman_admin/presensi/qr_apel', $data_admin);
            $this->load->view('templates_admin/admin_footer');
        }
    }

    public function qr_jumat()
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
            $this->load->view('halaman_admin/presensi/qr_jumat', $data_admin);
            $this->load->view('templates_admin/admin_footer');
        }
    }

    public function scan_code_datang()
    {
        if ($this->session->userdata('level') != 'admin') 
        {
            redirect('autentikasi');
        }
        else
        {
            $id_admin = $this->session->userdata('id');
            $data_admin['user'] = $this->admin_model->profilAdmin($id_admin);
            $this->load->view('templates_presensi/presensi_header');
            $this->load->view('templates_presensi/presensi_topbar', $data_admin);
            $this->load->view('halaman_admin/presensi/scan_qrcode_datang', $data_admin);
            $this->load->view('templates_presensi/presensi_footer');
        }
    }

    public function data_pegawai_id()
    {
        $split_qrcode = explode("-", $_GET['kode']);
        $nip = $split_qrcode[0];

        $data_pegawai = $this->fitur_model->dataPegawaiNIP($nip);
        echo json_encode($data_pegawai);
    }

    public function data_presensi_kode()
    {
        $data_presensi_kode = $this->presensi_model->cekKode($_GET['kode']);
        echo json_encode($data_presensi_kode);
    }

    public function tambah_presensi_masuk()
    {
        $id_pegawai = $this->input->post('id_pegawai');
        $kode = $this->input->post('qrcode');
        // $tanggal_masuk = $this->input->post('tanggal_datang');
        $tanggal_masuk = date("Y-m-d");
        $jam_masuk = $this->input->post('jam_datang');
        $cek_kode = $this->presensi_model->cekKode($kode);

        if ($cek_kode)
        {
            $pesan = "Oops... Anda sudah melakukan presensi kehadiran";
            echo json_encode($pesan);
        }
        else
        {
            $data_presensi_masuk = ['id' => '',
                                    'id_pegawai' => $id_pegawai,
                                    'kode' => $kode,
                                    'tanggal_absen' => $tanggal_masuk,
                                    'jam_masuk' => $jam_masuk];
            $this->presensi_model->simpanPresensi($data_presensi_masuk);
            $pesan = "Data presensi kehadiran berhasil disimpan";
            echo json_encode($pesan);

        }
    }

    public function scan_code_pulang()
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
            $this->load->view('templates_presensi/presensi_header');
            $this->load->view('templates_presensi/presensi_topbar', $data_admin);
            $this->load->view('halaman_admin/presensi/scan_qrcode_pulang', $data_admin);
            $this->load->view('templates_presensi/presensi_footer');
        }        
    }

    public function tambah_presensi_pulang()
    {
        $id = $this->input->post('id');
        $jam_pulang = $this->input->post('jam_pulang');
        $cek_data_presensi = $this->presensi_model->dataPresensi($id);

        if ($cek_data_presensi['jam_pulang'])
        {
            $pesan = "Oops... Anda sudah melakukan presensi kepulangan";
            echo json_encode($pesan);
        }
        else
        {
            $data_presensi_pulang = ['jam_pulang' => $jam_pulang];
            $this->presensi_model->updatePresensi($id, $data_presensi_pulang);
            $pesan = "Data presensi kepulangan berhasil disimpan";
            echo json_encode($pesan);
        }
    }

    public function tambah_presensi_apel_senin()
    {
        $id_pegawai = $this->input->post('id_pegawai');
        $kode = $this->input->post('qrcode');
        $tanggal = date("Y-m-d");
        $jam = $this->input->post('jam_datang');
        // $cek_kode = $this->presensi_model->cekKode($kode);
        $cek_kode_presensi_apel_senin = $this->presensi_model->cekKodeApelSenin($kode);

        if ($cek_kode_presensi_apel_senin)
        {
            $pesan = "Oops... Anda sudah melakukan presensi apel Senin";
            echo json_encode($pesan);
        }
        else
        {
            $data_presensi_apel_senin = ['id' => '',
                                    'id_pegawai' => $id_pegawai,
                                    'kode' => $kode,
                                    'tanggal' => $tanggal,
                                    'jam' => $jam];
            $this->presensi_model->simpanPresensiApelSenin($data_presensi_apel_senin);
            $pesan = "Data presensi apel Senin berhasil disimpan";
            echo json_encode($pesan);

        }
    }

    public function tambah_presensi_apel_jumat()
    {
        $id_pegawai = $this->input->post('id_pegawai');
        $kode = $this->input->post('qrcode');
        $tanggal = date("Y-m-d");
        $jam = $this->input->post('jam_datang');
        // $cek_kode = $this->presensi_model->cekKode($kode);
        $cek_kode_presensi_apel_jumat = $this->presensi_model->cekKodeApelJumat($kode);

        if ($cek_kode_presensi_apel_jumat)
        {
            $pesan = "Oops... Anda sudah melakukan presensi apel Jumat";
            echo json_encode($pesan);
        }
        else
        {
            $data_presensi_apel_jumat = ['id' => '',
                                    'id_pegawai' => $id_pegawai,
                                    'kode' => $kode,
                                    'tanggal' => $tanggal,
                                    'jam' => $jam];
            $this->presensi_model->simpanPresensiApelJumat($data_presensi_apel_jumat);
            $pesan = "Data presensi apel Jumat berhasil disimpan";
            echo json_encode($pesan);

        }
    }

    public function daftar_presensi_skrg()
    {
        if ($this->session->userdata('level') != 'admin')
        {
            redirect('autentikasi');
        }
        else
        {
            $periode = tgl_sql($this->input->post('periode'));
            if ($periode == null)
            {
                $periode = date("Y-m-d");
            }
            $id_admin = $this->session->userdata('id');
            $data_admin['user'] = $this->admin_model->profilAdmin($id_admin);
            $data_admin['daftar_pegawai'] = $this->fitur_model->dataPegawai();
            $data_admin['daftar_presensi'] = $this->presensi_model->daftarPresensi($periode);
            $this->load->view('templates_admin/admin_header');
            $this->load->view('templates_admin/admin_sidebar');
            $this->load->view('templates_admin/admin_topbar', $data_admin);
            $this->load->view('halaman_admin/presensi/daftar_presensi_sekarang', $data_admin);
            $this->load->view('templates_admin/admin_footer');
        }
    }
}
