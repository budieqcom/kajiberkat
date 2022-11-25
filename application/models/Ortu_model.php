<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ortu_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	
	public function dataOrtu($id_pns)
	{
		return $this->db->get_where('orang_tua', ['id_pegawai' => $id_pns])->result_array();
	}

	public function prosesTambahOrtu()
	{
		$id_pegawai = $this->input->post('id_pegawai');
		$nip_pegawai = $this->input->post('nip_pegawai');
		$nama = $this->input->post('nama');
		$hubungan_keluarga = $this->input->post('hubungan_keluarga');
		$nik = $this->input->post('nik');
		$alamat_kantor = $this->input->post('alamat_kantor');
		$pekerjaan = $this->input->post('pekerjaan');
		$tempat_lahir = $this->input->post('tempat_lahir');
		$tanggal_lahir = tgl_sql($this->input->post('tanggal_lahir'));
		$agama = $this->input->post('agama');
		$status_sehat = $this->input->post('status_sehat');
		$masih_hidup = $this->input->post('masih_hidup');
		$status_perkawinan = $this->input->post('status_perkawinan');
		$file_foto_nama = "";
		$file_foto_path = "";
		if (!empty($_FILES['file_foto']['name']))
		{
			$config = ['upload_path' => './dokumen_ortu/', 'allowed_types' => 'gif|jpg|png|txt|doc|rtf|pdf'];
			$this->load->library('upload', $config);
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
		$data_ortu = ['id' => '',
					'id_pegawai' => $id_pegawai,
					'nip_pegawai' => $nip_pegawai,
					'nama' => $nama,
					'hubungan_keluarga' => $hubungan_keluarga,
					'nik' => $nik,
					'pekerjaan' => $pekerjaan,
					'alamat_kantor' => $alamat_kantor,
					'tempat_lahir' => $tempat_lahir,
					'tanggal_lahir' => $tanggal_lahir,
					'file_foto' => $file_foto_nama,
					'path_file_foto' => $file_foto_path,
					'agama' => $agama,
					'status_kesehatan' => $status_sehat,
					'masih_hidup' => $masih_hidup,
					'status_perkawinan' => $status_perkawinan];
		$this->db->insert('orang_tua', $data_ortu);
	}

	public function dataEditOrtu($id)
	{
		return $this->db->get_where('orang_tua', ['id' => $id])->row_array();
	}

	public function prosesEditOrtu()
	{
		$id_ortu = $this->input->post('id_ortu');
		$id_pegawai = $this->input->post('id_pegawai');
		$nip_pegawai = $this->input->post('nip_pegawai');
		$nama = $this->input->post('nama');
		$hubungan_keluarga = $this->input->post('hubungan_keluarga');
		$nik = $this->input->post('nik');
		$alamat_kantor = $this->input->post('alamat_kantor');
		$pekerjaan = $this->input->post('pekerjaan');
		$tempat_lahir = $this->input->post('tempat_lahir');
		$tanggal_lahir = tgl_sql($this->input->post('tanggal_lahir'));
		$file_foto_lama = $this->input->post('file_foto_lama');
		$path_file_foto_lama = $this->input->post('path_file_foto_lama');
		$agama = $this->input->post('agama');
		$status_sehat = $this->input->post('status_sehat');
		$masih_hidup = $this->input->post('masih_hidup');
		$status_perkawinan = $this->input->post('status_perkawinan');
		if (!empty($_FILES['file_foto_baru']['name']))
		{
			$config = ['upload_path' => './dokumen_ortu/', 'allowed_types' => 'gif|jpg|png|txt|doc|rtf|pdf'];
			$this->load->library('upload', $config);
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
		$data_ortu = ['nama' => $nama,
					'hubungan_keluarga' => $hubungan_keluarga,
					'nik' => $nik,
					'pekerjaan' => $pekerjaan,
					'alamat_kantor' => $alamat_kantor,
					'tempat_lahir' => $tempat_lahir,
					'tanggal_lahir' => $tanggal_lahir,
					'file_foto' => $file_foto_baru_nama,
					'path_file_foto' => $file_foto_baru_path,
					'agama' => $agama,
					'status_kesehatan' => $status_sehat,
					'masih_hidup' => $masih_hidup,
					'status_perkawinan' => $status_perkawinan];
		$this->db->where('id', $id_ortu);
		$this->db->update('orang_tua', $data_ortu);
	}


	public function hapusOrtu($id)
	{
		$data_ortu = $this->dataEditOrtu($id);
		if (!empty($data_ortu['file_foto']))
		{
			unlink('dokumen_ortu/'.$data_ortu['file_foto']);
		}
		return $this->db->delete('orang_tua', ['id' => $id]);
	}
}
