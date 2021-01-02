<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_model
{
	public function perJanuariCount()
	{
		$query = $this->db->query(
			"SELECT CONCAT(YEAR(tgl_rapat),'/',MONTH(tgl_rapat)) AS tahun_bulan, COUNT(*) AS januari
                FROM tb_rapat
                WHERE CONCAT(YEAR(tgl_rapat),'/',MONTH(tgl_rapat))=CONCAT(YEAR(NOW()),'/',01)
                GROUP BY YEAR(tgl_rapat),MONTH(tgl_rapat);"
		);
		if ($query->num_rows() > 0) {
			return $query->row()->januari;
		} else {
			return 0;
		}
	}

	public function perFebruariCount()
	{
		$query = $this->db->query(
			"SELECT CONCAT(YEAR(tgl_rapat),'/',MONTH(tgl_rapat)) AS tahun_bulan, COUNT(*) AS januari
                FROM tb_rapat
                WHERE CONCAT(YEAR(tgl_rapat),'/',MONTH(tgl_rapat))=CONCAT(YEAR(NOW()),'/',02)
                GROUP BY YEAR(tgl_rapat),MONTH(tgl_rapat);"
		);
		if ($query->num_rows() > 0) {
			return $query->row()->januari;
		} else {
			return 0;
		}
	}

	public function perMaretCount()
	{
		$query = $this->db->query(
			"SELECT CONCAT(YEAR(tgl_rapat),'/',MONTH(tgl_rapat)) AS tahun_bulan, COUNT(*) AS januari
                FROM tb_rapat
                WHERE CONCAT(YEAR(tgl_rapat),'/',MONTH(tgl_rapat))=CONCAT(YEAR(NOW()),'/',03)
                GROUP BY YEAR(tgl_rapat),MONTH(tgl_rapat);"
		);
		if ($query->num_rows() > 0) {
			return $query->row()->januari;
		} else {
			return 0;
		}
	}

	public function perAprilCount()
	{
		$query = $this->db->query(
			"SELECT CONCAT(YEAR(tgl_rapat),'/',MONTH(tgl_rapat)) AS tahun_bulan, COUNT(*) AS januari
                FROM tb_rapat
                WHERE CONCAT(YEAR(tgl_rapat),'/',MONTH(tgl_rapat))=CONCAT(YEAR(NOW()),'/',04)
                GROUP BY YEAR(tgl_rapat),MONTH(tgl_rapat);"
		);
		if ($query->num_rows() > 0) {
			return $query->row()->januari;
		} else {
			return 0;
		}
	}

	public function perMeiCount()
	{
		$query = $this->db->query(
			"SELECT CONCAT(YEAR(tgl_rapat),'/',MONTH(tgl_rapat)) AS tahun_bulan, COUNT(*) AS januari
                FROM tb_rapat
                WHERE CONCAT(YEAR(tgl_rapat),'/',MONTH(tgl_rapat))=CONCAT(YEAR(NOW()),'/',05)
                GROUP BY YEAR(tgl_rapat),MONTH(tgl_rapat);"
		);
		if ($query->num_rows() > 0) {
			return $query->row()->januari;
		} else {
			return 0;
		}
	}

	public function perJuniCount()
	{
		$query = $this->db->query(
			"SELECT CONCAT(YEAR(tgl_rapat),'/',MONTH(tgl_rapat)) AS tahun_bulan, COUNT(*) AS januari
                FROM tb_rapat
                WHERE CONCAT(YEAR(tgl_rapat),'/',MONTH(tgl_rapat))=CONCAT(YEAR(NOW()),'/',06)
                GROUP BY YEAR(tgl_rapat),MONTH(tgl_rapat);"
		);
		if ($query->num_rows() > 0) {
			return $query->row()->januari;
		} else {
			return 0;
		}
	}

	public function perJuliCount()
	{
		$query = $this->db->query(
			"SELECT CONCAT(YEAR(tgl_rapat),'/',MONTH(tgl_rapat)) AS tahun_bulan, COUNT(*) AS januari
                FROM tb_rapat
                WHERE CONCAT(YEAR(tgl_rapat),'/',MONTH(tgl_rapat))=CONCAT(YEAR(NOW()),'/',07)
                GROUP BY YEAR(tgl_rapat),MONTH(tgl_rapat);"
		);
		if ($query->num_rows() > 0) {
			return $query->row()->januari;
		} else {
			return 0;
		}
	}

	public function perAgustusCount()
	{
		$query = $this->db->query(
			"SELECT CONCAT(YEAR(tgl_rapat),'/',MONTH(tgl_rapat)) AS tahun_bulan, COUNT(*) AS januari
                FROM tb_rapat
                WHERE CONCAT(YEAR(tgl_rapat),'/',MONTH(tgl_rapat))=CONCAT(YEAR(NOW()),'/',08)
                GROUP BY YEAR(tgl_rapat),MONTH(tgl_rapat);"
		);
		if ($query->num_rows() > 0) {
			return $query->row()->januari;
		} else {
			return 0;
		}
	}

	public function perSeptemberCount()
	{
		$query = $this->db->query(
			"SELECT CONCAT(YEAR(tgl_rapat),'/',MONTH(tgl_rapat)) AS tahun_bulan, COUNT(*) AS januari
                FROM tb_rapat
                WHERE CONCAT(YEAR(tgl_rapat),'/',MONTH(tgl_rapat))=CONCAT(YEAR(NOW()),'/',09)
                GROUP BY YEAR(tgl_rapat),MONTH(tgl_rapat);"
		);
		if ($query->num_rows() > 0) {
			return $query->row()->januari;
		} else {
			return 0;
		}
	}

	public function perOktoberCount()
	{
		$query = $this->db->query(
			"SELECT CONCAT(YEAR(tgl_rapat),'/',MONTH(tgl_rapat)) AS tahun_bulan, COUNT(*) AS januari
                FROM tb_rapat
                WHERE CONCAT(YEAR(tgl_rapat),'/',MONTH(tgl_rapat))=CONCAT(YEAR(NOW()),'/',10)
                GROUP BY YEAR(tgl_rapat),MONTH(tgl_rapat);"
		);
		if ($query->num_rows() > 0) {
			return $query->row()->januari;
		} else {
			return 0;
		}
	}

	public function perNovemberCount()
	{
		$query = $this->db->query(
			"SELECT CONCAT(YEAR(tgl_rapat),'/',MONTH(tgl_rapat)) AS tahun_bulan, COUNT(*) AS januari
                FROM tb_rapat
                WHERE CONCAT(YEAR(tgl_rapat),'/',MONTH(tgl_rapat))=CONCAT(YEAR(NOW()),'/',11)
                GROUP BY YEAR(tgl_rapat),MONTH(tgl_rapat);"
		);
		if ($query->num_rows() > 0) {
			return $query->row()->januari;
		} else {
			return 0;
		}
	}

	public function perDesemberCount()
	{
		$query = $this->db->query(
			"SELECT CONCAT(YEAR(tgl_rapat),'/',MONTH(tgl_rapat)) AS tahun_bulan, COUNT(*) AS januari
                FROM tb_rapat
                WHERE CONCAT(YEAR(tgl_rapat),'/',MONTH(tgl_rapat))=CONCAT(YEAR(NOW()),'/',12)
                GROUP BY YEAR(tgl_rapat),MONTH(tgl_rapat);"
		);
		if ($query->num_rows() > 0) {
			return $query->row()->januari;
		} else {
			return 0;
		}
	}

	public function countRapatHari()
	{
		$query = $this->db->query(
			"SELECT COUNT(id_rapat) as hari
                               FROM tb_rapat
                               WHERE tgl_rapat = DATE(NOW())
                               GROUP BY tgl_rapat"
		);
		if ($query->num_rows() > 0) {
			return $query->row()->hari;
		} else {
			return 0;
		}
	}

	public function countRapatPending()
	{
		$query = $this->db->query(
			"SELECT COUNT(id_rapat) as pending
                               FROM tb_rapat
                               WHERE status_rapat = 1"
		);
		if ($query->num_rows() > 0) {
			return $query->row()->pending;
		} else {
			return 0;
		}
	}

	public function countRapatProses()
	{
		$query = $this->db->query(
			"SELECT COUNT(id_rapat) as proses
                               FROM tb_rapat
                               WHERE status_rapat = 2"
		);
		if ($query->num_rows() > 0) {
			return $query->row()->proses;
		} else {
			return 0;
		}
	}

	public function countRapatSelesai()
	{
		$query = $this->db->query(
			"SELECT COUNT(id_rapat) as selesai
                               FROM tb_rapat
                               WHERE status_rapat = 0"
		);
		if ($query->num_rows() > 0) {
			return $query->row()->selesai;
		} else {
			return 0;
		}
	}

	public function getRapatIndex()
	{
		$query = "SELECT * 
                  FROM tb_rapat LEFT JOIN mst_jenis
                  ON tb_rapat.jenis_id = mst_jenis.id_jenis
				  WHERE status_rapat = 1
				  LIMIT 5";
		return $this->db->query($query)->result_array();
	}


	public function getRapat()
	{
		$query = "SELECT * 
                  FROM tb_rapat LEFT JOIN mst_jenis
                  ON tb_rapat.jenis_id = mst_jenis.id_jenis
				  WHERE status_rapat = 1 OR status_rapat = 2";
		return $this->db->query($query)->result_array();
	}

	public function getRapatSelesai()
	{
		$query = "SELECT * 
                  FROM tb_rapat LEFT JOIN mst_jenis
                  ON tb_rapat.jenis_id = mst_jenis.id_jenis
				    LEFT JOIN tb_notulen
				  ON tb_notulen.rapat_id_not = tb_rapat.id_rapat
				  WHERE status_rapat = 0";
		return $this->db->query($query)->result_array();
	}

	public function getRapatProses()
	{
		$query = "SELECT * 
                  FROM tb_rapat LEFT JOIN mst_jenis
                  ON tb_rapat.jenis_id = mst_jenis.id_jenis
				  LEFT JOIN tb_notulen
				  ON tb_notulen.rapat_id_not = tb_rapat.id_rapat
				  WHERE status_rapat = 2";
		return $this->db->query($query)->result_array();
	}

	public function getJoinRapat($id_rapat)
	{
		$query = "SELECT * 
                  FROM tb_rapat LEFT JOIN mst_jenis
                  ON tb_rapat.jenis_id = mst_jenis.id_jenis
				  WHERE id_rapat = '$id_rapat'";
		return $this->db->query($query)->row_array();
	}

	public function getJoinRapatNotulen($id_rapat)
	{
		$query = "SELECT * 
                  FROM tb_rapat LEFT JOIN mst_jenis
                  ON tb_rapat.jenis_id = mst_jenis.id_jenis
				  LEFT JOIN tb_notulen
				  ON tb_notulen.rapat_id_not = tb_rapat.id_rapat
				  WHERE tb_notulen.rapat_id_not = '$id_rapat'";
		return $this->db->query($query)->row_array();
	}

	public function getPeserta($id_rapat)
	{
		$query = "SELECT * 
                  FROM tb_peserta JOIN tb_rapat
				  ON tb_peserta.rapat_id = tb_rapat.id_rapat                
				  WHERE rapat_id = '$id_rapat' AND status_peserta = 1";
		return $this->db->query($query)->result_array();
	}

	public function insert($data = array())
	{
		$insert = $this->db->insert_batch('upload_foto_sat', $data);
		return $insert ? true : false;
	}

	public function registrasiDataUser()
	{
		$data = [
			'nama_peserta' => $this->input->post('nama_peserta'),
			'nama_samar' => $this->input->post('nama_samar'),
			'no_hp' => $this->input->post('no_hp'),
			'email' => $this->input->post('email'),
			'password' => $this->input->post('password')

		];

		$this->db->insert('tb_peserta', $data);
	}

	public function getAllUser()
	{
		return $this->db->get('tb_peserta')->result_array();
	}
}
