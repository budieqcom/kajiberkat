<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pns_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	
	public function dataPNS($id_pns='')
	{
		return $this->db->get_where('pns', ['id_pegawai' => $id_pns])->row_array();
	}

	public function updatePNS()
	{
		$id = $this->input->post('id_pns');
		$dokumen_sk_pns_lama = $this->input->post('dokumen_sk_pns_lama');
		$path_dokumen_sk_pns_lama = $this->input->post('path_dokumen_sk_pns_lama');
		$dokumen_spmt_lama = $this->input->post('dokumen_spmt_lama');
		$path_dokumen_spmt_lama = $this->input->post('path_dokumen_spmt_lama');
		$golongan = $this->input->post('golongan');
		$no_sk_pns = $this->input->post('no_sk_pns');
		$tanggal_sk_pns = tgl_sql($this->input->post('tanggal_sk_pns'));
		$nomor_persetujuan = $this->input->post('nomor_persetujuan');
		$tanggal_persetujuan = tgl_sql($this->input->post('tanggal_persetujuan'));
		$gaji_pokok = str_replace(".", "", $this->input->post('gaji_pokok'));
		$tmt_golongan = tgl_sql($this->input->post('tmt_golongan'));
		$masa_kerja_tahun = $this->input->post('masa_kerja_tahun');
		$masa_kerja_bulan = $this->input->post('masa_kerja_bulan');
		$pejabat_penandatangan_sk = $this->input->post('pejabat_penandatangan_sk');
		$kjabatan = $this->input->post('kjabatan');
		$jabatan = $this->input->post('jabatan');
		$tmt_selesai = tgl_sql($this->input->post('tmt_selesai'));
		$pejabat_sk = $this->input->post('pejabat_sk');
		$tanggal_spmt = tgl_sql($this->input->post('tanggal_spmt'));
		$nomor_spmt = $this->input->post('nomor_spmt');
		$tmt_spmt = tgl_sql($this->input->post('tmt_spmt'));
		$pejabat_spmt = $this->input->post('pejabat_spmt');
		$dokumen_sk_pns_baru_nama = "";
		$dokumen_sk_pns_baru_path = "";
		$dokumen_spmt_baru_nama = "";
		$dokumen_spmt_baru_path = "";

		if (!empty($_FILES['dokumen_sk_pns_baru']['name']))
		{
			$config1 = ['upload_path' => './dokumen_pns/', 'allowed_types' => 'txt|doc|rtf|pdf'];
			$this->load->library('upload', $config1);
			$this->upload->do_upload('dokumen_sk_pns_baru');
			$dokumen_sk_pns_baru = $this->upload->data();
			$dokumen_sk_pns_baru_nama = $dokumen_sk_pns_baru['file_name'];
			$dokumen_sk_pns_baru_path = $dokumen_sk_pns_baru['full_path'];
		}
		else
		{
			$dokumen_sk_pns_baru_nama = $dokumen_sk_pns_lama;
			$dokumen_sk_pns_baru_path = $path_dokumen_sk_pns_lama;
		}

		if (!empty($_FILES['dokumen_spmt_baru']['name']))
		{
			$config2 = ['upload_path' => './dokumen_pns/', 'allowed_types' => 'txt|doc|rtf|pdf'];
			$this->load->library('upload', $config2);
			$this->upload->do_upload('dokumen_spmt_baru');
			$dokumen_spmt_baru = $this->upload->data();
			$dokumen_spmt_baru_nama = $dokumen_spmt_baru['file_name'];
			$dokumen_spmt_baru_path = $dokumen_spmt_baru['full_path'];
		}
		else
		{
			$dokumen_spmt_baru_nama = $dokumen_spmt_lama;
			$dokumen_spmt_baru_path = $path_dokumen_spmt_lama;
		}

		$data_pns = ['golongan_ruang' => $golongan,
					'no_sk_pns' => $no_sk_pns,
					'tanggal_sk_pns' => $tanggal_sk_pns,
					'nomor_persetujuan' => $nomor_persetujuan,
					'tanggal_persetujuan' => $tanggal_persetujuan,
					'gaji_pokok' => $gaji_pokok,
					'tmt_golongan' => $tmt_golongan,
					'masa_kerja_tahun' => $masa_kerja_tahun,
					'masa_kerja_bulan' => $masa_kerja_bulan,
					'pejabat_penandatangan_sk' => $pejabat_penandatangan_sk,
					'dokumen_sk_pns' => $dokumen_sk_pns_baru_nama,
					'path_dokumen_sk_pns' => $dokumen_sk_pns_baru_path,
					'tanggal_spmt' => $tanggal_spmt,
					'tmt_spmt' => $tmt_spmt,
					'pejabat_spmt' => $pejabat_spmt,
					'nomor_spmt' => $nomor_spmt,
					'dokumen_spmt' => $dokumen_spmt_baru_nama,
					'path_dokumen_spmt' => $dokumen_spmt_baru_path,
					'kelompok_jabatan' => $kjabatan,
					'jabatan' => $jabatan,
					'tmt_selesai' => $tmt_selesai,
					'pejabat_sk' => $pejabat_sk];
		$this->db->where('id_pegawai', $id);
		$this->db->update('pns', $data_pns);
	}
}