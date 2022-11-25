<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Presensi_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function cekKodePresensi($id_pegawai)
    {
        $query = $this->db->query("SELECT * FROM presensi WHERE id_pegawai='9' AND tanggal_absen = CURDATE()");
        return $query->row_array();
    }

    public function viewKode($id_pegawai)
    {
        $query = $this->db->query("SELECT MAX(kode) AS kode, tanggal  AS tanggal FROM qrcode_presensi WHERE id_pegawai='$id_pegawai' AND tanggal=CURDATE()");
        return $query->row_array();
    }

    public function cekKode($kode)
    {
        $query = $this->db->query("SELECT * FROM presensi WHERE kode='$kode'");
        return $query->row_array();
    }

    public function cekKodeApelSenin($kode)
    {
        $query = $this->db->query("SELECT * FROM apel_senin WHERE kode='$kode'");
        return $query->row_array();
    }

    public function cekKodeApelJumat($kode)
    {
        $query = $this->db->query("SELECT * FROM apel_jumat WHERE kode='$kode'");
        return $query->row_array();
    }

    public function dataPresensi($id)
    {
        $query = $this->db->query("SELECT * FROM presensi WHERE id='$id'");
        return $query->row_array();
    }

    public function simpanPresensi($data_presensi_masuk)
    {
        $this->db->insert('presensi', $data_presensi_masuk);
    }

    public function updatePresensi($id, $data_presensi_pulang)
    {
        $this->db->where('id', $id);
        $this->db->update('presensi', $data_presensi_pulang);
    }

    public function daftarPresensi($periode)
    {
        $query = $this->db->query("SELECT 
                                        id AS id,
                                        (SELECT biodata_pegawai.gelar_depan FROM biodata_pegawai WHERE biodata_pegawai.id=presensi.id_pegawai) AS gelar_depan,
                                        (SELECT biodata_pegawai.nama_lengkap FROM biodata_pegawai WHERE biodata_pegawai.id=presensi.id_pegawai) AS nama_lengkap,
                                        (SELECT biodata_pegawai.gelar_belakang FROM biodata_pegawai WHERE biodata_pegawai.id=presensi.id_pegawai) AS gelar_belakang,
                                        (SELECT biodata_pegawai.nip FROM biodata_pegawai WHERE biodata_pegawai.id=presensi.id_pegawai) AS nip,
                                        tanggal_absen AS tanggal_absen,
                                        jam_masuk AS jam_masuk,
                                        jam_pulang AS jam_pulang
                                    FROM presensi
                                    WHERE tanggal_absen='$periode'");
        return $query->result_array();
    }

    public function simpanPresensiApelSenin($data_presensi_apel_senin)
    {
        $this->db->insert('apel_senin', $data_presensi_apel_senin);
    }

    public function simpanPresensiApelJumat($data_presensi_apel_jumat)
    {
        $this->db->insert('apel_jumat', $data_presensi_apel_jumat);
    }
}