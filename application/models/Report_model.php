<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Report_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

    public function duk()
    {
        $query = $this->db->query('SELECT pangkat.id_pegawai, 
                                        pangkat.nip_pegawai,
                                        (SELECT biodata_pegawai.gelar_depan FROM biodata_pegawai WHERE biodata_pegawai.id=pangkat.id_pegawai) AS gelar_depan,
                                        (SELECT biodata_pegawai.nama_lengkap FROM biodata_pegawai WHERE biodata_pegawai.id=pangkat.id_pegawai) AS nama_pegawai,
                                        (SELECT biodata_pegawai.gelar_belakang FROM biodata_pegawai WHERE biodata_pegawai.id=pangkat.id_pegawai) AS gelar_belakang,
                                        (SELECT biodata_pegawai.tanggal_lahir FROM biodata_pegawai WHERE biodata_pegawai.id=pangkat.id_pegawai) AS tanggal_lahir,
                                        (SELECT biodata_pegawai.tempat_lahir FROM biodata_pegawai WHERE biodata_pegawai.id=pangkat.id_pegawai) AS tempat_lahir, 
                                        (SELECT biodata_pegawai.jenis_kelamin FROM biodata_pegawai WHERE biodata_pegawai.id=pangkat.id_pegawai) AS jenis_kelamin,
                                        pangkat.golongan_ruang, 
                                        pangkat.tmt_golongan,
                                        jabatan3.jabatan,
                                        jabatan3.tmt_mulai,
                                        (SELECT biodata_pegawai.tingkat_pendidikan FROM biodata_pegawai WHERE biodata_pegawai.id=pangkat.id_pegawai) AS tingkat_pendidikan,
                                        (SELECT MAX(alamat_pegawai.alamat) FROM alamat_pegawai WHERE alamat_pegawai.id_pegawai=pangkat.id_pegawai) AS alamat,
                                        (SELECT biodata_pegawai.nomor_hp FROM biodata_pegawai WHERE biodata_pegawai.id=pangkat.id_pegawai) AS no_hp
                                    FROM pangkat
                                    JOIN
                                        (SELECT pangkat.id_pegawai AS id_pegawai1, 
                                            pangkat.nip_pegawai AS nip_pegawai1, 
                                            pangkat.golongan_ruang AS pangkat_pegawai1, 
                                            MAX(pangkat.tmt_golongan) AS max_tmt_golongan 
                                        FROM pangkat GROUP BY pangkat.id_pegawai) AS pangkat2
                                        ON pangkat2.id_pegawai1=pangkat.id_pegawai AND pangkat.tmt_golongan=pangkat2.max_tmt_golongan
                                        JOIN jabatan3 ON jabatan3.id_pegawai=pangkat.id_pegawai
                                    JOIN
                                        (SELECT jabatan3.id_pegawai AS id_peg,
                                            jabatan3.nip_pegawai,
                                            jabatan3.jabatan,
                                            MAX(jabatan3.tmt_mulai) AS max_tmt_jabatan
                                        FROM jabatan3 GROUP BY jabatan3.id_pegawai) AS jabatan4
                                        ON jabatan4.id_peg=jabatan3.id_pegawai AND jabatan3.tmt_mulai=jabatan4.max_tmt_jabatan');
        return $query->result_array();
    }

    public function bezetting()
    {
        $query = $this->db->query('SELECT pangkat.id_pegawai, 
                                        pangkat.nip_pegawai,
                                        (SELECT biodata_pegawai.gelar_depan FROM biodata_pegawai WHERE biodata_pegawai.id=pangkat.id_pegawai) AS gelar_depan,
                                        (SELECT biodata_pegawai.nama_lengkap FROM biodata_pegawai WHERE biodata_pegawai.id=pangkat.id_pegawai) AS nama_pegawai,
                                        (SELECT biodata_pegawai.gelar_belakang FROM biodata_pegawai WHERE biodata_pegawai.id=pangkat.id_pegawai) AS gelar_belakang,
                                        (SELECT biodata_pegawai.tanggal_lahir FROM biodata_pegawai WHERE biodata_pegawai.id=pangkat.id_pegawai) AS tanggal_lahir,
                                        (SELECT biodata_pegawai.tempat_lahir FROM biodata_pegawai WHERE biodata_pegawai.id=pangkat.id_pegawai) AS tempat_lahir, 
                                        pangkat.golongan_ruang, 
                                        pangkat.tmt_golongan,
                                        jabatan3.jabatan,
                                        jabatan3.tmt_mulai,
                                        (SELECT biodata_pegawai.tingkat_pendidikan FROM biodata_pegawai WHERE biodata_pegawai.id=pangkat.id_pegawai) AS tingkat_pendidikan
                                    FROM pangkat
                                    JOIN
                                        (SELECT pangkat.id_pegawai AS id_pegawai1, 
                                                pangkat.nip_pegawai AS nip_pegawai1, 
                                                pangkat.golongan_ruang AS pangkat_pegawai1, 
                                                MAX(pangkat.tmt_golongan) AS max_tmt_golongan 
                                        FROM pangkat GROUP BY pangkat.id_pegawai) AS pangkat2
                                    ON pangkat2.id_pegawai1=pangkat.id_pegawai AND pangkat.tmt_golongan=pangkat2.max_tmt_golongan
                                    JOIN jabatan3 ON jabatan3.id_pegawai=pangkat.id_pegawai
                                    JOIN
                                        (SELECT jabatan3.id_pegawai AS id_peg,
                                        jabatan3.nip_pegawai,
                                        jabatan3.jabatan,
                                        MAX(jabatan3.tmt_mulai) AS max_tmt_jabatan
                                    FROM jabatan3 GROUP BY jabatan3.id_pegawai) AS jabatan4
                                    ON jabatan4.id_peg=jabatan3.id_pegawai AND jabatan3.tmt_mulai=jabatan4.max_tmt_jabatan');
        return $query->result_array();
    }

    public function presensiHarian($periode)
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
                                    WHERE tanggal_absen='$periode' ORDER BY jam_masuk");
        return $query->result_array();
    }

    public function presensiPegawai($periode, $id_pegawai)
    {
        $query = $this->db->query("SELECT
                                        id_pegawai AS id_pegawai,
                                        (SELECT biodata_pegawai.gelar_depan FROM biodata_pegawai WHERE biodata_pegawai.id=presensi.id_pegawai) AS gelar_depan,
                                        (SELECT biodata_pegawai.nama_lengkap FROM biodata_pegawai WHERE biodata_pegawai.id=presensi.id_pegawai) AS nama_lengkap,
                                        (SELECT biodata_pegawai.gelar_belakang FROM biodata_pegawai WHERE biodata_pegawai.id=presensi.id_pegawai) AS gelar_belakang,
                                        (SELECT biodata_pegawai.nip FROM biodata_pegawai WHERE biodata_pegawai.id=presensi.id_pegawai) AS nip,
                                        tanggal_absen AS tanggal_absen,
                                        jam_masuk AS jam_masuk,
                                        jam_pulang AS jam_pulang
                                    FROM presensi
                                    WHERE LEFT(tanggal_absen, 7) = '$periode' AND id_pegawai='$id_pegawai'
                                    ORDER BY tanggal_absen");
        return $query->result_array();
    }

    public function presensiApelSenin($periode)
    {
        $query = $this->db->query("SELECT 
                                        id AS id,
                                        (SELECT biodata_pegawai.gelar_depan FROM biodata_pegawai WHERE biodata_pegawai.id=apel_senin.id_pegawai) AS gelar_depan,
                                        (SELECT biodata_pegawai.nama_lengkap FROM biodata_pegawai WHERE biodata_pegawai.id=apel_senin.id_pegawai) AS nama_lengkap,
                                        (SELECT biodata_pegawai.gelar_belakang FROM biodata_pegawai WHERE biodata_pegawai.id=apel_senin.id_pegawai) AS gelar_belakang,
                                        (SELECT biodata_pegawai.nip FROM biodata_pegawai WHERE biodata_pegawai.id=apel_senin.id_pegawai) AS nip,
                                        tanggal AS tanggal,
                                        jam AS jam
                                    FROM apel_senin
                                    WHERE tanggal='$periode' ORDER BY jam");
        return $query->result_array();
    }

    public function presensiApelJumat($periode)
    {
        $query = $this->db->query("SELECT 
                                        id AS id,
                                        (SELECT biodata_pegawai.gelar_depan FROM biodata_pegawai WHERE biodata_pegawai.id=apel_jumat.id_pegawai) AS gelar_depan,
                                        (SELECT biodata_pegawai.nama_lengkap FROM biodata_pegawai WHERE biodata_pegawai.id=apel_jumat.id_pegawai) AS nama_lengkap,
                                        (SELECT biodata_pegawai.gelar_belakang FROM biodata_pegawai WHERE biodata_pegawai.id=apel_jumat.id_pegawai) AS gelar_belakang,
                                        (SELECT biodata_pegawai.nip FROM biodata_pegawai WHERE biodata_pegawai.id=apel_jumat.id_pegawai) AS nip,
                                        tanggal AS tanggal,
                                        jam AS jam
                                    FROM apel_jumat
                                    WHERE tanggal='$periode' ORDER BY jam");
        return $query->result_array();
    }
}
