<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jabatan_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	
	public function dataJabatan($id_pns)
	{
		return $this->db->get_where('jabatan3', ['id_pegawai' => $id_pns])->result_array();
	}

	public function prosesTambahJabatan()
	{
		$id_pegawai = $this->input->post('id_pegawai');
		$nip_pegawai = $this->input->post('nip_pegawai');
		$kelompok_jabatan = $this->input->post('kelompok_jabatan');
		$flag_aktif = $this->input->post('flag_aktif');
		$unit_kerja = $this->input->post('unit_kerja');
		$jabatan = $this->input->post('jabatan');
		$tmt_mulai = tgl_sql($this->input->post('tmt_mulai'));
		$tmt_selesai = tgl_sql($this->input->post('tmt_selesai'));
		$tanggal_pelantikan = tgl_sql($this->input->post('tanggal_pelantikan'));
		$tanggal_sk = tgl_sql($this->input->post('tanggal_sk'));
		$nomor_sk = $this->input->post('nomor_sk');
		$pejabat_sk = $this->input->post('pejabat_sk');
		$tanggal_spp = tgl_sql($this->input->post('tanggal_spp'));
		$nomor_spp = $this->input->post('nomor_spp');
		$pejabat_spp = $this->input->post('pejabat_spp');
		$tanggal_spmt = tgl_sql($this->input->post('tanggal_spmt'));
		$tmt_spmt = tgl_sql($this->input->post('tmt_spmt'));
		$nomor_spmt = $this->input->post('nomor_spmt');
		$pejabat_spmt = $this->input->post('pejabat_spmt');
		$tanggal_spmj = tgl_sql($this->input->post('tanggal_spmj'));
		$nomor_spmj = $this->input->post('nomor_spmj');
		$pejabat_spmj = $this->input->post('pejabat_spmj');
		$dokumen_sk_nama = "";
		$dokumen_sk_path = "";
		$dokumen_spp_nama = "";
		$dokumen_spp_path = "";
		$dokumen_spmt_nama = "";
		$dokumen_spmt_path = "";
		$dokumen_spmj_nama = "";
		$dokumen_spmj_path = "";
		if (!empty($_FILES['dokumen_sk']['name']))
		{
			$config1 = ['upload_path' => './dokumen_jabatan/', 'allowed_types' => 'txt|doc|rtf|pdf'];
			$this->load->library('upload', $config1);
			$this->upload->do_upload('dokumen_sk');
			$dokumen_sk = $this->upload->data();
			$dokumen_sk_nama = $dokumen_sk['file_name'];
			$dokumen_sk_path = $dokumen_sk['full_path'];
		}
		else
		{
			$dokumen_sk_nama = "";
			$dokumen_sk_path = "";
		}
		if (!empty($_FILES['dokumen_spp']['name']))
		{
			$config2 = ['upload_path' => './dokumen_jabatan/', 'allowed_types' => 'txt|doc|rtf|pdf'];
			$this->load->library('upload', $config2);
			$this->upload->do_upload('dokumen_spp');
			$dokumen_spp = $this->upload->data();
			$dokumen_spp_nama = $dokumen_spp['file_name'];
			$dokumen_spp_path = $dokumen_spp['full_path'];
		}
		else
		{
			$dokumen_spp_nama = "";
			$dokumen_spp_path = "";
		}
		if (!empty($_FILES['dokumen_spmt']['name']))
		{
			$config3 = ['upload_path' => './dokumen_jabatan/', 'allowed_types' => 'txt|doc|rtf|pdf'];
			$this->load->library('upload', $config3);
			$this->upload->do_upload('dokumen_spmt');
			$dokumen_spmt = $this->upload->data();
			$dokumen_spmt_nama = $dokumen_spmt['file_name'];
			$dokumen_spmt_path = $dokumen_spmt['full_path'];
		}
		else
		{
			$dokumen_spmt_nama = "";
			$dokumen_spmt_path = "";
		}
		if (!empty($_FILES['dokumen_spmj']['name']))
		{
			$config4 = ['upload_path' => './dokumen_jabatan/', 'allowed_types' => 'txt|doc|rtf|pdf'];
			$this->load->library('upload', $config4);
			$this->upload->do_upload('dokumen_spmj');
			$dokumen_spmj = $this->upload->data();
			$dokumen_spmj_nama = $dokumen_spmj['file_name'];
			$dokumen_spmj_path = $dokumen_spmj['full_path'];
		}
		else
		{
			$dokumen_spmj_nama = "";
			$dokumen_spmj_path = "";
		}
		$data_jabatan = ['id' => '',
						'id_pegawai' => $id_pegawai,
						'nip_pegawai' => $nip_pegawai,
						'kelompok_jabatan' => $kelompok_jabatan,
						'flag_aktif' => $flag_aktif,
						'jabatan' => $jabatan,
						'unit_kerja' => $unit_kerja,
						'tmt_mulai' => $tmt_mulai,
						'tmt_selesai' => $tmt_selesai,
						'tanggal_sk' => $tanggal_sk,
						'nomor_sk' => $nomor_sk,
						'pejabat_sk' => $pejabat_sk,
						'dokumen_sk' => $dokumen_sk_nama,
						'path_dokumen_sk' => $dokumen_sk_path,
						'tanggal_pelantikan' => $tanggal_pelantikan,
						'tanggal_spp' => $tanggal_spp,
						'nomor_spp' => $nomor_spp,
						'pejabat_spp' => $pejabat_spp,
						'dokumen_spp' => $dokumen_spp_nama,
						'path_dokumen_spp' => $dokumen_spp_path,
						'tanggal_spmt' => $tanggal_spmt,
						'tmt_spmt' => $tmt_spmt,
						'pejabat_spmt' => $pejabat_spmt,
						'nomor_spmt' => $nomor_spmt,
						'dokumen_spmt' => $dokumen_spmt_nama,
						'path_dokumen_spmt' => $dokumen_spmt_path,
						'tanggal_spmj' => $tanggal_spmj,
						'nomor_spmj' => $nomor_spmj,
						'pejabat_spmj' => $pejabat_spmj,
						'dokumen_spmj' => $dokumen_spmj_nama,
						'path_dokumen_spmj' => $dokumen_spmj_path];
		$this->db->insert('jabatan3', $data_jabatan);
	}

	public function dataEditJabatan($id)
	{
		return $this->db->get_where('jabatan3', ['id' => $id])->row_array();
	}

	public function prosesEditJabatan()
	{
		$id_jabatan = $this->input->post('id_jabatan');
		$id_pegawai = $this->input->post('id_pegawai');
		$nip_pegawai = $this->input->post('nip_pegawai');
		$kelompok_jabatan = $this->input->post('kelompok_jabatan');
		$flag_aktif = $this->input->post('flag_aktif');
		$unit_kerja = $this->input->post('unit_kerja');
		$jabatan = $this->input->post('jabatan');
		$tmt_mulai = tgl_sql($this->input->post('tmt_mulai'));
		$tmt_selesai = tgl_sql($this->input->post('tmt_selesai'));
		$tanggal_pelantikan = tgl_sql($this->input->post('tanggal_pelantikan'));
		$tanggal_sk = tgl_sql($this->input->post('tanggal_sk'));
		$nomor_sk = $this->input->post('nomor_sk');
		$pejabat_sk = $this->input->post('pejabat_sk');
		$tanggal_spp = tgl_sql($this->input->post('tanggal_spp'));
		$nomor_spp = $this->input->post('nomor_spp');
		$pejabat_spp = $this->input->post('pejabat_spp');
		$tanggal_spmt = tgl_sql($this->input->post('tanggal_spmt'));
		$tmt_spmt = tgl_sql($this->input->post('tmt_spmt'));
		$nomor_spmt = $this->input->post('nomor_spmt');
		$pejabat_spmt = $this->input->post('pejabat_spmt');
		$tanggal_spmj = tgl_sql($this->input->post('tanggal_spmj'));
		$nomor_spmj = $this->input->post('nomor_spmj');
		$pejabat_spmj = $this->input->post('pejabat_spmj');
		$dokumen_sk_lama = $this->input->post('dokumen_sk_lama');
		$path_dokumen_sk_lama = $this->input->post('path_dokumen_sk_lama');
		$dokumen_spp_lama = $this->input->post('dokumen_spp_lama');
		$path_dokumen_spp_lama = $this->input->post('path_dokumen_spp_lama');
		$dokumen_spmt_lama = $this->input->post('dokumen_spmt_lama');
		$path_dokumen_spmt_lama = $this->input->post('path_dokumen_spmt_lama');
		$dokumen_spmj_lama = $this->input->post('dokumen_spmj_lama');
		$path_dokumen_spmj_lama = $this->input->post('path_dokumen_spmj_lama');
		$dokumen_sk_baru_nama = "";
		$dokumen_sk_baru_path = "";
		$dokumen_spp_baru_nama = "";
		$dokumen_spp_baru_path = "";
		$dokumen_spmt_baru_nama = "";
		$dokumen_spmt_baru_path = "";
		$dokumen_spmj_baru_nama = "";
		$dokumen_spmj_baru_path = "";
		if (!empty($_FILES['dokumen_sk_baru']['name']))
		{
			$config1 = ['upload_path' => './dokumen_jabatan/', 'allowed_types' => 'txt|doc|rtf|pdf'];
			$this->load->library('upload', $config1);
			$this->upload->do_upload('dokumen_sk_baru');
			$dokumen_sk_baru = $this->upload->data();
			$dokumen_sk_baru_nama = $dokumen_sk_baru['file_name'];
			$dokumen_sk_baru_path = $dokumen_sk_baru['full_path'];
		}
		else
		{
			$dokumen_sk_baru_nama = $dokumen_sk_lama;
			$dokumen_sk_baru_path = $path_dokumen_sk_lama;
		}
		if (!empty($_FILES['dokumen_spp_baru']['name']))
		{
			$config2 = ['upload_path' => './dokumen_jabatan/', 'allowed_types' => 'txt|doc|rtf|pdf'];
			$this->load->library('upload', $config2);
			$this->upload->do_upload('dokumen_spp_baru');
			$dokumen_spp_baru = $this->upload->data();
			$dokumen_spp_baru_nama = $dokumen_spp_baru['file_name'];
			$dokumen_spp_baru_path = $dokumen_spp_baru['full_path'];
		}
		else
		{
			$dokumen_spp_baru_nama = $dokumen_spp_lama;
			$dokumen_spp_baru_path = $path_dokumen_spp_lama;
		}
		if (!empty($_FILES['dokumen_spmt_baru']['name']))
		{
			$config3 = ['upload_path' => './dokumen_jabatan/', 'allowed_types' => 'txt|doc|rtf|pdf'];
			$this->load->library('upload', $config3);
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
		if (!empty($_FILES['dokumen_spmj_baru']['name']))
		{
			$config4 = ['upload_path' => './dokumen_jabatan/', 'allowed_types' => 'txt|doc|rtf|pdf'];
			$this->load->library('upload', $config4);
			$this->upload->do_upload('dokumen_spmj_baru');
			$dokumen_spmj_baru = $this->upload->data();
			$dokumen_spmj_baru_nama = $dokumen_spmj_baru['file_name'];
			$dokumen_spmj_baru_path = $dokumen_spmj_baru['full_path'];
		}
		else
		{
			$dokumen_spmj_baru_nama = $dokumen_spmj_lama;
			$dokumen_spmj_path = $path_dokumen_spmj_lama;
		}
		$data_jabatan = ['kelompok_jabatan' => $kelompok_jabatan,
						'flag_aktif' => $flag_aktif,
						'jabatan' => $jabatan,
						'unit_kerja' => $unit_kerja,
						'tmt_mulai' => $tmt_mulai,
						'tmt_selesai' => $tmt_selesai,
						'tanggal_sk' => $tanggal_sk,
						'nomor_sk' => $nomor_sk,
						'pejabat_sk' => $pejabat_sk,
						'dokumen_sk' => $dokumen_sk_baru_nama,
						'path_dokumen_sk' => $dokumen_sk_baru_path,
						'tanggal_pelantikan' => $tanggal_pelantikan,
						'tanggal_spp' => $tanggal_spp,
						'nomor_spp' => $nomor_spp,
						'pejabat_spp' => $pejabat_spp,
						'dokumen_spp' => $dokumen_spp_baru_nama,
						'path_dokumen_spp' => $dokumen_spp_baru_path,
						'tanggal_spmt' => $tanggal_spmt,
						'tmt_spmt' => $tmt_spmt,
						'pejabat_spmt' => $pejabat_spmt,
						'nomor_spmt' => $nomor_spmt,
						'dokumen_spmt' => $dokumen_spmt_baru_nama,
						'path_dokumen_spmt' => $dokumen_spmt_baru_path,
						'tanggal_spmj' => $tanggal_spmj,
						'nomor_spmj' => $nomor_spmj,
						'pejabat_spmj' => $pejabat_spmj,
						'dokumen_spmj' => $dokumen_spmj_baru_nama,
						'path_dokumen_spmj' => $dokumen_spmj_baru_path];
		$this->db->where('id', $id_jabatan);
		$this->db->update('jabatan3', $data_jabatan);
	}

	public function hapusJabatan($id)
	{
		$data_jabatan = $this->dataEditJabatan($id);
		if (!empty($data_jabatan['dokumen_sk']))
		{
			unlink('dokumen_jabatan/'.$data_jabatan['dokumen_sk']);
		}
		if (!empty($data_jabatan['dokumen_spp']))
		{
			unlink('dokumen_jabatan/'.$data_jabatan['dokumen_spp']);
		}
		if (!empty($data_jabatan['dokumen_spmt']))
		{
			unlink('dokumen_jabatan/'.$data_jabatan['dokumen_spmt']);
		}
		if (!empty($data_jabatan['dokumen_spmj']))
		{
			unlink('dokumen_jabatan/'.$data_jabatan['dokumen_spmj']);
		}
		return $this->db->delete('jabatan3', ['id' => $id]);
	}
}
