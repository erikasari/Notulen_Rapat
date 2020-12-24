<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class User extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		is_user();
		$this->load->helper('ata');
		$this->load->helper('tglindo');
		$this->load->model('User_model', 'user');
	}

	public function index()
	{
		$data['title'] = 'Beranda';
		$data['user'] = $this->db->get_where('mst_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['hari_ini'] = $this->user->countRapatHari();
		$data['pending'] = $this->user->countRapatPending();
		$data['proses'] = $this->user->countRapatProses();
		$data['selesai'] = $this->user->countRapatSelesai();
		$data['januari'] = $this->user->perJanuariCount();
		$data['februari'] = $this->user->perFebruariCount();
		$data['maret'] = $this->user->perMaretCount();
		$data['april'] = $this->user->perAprilCount();
		$data['mei'] = $this->user->perMeiCount();
		$data['juni'] = $this->user->perJuniCount();
		$data['juli'] = $this->user->perJuliCount();
		$data['agustus'] = $this->user->perAgustusCount();
		$data['september'] = $this->user->perSeptemberCount();
		$data['oktober'] = $this->user->perOktoberCount();
		$data['november'] = $this->user->perNovemberCount();
		$data['desember'] = $this->user->perDesemberCount();
		$data['list_rapat'] = $this->user->getRapatIndex();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar_user', $data);
		$this->load->view('user/index', $data);
		$this->load->view('templates/footer');
	}

	public function edit_profile()
	{
		$upload_image = $_FILES['image']['name'];
		if ($upload_image) {
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']     = '2048';
			$config['upload_path'] = './assets/dist/img/profile/';
			$this->load->library('upload', $config);
			if ($this->upload->do_upload('image')) {
				$data['user'] = $this->db->get_where('mst_user', ['email' => $this->session->userdata('email')])->row_array();
				$old_image = $data['user']['image'];
				if ($old_image != 'default.png') {
					unlink(FCPATH . 'assets/dist/img/profile/' . $old_image);
				}
				$new_image = $this->upload->data('file_name');
				$this->db->set('image', $new_image);
			} else {
				echo $this->upload->display_errors();
			}
		}
		$nama = $this->input->post('nama');
		$this->db->set('nama', $nama);
		$this->db->update('mst_user');
		$this->session->set_flashdata('message', 'Simpan Perubahan');
		redirect('user/index');
	}

	public function ubah_password()
	{
		$current_password = $this->input->post('current_password');
		$new_password = $this->input->post('new_password1');
		if ($current_password == $new_password) {
			$this->session->set_flashdata('msg', '<div class="alert alert-danger font-weight-bolder text-center" role="alert">Ubah Password Gagal !! <br> Password baru tidak boleh sama dengan password lama</div>');
			redirect('user/index');
		} else {
			$password_hash = password_hash($new_password, PASSWORD_DEFAULT);
			$this->db->set('password', $password_hash);
			$this->db->where('id_user', $this->session->userdata('id_user'));
			$this->db->update('mst_user');
			$this->session->set_flashdata('message', 'Ubah Password');
			redirect('user/index');
		}
	}

	public function rapat()
	{
		$this->form_validation->set_rules('kode_rapat', 'Jenis Rapat', 'required|trim|is_unique[tb_rapat.kode_rapat]', array(
			'is_unique' => 'Kode Rapat Sudah Ada'
		));

		if ($this->form_validation->run() == FALSE) {
			$data['title'] = 'List Rapat';
			$data['user'] = $this->db->get_where('mst_user', ['email' => $this->session->userdata('email')])->row_array();
			$data['list_jenis'] = $this->db->get_where('mst_jenis', ['status_jenis' => 1])->result_array();
			$data['list_rapat'] = $this->user->getRapat();

			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar_user', $data);
			$this->load->view('user/rapat', $data);
			$this->load->view('templates/footer');
		} else {
			$data = array(
				'jenis_id' => $this->input->post('jenis_id', true),
				'kode_rapat' => $this->input->post('kode_rapat', true),
				'tgl_rapat' => $this->input->post('tgl_rapat', true),
				'tema_rapat' => $this->input->post('tema_rapat', true),
				'nama_rapat' => $this->input->post('nama_rapat', true),
				'pengisi_rapat' => $this->input->post('pengisi_rapat', true),
				'jam_mulai' => $this->input->post('jam_mulai', true),
				'jam_selesai' => $this->input->post('jam_selesai', true),
				'status_rapat' => 1
			);
			$this->db->insert('tb_rapat', $data);
			$this->session->set_flashdata('message', 'Simpan Data');
			redirect('user/rapat');
		}
	}

	public function get_rapat()
	{
		$id_rapat = $this->input->post('id_rapat');
		echo json_encode($this->db->get_where('tb_rapat', ['id_rapat' => $id_rapat])->row_array());
	}

	public function edit_rapat()
	{
		$id_rapat = $this->input->post('id_rapat');
		$jenis_id = $this->input->post('jenis_id');
		$tgl_rapat = $this->input->post('tgl_rapat');
		$tema_rapat = $this->input->post('tema_rapat');
		$nama_rapat = $this->input->post('nama_rapat');
		$pengisi_rapat = $this->input->post('pengisi_rapat');
		$jam_mulai = $this->input->post('jam_mulai');
		$jam_selesai = $this->input->post('jam_selesai');

		$this->db->set('jenis_id', $jenis_id);
		$this->db->set('tgl_rapat', $tgl_rapat);
		$this->db->set('tema_rapat', $tema_rapat);
		$this->db->set('nama_rapat', $nama_rapat);
		$this->db->set('pengisi_rapat', $pengisi_rapat);
		$this->db->set('jam_mulai', $jam_mulai);
		$this->db->set('jam_selesai', $jam_selesai);

		$this->db->where('id_rapat', $id_rapat);
		$this->db->update('tb_rapat');
		$this->session->set_flashdata('message', 'Simpan Perubahan');
		redirect('user/rapat');
	}

	public function selesai()
	{
		$this->form_validation->set_rules('rapat_id_not', 'ID Rapat', 'required|trim|is_unique[tb_notulen.rapat_id_not]', array(
			'is_unique' => 'Data Notulen sudah dibuat'
		));


		if ($this->form_validation->run() == FALSE) {
			$data['title'] = 'List Rapat Selesai';
			$data['user'] = $this->db->get_where('mst_user', ['email' => $this->session->userdata('email')])->row_array();
			$data['list_jenis'] = $this->db->get_where('mst_jenis', ['status_jenis' => 1])->result_array();
			$data['list_rapat'] = $this->user->getRapatSelesai();

			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar_user', $data);
			$this->load->view('user/selesai', $data);
			$this->load->view('templates/footer');
		} else {
			$data = array(
				'rapat_id_not' => $this->input->post('rapat_id_not', true),
				'rapat_kode_not' => $this->input->post('rapat_kode_not', true),
				'hasil_rapat' => $this->input->post('hasil_rapat', true),
				'tuj_rapat' => $this->input->post('tuj_rapat', true),
				'pembuat_notulen' => $this->input->post('pembuat_notulen', true),
				'jabatan_notulen' => $this->input->post('jabatan_notulen', true),
				'divisi_notulen' => $this->input->post('divisi_notulen', true),
				'nik_notulen' => $this->input->post('nik_notulen', true)
			);
			$this->db->insert('tb_notulen', $data);
			$this->session->set_flashdata('message', 'Simpan Data');
			redirect('user/selesai');
		}
	}

	public function proses()
	{
		$this->form_validation->set_rules('rapat_id_not', 'ID Rapat', 'required|trim|is_unique[tb_notulen.rapat_id_not]', array(
			'is_unique' => 'Data Notulen sudah dibuat'
		));

		if ($this->form_validation->run() == FALSE) {
			$data['title'] = 'List Rapat Berlangsung';
			$data['user'] = $this->db->get_where('mst_user', ['email' => $this->session->userdata('email')])->row_array();
			$data['list_jenis'] = $this->db->get_where('mst_jenis', ['status_jenis' => 1])->result_array();
			$data['list_rapat'] = $this->user->getRapatProses();

			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar_user', $data);
			$this->load->view('user/proses', $data);
			$this->load->view('templates/footer');
		} else {
			$data = array(
				'rapat_id_not' => $this->input->post('rapat_id_not', true),
				'rapat_kode_not' => $this->input->post('rapat_kode_not', true),
				'hasil_rapat' => $this->input->post('hasil_rapat', true),
				'tuj_rapat' => $this->input->post('tuj_rapat', true),
				'pembuat_notulen' => $this->input->post('pembuat_notulen', true),
				'jabatan_notulen' => $this->input->post('jabatan_notulen', true),
				'divisi_notulen' => $this->input->post('divisi_notulen', true),
				'nik_notulen' => $this->input->post('nik_notulen', true)
			);
			$this->db->insert('tb_notulen', $data);
			$this->session->set_flashdata('message', 'Simpan Data');
			redirect('user/proses');
		}
	}

	public function ubah_status()
	{
		$id_rapat = $this->input->post('id_rapat');
		$status_rapat = $this->input->post('status_rapat');

		$this->db->set('status_rapat', $status_rapat);

		$this->db->where('id_rapat', $id_rapat);
		$this->db->update('tb_rapat');
		$this->session->set_flashdata('message', 'Konfirmasi Status');
		redirect('user/rapat');
	}

	public function upload_gbr()
	{
		$count = count($_FILES['files']['name']);
		for ($i = 0; $i < $count; $i++) {
			if (!empty($_FILES['files']['name'][$i])) {
				$_FILES['file']['name'] = $_FILES['files']['name'][$i];
				$_FILES['file']['type'] = $_FILES['files']['type'][$i];
				$_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
				$_FILES['file']['error'] = $_FILES['files']['error'][$i];
				$_FILES['file']['size'] = $_FILES['files']['size'][$i];
				$config['upload_path'] = 'assets/images/';
				$config['allowed_types'] = 'jpg|jpeg|png|gif';
				$config['max_size'] = '1024';
				$this->load->library('upload', $config);
				if ($this->upload->do_upload('file')) {
					$uploadData = $this->upload->data();
					$filename[$i]['rapat_id_gbr'] = $this->input->post('rapat_id_gbr', true);
					$filename[$i]['rapat_kode_gbr'] = $this->input->post('rapat_kode_gbr', true);
					$filename[$i]['gambar'] = $uploadData['file_name'];
				}
			}
		}
		$this->session->set_flashdata('msg', 'Tidak data gambar');
		if (!empty($filename)) {
			//Insert file information into the database
			$insert = $this->user->insert($filename);
			$statusMsg = $insert ? 'Upload ' : 'File tidak bisa diupload.';
			$this->session->set_flashdata('message', $statusMsg);
		}
		$rapat_id = $this->input->post('rapat_id_gbr', true);
		redirect('user/view_gambar/' . $rapat_id);
	}

	public function view($id_rapat)
	{
		$this->form_validation->set_rules('rapat_kode', 'Kode Rapat', 'required|trim');

		if ($this->form_validation->run() == FALSE) {
			$data['title'] = 'Detail Rapat';
			$data['user'] = $this->db->get_where('mst_user', ['email' => $this->session->userdata('email')])->row_array();
			$data['list_jenis'] = $this->db->get_where('mst_jenis', ['status_jenis' => 1])->result_array();
			$data['list_rapat'] = $this->user->getRapat();
			$data['rapat'] = $this->user->getJoinRapat($id_rapat);
			$data['list_peserta'] = $this->user->getPeserta($id_rapat);

			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar_user', $data);
			$this->load->view('user/view', $data);
			$this->load->view('templates/footer');
		} else {
			$id_rapat = $this->input->post('rapat_id', true);
			$data = array(
				'rapat_id' => $this->input->post('rapat_id', true),
				'rapat_kode' => $this->input->post('rapat_kode', true),
				'nama_peserta' => $this->input->post('nama_peserta', true),
				'email' => $this->input->post('email', true),
				'no_hp' => $this->input->post('no_hp', true),
				'divisi' => $this->input->post('divisi', true),
				'jabatan' => $this->input->post('jabatan', true),
				'status_peserta' => 1
			);
			$this->db->insert('tb_peserta', $data);
			$this->session->set_flashdata('message', 'Tambah Peserta');
			redirect('user/view/' . $id_rapat);
		}
	}

	public function view_gambar($id_rapat)
	{
		$data['title'] = 'Foto Rapat';
		$data['user'] = $this->db->get_where('mst_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['rapat'] = $this->user->getJoinRapat($id_rapat);
		$data['gambar'] = $this->db->get_where('upload_foto', ['rapat_id_pict' => $id_rapat])->result_array();
		$data['gambar_satuan'] = $this->db->get_where('upload_foto_sat', ['rapat_id_gbr' => $id_rapat])->result_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar_user', $data);
		$this->load->view('user/view_gambar', $data);
		$this->load->view('templates/footer');
	}

	public function del_gambar($id_foto)
	{
		$_id = $this->db->get_where('upload_foto_sat', ['id_foto' => $id_foto])->row();
		$query = $this->db->delete('upload_foto_sat', ['id_foto' => $id_foto]);
		if ($query) {
			unlink("./assets/images/" . $_id->gambar);
		}
		$this->session->set_flashdata('message', 'Hapus Data');
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function batal($id_peserta)
	{
		$this->db->where('id_peserta', $id_peserta);
		$this->db->delete('tb_peserta');
		$this->session->set_flashdata('message', 'Pembatalan Peserta');
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function cetak($id_rapat)
	{
		$data['title'] = 'Cetak Laporan';
		$data['user'] = $this->db->get_where('mst_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['list_rapat'] = $this->user->getRapat();
		$data['rapat'] = $this->user->getJoinRapat($id_rapat);
		$data['list_peserta'] = $this->user->getPeserta($id_rapat);

		$this->load->view('user/cetak/cetak', $data);
	}

	public function cetak_notulen($id_rapat)
	{
		$data['title'] = 'Cetak Laporan';
		$data['user'] = $this->db->get_where('mst_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['list_rapat'] = $this->user->getRapat();
		$data['rapat'] = $this->user->getJoinRapatNotulen($id_rapat);
		$data['list_peserta'] = $this->user->getPeserta($id_rapat);

		$this->load->view('user/cetak/cetak_notulen', $data);
	}
}
