<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mutasi_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function daftarMutasi()
	{
		$query = $this->db->query('SELECT id AS id, nip_pegawai AS nip_pegawai, (SELECT gelar_depan FROM biodata_pegawai WHERE biodata_pegawai.nip=mutasi.nip_pegawai) AS gelar_depan, (SELECT gelar_belakang FROM biodata_pegawai WHERE biodata_pegawai.nip=mutasi.nip_pegawai) AS gelar_belakang, (SELECT nama_lengkap FROM biodata_pegawai WHERE biodata_pegawai.nip=mutasi.nip_pegawai) AS nama_pegawai, jenis_mutasi AS jenis_mutasi, tanggal_mutasi AS tanggal_mutasi, no_sk_mutasi AS no_sk_mutasi, dokumen_sk_mutasi AS dokumen_sk_mutasi FROM mutasi');
		return $query->result_array();
	}
	
	public function dataEditMutasi($id)
	{
		return $this->db->get_where('mutasi', ['id' => $id])->row_array();
	}

	public function prosesTambahMutasi()
	{
		$nip_pegawai = $this->input->post('nip_pegawai');
		$jenis_mutasi = $this->input->post('jenis_mutasi');
		$tanggal_mutasi = tgl_sql($this->input->post('tanggal_mutasi'));
		$no_sk_mutasi = $this->input->post('no_sk_mutasi');
		$dokumen_sk_mutasi_nama = "";
		if (!empty($_FILES['dokumen_sk_mutasi']['name'])) {
			$config = ['upload_path' => './dokumen_mutasi/', 'allowed_types' => 'txt|doc|rtf|pdf'];
			$this->load->library('upload', $config);
			$this->upload->do_upload('dokumen_sk_mutasi');
			$dokumen_sk_mutasi = $this->upload->data();
			$dokumen_sk_mutasi_nama = $dokumen_sk_mutasi['file_name'];
		} 
		else 
		{
			$dokumen_sk_mutasi_nama = "";
		}

		$data_mutasi = [
			'id' => '',
			'nip_pegawai' => $nip_pegawai,
			'jenis_mutasi' => $jenis_mutasi,
			'tanggal_mutasi' => $tanggal_mutasi,
			'no_sk_mutasi' => $no_sk_mutasi,
			'dokumen_sk_mutasi' => $dokumen_sk_mutasi_nama
		];
		$this->db->insert('mutasi', $data_mutasi);
	}
	
	public function prosesEditMutasi()
	{
		$id_mutasi = $this->input->post('id_mutasi');
		$nip_pegawai = $this->input-> post('nip_pegawai');
		$jenis_mutasi = $this->input->post('jenis_mutasi');
		$tanggal_mutasi = tgl_sql($this->input->post('tanggal_mutasi'));
		$no_sk_mutasi = $this->input->post('no_sk_mutasi');
		$dokumen_sk_mutasi_lama = $this->input->post('dokumen_sk_mutasi_lama');
		$dokumen_sk_mutasi_baru_nama = "";
		
		if (!empty($_FILES['dokumen_sk_mutasi']['name'])) 
		{
			$config = ['upload_path' => './dokumen_mutasi/', 'allowed_types' => 'txt|doc|rtf|pdf'];
			$this->load->library('upload', $config);
			$this->upload->do_upload('dokumen_sk_mutasi');
			$dokumen_sk_mutasi_baru = $this->upload->data();
			$dokumen_sk_mutasi_baru_nama = $dokumen_sk_mutasi_baru['file_name'];
		} 
		else 
		{
			$dokumen_sk_mutasi_baru_nama = $dokumen_sk_mutasi_lama;
		}
		
		$data_mutasi = ['jenis_mutasi' => $jenis_mutasi,
									'tanggal_mutasi' => $tanggal_mutasi,
									'no_sk_mutasi' => $no_sk_mutasi,
									'dokumen_sk_mutasi' => $dokumen_sk_mutasi_baru_nama
		];
		$this->db->where('id', $id_mutasi);
		$this->db->update('mutasi', $data_mutasi);
	}
	
	public function prosesHapusMutasi($id)
	{
		$data_mutasi = $this->dataEditMutasi($id);
		if (!empty($data_mutasi['dokumen_sk_mutasi']))
		{
			unlink('dokumen_mutasi/'.$data_mutasi['dokumen_sk_mutasi']);
		}
		return $this->db->delete('mutasi', ['id' => $id]);
	}
}
