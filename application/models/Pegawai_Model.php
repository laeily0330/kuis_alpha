<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai_Model extends CI_Model {

		public function __construct()
		{
			parent::__construct();
			//Do your magic here
		}	

		public function getDataPegawai()
		{
			$query = $this->db->get('pegawai');
			return $query->result();
		}

		public function getJabatanByPegawai($idPegawai)
		{
			//$this->db->query('SELECT * FROM pegawai JOIN jabatan_pegawai ON jabatan_pegawai.fk_pegawai = pegawai.id WHERE pegawai.id=$idPegawai');
			$this->db->where('pegawai.id', $idPegawai);
			$this->db->select('*');
			$this->db->from('pegawai');
			$this->db->join('jabatan_pegawai', 'jabatan_pegawai.fk_pegawai = pegawai.id');
			$query = $this->db->get();
			return $query->result();
		}
		public function getAnakByPegawai($idPegawai)
		{
			$this->db->where('pegawai.id', $idPegawai);
			$this->db->select('pegawai.nama as namap, anak.nama AS namaanak, anak.tanggalLahir AS ttl' );
			$this->db->from('pegawai');
			$this->db->join('anak', 'anak.fk_pegawai = pegawai.id');
			$query = $this->db->get();
			return $query->result();
		}

}

/* End of file Pegawai_Model.php */
/* Location: ./application/models/Pegawai_Model.php */
 ?>