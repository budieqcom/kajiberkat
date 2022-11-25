<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pegawai_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	
	public function profilPNS($id_pns='')
	{
		return $this->db->get_where('biodata_pegawai', ['id' => $id_pns])->row_array();
	}

	public function jumlahDataPangkat($id_pns)
	{
		return $this->db->get_where('pangkat', ['id_pegawai' => $id_pns])->num_rows();
	}

	public function jumlahDataJabatan($id_pns)
	{
		return $this->db->get_where('jabatan3', ['id_pegawai' => $id_pns])->num_rows();
	}

	public function jumlahDataKGB($id_pns)
	{
		return $this->db->get_where('kgb', ['id_pegawai' => $id_pns])->num_rows();
	}

	public function updateBiodata()
	{
		$id = $this->input->post('id');
		$foto_lama = $this->input->post('foto_lama');
		$gelar_depan = $this->input->post('gelar_depan');
		$gelar_belakang = $this->input->post('gelar_belakang');
		$nama_lengkap = $this->input->post('nama_lengkap');
		$nik = $this->input->post('nik');
		$nip = $this->input->post('nip');
		$agama = $this->input->post('agama');
		$status_perkawinan = $this->input->post('status_perkawinan');
		$no_telepon = $this->input->post('no_telepon');
		$no_hp = $this->input->post('no_hp');
		$tempat_lahir = $this->input->post('tempat_lahir');
		$tanggal_lahir = tgl_sql($this->input->post('tanggal_lahir'));
		$jenis_kelamin = $this->input->post('jenis_kelamin');
		$tingkat_pendidikan = $this->input->post('tingkat_pendidikan');
		$email = $this->input->post('email');
		$pass = $this->input->post('pass');
		$foto_baru_nama = "";
		$foto_baru_path = "";

		if (!empty($_FILES['foto_baru']['name']))
		{
			if ($foto_lama != 'no-image.jpg')
			{
				unlink('dokumen_foto/'.$foto_lama);
				$config = ['upload_path' => './dokumen_foto/', 'allowed_types' => 'gif|jpg|png'];
				$this->load->library('upload', $config);
				$this->upload->do_upload('foto_baru');
				$foto_baru = $this->upload->data();
				$foto_baru_nama = $foto_baru['file_name'];
				$foto_baru_path = $foto_baru['full_path'];
			}
			else
			{
				$config = ['upload_path' => './dokumen_foto/', 'allowed_types' => 'gif|jpg|png'];
				$this->load->library('upload', $config);
				$this->upload->do_upload('foto_baru');
				$foto_baru = $this->upload->data();
				$foto_baru_nama = $foto_baru['file_name'];
				$foto_baru_path = $foto_baru['full_path'];
			}
		}
		else
		{
			$foto_baru_nama = $foto_lama;
			$foto_baru_path = "";
		}

		$data_pegawai = ['gelar_depan' => $gelar_depan,
						'gelar_belakang' => $gelar_belakang,
						'nama_lengkap' => $nama_lengkap,
						'nik' => $nik,
						'nip' => $nip,
						'agama' => $agama,
						'status_perkawinan' => $status_perkawinan,
						'nomor_telepon' => $no_telepon,
						'nomor_hp' => $no_hp,
						'tempat_lahir' => $tempat_lahir,
						'tanggal_lahir' => $tanggal_lahir,
						'jenis_kelamin' => $jenis_kelamin,
						'tingkat_pendidikan' => $tingkat_pendidikan,
						'email' => $email,
						'pass' => $pass,
						'file_foto' => $foto_baru_nama,
						'path_file_foto' => $foto_baru_path];
		$this->db->where('id', $id);
		$this->db->update('biodata_pegawai', $data_pegawai);
	}	
}
