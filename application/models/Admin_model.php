<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_model
{

	public function countUserAktif()
	{

		$query = $this->db->query(
			"SELECT COUNT(id_user) as jml_user
                               FROM mst_user
                               WHERE is_active = 1"
		);
		if ($query->num_rows() > 0) {
			return $query->row()->jml_user;
		} else {
			return 0;
		}
	}

	public function countUserTidakAktif()
	{

		$query = $this->db->query(
			"SELECT COUNT(id_user) as jml_user
                               FROM mst_user
                               WHERE is_active = 0"
		);
		if ($query->num_rows() > 0) {
			return $query->row()->jml_user;
		} else {
			return 0;
		}
	}

	public function countUserBulan()
	{

		$query = $this->db->query(
			"SELECT CONCAT(YEAR(date_created),'/',MONTH(date_created)) AS tahun_bulan, COUNT(*) AS count_bulan
                FROM mst_user 
                WHERE CONCAT(YEAR(date_created),'/',MONTH(date_created))=CONCAT(YEAR(NOW()),'/',MONTH(NOW()))
                GROUP BY YEAR(date_created),MONTH(date_created);"
		);
		if ($query->num_rows() > 0) {
			return $query->row()->count_bulan;
		} else {
			return 0;
		}
	}

	public function countAllUser()
	{
		$query = $this->db->query(
			"SELECT COUNT(id_user) as count_all
                               FROM mst_user"
		);
		if ($query->num_rows() > 0) {
			return $query->row()->count_all;
		} else {
			return 0;
		}
	}

	public function getRapat()
	{
		$query = "SELECT * 
                  FROM tb_rapat LEFT JOIN mst_jenis
                  ON tb_rapat.jenis_id = mst_jenis.id_jenis ";
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

	public function getPeserta($id_rapat)
	{
		$query = "SELECT * 
                  FROM tb_peserta                
				  WHERE rapat_id = '$id_rapat' AND status_peserta = 1";
		return $this->db->query($query)->result_array();
	}
	public function getpesertaByID($id)
	{
		return $this->db->get_where('mst_peserta', ['id_peserta' => $id])->row_array();;
	}
	public function verifikasipesertaByID($id)
	{
		$this->db->set('status_aktif', 1);
		$this->db->where('id_peserta', $id);
		$this->db->update('mst_peserta');
		return $this->db->affected_rows();
	}
}
