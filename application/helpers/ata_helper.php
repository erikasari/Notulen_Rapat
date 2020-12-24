<?php

function is_logged_in()
{
	$ci = get_instance();
	if (!$ci->session->userdata('email')) {
		redirect('auth');
	}
}

function is_admin()
{
	$ci = get_instance();
	$level = $ci->session->userdata('level');
	$Akses = $ci->uri->segment(1);
	$ci->db->get_where('mst_user', ['level' => $Akses])->row_array();
	if ($level !== 'Admin') {
		redirect('auth/blocked');
	}
}

function is_user()
{
	$ci = get_instance();
	$level = $ci->session->userdata('level');
	$Akses = $ci->uri->segment(1);
	$ci->db->get_where('mst_user', ['level' => $Akses])->row_array();
	if ($level !== 'User') {
		redirect('auth/blocked');
	}
}
