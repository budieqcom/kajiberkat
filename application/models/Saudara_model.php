<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Saudara_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	
	public function dataSaudara($id_pns)
	{
		return $this->db->get_where('saudara', ['id_pegawai' => $id_pns])->result_array();
	}

	public function prosesTambahSaudara()
	{
		$id_pegawai = $this->input->post('id_pegawai');
		$nip_pegawai = $this->input->post('nip_pegawai');
		$nama = $this->input->post('nama');
		$hubungan_keluarga = $this->input->post('hubungan_keluarga');
		$nik = $this->input->post('nik');
		$pekerjaan = $this->input->post('pekerjaan');
		$alamat_kantor = $this->input->post('alamat_kantor');
		$tempat_lahir = $this->input->post('tempat_lahir');
		$tanggal_lahir = tgl_sql($this->input->post('tanggal_lahir'));
		$jenis_kelamin = $this->input->post('jenis_kelamin');
		$pendidikan = $this->input->post('pendidikan');
		$agama = $this->input->post('agama');
		$status_kesehatan = $this->input->post('status_kesehatan');
		$masih_hidup = $this->input->post('masih_hidup');
		$status_perkawinan = $this->input->post('status_perkawinan');
		$data_saudara = ['id' => '',
						'id_pegawai' => $id_pegawai,
						'nip_pegawai' => $nip_pegawai,
						'nama' => $nama,
						'hubungan_keluarga' => $hubungan_keluarga,
						'nik' => $nik,
						'pekerjaan' => $pekerjaan,
						'alamat_kantor' => $alamat_kantor,
						'tempat_lahir' => $tempat_lahir,
						'tanggal_lahir' => $tanggal_lahir,
						'jenis_kelamin' => $jenis_kelamin,
						'pendidikan' => $pendidikan,
						'agama' => $agama,
						'status_kesehatan' => $status_kesehatan,
						'masih_hidup' => $masih_hidup,
						'status_perkawinan' => $status_perkawinan];
		$this->db->insert('saudara', $data_saudara);
	}

	public function dataEditSaudara($id)
	{
		return $this->db->get_where('saudara', ['id' => $id])->row_array();
	}

	public function prosesEditSaudara()
	{
		$id_saudara = $this->input->post('id_saudara');
		$id_pegawai = $this->input->post('id_pegawai');
		$nip_pegawai = $this->input->post('nip_pegawai');
		$nama = $this->input->post('nama');
		$hubungan_keluarga = $this->input->post('hubungan_keluarga');
		$nik = $this->input->post('nik');
		$pekerjaan = $this->input->post('pekerjaan');
		$alamat_kantor = $this->input->post('alamat_kantor');
		$tempat_lahir = $this->input->post('tempat_lahir');
		$tanggal_lahir = tgl_sql($this->input->post('tanggal_lahir'));
		$jenis_kelamin = $this->input->post('jenis_kelamin');
		$pendidikan = $this->input->post('pendidikan');
		$agama = $this->input->post('agama');
		$status_kesehatan = $this->input->post('status_kesehatan');
		$masih_hidup = $this->input->post('masih_hidup');
		$status_perkawinan = $this->input->post('status_perkawinan');
		$data_saudara = ['nama' => $nama,
						'hubungan_keluarga' => $hubungan_keluarga,
						'nik' => $nik,
						'pekerjaan' => $pekerjaan,
						'alamat_kantor' => $alamat_kantor,
						'tempat_lahir' => $tempat_lahir,
						'tanggal_lahir' => $tanggal_lahir,
						'jenis_kelamin' => $jenis_kelamin,
						'pendidikan' => $pendidikan,
						'agama' => $agama,
						'status_kesehatan' => $status_kesehatan,
						'masih_hidup' => $masih_hidup,
						'status_perkawinan' => $status_perkawinan];
		$this->db->where('id', $id_saudara);
		$this->db->update('saudara', $data_saudara);
	}

	public function hapusSaudara($id)
	{
		return $this->db->delete('saudara', ['id' => $id]);
	}
}
