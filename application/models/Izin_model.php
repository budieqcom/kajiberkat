<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Izin_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

    public function daftarIzin($id_pegawai)
    {
        $query = $this->db->query("SELECT 
                                        id AS id, 
                                        id_pegawai AS id_pegawai, 
                                        (SELECT nip FROM biodata_pegawai WHERE biodata_pegawai.id=tidak_masuk.id_pegawai) AS nip_pegawai, 
                                        (SELECT gelar_depan FROM biodata_pegawai WHERE biodata_pegawai.id=tidak_masuk.id_pegawai) AS gelar_depan, 
                                        (SELECT gelar_belakang FROM biodata_pegawai WHERE biodata_pegawai.id=tidak_masuk.id_pegawai) AS gelar_belakang, 
                                        (SELECT nama_lengkap FROM biodata_pegawai WHERE biodata_pegawai.id=tidak_masuk.id_pegawai) AS nama_pegawai,
                                        alasan_izin AS alasan_izin,
                                        alamat_izin AS alamat_izin,
                                        lokasi_izin AS lokasi_izin_id,
                                        (SELECT nama FROM lokasi_cuti WHERE lokasi_cuti.id=tidak_masuk.lokasi_izin) AS lokasi_izin_nama,
                                        tanggal_surat_izin AS tanggal_surat_izin, 
                                        tanggal_mulai_izin AS tanggal_mulai_izin, 
                                        tanggal_selesai_izin AS tanggal_selesai_izin,
                                        lama_izin AS lama_izin,
                                        proses AS proses
                                    FROM tidak_masuk
                                    WHERE id_pegawai='$id_pegawai'
                                    ORDER BY tanggal_surat_izin DESC");
        return $query->result_array();
    }

    public function prosesTambahIzin($id_pegawai)
    {
        $tanggal_surat_izin = tgl_sql($this->input->post('tanggal_surat_izin'));
        $alasan_izin = $this->input->post('alasan_izin');
        $alamat_izin = $this->input->post('alamat_izin');
        $lokasi_izin = $this->input->post('lokasi_izin');
        $tanggal_mulai_izin = tgl_sql($this->input->post('tanggal_mulai_izin'));
        $tanggal_selesai_izin = tgl_sql($this->input->post('tanggal_selesai_izin'));
        $lama_izin = $this->input->post('lama_izin');
        $pejabat_izin = $this->input->post('pejabat_izin');

        $data_izin = ['id' => '',
                    'id_pegawai' => $id_pegawai,
                    'tanggal_surat_izin' => $tanggal_surat_izin,
                    'tanggal_mulai_izin' => $tanggal_mulai_izin,
                    'tanggal_selesai_izin' => $tanggal_selesai_izin,
                    'alasan_izin' => $alasan_izin,
                    'alamat_izin' => $alamat_izin,
                    'lokasi_izin' => $lokasi_izin,
                    'lama_izin' => $lama_izin,
                    'proses' => 'Permohonan',
                    'pejabat' => $pejabat_izin];
        $this->db->insert('tidak_masuk', $data_izin);
    }
	
    public function dataIzinId($id)
    {
        return $this->db->get_where('tidak_masuk', ['id' => $id])->row_array();
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

    public function prosesEditIzin($id, $id_pegawai)
    {
        $tanggal_surat_izin = tgl_sql($this->input->post('tanggal_surat_izin'));
        $alasan_izin = $this->input->post('alasan_izin');
        $alamat_izin = $this->input->post('alamat_izin');
        $lokasi_izin = $this->input->post('lokasi_izin');
        $tanggal_mulai_izin = tgl_sql($this->input->post('tanggal_mulai_izin'));
        $tanggal_selesai_izin = tgl_sql($this->input->post('tanggal_selesai_izin'));
        $lama_izin = $this->input->post('lama_izin');
        $pejabat_izin = $this->input->post('pejabat_izin');

        $data_izin = ['tanggal_surat_izin' => $tanggal_surat_izin,
                    'tanggal_mulai_izin' => $tanggal_mulai_izin,
                    'tanggal_selesai_izin' => $tanggal_selesai_izin,
                    'alasan_izin' => $alasan_izin,
                    'alamat_izin' => $alamat_izin,
                    'lokasi_izin' => $lokasi_izin,
                    'lama_izin' => $lama_izin,
                    'pejabat' => $pejabat_izin];
        $this->db->where('id', $id);
        $this->db->update('tidak_masuk', $data_izin);
    }

    public function prosesHapusIzin($id)
    {
        $data_izin = $this->dataIzinId($id);
        return $this->db->delete('tidak_masuk', ['id' => $id]);
    }

    public function detilMohonIzin($id)
    {
        $query = $this->db->query("SELECT
                                        id AS id,
                                        id_pegawai AS id_pegawai,
                                        CONCAT_WS(' ', (SELECT biodata_pegawai.gelar_depan FROM biodata_pegawai WHERE biodata_pegawai.id=tidak_masuk.id_pegawai), (SELECT biodata_pegawai.nama_lengkap FROM biodata_pegawai WHERE biodata_pegawai.id=tidak_masuk.id_pegawai), (SELECT biodata_pegawai.gelar_belakang FROM biodata_pegawai WHERE biodata_pegawai.id=tidak_masuk.id_pegawai)) AS nama_pegawai,
                                        (SELECT biodata_pegawai.nip FROM biodata_pegawai WHERE biodata_pegawai.id=tidak_masuk.id_pegawai) AS nip,
                                        tanggal_surat_izin AS tanggal_surat_izin,
                                        tanggal_mulai_izin AS tanggal_mulai_izin,
                                        tanggal_selesai_izin AS tanggal_selesai_izin,
                                        alasan_izin AS alasan_izin,
                                        alamat_izin AS alamat_izin,
                                        lokasi_izin AS lokasi_izin,
                                        lama_izin AS lama_izin,
                                        proses AS proses,
                                        pejabat AS id_pejabat,
                                        CONCAT_WS(' ', (SELECT biodata_pegawai.gelar_depan FROM biodata_pegawai WHERE biodata_pegawai.id=tidak_masuk.pejabat), (SELECT biodata_pegawai.nama_lengkap FROM biodata_pegawai WHERE biodata_pegawai.id=tidak_masuk.pejabat), (SELECT biodata_pegawai.gelar_belakang FROM biodata_pegawai WHERE biodata_pegawai.id=tidak_masuk.pejabat)) AS nama_pejabat,
                                        (SELECT biodata_pegawai.nip FROM biodata_pegawai WHERE biodata_pegawai.id=tidak_masuk.pejabat) AS nip_pejabat
                                    FROM tidak_masuk
                                    WHERE id='$id'");
        return $query->row_array();
    }

    public function daftarIzinPegawai()
    {
        $query = $this->db->query("SELECT 
                                        id AS id,
                                        id_pegawai AS id_pegawai,
                                        (SELECT biodata_pegawai.gelar_depan FROM biodata_pegawai WHERE biodata_pegawai.id=tidak_masuk.id_pegawai) AS gelar_depan_pegawai,
                                        (SELECT biodata_pegawai.nama_lengkap FROM biodata_pegawai WHERE biodata_pegawai.id=tidak_masuk.id_pegawai) AS nama_pegawai,
                                        (SELECT biodata_pegawai.gelar_belakang FROM biodata_pegawai WHERE biodata_pegawai.id=tidak_masuk.id_pegawai) AS gelar_belakang_pegawai,
                                        (SELECT biodata_pegawai.nip FROM biodata_pegawai WHERE biodata_pegawai.id=tidak_masuk.id_pegawai) AS nip,
                                        tanggal_mulai_izin AS tanggal_mulai_izin,
                                        tanggal_selesai_izin AS tanggal_selesai_izin,
                                        alasan_izin AS alasan_izin,
                                        alamat_izin AS alamat_izin,
                                        lokasi_izin AS lokasi_izin,
                                        lama_izin AS lama_izin,
                                        proses AS proses,
                                        (SELECT biodata_pegawai.gelar_depan FROM biodata_pegawai WHERE biodata_pegawai.id=tidak_masuk.pejabat) AS gelar_depan_pejabat,
                                        (SELECT biodata_pegawai.nama_lengkap FROM biodata_pegawai WHERE biodata_pegawai.id=tidak_masuk.pejabat) AS nama_pejabat,
                                        (SELECT biodata_pegawai.gelar_belakang FROM biodata_pegawai WHERE biodata_pegawai.id=tidak_masuk.pejabat) AS gelar_belakang_pejabat,
                                        (SELECT biodata_pegawai.nip FROM biodata_pegawai WHERE biodata_pegawai.id=tidak_masuk.pejabat) AS nip_pejabat,
                                        dokumen_surat_izin_nama AS dokumen_surat_izin_nama
                                    FROM tidak_masuk
                                    WHERE proses='Disetujui'
                                    ORDER BY id DESC");
        return $query->result_array();
    }

    public function daftarMohonIzin()
    {
        $query = $this->db->query("SELECT 
                                        id AS id,
                                        id_pegawai AS id_pegawai,
                                        (SELECT biodata_pegawai.gelar_depan FROM biodata_pegawai WHERE biodata_pegawai.id=tidak_masuk.id_pegawai) AS gelar_depan_pegawai,
                                        (SELECT biodata_pegawai.nama_lengkap FROM biodata_pegawai WHERE biodata_pegawai.id=tidak_masuk.id_pegawai) AS nama_pegawai,
                                        (SELECT biodata_pegawai.gelar_belakang FROM biodata_pegawai WHERE biodata_pegawai.id=tidak_masuk.id_pegawai) AS gelar_belakang_pegawai,
                                        (SELECT biodata_pegawai.nip FROM biodata_pegawai WHERE biodata_pegawai.id=tidak_masuk.id_pegawai) AS nip,
                                        tanggal_mulai_izin AS tanggal_mulai_izin,
                                        tanggal_selesai_izin AS tanggal_selesai_izin,
                                        alasan_izin AS alasan_izin,
                                        alamat_izin AS alamat_izin,
                                        lokasi_izin AS lokasi_izin,
                                        lama_izin AS lama_izin,
                                        proses AS proses,
                                        (SELECT biodata_pegawai.gelar_depan FROM biodata_pegawai WHERE biodata_pegawai.id=tidak_masuk.pejabat) AS gelar_depan_pejabat,
                                        (SELECT biodata_pegawai.nama_lengkap FROM biodata_pegawai WHERE biodata_pegawai.id=tidak_masuk.pejabat) AS nama_pejabat,
                                        (SELECT biodata_pegawai.gelar_belakang FROM biodata_pegawai WHERE biodata_pegawai.id=tidak_masuk.pejabat) AS gelar_belakang_pejabat,
                                        (SELECT biodata_pegawai.nip FROM biodata_pegawai WHERE biodata_pegawai.id=tidak_masuk.pejabat) AS nip_pejabat,
                                        dokumen_surat_izin_nama AS dokumen_surat_izin_nama
                                    FROM tidak_masuk
                                    WHERE proses='Permohonan'
                                    ORDER BY id DESC");
        return $query->result_array();
    }

    public function jumlahMohonIzin()
    {
        $query = $this->db->query("SELECT COUNT(*) AS jumlah FROM tidak_masuk WHERE proses='Permohonan'");
        return $query->row_array();
    }

    public function prosesSetujuIzin($id, $id_pegawai) 
    {
        $dokumen_surat_izin_nama = "";
        $dokumen_surat_izin_path = "";

        if (!empty($_FILES['dokumen_surat_izin']['name']))
        {
            $config1 = ['upload_path' => './dokumen_izin/', 'allowed_types' => 'txt|doc|rtf|pdf'];
			$this->load->library('upload', $config1);
			$this->upload->do_upload('dokumen_surat_izin');
			$dokumen_surat_izin = $this->upload->data();
			$dokumen_surat_izin_nama = $dokumen_surat_izin['file_name'];
			$dokumen_surat_izin_path = $dokumen_surat_izin['full_path'];
        }
        else
        {
            $dokumen_surat_izin_nama = "";
            $dokumen_surat_izin_path = "";
        }

        $data_izin = ['proses' => 'Disetujui',
                    'dokumen_surat_izin_nama' => $dokumen_surat_izin_nama,
                    'dokumen_surat_izin_path' => $dokumen_surat_izin_path];
        $this->db->where('id', $id);
        $this->db->update('tidak_masuk', $data_izin);
    }

	public function hapusMohonIzin($id)
	{
		return $this->db->delete('tidak_masuk', ['id' => $id]);
	}
}