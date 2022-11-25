<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pangkat_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	
	public function dataPangkat($id_pns)
	{
		return $this->db->get_where('pangkat', ['id_pegawai' => $id_pns])->result_array();
	}

	public function tambahPangkat()
	{
		$id_pns = $this->input->post('id_pns');
		$nip_pns = $this->input->post('nip_pns');
		$jenis_pangkat = $this->input->post('jenis_pangkat');
		$golongan_ruang = $this->input->post('golongan_ruang');
		$tmt_golongan = tgl_sql($this->input->post('tmt_golongan'));
		$tmt_golongan_berikut = pangkat_berikut($tmt_golongan);
		$gaji_pokok = str_replace(".","",$this->input->post('gaji_pokok'));
		$pejabat_penandatangan_sk = $this->input->post('pejabat_penandatangan_sk');
		$no_sk_pangkat = $this->input->post('no_sk_pangkat');
		$tanggal_sk_pangkat = tgl_sql($this->input->post('tanggal_sk_pangkat'));
		$nomor_persetujuan = $this->input->post('nomor_persetujuan');
		$tanggal_persetujuan = tgl_sql($this->input->post('tanggal_persetujuan'));
		$masa_kerja_tahun = $this->input->post('masa_kerja_tahun');
		$masa_kerja_bulan = $this->input->post('masa_kerja_bulan');
		$dokumen_sk_pangkat_nama = "";
		$dokumen_sk_pangkat_path = "";
		$dokumen_persetujuan_nama = "";
		$dokumen_persetujuan_path = "";

		if (!empty($_FILES['dokumen_sk_pangkat']['name']))
		{
			$config1 = ['upload_path' => './dokumen_pangkat/', 'allowed_types' => 'txt|doc|rtf|pdf'];
			$this->load->library('upload', $config1);
			$this->upload->do_upload('dokumen_sk_pangkat');
			$dokumen_sk_pangkat = $this->upload->data();
			$dokumen_sk_pangkat_nama = $dokumen_sk_pangkat['file_name'];
			$dokumen_sk_pangkat_path = $dokumen_sk_pangkat['full_path'];
		}
		else
		{
			$dokumen_sk_pangkat_name = "";
			$dokumen_sk_pangkat_path = "";
		}
		
		if (!empty($_FILES['dokumen_persetujuan']['name']))
		{
			$config2 = ['upload_path' => './dokumen_pangkat/', 'allowed_types' => 'txt|doc|rtf|pdf'];
			$this->load->library('upload', $config2);
			$this->upload->do_upload('dokumen_persetujuan');
			$dokumen_persetujuan = $this->upload->data();
			$dokumen_persetujuan_nama = $dokumen_persetujuan['file_name'];
			$dokumen_persetujuan_path = $dokumen_persetujuan['full_path'];	
		}
		else
		{
			$dokumen_persetujuan_nama = "";
			$dokumen_persetujuan_path = "";
		}
		
		$data_pangkat = ['id' => '',
						'id_pegawai' => $id_pns,
						'nip_pegawai' => $nip_pns,
						'jenis_pangkat' => $jenis_pangkat,
						'golongan_ruang' => $golongan_ruang,
						'tmt_golongan' => $tmt_golongan,
						'tmt_golongan_berikut' => $tmt_golongan_berikut,
						'gaji_pokok' => $gaji_pokok,
						'pejabat_penandatangan_sk' => $pejabat_penandatangan_sk,
						'no_sk_pangkat' => $no_sk_pangkat,
						'tanggal_sk_pangkat' => $tanggal_sk_pangkat,
						'nomor_persetujuan' => $nomor_persetujuan,
						'tanggal_persetujuan' => $tanggal_persetujuan,
						'masa_kerja_tahun' => $masa_kerja_tahun,
						'masa_kerja_bulan' => $masa_kerja_bulan,
						'dokumen_sk_pangkat' => $dokumen_sk_pangkat_nama,
						'path_dokumen_sk_pangkat' => $dokumen_sk_pangkat_path,
						'dokumen_persetujuan' => $dokumen_persetujuan_nama,
						'path_dokumen_persetujuan' => $dokumen_persetujuan_path];
		$this->db->insert('pangkat', $data_pangkat);
	}

	public function dataEditPangkat($id)
	{
		return $this->db->get_where('pangkat', ['id' => $id])->row_array();
	}

	public function prosesEditPangkat()
	{
		$id = $this->input->post('id_pangkat');
		$id_pegawai = $this->input->post('id_pns');
		$nip_pegawai = $this->input->post('nip_pns');
		$dokumen_sk_pangkat_lama = $this->input->post('dokumen_sk_pangkat_lama');
		$path_dokumen_sk_pangkat_lama = $this->input->post('path_dokumen_sk_pangkat_lama');
		$dokumen_persetujuan_lama = $this->input->post('dokumen_persetujuan_lama');
		$path_dokumen_persetujuan_lama = $this->input->post('path_dokumen_persetujuan_lama');
		$jenis_pangkat = $this->input->post('jenis_pangkat');
		$golongan_ruang = $this->input->post('golongan_ruang');
		$tmt_golongan = tgl_sql($this->input->post('tmt_golongan'));
		$tmt_golongan_berikut = pangkat_berikut($tmt_golongan);
		$gaji_pokok = str_replace(".", "", $this->input->post('gaji_pokok'));
		$pejabat_penandatangan_sk = $this->input->post('pejabat_penandatangan_sk');
		$no_sk_pangkat = $this->input->post('no_sk_pangkat');
		$tanggal_sk_pangkat = tgl_sql($this->input->post('tanggal_sk_pangkat'));
		$nomor_persetujuan = $this->input->post('nomor_persetujuan');
		$tanggal_persetujuan = tgl_sql($this->input->post('tanggal_persetujuan'));
		$masa_kerja_tahun = $this->input->post('masa_kerja_tahun');
		$masa_kerja_bulan = $this->input->post('masa_kerja_bulan');
		$dokumen_sk_pangkat_baru_nama = "";
		$dokumen_sk_pangkat_baru_path = "";
		$dokumen_persetujuan_baru_nama = "";
		$dokumen_persetujuan_baru_path = "";
		
		if (!empty($_FILES['dokumen_sk_pangkat_baru']['name']))
		{
			$config1 = ['upload_path' => './dokumen_pangkat/', 'allowed_types' => 'txt|doc|rtf|pdf'];
			$this->load->library('upload', $config1);
			$this->upload->do_upload('dokumen_sk_pangkat_baru');
			$dokumen_sk_pangkat_baru = $this->upload->data();
			$dokumen_sk_pangkat_baru_nama = $dokumen_sk_pangkat_baru['file_name'];
			$dokumen_sk_pangkat_baru_path = $dokumen_sk_pangkat_baru['full_path'];
		}
		else
		{
			$dokumen_sk_pangkat_baru_nama = $dokumen_sk_pangkat_lama;
			$dokumen_sk_pangkat_baru_path = $path_dokumen_sk_pangkat_lama;
		}

		if (!empty($_FILES['dokumen_persetujuan_baru']['name']))
		{
			$config2 = ['upload_path' => './dokumen_pangkat/', 'allowed_types' => 'txt|doc|rtf|pdf'];
			$this->load->library('upload', $config2);
			$this->upload->do_upload('dokumen_persetujuan_baru');
			$dokumen_persetujuan_baru = $this->upload->data();
			$dokumen_persetujuan_baru_nama = $dokumen_persetujuan_baru['file_name'];
			$dokumen_persetujuan_baru_path = $dokumen_persetujuan_baru['full_path'];
		}
		else
		{
			$dokumen_persetujuan_baru_nama = $dokumen_persetujuan_lama;
			$dokumen_persetujuan_baru_path = $path_dokumen_persetujuan_lama;
		}

		$data_pangkat = ['jenis_pangkat' => $jenis_pangkat,
						'golongan_ruang' => $golongan_ruang,
						'tmt_golongan' => $tmt_golongan,
						'tmt_golongan_berikut' => $tmt_golongan_berikut,
						'gaji_pokok' => $gaji_pokok,
						'pejabat_penandatangan_sk' => $pejabat_penandatangan_sk,
						'no_sk_pangkat' => $no_sk_pangkat,
						'tanggal_sk_pangkat' => $tanggal_sk_pangkat,
						'nomor_persetujuan' => $nomor_persetujuan,
						'tanggal_persetujuan' => $tanggal_persetujuan,
						'masa_kerja_tahun' => $masa_kerja_tahun,
						'masa_kerja_bulan' => $masa_kerja_bulan,
						'dokumen_sk_pangkat' => $dokumen_sk_pangkat_baru_nama,
						'path_dokumen_sk_pangkat' => $dokumen_sk_pangkat_baru_path,
						'dokumen_persetujuan' => $dokumen_persetujuan_baru_nama,
						'path_dokumen_persetujuan' => $dokumen_persetujuan_baru_path];
		$this->db->where('id', $id);
		$this->db->update('pangkat', $data_pangkat);
	}

	public function hapusPangkat($id)
	{
		$data_pangkat = $this->dataEditPangkat($id);
		if (!empty($data_pangkat['dokumen_sk_pangkat']))
		{
			unlink('dokumen_pangkat/'.$data_pangkat['dokumen_sk_pangkat']);
		}
		if (!empty($data_pangkat['dokumen_persetujuan']))
		{
			unlink('dokumen_pangkat/'.$data_pangkat['dokumen_persetujuan']);
		}
		return $this->db->delete('pangkat', ['id' => $id]);
	}
}
