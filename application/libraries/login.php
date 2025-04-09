<?php

defined('BASEPATH') or exit('No direct script access allowed');

class login
{
	protected $ci;

	public function __construct()
	{
		$this->ci = &get_instance();
		$this->ci->load->model('m_auth');
	}

	public function login($username, $password)
	{
		$cek = $this->ci->m_auth->user_login($username, $password);
		$cek_user = $this->ci->m_auth->pelanggan_login($username, $password);

		if ($cek) {
			$fullname = $cek->fullname;
			$username = $cek->username;
			$password = $cek->password;
			$level_user = $cek->level_user;

			$this->ci->session->set_userdata('fullname', $fullname);
			$this->ci->session->set_userdata('username', $username);
			$this->ci->session->set_userdata('password', $password);
			$this->ci->session->set_userdata('level_user', $level_user);

			if ($level_user == 1) {
				redirect('beranda');
			} elseif ($level_user == 2) {
				redirect('admin/pemilik');
			}
		} elseif ($cek_user) {
			$nama_pelanggan = $cek_user->nama_pelanggan;
			$jenis_kel = $cek_user->jenis_kel;
			$username = $cek_user->username;
			$email = $cek_user->email;
			$password = $cek_user->password;
			$alamat = $cek_user->alamat;
			$point = $cek_user->point;
			$level_member = $cek_user->level_member;

			$this->ci->session->set_userdata('nama_pelanggan', $nama_pelanggan);
			$this->ci->session->set_userdata('jenis_kel', $jenis_kel);
			$this->ci->session->set_userdata('username', $username);
			$this->ci->session->set_userdata('email', $email);
			$this->ci->session->set_userdata('password', $password);
			$this->ci->session->set_userdata('alamat', $alamat);
			$this->ci->session->set_userdata('point', $point);
			$this->ci->session->set_userdata('level_member', $level_member);
			redirect('home');
		} else {
			$this->ci->session->set_flashdata('error', 'Email/Username Atau Password Salah');
			redirect('login');
		}
	}

	public function proteksi_halaman()
	{
		if ($this->ci->session->userdata('username') == '') {
			$this->ci->session->set_flashdata('error', 'Anda Belum Login');
			redirect('login');
		}
	}

	public function logout()
	{
		$this->ci->session->unset_userdata('fullname');
		$this->ci->session->unset_userdata('username');
		$this->ci->session->unset_userdata('password');
		$this->ci->session->unset_userdata('level_user');
		$this->ci->session->set_flashdata('pesan', 'Berhasil Logout');
		redirect('login');
	}
	public function logout_pelanggan()
	{
		$this->ci->session->unset_userdata('nama_pelanggan');
		$this->ci->session->unset_userdata('jenis_kel');
		$this->ci->session->unset_userdata('username');
		$this->ci->session->unset_userdata('email');
		$this->ci->session->unset_userdata('password');
		$this->ci->session->unset_userdata('alamat');
		$this->ci->session->unset_userdata('point');
		$this->ci->session->unset_userdata('level_member');
		$this->ci->session->set_flashdata('pesan', 'Berhasil Logout');
		redirect('auth/login');
	}
}
