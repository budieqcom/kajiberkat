<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cuti_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function daftarCuti($id_pegawai)
	{
		$query = $this->db->query("SELECT id AS id, 
										id_pegawai AS id_pegawai, 
										(SELECT nip FROM biodata_pegawai WHERE biodata_pegawai.id=cuti.id_pegawai) AS nip_pegawai, 
										(SELECT gelar_depan FROM biodata_pegawai WHERE biodata_pegawai.id=cuti.id_pegawai) AS gelar_depan, 
										(SELECT gelar_belakang FROM biodata_pegawai WHERE biodata_pegawai.id=cuti.id_pegawai) AS gelar_belakang, 
										(SELECT nama_lengkap FROM biodata_pegawai WHERE biodata_pegawai.id=cuti.id_pegawai) AS nama_pegawai, 
										jenis_cuti AS jenis_cuti_id,
										(SELECT nama FROM jenis_cuti WHERE jenis_cuti.id=cuti.jenis_cuti) AS jenis_cuti_nama,
										tanggal_surat_cuti AS tanggal_surat_cuti, 
										lama_cuti AS lama_cuti, 
										tanggal_mulai_cuti AS tanggal_mulai_cuti, 
										tanggal_selesai_cuti AS tanggal_selesai_cuti,
										proses AS proses
									FROM cuti 
									WHERE id_pegawai='$id_pegawai' 
									ORDER BY tanggal_surat_cuti DESC");
			return $query->result_array();	
	}
	
	public function dataCutiID($id)
	{
		return $this->db->get_where('cuti', ['id' => $id])->row_array();
	}
	
	public function prosesTambahCuti($id_pegawai)
	{
		$tanggal_surat_cuti = tgl_sql($this->input->post('tanggal_surat_cuti'));
		$alasan_cuti = $this->input->post('alasan_cuti');
		$alamat_cuti = $this->input->post('alamat_cuti');
		$lokasi_cuti = $this->input->post('lokasi_cuti');
		$jenis_cuti = $this->input->post('jenis_cuti');
		$tanggal_mulai_cuti = tgl_sql($this->input->post('tanggal_mulai_cuti'));
		$tanggal_selesai_cuti = tgl_sql($this->input->post('tanggal_selesai_cuti'));
		$tahun_cuti = tahun(tgl_sql($this->input->post('tanggal_surat_cuti')));
		$lama_cuti = $this->input->post('lama_cuti');
		$atasan_cuti = $this->input->post('atasan_cuti');
		$pejabat_cuti = $this->input->post('pejabat_cuti');

		$data_cuti = ['id' => '',
				'id_pegawai' => $id_pegawai,
				'tanggal_surat_cuti' => $tanggal_surat_cuti,
				'jenis_cuti' => $jenis_cuti,
				'alasan_cuti' => $alasan_cuti,
				'alamat_cuti' => $alamat_cuti,
				'lokasi_cuti' => $lokasi_cuti,
				'tanggal_mulai_cuti' => $tanggal_mulai_cuti,
				'tanggal_selesai_cuti' => $tanggal_selesai_cuti,
				'lama_cuti' => $lama_cuti,
				'proses' => 'Permohonan',
				'pejabat' => $pejabat_cuti,
				'atasan' => $atasan_cuti,];
		$this->db->insert('cuti', $data_cuti);
	}

	public function masaKerja($id_pegawai)
	{
		$query = $this->db->query("SELECT 
										id AS id,
										id_pegawai AS id_pegawai, 
									    masa_kerja_tahun AS mkt,
									    masa_kerja_bulan AS mkb   
									FROM pangkat
									JOIN
										(SELECT 
											id_pegawai AS id_pegawai1, 
											masa_kerja_tahun AS mkt1,
											masa_kerja_bulan AS mkb1,
											MAX(id) AS max_id
										FROM pangkat GROUP BY id_pegawai) AS pangkat2
									ON pangkat2.id_pegawai1=pangkat.id_pegawai AND pangkat.id=pangkat2.max_id
									WHERE pangkat.id_pegawai='$id_pegawai'");
		return $query->row_array();
	}

	public function cekSisaCutiTahunan($id_pegawai)
	{
		$sisa_cuti = $this->db->query("SELECT * FROM sisa_cuti_tahunan WHERE id_pegawai='$id_pegawai'");
		return $sisa_cuti->row_array();
	}

	public function prosesSisaCuti($id_pegawai)
	{
		if ($this->cekSisaCutiTahunan($id_pegawai) == null)
		{
			$n = $this->input->post('n');
			$n1 = $this->input->post('n1');
			$n2 = $this->input->post('n2');
			$sisa_cuti = ['id' => '',
						'id_pegawai' => $id_pegawai,
						'n' => $n,
						'n1' => $n1,
						'n2' => $n2];
			$this->db->insert('sisa_cuti_tahunan', $sisa_cuti);
		}
		else
		{
			$n = $this->input->post('n');
			$n1 = $this->input->post('n1');
			$n2 = $this->input->post('n2');
			$sisa_cuti = ['n' => $n,
						'n1' => $n1,
						'n2' => $n2];
			$this->db->where('id_pegawai', $id_pegawai);
			$this->db->update('sisa_cuti_tahunan', $sisa_cuti);
		}
	}

	public function updateSisaCutiTahunan($id_pegawai, $lama_cuti)
	{
		$cekSisaCuti = $this->cekSisaCutiTahunan($id_pegawai);
		$n = $cekSisaCuti['n'];
		$n1 = $cekSisaCuti['n1'];
		$n2 = $cekSisaCuti['n2'];
		
		if ($lama_cuti <= $n2)
		{
			$sisa_cuti_n2 = $n2 - $lama_cuti;
			$this->db->query("UPDATE sisa_cuti_tahunan SET n2 = '$sisa_cuti_n2' WHERE id_pegawai = '$id_pegawai'");
		}
		else if ($n2 <= $lama_cuti)
		{
			$sisa_cuti_n2 = $lama_cuti - $n2;
			$this->db->query("UPDATE sisa_cuti_tahunan SET n2 = 0 WHERE id_pegawai = '$id_pegawai'");
			if ($sisa_cuti_n2 <= $n1)
			{
				$sisa_cuti_n1 = $n1 - $sisa_cuti_n2;
				$this->db->query("UPDATE sisa_cuti_tahunan SET n1 = '$sisa_cuti_n1' WHERE id_pegawai = '$id_pegawai'");
			}
			else if ($n1 <= $lama_cuti)
			{
				$sisa_cuti_n_temp = $lama_cuti - $n1;
				$this->db->query("UPDATE sisa_cuti_tahunan SET n1 = 0 WHERE id_pegawai = '$id_pegawai'");
				if ($sisa_cuti_n_temp <= $n)
				{
					$sisa_cuti_n = $n - $sisa_cuti_n_temp;
					$this->db->query("UPDATE sisa_cuti_tahunan SET n = '$sisa_cuti_n' WHERE id_pegawai = '$id_pegawai'");
				}
			}
		}
		else if ($n < $lama_cuti) 
		{
			return false;
		}
	}

	public function prosesEditCuti($id, $id_pegawai)
	{
		$id = $this->input->post('id');
		$id_pegawai = $this->input->post('id_pegawai');
		$jenis_cuti = $this->input->post('jenis_cuti');
		$tanggal_surat_cuti = tgl_sql($this->input->post('tanggal_surat_cuti'));
		$alasan_cuti = $this->input->post('alasan_cuti');
		$alamat_cuti = $this->input->post('alamat_cuti');
		$lokasi_cuti = $this->input->post('lokasi_cuti');
		$tanggal_mulai_cuti = tgl_sql($this->input->post('tanggal_mulai_cuti'));
		$tanggal_selesai_cuti = tgl_sql($this->input->post('tanggal_selesai_cuti'));
		$lama_cuti = $this->input->post('lama_cuti');
		$atasan_cuti = $this->input->post('atasan_cuti');
		$pejabat_cuti = $this->input->post('pejabat_cuti');

		$data_cuti = ['jenis_cuti' => $jenis_cuti,
						'tanggal_surat_cuti' => $tanggal_surat_cuti,
						'tanggal_mulai_cuti' => $tanggal_mulai_cuti,
						'tanggal_selesai_cuti' => $tanggal_selesai_cuti,
						'alasan_cuti' => $alasan_cuti,
						'alamat_cuti' => $alamat_cuti,
						'lokasi_cuti' => $lokasi_cuti,
						'lama_cuti' => $lama_cuti,
						'pejabat' => $pejabat_cuti,
						'atasan' => $atasan_cuti,];
		$this->db->where('id', $id);
		$this->db->update('cuti', $data_cuti);
	}

	public function prosesHapusCuti($id)
	{
		$data_cuti = $this->dataCutiID($id);
		if (!empty($data_cuti['dokumen_surat_cuti']))
		{
			unlink('dokumen_cuti/'.$data_cuti['dokumen_surat_cuti']);
		}
		return $this->db->delete('cuti', ['id' => $id]);
	}

	public function daftarMohonCuti()
	{
		$query = $this->db->query("SELECT 
										id AS id,
										id_pegawai AS id_pegawai,
										(SELECT biodata_pegawai.gelar_depan FROM biodata_pegawai WHERE biodata_pegawai.id=cuti.id_pegawai) AS gelar_depan_pegawai,
										(SELECT biodata_pegawai.nama_lengkap FROM biodata_pegawai WHERE biodata_pegawai.id=cuti.id_pegawai) AS nama_pegawai,
										(SELECT biodata_pegawai.gelar_belakang FROM biodata_pegawai WHERE biodata_pegawai.id=cuti.id_pegawai) AS gelar_belakang_pegawai,
										(SELECT biodata_pegawai.nip FROM biodata_pegawai WHERE biodata_pegawai.id=cuti.id_pegawai) AS nip,
										(SELECT jenis_cuti.nama FROM jenis_cuti WHERE jenis_cuti.id=cuti.jenis_cuti) AS jenis_cuti,
										tanggal_mulai_cuti AS tanggal_mulai,
										tanggal_selesai_cuti AS tanggal_selesai,
										alasan_cuti AS alasan_cuti,
										alamat_cuti AS alamat_cuti,
										lokasi_cuti AS lokasi_cuti,
										lama_cuti AS lama_cuti,
										proses AS proses,
										(SELECT biodata_pegawai.gelar_depan FROM biodata_pegawai WHERE biodata_pegawai.id=cuti.pejabat) AS gelar_depan_pejabat,
										(SELECT biodata_pegawai.nama_lengkap FROM biodata_pegawai WHERE biodata_pegawai.id=cuti.pejabat) AS nama_pejabat,
										(SELECT biodata_pegawai.gelar_belakang FROM biodata_pegawai WHERE biodata_pegawai.id=cuti.pejabat) AS gelar_belakang_pejabat,
										(SELECT biodata_pegawai.nip FROM biodata_pegawai WHERE biodata_pegawai.id=cuti.pejabat) AS nip_pejabat
									FROM cuti
									WHERE proses='Permohonan'
									ORDER BY id DESC");
		return $query->result_array();
	}

	public function jumlahMohonCuti()
	{
		$query = $this->db->query("SELECT COUNT(*) AS jumlah FROM cuti WHERE proses='Permohonan'");
		return $query->row_array();
	}

	public function daftarCutiPegawai()
	{
		$query = $this->db->query("SELECT 
										id AS id,
										id_pegawai AS id_pegawai,
										(SELECT biodata_pegawai.gelar_depan FROM biodata_pegawai WHERE biodata_pegawai.id=cuti.id_pegawai) AS gelar_depan_pegawai,
										(SELECT biodata_pegawai.nama_lengkap FROM biodata_pegawai WHERE biodata_pegawai.id=cuti.id_pegawai) AS nama_pegawai,
										(SELECT biodata_pegawai.gelar_belakang FROM biodata_pegawai WHERE biodata_pegawai.id=cuti.id_pegawai) AS gelar_belakang_pegawai,
										(SELECT biodata_pegawai.nip FROM biodata_pegawai WHERE biodata_pegawai.id=cuti.id_pegawai) AS nip,
										(SELECT jenis_cuti.nama FROM jenis_cuti WHERE jenis_cuti.id=cuti.jenis_cuti) AS jenis_cuti,
										tanggal_mulai_cuti AS tanggal_mulai,
										tanggal_selesai_cuti AS tanggal_selesai,
										alasan_cuti AS alasan_cuti,
										alamat_cuti AS alamat_cuti,
										lokasi_cuti AS lokasi_cuti,
										lama_cuti AS lama_cuti,
										proses AS proses,
										(SELECT biodata_pegawai.gelar_depan FROM biodata_pegawai WHERE biodata_pegawai.id=cuti.pejabat) AS gelar_depan_pejabat,
										(SELECT biodata_pegawai.nama_lengkap FROM biodata_pegawai WHERE biodata_pegawai.id=cuti.pejabat) AS nama_pejabat,
										(SELECT biodata_pegawai.gelar_belakang FROM biodata_pegawai WHERE biodata_pegawai.id=cuti.pejabat) AS gelar_belakang_pejabat,
										(SELECT biodata_pegawai.nip FROM biodata_pegawai WHERE biodata_pegawai.id=cuti.pejabat) AS nip_pejabat,
										dokumen_surat_cuti_nama AS dokumen_surat_cuti_nama
									FROM cuti
									WHERE proses='Disetujui'
									ORDER BY id DESC");
		return $query->result_array();
	}

	public function detilMohonCuti($id)
	{
		$query = $this->db->query("SELECT
										id AS id,
										id_pegawai AS id_pegawai,
										CONCAT_WS(' ', (SELECT biodata_pegawai.gelar_depan FROM biodata_pegawai WHERE biodata_pegawai.id=cuti.id_pegawai), (SELECT biodata_pegawai.nama_lengkap FROM biodata_pegawai WHERE biodata_pegawai.id=cuti.id_pegawai), (SELECT biodata_pegawai.gelar_belakang FROM biodata_pegawai WHERE biodata_pegawai.id=cuti.id_pegawai)) AS nama_pegawai,
										(SELECT biodata_pegawai.nip FROM biodata_pegawai WHERE biodata_pegawai.id=cuti.id_pegawai) AS nip,
										jenis_cuti AS id_jenis_cuti,
										(SELECT jenis_cuti.nama FROM jenis_cuti WHERE jenis_cuti.id=cuti.jenis_cuti) AS jenis_cuti,
										tanggal_surat_cuti AS tanggal_surat,
										tanggal_mulai_cuti AS tanggal_mulai,
										tanggal_selesai_cuti AS tanggal_selesai,
										alasan_cuti AS alasan_cuti,
										alamat_cuti AS alamat_cuti,
										lokasi_cuti AS lokasi_cuti,
										lama_cuti AS lama_cuti,
										proses AS proses,
										pejabat AS id_pejabat,
										CONCAT_WS(' ', (SELECT biodata_pegawai.gelar_depan FROM biodata_pegawai WHERE biodata_pegawai.id=cuti.pejabat), (SELECT biodata_pegawai.nama_lengkap FROM biodata_pegawai WHERE biodata_pegawai.id=cuti.pejabat), (SELECT biodata_pegawai.gelar_belakang FROM biodata_pegawai WHERE biodata_pegawai.id=cuti.pejabat)) AS nama_pejabat,
										(SELECT biodata_pegawai.nip FROM biodata_pegawai WHERE biodata_pegawai.id=cuti.pejabat) AS nip_pejabat,
										CONCAT_WS(' ', (SELECT biodata_pegawai.gelar_depan FROM biodata_pegawai WHERE biodata_pegawai.id=cuti.atasan), (SELECT biodata_pegawai.nama_lengkap FROM biodata_pegawai WHERE biodata_pegawai.id=cuti.atasan), (SELECT biodata_pegawai.gelar_belakang FROM biodata_pegawai WHERE biodata_pegawai.id=cuti.atasan)) AS nama_atasan,
										(SELECT biodata_pegawai.nip FROM biodata_pegawai WHERE biodata_pegawai.id=cuti.atasan) AS nip_atasan
									FROM cuti 
									WHERE id='$id'");
		return $query->row_array();
	}

	public function prosesSetujuCuti($id, $id_pegawai)
	{
		$lama_cuti = $this->input->post('lama_cuti');
		$jenis_cuti = $this->input->post('jenis_cuti');
		$dokumen_surat_cuti_nama = "";
		$dokumen_surat_cuti_path = "";

		if (!empty($_FILES['dokumen_surat_cuti']['name']))
		{
			$config1 = ['upload_path' => './dokumen_cuti/', 'allowed_types' => 'txt|doc|rtf|pdf'];
			$this->load->library('upload', $config1);
			$this->upload->do_upload('dokumen_surat_cuti');
			$dokumen_surat_cuti = $this->upload->data();
			$dokumen_surat_cuti_nama = $dokumen_surat_cuti['file_name'];
			$dokumen_surat_cuti_path = $dokumen_surat_cuti['full_path'];
		}
		else
		{
			$dokumen_surat_cuti_nama = "";
			$dokumen_surat_cuti_path = "";
		}

		if ($jenis_cuti == "1")
		{
			$cekSisaCuti = $this->cekSisaCutiTahunan($id_pegawai);
			if ($cekSisaCuti['n'] < $lama_cuti)
			{
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Cuti tahunan tidak bisa diambil!</div>');
        		redirect('perizinan/daftar_cuti/'.$id_pegawai);
			}
			else
			{
				$data_cuti = ['proses' => 'Disetujui',
					'dokumen_surat_cuti_nama' => $dokumen_surat_cuti_nama,
					'dokumen_surat_cuti_path' => $dokumen_surat_cuti_path];
				$this->db->where('id', $id);
				$this->db->update('cuti', $data_cuti);
				$this->updateSisaCutiTahunan($id_pegawai, $lama_cuti);
			}
		}
		else
		{
			$data_cuti = ['proses' => 'Disetujui',
						'dokumen_surat_cuti_nama' => $dokumen_surat_cuti_nama,
						'dokumen_surat_cuti_path' => $dokumen_surat_cuti_path];
			$this->db->where('id', $id);
			$this->db->update('cuti', $data_cuti);	
		}
	}

	public function hapusMohonCuti($id)
	{
		return $this->db->delete('cuti', ['id' => $id]);
	}
}