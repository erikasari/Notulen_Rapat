<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Auth extends CI_Controller
{
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

	public function registrasi()
	{
		$this->load->view('auth/register');
	}
}
