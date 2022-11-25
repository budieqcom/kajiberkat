<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kgb_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	
	public function dataKGB($id_pns)
	{
		return $this->db->get_where('kgb', ['id_pegawai' => $id_pns])->result_array();
	}

	public function prosesTambahKGB()
	{
		$id_pegawai = $this->input->post('id_pegawai');
		$nip_pegawai = $this->input->post('nip_pegawai');
		$golongan = $this->input->post('golongan');
		$gaji_pokok = str_replace(".","",$this->input->post('gaji_pokok'));
		$besaran_gaji = str_replace(".","",$this->input->post('besaran_gaji'));
		$pejabat_kgb = $this->input->post('pejabat_kgb');
		$no_surat_kgb = $this->input->post('no_surat_kgb');
		$tanggal_surat_kgb = tgl_sql($this->input->post('tanggal_surat_kgb'));
		$tmt_kgb = tgl_sql($this->input->post('tmt_kgb'));
		$tmt_kgb_berikut = kgb_berikut($tmt_kgb);
		$dokumen_kgb_nama = "";
		$dokumen_kgb_path = "";
		if (!empty($_FILES['dokumen_kgb']['name']))
		{
			$config = ['upload_path' => './dokumen_kgb/', 'allowed_types' => 'txt|doc|rtf|pdf'];
			$this->load->library('upload', $config);
			$this->upload->do_upload('dokumen_kgb');
			$dokumen_kgb = $this->upload->data();
			$dokumen_kgb_nama = $dokumen_kgb['file_name'];
			$dokumen_kgb_path = $dokumen_kgb['full_path'];
		}
		else
		{
			$dokumen_kgb_nama = "";
			$dokumen_kgb_path = "";
		}
		$data_kgb = ['id' => '',
					'id_pegawai' => $id_pegawai,
					'nip_pegawai' => $nip_pegawai,
					'golongan_ruang' => $golongan,
					'gaji_pokok' => $gaji_pokok,
					'besaran_gaji' => $besaran_gaji,
					'pejabat_kgb' => $pejabat_kgb,
					'nomor_surat_kgb' => $no_surat_kgb,
					'tanggal_surat_kgb' => $tanggal_surat_kgb,
					'tmt_kgb' => $tmt_kgb,
					'tmt_kgb_berikut' => $tmt_kgb_berikut,
					'dokumen_kgb' => $dokumen_kgb_nama,
					'path_dokumen_kgb' => $dokumen_kgb_path];
		$this->db->insert('kgb', $data_kgb);
	}

	public function editDataKGB($id)
	{
		return $this->db->get_where('kgb', ['id' => $id])->row_array();
	}

	public function prosesEditKGB()
	{
		$id_kgb = $this->input->post('id_kgb');
		$id_pegawai = $this->input->post('id_pegawai');
		$nip_pegawai = $this->input->post('nip_pegawai');
		$golongan = $this->input->post('golongan');
		$gaji_pokok = str_replace(".","",$this->input->post('gaji_pokok'));
		$besaran_gaji = str_replace(".","",$this->input->post('besaran_gaji'));
		$pejabat_kgb = $this->input->post('pejabat_kgb');
		$no_surat_kgb = $this->input->post('no_surat_kgb');
		$tanggal_surat_kgb = tgl_sql($this->input->post('tanggal_surat_kgb'));
		$tmt_kgb = tgl_sql($this->input->post('tmt_kgb'));
		$tmt_kgb_berikut = kgb_berikut($tmt_kgb);
		$dokumen_kgb_lama = $this->input->post('dokumen_kgb_lama');
		$path_dokumen_kgb_lama = $this->input->post('path_dokumen_kgb_lama');
		$dokumen_kgb_baru_nama = "";
		$dokumen_kgb_baru_path = "";
		if (!empty($_FILES['dokumen_kgb_baru']['name']))
		{
			$config = ['upload_path' => './dokumen_kgb/', 'allowed_types' => 'txt|doc|rtf|pdf'];
			$this->load->library('upload', $config);
			$this->upload->do_upload('dokumen_kgb_baru');
			$dokumen_kgb_baru = $this->upload->data();
			$dokumen_kgb_baru_nama = $dokumen_kgb_baru['file_name'];
			$dokumen_kgb_baru_path = $dokumen_kgb_baru['full_path'];
		}
		else
		{
			$dokumen_kgb_baru_nama = $dokumen_kgb_lama;
			$dokumen_kgb_baru_path = $path_dokumen_kgb_lama;
		}
		$data_kgb = ['golongan_ruang' => $golongan,
					'gaji_pokok' => $gaji_pokok,
					'besaran_gaji' => $besaran_gaji,
					'pejabat_kgb' => $pejabat_kgb,
					'nomor_surat_kgb' => $no_surat_kgb,
					'tanggal_surat_kgb' => $tanggal_surat_kgb,
					'tmt_kgb' => $tmt_kgb,
					'tmt_kgb_berikut' => $tmt_kgb_berikut,
					'dokumen_kgb' => $dokumen_kgb_baru_nama,
					'path_dokumen_kgb' => $dokumen_kgb_baru_path];
		$this->db->where('id', $id_kgb);
		$this->db->update('kgb', $data_kgb);
	}

	public function hapusKGB($id)
	{
		$data_kgb = $this->EditDataKGB($id);
		if (!empty($data_kgb['dokumen_kgb']))
		{
			unlink('dokumen_kgb/'.$data_kgb['dokumen_kgb']);
		}
		return $this->db->delete('kgb', ['id' => $id]);
	}
}
