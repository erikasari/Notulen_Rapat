<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		is_admin();
		$this->load->helper('ata');
		$this->load->helper('tglindo');
		$this->load->model('Admin_model', 'admin');
	}

	public function index()
	{
		$data['title'] = 'Beranda';
		$data['user'] = $this->db->get_where('mst_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['list_user'] = $this->db->get('mst_user')->result_array();

		$data['user_aktif'] = $this->admin->countUserAktif();
		$data['user_tak_aktif'] = $this->admin->countUserTidakAktif();
		$data['user_bulan'] = $this->admin->countUserBulan();
		$data['total_user'] = $this->admin->countAllUser();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar_admin', $data);
		$this->load->view('admin/index', $data);
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
		redirect('admin/index');
	}

	public function ubah_password()
	{
		$current_password = $this->input->post('current_password');
		$new_password = $this->input->post('new_password1');
		if ($current_password == $new_password) {
			$this->session->set_flashdata('msg', '<div class="alert alert-danger font-weight-bolder text-center" role="alert">Ubah Password Gagal !! <br> Password baru tidak boleh sama dengan password lama</div>');
			redirect('admin/index');
		} else {
			$password_hash = password_hash($new_password, PASSWORD_DEFAULT);
			$this->db->set('password', $password_hash);
			$this->db->where('id_user', $this->session->userdata('id_user'));
			$this->db->update('mst_user');
			$this->session->set_flashdata('message', 'Ubah Password');
			redirect('admin/index');
		}
	}

	public function man_user()
	{
		$this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim');
		$this->form_validation->set_rules('email', 'Alamat Email', 'required|trim|is_unique[mst_user.email]', array(
			'is_unique' => 'Alamat Email sudah ada'
		));
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', array(
			'matches' => 'Password tidak sama',
			'min_length' => 'password min 3 karakter'
		));
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

		if ($this->form_validation->run() == FALSE) {
			$data['title'] = 'Management User';
			$data['user'] = $this->db->get_where('mst_user', ['email' => $this->session->userdata('email')])->row_array();
			$data['list_user'] = $this->db->get('mst_user')->result_array();

			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar_admin', $data);
			$this->load->view('admin/master/man_user', $data);
			$this->load->view('templates/footer');
		} else {
			$data = array(
				'nama' => $this->input->post('nama', true),
				'email' => $this->input->post('email', true),
				'level' => $this->input->post('level', true),
				'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'date_created' => date('Y/m/d'),
				'image' => 'default.png',
				'is_active' => 1
			);
			$this->db->insert('mst_user', $data);
			$this->session->set_flashdata('message', 'Simpan Data');
			redirect('admin/man_user');
		}
	}

	public function man_peserta()
	{

		$this->form_validation->set_rules('username', 'username', 'required|trim');
		$this->form_validation->set_rules('email', 'Alamat Email', 'required|trim|is_unique[mst_peserta.email]', array(
			'is_unique' => 'Alamat Email sudah ada'
		));
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', array(
			'matches' => 'Password tidak sama',
			'min_length' => 'password min 3 karakter'
		));
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

		if ($this->form_validation->run() == FALSE) {
			$data['title'] = 'Management Peserta';
			$data['user'] = $this->db->get_where('mst_user', ['email' => $this->session->userdata('email')])->row_array();
			$data['list_peserta'] = $this->db->get('mst_peserta')->result_array();

			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar_admin', $data);
			$this->load->view('admin/master/man_peserta', $data);
			$this->load->view('templates/footer');
		} else {
			$data = array(
				'username' => $this->input->post('username', true),
				'email' => $this->input->post('email', true),
				'level' => $this->input->post('level', true),
				'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				// 'date_created' => date('Y/m/d'),
				'image' => 'default.png',
				'is_active' => 1
			);
			$this->db->insert('mst_peserta', $data);
			$this->session->set_flashdata('message', 'Simpan Data');
			redirect('admin/man_peserta');
		}
	}




	public function get_user()
	{
		$id_user = $this->input->post('id_user');
		echo json_encode($this->db->get_where('mst_user', ['id_user' => $id_user])->row_array());
	}

	public function get_peserta()
	{
		$id_peserta = $this->input->post('id_peserta');
		echo json_encode($this->db->get_where('mst_peserta', ['id_peserta' => $id_peserta])->row_array());
	}

	public function edit_user()
	{
		$id_user = $this->input->post('id_user');
		$nama = $this->input->post('nama');
		$level = $this->input->post('level');
		$is_active = $this->input->post('is_active');

		$this->db->set('nama', $nama);
		$this->db->set('level', $level);
		$this->db->set('is_active', $is_active);
		$this->db->where('id_user', $id_user);
		$this->db->update('mst_user');
		$this->session->set_flashdata('message', 'Simpan Perubahan');
		redirect('admin/man_user');
	}

	public function edit_peserta()
	{
		$id_peserta = $this->input->post('id_peserta');
		$username = $this->input->post('username');
		$is_active = $this->input->post('is_active');

		$this->db->set('username', $username);
		$this->db->set('is_active', $is_active);
		$this->db->where('id_peserta', $id_peserta);
		$this->db->update('mst_peserta');
		$this->session->set_flashdata('message', 'Simpan Perubahan');
		redirect('admin/man_peserta');
	}

	public function mst_jenis()
	{

		$this->form_validation->set_rules('jenis_rapat', 'Jenis Rapat', 'required|trim|is_unique[mst_jenis.jenis_rapat]', array(
			'is_unique' => 'Jenis Rapat Sudah Ada'
		));

		if ($this->form_validation->run() == FALSE) {
			$data['title'] = 'Master Jenis Rapat';
			$data['user'] = $this->db->get_where('mst_user', ['email' => $this->session->userdata('email')])->row_array();
			$data['list_jenis'] = $this->db->get('mst_jenis')->result_array();

			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar_admin', $data);
			$this->load->view('admin/master/mst_jenis', $data);
			$this->load->view('templates/footer');
		} else {
			$data = array(
				'jenis_rapat' => $this->input->post('jenis_rapat', true),
				'created_jenis' => date('Y/m/d'),
				'status_jenis' => 1
			);
			$this->db->insert('mst_jenis', $data);
			$this->session->set_flashdata('message', 'Simpan Data');
			redirect('admin/mst_jenis');
		}
	}

	public function get_jenis()
	{
		$id_jenis = $this->input->post('id_jenis');
		echo json_encode($this->db->get_where('mst_jenis', ['id_jenis' => $id_jenis])->row_array());
	}

	public function edit_jenis()
	{
		$id_jenis = $this->input->post('id_jenis');
		$jenis_rapat = $this->input->post('jenis_rapat');
		$status_jenis = $this->input->post('status_jenis');

		$this->db->set('jenis_rapat', $jenis_rapat);
		$this->db->set('status_jenis', $status_jenis);

		$this->db->where('id_jenis', $id_jenis);
		$this->db->update('mst_jenis');
		$this->session->set_flashdata('message', 'Simpan Perubahan');
		redirect('admin/mst_jenis');
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
			$data['list_rapat'] = $this->admin->getRapat();

			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar_admin', $data);
			$this->load->view('admin/data/rapat', $data);
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
			redirect('admin/rapat');
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
		$kode_rapat = $this->input->post('kode_rapat');
		$tgl_rapat = $this->input->post('tgl_rapat');
		$tema_rapat = $this->input->post('tema_rapat');
		$nama_rapat = $this->input->post('nama_rapat');
		$pengisi_rapat = $this->input->post('pengisi_rapat');
		$jam_mulai = $this->input->post('jam_mulai');
		$jam_selesai = $this->input->post('jam_selesai');

		$this->db->set('jenis_id', $jenis_id);
		$this->db->set('kode_rapat', $kode_rapat);
		$this->db->set('tgl_rapat', $tgl_rapat);
		$this->db->set('tema_rapat', $tema_rapat);
		$this->db->set('nama_rapat', $nama_rapat);
		$this->db->set('pengisi_rapat', $pengisi_rapat);
		$this->db->set('jam_mulai', $jam_mulai);
		$this->db->set('jam_selesai', $jam_selesai);

		$this->db->where('id_rapat', $id_rapat);
		$this->db->update('tb_rapat');
		$this->session->set_flashdata('message', 'Simpan Perubahan');
		redirect('admin/rapat');
	}

	public function view($id_rapat)
	{
		$this->form_validation->set_rules('rapat_kode', 'Kode Rapat', 'required|trim');

		if ($this->form_validation->run() == FALSE) {
			$data['title'] = 'Detail Rapat';
			$data['user'] = $this->db->get_where('mst_user', ['email' => $this->session->userdata('email')])->row_array();
			$data['list_jenis'] = $this->db->get_where('mst_jenis', ['status_jenis' => 1])->result_array();
			$data['list_rapat'] = $this->admin->getRapat();
			$data['rapat'] = $this->admin->getJoinRapat($id_rapat);
			$data['list_peserta'] = $this->admin->getPeserta($id_rapat);

			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar_admin', $data);
			$this->load->view('admin/data/view', $data);
			$this->load->view('templates/footer');
		} else {
			$id_rapat = $this->input->post('rapat_id', true);
			$data = array(
				'rapat_id' => $this->input->post('rapat_id', true),
				'rapat_kode' => $this->input->post('rapat_kode', true),
				'nama_peserta' => $this->input->post('nama_peserta', true),
				'no_hp' => $this->input->post('no_hp', true),
				'divisi' => $this->input->post('divisi', true),
				'jabatan' => $this->input->post('jabatan', true),
				'status_peserta' => 1
			);
			$this->db->insert('tb_peserta', $data);
			$this->session->set_flashdata('message', 'Tambah Peserta');
			redirect('admin/view/' . $id_rapat);
		}
	}

	public function batal($id_peserta)
	{
		$this->db->where('id_peserta', $id_peserta);
		$this->db->delete('tb_peserta');
		$this->session->set_sflashdata('message', 'Pembatalan Peserta');
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function email()
	{
		$data['title'] = 'Kirim Email';
		$data['user'] = $this->db->get_where('mst_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['list_peserta'] = $this->db->get('tb_peserta')->result_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar_admin', $data);
		$this->load->view('admin/email', $data);
		$this->load->view('templates/footer');


		// $this->load->view('admin/email');
	}
	public function verifikasi($id)
	{
		$this->peserta->verifikasipesertaByID($id);
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" roles="alert" >Pelanggan berhasil diverifikasi!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button></div>');
		redirect('admin/man_peserta', 'refresh');
	}
}
