<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cpns_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function dataCPNS($id_pns='')
	{
		return $this->db->get_where('cpns', ['id_pegawai' => $id_pns])->row_array();
	}

	public function updateCPNS()
	{
		$id_cpns = $this->input->post('id');
		$dokumen_lama = $this->input->post('dokumen_lama');
		$path_dokumen_lama = $this->input->post('path_dokumen_lama');
		$golongan = $this->input->post('golongan');
		$tmt_cpns = tgl_sql($this->input->post('tmt_cpns'));
		$no_sk_cpns = $this->input->post('no_sk_cpns');
		$tanggal_sk_cpns = tgl_sql($this->input->post('tanggal_sk_cpns'));
		$dokumen_baru = $this->input->post('dokumen_baru');
		$pejabat_penandatangan_sk = $this->input->post('pejabat_penandatangan_sk');
		$nomor_persetujuan = $this->input->post('nomor_persetujuan');
		$tanggal_persetujuan = tgl_sql($this->input->post('tanggal_persetujuan'));
		$gaji_pokok = str_replace(".","",$this->input->post('gaji_pokok'));
		$masa_kerja = $this->input->post('masa_kerja');
		$dokumen_baru_nama = "";
		$dokumen_baru_path = "";
		if (!empty($_FILES['dokumen_baru']['name']))
		{
			$config = ['upload_path' => './dokumen_cpns/', 'allowed_types' => 'txt|doc|rtf|pdf'];
			$this->load->library('upload', $config);
			$this->upload->do_upload('dokumen_baru');
			$dokumen_baru = $this->upload->data();
			$dokumen_baru_nama = $dokumen_baru['file_name'];
			$dokumen_baru_path = $dokumen_baru['full_path'];
		}
		else
		{
			$dokumen_baru_nama = $dokumen_lama;
			$dokumen_baru_path = $path_dokumen_lama;
		}
		$data_cpns = ['golongan_ruang' => $golongan,
					'no_sk_cpns' => $no_sk_cpns,
					'tanggal_sk_cpns' => $tanggal_sk_cpns,
					'nomor_persetujuan' => $nomor_persetujuan,
					'tanggal_persetujuan' => $tanggal_persetujuan,
					'gaji_pokok' => $gaji_pokok,
					'tmt_golongan' => $tmt_cpns,
					'masa_kerja' => $masa_kerja,
					'pejabat_penandatangan_sk' => $pejabat_penandatangan_sk,
					'dokumen_sk_cpns' => $dokumen_baru_nama,
					'path_dokumen_sk_cpns' => $dokumen_baru_path];
		$this->db->where('id_pegawai', $id_cpns);
		$this->db->update('cpns', $data_cpns);
	}
}
