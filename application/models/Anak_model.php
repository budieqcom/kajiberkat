<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Anak_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	
	public function dataAnak($id_pns)
	{
		return $this->db->get_where('anak', ['id_pegawai' => $id_pns])->result_array();
	}

	public function prosesTambahAnak()
	{
		$id_pegawai = $this->input->post('id_pegawai');
		$nip_pegawai = $this->input->post('nip_pegawai');
		$nama = $this->input->post('nama_anak');
		$hubungan_keluarga = $this->input->post('hubungan_keluarga');
		$jenis_kelamin = $this->input->post('jenis_kelamin');
		$urutan = $this->input->post('urutan');
		$nik = $this->input->post('nik');
		$pekerjaan = $this->input->post('pekerjaan');
		$tempat_lahir = $this->input->post('tempat_lahir');
		$tanggal_lahir = tgl_sql($this->input->post('tanggal_lahir'));
		$agama = $this->input->post('agama');
		$status_sehat = $this->input->post('status_sehat');
		$pendidikan = $this->input->post('pendidikan');
		$masih_hidup = $this->input->post('masih_hidup');
		$berhak_tunjangan = $this->input->post('berhak_tunjangan');
		$status_perkawinan = $this->input->post('status_perkawinan');
		$file_foto_nama = "";
		$file_foto_path = "";
		$dokumen_anak_nama = "";
		$dokumen_anak_path = "";
		if (!empty($_FILES['file_foto']['name']))
		{
			$config1 = ['upload_path' => './dokumen_anak/', 'allowed_types' => 'gif|jpg|png|txt|doc|rtf|pdf'];
			$this->load->library('upload', $config1);
			$this->upload->do_upload('file_foto');
			$file_foto = $this->upload->data();
			$file_foto_nama = $file_foto['file_name'];
			$file_foto_path = $file_foto['full_path'];	
		}
		else
		{
			$file_foto_nama = "no-image.jpg";
			$file_foto_path = "";
		}
		if (!empty($_FILES['dokumen_anak']['name']))
		{
			$config2 = ['upload_path' => './dokumen_anak/', 'allowed_types' => 'gif|jpg|png|txt|doc|rtf|pdf'];
			$this->load->library('upload', $config2);
			$this->upload->do_upload('dokumen_anak');
			$dokumen_anak = $this->upload->data();
			$dokumen_anak_nama = $dokumen_anak['file_name'];
			$dokumen_anak_path = $dokumen_anak['full_path'];
		}
		else
		{
			$dokumen_anak_nama = "";
			$dokumen_anak_path = "";
		}
		$data_anak = ['id' => '',
					'id_pegawai' => $id_pegawai,
					'nip_pegawai' => $nip_pegawai,
					'nama' => $nama,
					'hubungan_keluarga' => $hubungan_keluarga,
					'jenis_kelamin' => $jenis_kelamin,
					'urutan' => $urutan,
					'nik' => $nik,
					'pekerjaan' => $pekerjaan,
					'tempat_lahir' => $tempat_lahir,
					'tanggal_lahir' => $tanggal_lahir,
					'file_foto' => $file_foto_nama,
					'path_file_foto' => $file_foto_path,
					'dokumen_anak' => $dokumen_anak_nama,
					'path_dokumen_anak' => $dokumen_anak_path,
					'agama' => $agama,
					'status_kesehatan' => $status_sehat,
					'pendidikan' => $pendidikan,
					'masih_hidup' => $masih_hidup,
					'berhak_tunjangan' => $berhak_tunjangan,
					'status_perkawinan' => $status_perkawinan];
		$this->db->insert('anak', $data_anak);
	}

	
	public function dataEditAnak($id)
	{
		return $this->db->get_where('anak', ['id' => $id])->row_array();
	}

	public function prosesEditAnak()
	{
		$id_anak = $this->input->post('id_anak');
		$id_pegawai = $this->input->post('id_pegawai');
		$nip_pegawai = $this->input->post('nip_pegawai');
		$nama = $this->input->post('nama_anak');
		$hubungan_keluarga = $this->input->post('hubungan_keluarga');
		$jenis_kelamin = $this->input->post('jenis_kelamin');
		$urutan = $this->input->post('urutan');
		$nik = $this->input->post('nik');
		$pekerjaan = $this->input->post('pekerjaan');
		$tempat_lahir = $this->input->post('tempat_lahir');
		$tanggal_lahir = tgl_sql($this->input->post('tanggal_lahir'));
		$file_foto_lama = $this->input->post('file_foto_lama');
		$path_file_foto_lama = $this->input->post('path_file_foto_lama');
		$dokumen_anak_lama = $this->input->post('dokumen_anak_lama');
		$path_dokumen_anak_lama = $this->input->post('path_dokumen_anak_lama');
		$agama = $this->input->post('agama');
		$status_sehat = $this->input->post('status_sehat');
		$pendidikan = $this->input->post('pendidikan');
		$masih_hidup = $this->input->post('masih_hidup');
		$berhak_tunjangan = $this->input->post('berhak_tunjangan');
		$status_perkawinan = $this->input->post('status_perkawinan');
		$file_foto_baru_nama = "";
		$file_foto_baru_path = "";
		$dokumen_anak_baru_nama = "";
		$dokumen_anak_baru_path = "";
		if (!empty($_FILES['file_foto_baru']['name']))
		{
			$config1 = ['upload_path' => './dokumen_anak/', 'allowed_types' => 'gif|jpg|png|txt|doc|rtf|pdf'];
			$this->load->library('upload', $config1);
			$this->upload->do_upload('file_foto_baru');
			$file_foto_baru = $this->upload->data();
			$file_foto_baru_nama = $file_foto_baru['file_name'];
			$file_foto_baru_path = $file_foto_baru['full_path'];
		}
		else
		{
			$file_foto_baru_nama = $file_foto_lama;
			$file_foto_baru_path = $path_file_foto_lama;
		}
		if (!empty($_FILES['dokumen_anak_baru']['name']))
		{
			$config2 = ['upload_path' => './dokumen_anak/', 'allowed_types' => 'gif|jpg|png|txt|doc|rtf|pdf'];
			$this->load->library('upload', $config2);
			$this->upload->do_upload('dokumen_anak_baru');
			$dokumen_anak_baru = $this->upload->data();
			$dokumen_anak_baru_nama = $dokumen_anak_baru['file_name'];
			$dokumen_anak_baru_path = $dokumen_anak_baru['full_path'];
		}
		else
		{
			$dokumen_anak_baru_nama = $dokumen_anak_lama;
			$dokumen_anak_baru_path = $path_dokumen_anak_lama;
		}
		$data_anak = ['nama' => $nama,
					'hubungan_keluarga' => $hubungan_keluarga,
					'jenis_kelamin' => $jenis_kelamin,
					'urutan' => $urutan,
					'nik' => $nik,
					'pekerjaan' => $pekerjaan,
					'tempat_lahir' => $tempat_lahir,
					'tanggal_lahir' => $tanggal_lahir,
					'file_foto' => $file_foto_baru_nama,
					'path_file_foto' => $file_foto_baru_path,
					'dokumen_anak' => $dokumen_anak_baru_nama,
					'path_dokumen_anak' => $dokumen_anak_baru_path,
					'agama' => $agama,
					'status_kesehatan' => $status_sehat,
					'pendidikan' => $pendidikan,
					'masih_hidup' => $masih_hidup,
					'berhak_tunjangan' => $berhak_tunjangan,
					'status_perkawinan' => $status_perkawinan];
		$this->db->where('id', $id_anak);
		$this->db->update('anak', $data_anak);
	}

	public function hapusAnak($id)
	{
		$data_anak = $this->dataEditAnak($id);
		if (!empty($data_anak['file_foto']))
		{
			unlink('dokumen_anak/'.$data_anak['file_foto']);
		}
		if (!empty($data_anak['dokumen_anak']))
		{
			unlink('dokumen_anak/'.$data_anak['dokumen_anak']);
		}
		return $this->db->delete('anak', ['id' => $id]);
	}
}
