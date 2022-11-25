<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pasangan_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	
	public function dataPasangan($id_pns)
	{
		return $this->db->get_where('pasangan', ['id_pegawai' => $id_pns])->result_array();
	}

	public function prosesTambahPasangan()
	{
		$id_pegawai = $this->input->post('id_pegawai');
		$nip_pegawai = $this->input->post('nip_pegawai');
		$nama = $this->input->post('nama_pasangan');
		$hubungan_keluarga = $this->input->post('hubungan_keluarga');
		$nik = $this->input->post('nik');
		$pekerjaan = $this->input->post('pekerjaan');
		$nomor_kartu = $this->input->post('nomor_kartu');
		$alamat_kantor = $this->input->post('alamat_kantor');
		$tempat_lahir = $this->input->post('tempat_lahir');
		$tanggal_lahir = tgl_sql($this->input->post('tanggal_lahir'));
		$agama = $this->input->post('agama');
		$status_sehat = $this->input->post('status_sehat');
		$pendidikan = $this->input->post('pendidikan');
		$masih_hidup = $this->input->post('masih_hidup');
		$berhak_tunjangan = $this->input->post('berhak_tunjangan');
		$status_perkawinan = $this->input->post('status_perkawinan');
		$tanggal_nikah = tgl_sql($this->input->post('tanggal_nikah'));
		$buku_nikah_nama = "";
		$buku_nikah_path = "";
		if (!empty($_FILES['file_foto']['name']))
		{
			$config1 = ['upload_path' => './dokumen_pasangan/', 'allowed_types' => 'gif|jpg|png|txt|doc|rtf|pdf'];
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
		if (!empty($_FILES['buku_nikah']['name']))
		{
			$config2 = ['upload_path' => './dokumen_pasangan/', 'allowed_types' => 'gif|jpg|png|txt|doc|rtf|pdf'];
			$this->load->library('upload', $config2);
			$this->upload->do_upload('buku_nikah');
			$buku_nikah = $this->upload->data();
			$buku_nikah_nama = $buku_nikah['file_name'];
			$buku_nikah_path = $buku_nikah['full_path'];
		}
		else
		{
			$buku_nikah_nama = "";
			$buku_nikah_path = "";
		}
		$data_pasangan = ['id' => '',
						'id_pegawai' => $id_pegawai,
						'nip_pegawai' => $nip_pegawai,
						'nama' => $nama,
						'hubungan_keluarga' => $hubungan_keluarga,
						'nik' => $nik,
						'pekerjaan' => $pekerjaan,
						'nomor_kartu' => $nomor_kartu,
						'alamat_kantor' => $alamat_kantor,
						'tempat_lahir' => $tempat_lahir,
						'tanggal_lahir' => $tanggal_lahir,
						'file_foto' => $file_foto_nama,
						'path_file_foto' => $file_foto_path,
						'buku_nikah' => $buku_nikah_nama,
						'path_buku_nikah' => $buku_nikah_path,
						'agama' => $agama,
						'status_kesehatan' => $status_sehat,
						'pendidikan' => $pendidikan,
						'masih_hidup' => $masih_hidup,
						'berhak_tunjangan' => $berhak_tunjangan,
						'status_perkawinan' => $status_perkawinan,
						'tanggal_nikah' => $tanggal_nikah];
		$this->db->insert('pasangan', $data_pasangan);
	}
	
	public function dataEditPasangan($id)
	{
		return $this->db->get_where('pasangan', ['id' => $id])->row_array();
	}

	public function prosesEditPasangan()
	{
		$id_pasangan = $this->input->post('id_pasangan');
		$id_pegawai = $this->input->post('id_pegawai');
		$nip_pegawai = $this->input->post('nip_pegawai');
		$nama = $this->input->post('nama_pasangan');
		$hubungan_keluarga = $this->input->post('hubungan_keluarga');
		$nik = $this->input->post('nik');
		$pekerjaan = $this->input->post('pekerjaan');
		$nomor_kartu = $this->input->post('nomor_kartu');
		$alamat_kantor = $this->input->post('alamat_kantor');
		$tempat_lahir = $this->input->post('tempat_lahir');
		$tanggal_lahir = tgl_sql($this->input->post('tanggal_lahir'));
		$file_foto_lama = $this->input->post('file_foto_lama');
		$path_file_foto_lama = $this->input->post('path_file_foto_lama');
		$buku_nikah_lama = $this->input->post('buku_nikah_lama');
		$path_buku_nikah_lama = $this->input->post('path_buku_nikah_lama');
		$agama = $this->input->post('agama');
		$status_sehat = $this->input->post('status_sehat');
		$pendidikan = $this->input->post('pendidikan');
		$masih_hidup = $this->input->post('masih_hidup');
		$berhak_tunjangan = $this->input->post('berhak_tunjangan');
		$status_perkawinan = $this->input->post('status_perkawinan');
		$tanggal_nikah = tgl_sql($this->input->post('tanggal_nikah'));
		$file_foto_baru_nama = "";
		$file_foto_baru_path = "";
		$buku_nikah_baru_nama = "";
		$buku_nikah_baru_path = "";
		if (!empty($_FILES['file_foto_baru']['name']))
		{
			$config1 = ['upload_path' => './dokumen_pasangan/', 'allowed_types' => 'gif|jpg|png|txt|doc|rtf|pdf'];
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
		if (!empty($_FILES['buku_nikah_baru']['name']))
		{
			$config2 = ['upload_path' => './dokumen_pasangan/', 'allowed_types' => 'gif|jpg|png|txt|doc|rtf|pdf'];
			$this->load->library('upload', $config2);
			$this->upload->do_upload('buku_nikah_baru');
			$buku_nikah_baru = $this->upload->data();
			$buku_nikah_baru_nama = $buku_nikah_baru['file_name'];
			$buku_nikah_baru_path = $buku_nikah_baru['full_path'];
		}
		else
		{
			$buku_nikah_baru_nama = $buku_nikah_lama;
			$buku_nikah_baru_path = $path_buku_nikah_lama;
		}
		$data_pasangan = ['nama' => $nama,
						'hubungan_keluarga' => $hubungan_keluarga,
						'nik' => $nik,
						'pekerjaan' => $pekerjaan,
						'nomor_kartu' => $nomor_kartu,
						'alamat_kantor' => $alamat_kantor,
						'tempat_lahir' => $tempat_lahir,
						'tanggal_lahir' => $tanggal_lahir,
						'file_foto' => $file_foto_baru_nama,
						'path_file_foto' => $file_foto_baru_path,
						'buku_nikah' => $buku_nikah_baru_nama,
						'path_buku_nikah' => $buku_nikah_baru_path,
						'agama' => $agama,
						'status_kesehatan' => $status_sehat,
						'pendidikan' => $pendidikan,
						'masih_hidup' => $masih_hidup,
						'berhak_tunjangan' => $berhak_tunjangan,
						'status_perkawinan' => $status_perkawinan,
						'tanggal_nikah' => $tanggal_nikah];
		$this->db->where('id', $id_pasangan);
		$this->db->update('pasangan', $data_pasangan);
	}

	public function hapusPasangan($id)
	{
		$data_pasangan = $this->dataEditPasangan($id);
		if (!empty($data_pasangan['file_foto']))
		{
			unlink('dokumen_pasangan/'.$data_pasangan['file_foto']);
		}
		if (!empty($data_pasangan['buku_nikah']))
		{
			unlink('dokumen_pasangan/'.$data_pasangan['buku_nikah']);
		}
		return $this->db->delete('pasangan', ['id' => $id]);
	}
}
