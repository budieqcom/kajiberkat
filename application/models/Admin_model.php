<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function daftarUser()
	{
		$query = $this->db->query('SELECT id, nip, nama_lengkap, level, file_foto FROM admin UNION ALL SELECT id, nip, nama_lengkap, level, file_foto  FROM biodata_pegawai ORDER BY level, id');
		return $query->result_array();
	}

	public function jumlahAdmin()
	{
		$query = $this->db->query("SELECT COUNT(id) AS jumlah_admin FROM admin");
		return $query->row_array();
	}

	public function jumlahHakim()
	{
		$query = $this->db->query("SELECT COUNT(id) AS jumlah_hakim FROM biodata_pegawai WHERE level='hakim'");
		return $query->row_array();
	}

	public function jumlahPegawai()
	{
		$query = $this->db->query("SELECT COUNT(id) AS jumlah_pegawai FROM biodata_pegawai WHERE level='pegawai'");
		return $query->row_array();
	}

	public function profilAdmin($id_admin = '')
	{
		$query_admin = $this->db->get_where('admin', ['id' => $id_admin]);
		return $query_admin->row_array();
	}

	public function kenaikanPangkat()
	{
		$query = $this->db->query("SELECT 
                                    	pangkat.id_pegawai, 
                                    	pangkat.nip_pegawai,
                                    	CONCAT_WS(' ', (SELECT biodata_pegawai.gelar_depan FROM biodata_pegawai WHERE biodata_pegawai.id=pangkat.id_pegawai), (SELECT biodata_pegawai.nama_lengkap FROM biodata_pegawai WHERE biodata_pegawai.id=pangkat.id_pegawai), (SELECT biodata_pegawai.gelar_belakang FROM biodata_pegawai WHERE biodata_pegawai.id=pangkat.id_pegawai)) AS nama_pegawai,
                                    	pangkat.golongan_ruang, 
                                    	pangkat.tmt_golongan,
                                    	(SELECT pangkat.tmt_golongan + INTERVAL '4' YEAR) AS tmt_golongan_berikut,
                                    	DATEDIFF(tmt_golongan_berikut, CURRENT_DATE()) AS selisih
                                    FROM pangkat
                                    JOIN
                                    	(SELECT pangkat.id_pegawai AS id_pegawai1, 
                                    		pangkat.nip_pegawai AS nip_pegawai1, 
                                    		pangkat.golongan_ruang AS pangkat_pegawai1, 
                                    		MAX(pangkat.tmt_golongan) AS max_tmt_golongan 
                                    	FROM pangkat GROUP BY pangkat.id_pegawai) AS pangkat2
                                    ON pangkat2.id_pegawai1=pangkat.id_pegawai AND pangkat.tmt_golongan=pangkat2.max_tmt_golongan
                                    WHERE DATEDIFF(tmt_golongan_berikut, CURRENT_DATE()) <= '150' AND DATEDIFF(tmt_golongan_berikut, CURRENT_DATE()) > 0");
        return $query->result_array();
	}

	public function kgb()
	{
		$query = $this->db->query("SELECT
	                                    kgb.id_pegawai,
	                                    kgb.nip_pegawai,
	                                    CONCAT_WS(' ', (SELECT biodata_pegawai.gelar_depan FROM biodata_pegawai WHERE biodata_pegawai.id=kgb.id_pegawai), (SELECT biodata_pegawai.nama_lengkap FROM biodata_pegawai WHERE biodata_pegawai.id=kgb.id_pegawai), (SELECT biodata_pegawai.gelar_belakang FROM biodata_pegawai WHERE biodata_pegawai.id=kgb.id_pegawai)) AS nama_pegawai,
	                                    kgb.golongan_ruang,
	                                    kgb.tmt_kgb,
	                                    kgb.tmt_kgb_berikut,
	                                    DATEDIFF(kgb2.max_tmt_kgb_berikut, CURRENT_DATE()) AS selisih
                                    FROM kgb
                                    JOIN (SELECT 
		                                    kgb.id_pegawai AS id_pegawai1,
		                                    MAX(kgb.tmt_kgb_berikut) AS max_tmt_kgb_berikut
	                                        FROM kgb GROUP BY kgb.id_pegawai) AS kgb2
                                    ON kgb2.id_pegawai1=kgb.id_pegawai AND kgb.tmt_kgb_berikut=kgb2.max_tmt_kgb_berikut
                                    WHERE DATEDIFF(kgb2.max_tmt_kgb_berikut, CURRENT_DATE()) <= 90");
		return $query->result_array();
	}

	public function rekapCuti()
	{
		$periode = date("Y-m-d");
		$query = $this->db->query("SELECT 
										SUM(CASE WHEN tanggal_surat_cuti='$periode' AND jenis_cuti='1' AND proses='Disetujui' THEN 1 ELSE 0 END) AS tahunan,
										SUM(CASE WHEN tanggal_surat_cuti='$periode' AND jenis_cuti='2' AND proses='Disetujui' THEN 1 ELSE 0 END) AS besar,
										SUM(CASE WHEN tanggal_surat_cuti='$periode' AND jenis_cuti='3' AND proses='Disetujui' THEN 1 ELSE 0 END) AS sakit,
										SUM(CASE WHEN tanggal_surat_cuti='$periode' AND jenis_cuti='4' AND proses='Disetujui' THEN 1 ELSE 0 END) AS melahirkan,
										SUM(CASE WHEN tanggal_surat_cuti='$periode' AND jenis_cuti='5' AND proses='Disetujui' THEN 1 ELSE 0 END) AS alasan_penting,
										SUM(CASE WHEN tanggal_surat_cuti='$periode' AND jenis_cuti='6' AND proses='Disetujui' THEN 1 ELSE 0 END) AS luar_tanggungan
									FROM cuti");
		return $query->row_array();
	}

	public function jumlahCuti()
	{
		$periode = date("Y-m-d");
		$query = $this->db->query("SELECT SUM(CASE WHEN tanggal_mulai_cuti='$periode' AND proses='Disetujui' THEN 1 ELSE 0 END) AS cuti FROM cuti");
		return $query->row_array();
	}

	public function detilCuti()
	{
		$periode = date("Y-m-d");
		$query = $this->db->query("SELECT * FROM cuti WHERE tanggal_mulai_cuti='$periode' AND proses='Disetujui'");
		return $query->result_array();
	}

	public function jumlahIzin()
	{
		$periode = date("Y-m-d");
		$query = $this->db->query("SELECT SUM(CASE WHEN tanggal_mulai_izin='$periode' AND proses='Disetujui' THEN 1 ELSE 0 END) AS izin FROM tidak_masuk");
		return $query->row_array();
	}

	public function detilIzin()
	{
		$periode = date("Y-m-d");
		$query = $this->db->query("SELECT * FROM tidak_masuk WHERE tanggal_mulai_izin='$periode' AND proses='Disetujui'");
		return $query->result_array();
	}

	public function jumlahHadir()
	{
		$periode = date("Y-m-d");
		$query = $this->db->query("SELECT SUM(CASE WHEN tanggal_absen='$periode' AND kode IS NOT NULL AND jam_masuk IS NOT NULL THEN 1 ELSE 0 END) AS hadir FROM presensi");
		return $query->row_array();
	}

	public function statusKehadiran()
	{
		$periode = date("Y-m-d");
		$query = $this->db->query("SELECT
										(SELECT SUM(CASE WHEN tanggal_mulai_cuti='$periode' AND proses='Disetujui' THEN 1 ELSE 0 END) AS cuti FROM cuti) AS jumlah_cuti,
										(SELECT SUM(CASE WHEN tanggal_mulai_izin='$periode' AND proses='Disetujui' THEN 1 ELSE 0 END) AS izin FROM tidak_masuk) AS jumlah_tidak_masuk,
										(SELECT SUM(CASE WHEN tanggal_absen='$periode' AND kode IS NOT NULL AND jam_masuk IS NOT NULL THEN 1 ELSE 0 END) AS hadir FROM presensi) AS jumlah_hadir");
		return $query->row_array();
	}

	public function dataBlankoKGB($id_pegawai)
	{
		$query = $this->db->query("SELECT
										id AS id,
										CONCAT_WS(' ', (SELECT biodata_pegawai.gelar_depan FROM biodata_pegawai WHERE biodata_pegawai.id=kgb.id_pegawai), (SELECT biodata_pegawai.nama_lengkap FROM biodata_pegawai WHERE biodata_pegawai.id=kgb.id_pegawai), (SELECT biodata_pegawai.gelar_belakang FROM biodata_pegawai WHERE biodata_pegawai.id=kgb.id_pegawai)) AS nama_pegawai,
										nip_pegawai AS nip_pegawai,
										MAX(golongan_ruang) AS golongan_ruang,
										(SELECT MAX(jabatan3.jabatan) FROM jabatan3 WHERE jabatan3.id_pegawai=kgb.id_pegawai) AS jabatan,
										SUBSTRING_INDEX(MAX(golongan_ruang), '-', 1) AS golongan,
										gaji_pokok AS gaji_pokok
									FROM kgb
									WHERE id_pegawai='$id_pegawai'");
		return $query->row_array();
	}

	public function modelUpdateAdmin()
	{
		$id = $this->input->post('id');
		$foto_lama = $this->input->post('foto_lama');
		$nama_admin = $this->input->post('nama_admin');
		$nip_admin = $this->input->post('nip_admin');
		$pass_admin = $this->input->post('pass_admin');
		$foto_baru = $this->input->post('foto_baru');
		if (!empty($_FILES['foto_baru']['name'])) {
			if ($foto_lama != 'no-image.jpg') {
				unlink('dokumen_foto/' . $foto_lama);
				$config = ['upload_path' => './dokumen_foto/', 'allowed_types' => 'gif|jpg|png'];
				$this->load->library('upload', $config);
				if ($this->upload->do_upload('foto_baru')) {
					$data_admin = [
						'nama_lengkap' => $nama_admin,
						'nip' => $nip_admin,
						'pass1' => md5($pass_admin),
						'pass2' => $pass_admin,
						'file_foto' => $this->upload->data('file_name')
					];
					$this->db->where('id', $id);
					$this->db->update('admin', $data_admin);
				}
			} else {
				$config = ['upload_path' => './dokumen_foto/', 'allowed_types' => 'gif|jpg|png'];
				$this->load->library('upload', $config);
				if ($this->upload->do_upload('foto_baru')) {
					$data_admin = [
						'nama_lengkap' => $nama_admin,
						'nip' => $nip_admin,
						'pass1' => md5($pass_admin),
						'pass2' => $pass_admin,
						'file_foto' => $this->upload->data('file_name')
					];
					$this->db->where('id', $id);
					$this->db->update('admin', $data_admin);
				}
			}
		} else {
			$data_admin = [
				'nama_lengkap' => $nama_admin,
				'nip' => $nip_admin,
				'pass1' => md5($pass_admin),
				'pass2' => $pass_admin
			];
			$this->db->where('id', $id);
			$this->db->update('admin', $data_admin);
		}
	}

	public function profilPNS($id_pns)
	{
		$query_pns = $this->db->get_where('biodata_pegawai', ['id' => $id_pns]);
		return $query_pns->row_array();
	}

	public function modelTambahUser()
	{
		$nama_lengkap = $this->input->post('nama_lengkap');
		$nip = $this->input->post('nip');
		$pass = $this->input->post('pass');
		$level = $this->input->post('level');
		$foto = $this->input->post('foto');
		if ($this->input->post('level') == 'admin') 
		{
			$config = ['upload_path' => './dokumen_foto/', 'allowed_types' => 'gif|jpg|png'];
			$this->load->library('upload', $config);
			if ($this->upload->do_upload('foto')) 
			{
				$data_admin = [
					'id' => '',
					'nama_lengkap' => $nama_lengkap,
					'nip' => $nip,
					'pass1' => md5($pass),
					'pass2' => $pass,
					'level' => $level,
					'file_foto' => $this->upload->data('file_name'),
					'tanggal_perubahan' => date('Y-m-d H:i:s')
				];
			} 
			else 
			{
				$data_admin = [
					'id' => '',
					'nama_lengkap' => $this->input->post('nama_lengkap'),
					'nip' => $this->input->post('nip'),
					'pass1' => md5($this->input->post('pass')),
					'pass2' => $this->input->post('pass'),
					'level' => $this->input->post('level'),
					'file_foto' => 'no-image.jpg',
					'tanggal_perubahan' => date('Y-m-d H:i:s')
				];
			}
			$this->db->insert('admin', $data_admin);
		} 
		else 
		{
			$biodata_pns = [
				'id' => '',
				'gelar_depan' => '',
				'gelar_belakang' => '',
				'nama_lengkap' => $this->input->post('nama_lengkap'),
				'nik' => '',
				'nip' => $this->input->post('nip'),
				'agama' => '',
				'status_perkawinan' => '',
				'nomor_telepon' => '',
				'nomor_hp' => '',
				'tempat_lahir' => '',
				'tanggal_lahir' => '',
				'jenis_kelamin' => '',
				'tingkat_pendidikan' => '',
				'email' => '',
				'pass' => $this->input->post('pass'),
				'level' => $this->input->post('level'),
				'file_foto' => 'no-image.jpg',
				'aktif' => 'Y'
			];
			$this->db->insert('biodata_pegawai', $biodata_pns);
			$data_cpns = [
				'id_pegawai' => '',
				'nip_pegawai' => $this->input->post('nip'),
				'golongan_ruang' => '',
				'no_sk_cpns' => '',
				'tanggal_sk_cpns' => '',
				'nomor_persetujuan' => '',
				'tanggal_persetujuan' => '',
				'gaji_pokok' => '',
				'tmt_golongan' => '',
				'masa_kerja' => '',
				'pejabat_penandatangan_sk' => '',
				'dokumen_sk_cpns' => '',
				'path_dokumen_sk_cpns' => ''
			];
			$this->db->insert('cpns', $data_cpns);
			$data_pns = [
				'id_pegawai' => '',
				'nip_pegawai' => $this->input->post('nip'),
				'golongan_ruang' => '',
				'no_sk_pns' => '',
				'tanggal_sk_pns' => '',
				'nomor_persetujuan' => '',
				'tanggal_persetujuan' => '',
				'gaji_pokok' => '',
				'tmt_golongan' => '',
				'masa_kerja_tahun' => '',
				'masa_kerja_bulan' => '',
				'pejabat_penandatangan_sk' => '',
				'dokumen_sk_pns' => '',
				'path_dokumen_sk_pns' => '',
				'tanggal_spmt' => '',
				'tmt_spmt' => '',
				'pejabat_spmt' => '',
				'nomor_spmt' => '',
				'dokumen_spmt' => '',
				'path_dokumen_spmt' => '',
				'tanggal_pelantikan' => '',
				'kelompok_jabatan' => '',
				'jabatan' => '',
				'tmt_selesai' => '',
				'pejabat_sk' => ''
			];
			$this->db->insert('pns', $data_pns);
		}
	}

	public function modelHapusUser($id, $level)
	{
		if ($level == 'admin') {
			$data_admin = $this->profilAdmin($id);
			if ($data_admin['file_foto'] != 'no-image.jpg') {
				$file_foto = $data_admin['file_foto'];
				unlink('dokumen_foto/' . $file_foto);
			}
			return $this->db->delete('admin', ['id' => $id]);
		} else {
			$data_pns = $this->profilPNS($id);
			$this->db->delete('biodata_pegawai', ['nip' => $data_pns['nip']]);
			$this->db->delete('cpns', ['nip_pegawai' => $data_pns['nip']]);
			$this->db->delete('pns', ['nip_pegawai' => $data_pns['nip']]);
		}
	}
}
