<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Fitur_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function kodePA()
	{
		$query = $this->db->query("SELECT * FROM kajiberkat.sys_config WHERE id='2'");
		return $query->row_array();
	}

	public function namaPA()
	{
		$query = $this->db->query("SELECT * FROM kajiberkat.sys_config WHERE id='3'");
		return $query->row_array();
	}

	public function alamatPA()
	{
		$query = $this->db->query("SELECT * FROM kajiberkat.sys_config WHERE id='4'");
		return $query->row_array();
	}

	public function kodeSatker()
	{
		$query = $this->db->query("SELECT * FROM kajiberkat.sys_config WHERE id='1'");
		return $query->row_array();
	}

	public function qrSatker()
	{
		$query = $this->db->query("SELECT * FROM kajiberkat.sys_config WHERE id='13'");
		return $query->row_array();
	}

	public function dataPegawai()
	{
		$query = $this->db->query("SELECT * FROM biodata_pegawai ORDER BY level, nip");
		return $query->result_array();
	}

	public function dataPegawaiId($id_pegawai)
	{
		$query = $this->db->query("SELECT * FROM biodata_pegawai WHERE id='$id_pegawai'");
		return $query->row_array();
	}

	public function dataPegawaiNIP($nip)
	{
		$query = $this->db->query("SELECT * FROM biodata_pegawai WHERE nip='$nip'");
		return $query->row_array();
	}

	public function dataAgama()
	{
		$query = $this->db->get('agama');
		return $query->result_array();
	}
	
	public function statusPerkawinan()
	{
		$query = $this->db->get('status_perkawinan');
		return $query->result_array();
	}

	public function jenisKelamin()
	{
		$query = $this->db->get('jenis_kelamin');
		return $query->result_array();
	}

	public function tingkatPendidikan()
	{
		$query = $this->db->get('pendidikan_pasangan');
		return $query->result_array();
	}

	public function golonganRuang()
	{
		$query = $this->db->get('golongan_ruang');
		return $query->result_array();
	}

	public function kelompokJabatan()
	{
		$query = $this->db->get('kelompok_jabatan');
		return $query->result_array();
	}

	public function Jabatan()
	{
		$query = $this->db->get('jabatan');
		return $query->result_array();
	}

	public function jenisPangkat()
	{
		$query = $this->db->get('jenis_pangkat');
		return $query->result_array();
	}

	public function flagAktif()
	{
		$query = $this->db->get('flag_aktif');
		return $query->result_array();	
	}

	public function unitKerja()
	{
		$query = $this->db->get('unit_kerja');
		return $query->result_array();
	}

	public function hubunganKeluarga()
	{
		$query = $this->db->get('status_pasangan');
		return $query->result_array();
	}

	public function pekerjaan()
	{
		$query = $this->db->get('pekerjaan_pasangan');
		return $query->result_array();
	}

	public function agama()
	{
		$query = $this->db->get('agama');
		return $query->result_array();
	}

	public function statusSehat()
	{
		$query = $this->db->get('status_sehat');
		return $query->result_array();
	}

	public function pendidikan()
	{
		$query = $this->db->get('pendidikan_pasangan');
		return $query->result_array();
	}

	public function masihHidup()
	{
		$query = $this->db->get('masih_hidup');
		return $query->result_array();
	}

	public function berhakTunjangan()
	{
		$query = $this->db->get('berhak_tunjangan');
		return $query->result_array();
	}

	public function hubunganAnak()
	{
		$query = $this->db->get('hubungan_anak');
		return $query->result_array();
	}

	public function hubunganOrtu()
	{
		$query = $this->db->get('hubungan_ortu');
		return $query->result_array();
	}

	public function hubunganSaudara()
	{
		$query = $this->db->get('hubungan_saudara');
		return $query->result_array();
	}

	public function jenisAlamat()
	{
		$query = $this->db->get('jenis_alamat');
		return $query->result_array();
	}

	public function jenisMutasi()
	{
		$query = $this->db->get('jenis_mutasi');
		return $query->result_array();
	}
	
	public function jumlahCuti()
	{
		$query = $this->db->get('jumlah_cuti');
		return $query->row_array();
	}
	
	public function jenisCuti()
	{
		$query = $this->db->get('jenis_cuti');
		return $query->result_array();
	}

	public function lokasiCuti()
	{
		$query = $this->db->get('lokasi_cuti');
		return $query->result_array();
	}
}
