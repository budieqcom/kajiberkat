<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Autentikasi_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	
	public function prosesLoginAdmin($username,$password)
	{
		$this->db->where('nip',$username);
		$this->db->where('pass1',$password);
		$query = $this->db->get('admin');
		return ($query->num_rows() > 0) ? $query->row_array() : FALSE;
	}
	
	public function prosesLoginPegawai($username,$password)
	{
		$this->db->where('nip',$username);
		$this->db->where('pass',$password);
		$query = $this->db->get('biodata_pegawai');
		return ($query->num_rows() > 0) ? $query->row_array() : FALSE;
	}
}
