<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Auth extends CI_Controller

{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model', 'user');
	}

	public function index()
	{
		$this->form_validation->set_rules('email', 'Alamat Email', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		if ($this->form_validation->run() == false) {
			$this->load->view('auth/index');
		} else {
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$user = $this->db->get_where('mst_user', array('email' => $email))->row_array();
			if ($user) {
				if ($user['is_active'] == 1) {
					if (password_verify($password, $user['password'])) {
						$data = [
							'id_user' => $user['id_user'],
							'email' => $user['email'],
							'level' => $user['level']
						];
						$this->session->set_userdata($data);
						if ($user['level'] == 'Admin') {
							redirect('admin');
						} else {
							redirect('user');
						}
					} else {
						$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center font-weight-bolder" role="alert">Password salah</div>');
						redirect('auth/index');
					}
				} else {
					$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center font-weight-bolder" role="alert">User Tidak aktif</div>');
					redirect('auth/index');
				}
			} else {
				$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center font-weight-bolder" role="alert">Email dan Password tidak sama</div>');
				redirect('auth/index');
			}
		}
	}

	public function blocked()
	{
		$data['title'] = 'Access Forbidden';
		$data['user'] = $this->db->get_where('mst_user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('auth/blocked', $data);
	}

	public function logout()
	{
		$this->session->unset_userdata('id_user');
		$this->session->unset_userdata('level');
		$this->session->unset_userdata('email');
		$this->session->set_flashdata('message', 'Logout');
		redirect('auth/index');
	}

	public function register()
	{
		$this->load->model('User_model');
		$this->form_validation->set_rules('username', 'username', 'required');
		$this->form_validation->set_rules('nama', 'nama', 'required');
		$this->form_validation->set_rules('telepon', 'telepon', 'required');
		$this->form_validation->set_rules('email', 'email', 'required|trim|is_unique[mst_peserta.email]', array(
			'is_unique' => 'Alamat Email sudah ada'
		));
		$this->form_validation->set_rules('password', 'password', 'required|trim|min_length[3]|matches[password2]', array(
			'matches' => 'Password tidak sama',
			'min_length' => 'password min 3 karakter'
		));
		$this->form_validation->set_rules('password2', 'password', 'required|trim|matches[password]');

		if ($this->form_validation->run() == FALSE) {
			$data['title'] = 'Register';
			$data['peserta'] = $this->db->get_where('mst_peserta', ['email' => $this->session->userdata('email')])->row_array();
			$data['list_peserta'] = $this->db->get('mst_peserta')->result_array();

			$this->load->view('auth/register');
		} else {
			$this->User_model->registrasiDataUser();
			$this->session->set_flashdata('message', 'Selamat! Akun Anda Telah Dibuat. Tunggu hingga akun anda diverifikasi');
			redirect('auth/register');
		}
	}
}
