<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Alamat_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	
	public function dataAlamat($id_pns)
	{
		return $this->db->get_where('alamat_pegawai', ['id_pegawai' => $id_pns])->result_array();
	}

    public function prosesTambahAlamat()
	{
        $id_pegawai = $this->input->post('id_pegawai');
        $nip_pegawai = $this->input->post('nip_pegawai');
        $jenis_alamat = $this->input->post('jenis_alamat');
        $alamat = $this->input->post('alamat');
        $data_alamat = ['id' => '',
                        'id_pegawai' => $id_pegawai,
                        'nip_pegawai' => $nip_pegawai,
                        'jenis_alamat' => $jenis_alamat,
                        'alamat' => $alamat];
        $this->db->insert('alamat_pegawai', $data_alamat);
	}

	
	public function dataEditAlamat($id)
	{
		return $this->db->get_where('alamat_pegawai', ['id' => $id])->row_array();
	}

    public function prosesEditAlamat()
    {
        $id_alamat = $this->input->post('id_alamat');
        $id_pegawai = $this->input->post('id_pegawai');
        $nip_pegawai = $this->input->post('nip_pegawai');
        $jenis_alamat = $this->input->post('jenis_alamat');
        $alamat = $this->input->post('alamat');
        $data_alamat = ['jenis_alamat' => $jenis_alamat,
                        'alamat' => $alamat];
        $this->db->where('id', $id_alamat);
        $this->db->update('alamat_pegawai', $data_alamat);
    }

	public function hapusAlamat($id)
	{
		return $this->db->delete('alamat_pegawai', ['id' => $id]);
	}
}
