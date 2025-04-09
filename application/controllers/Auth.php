<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function login()
	{
		$this->form_validation->set_rules('username', 'Username', 'required', array('requreid' => '%s Mohon Untuk Diisi!!!'));
		$this->form_validation->set_rules('password', 'password', 'required', array('requreid' => '%s Mohon Untuk Diisi!!!'));


		if ($this->form_validation->run() == TRUE) {
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$this->login->login($username, $password);
		} else {
			$data = array(
				'title' => 'Login User',
			);
			$this->load->view('v_login', $data, FALSE);
		}
	}

	public function logout()
	{
		$this->login->logout();
	}

	public function registrasi()
	{
		$this->form_validation->set_rules('nama_pelanggan', 'Nama Lengkap', 'required', array('required' => '%s Mohon untuk diisi!!!'));
		$this->form_validation->set_rules('alamat', 'Alamat', 'required', array('required' => '%s Mohon untuk diisi!!!'));
		$this->form_validation->set_rules('username', 'No Telphone', 'required', array('required' => '%s Mohon untuk diisi!!!'));
		$this->form_validation->set_rules('jenis_kel', 'Jenis Kelamin', 'required', array('required' => '%s Mohon untuk diisi!!!'));
		$this->form_validation->set_rules('email', 'Email', 'required|is_unique[pelanggan.email]', array(
			'required' => '%s Mohon untuk diisi!!!',
			'is_unique' => '%s Email Sudah Terdaptar'
		));
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[8]', array(
			'required' => '%s Mohon untuk diisi!!!',
			'min_length' => '%s Password Minimal 8',
			// 'regex_match' => '%s Password Harus Gabungan Huruf Besar, Angka Dan Hurup Kecil'
		));
		// $this->form_validation->set_rules('ulangi_password', 'Ulangi Password Pelanggan', 'required|matches[password]', array(
		//     'required' => '%s Mohon Untuk Diisi !!!',
		//     'matches' => '%s Password Tidak Sama !!!'
		// ));
		if ($this->form_validation->run() ==  FALSE) {
			$data = array(
				'title' => 'Registrasi Pelanggan',
			);
			$this->load->view('v_register', $data, FALSE);
		} else {
			$data = array(
				'nama_pelanggan' => $this->input->post('nama_pelanggan'),
				'jenis_kel' => $this->input->post('jenis_kel'),
				'username' => $this->input->post('username'),
				'email' => $this->input->post('email'),
				'password' => $this->input->post('password'),
				'alamat' => $this->input->post('alamat'),
				'level_member' => $this->input->post('level_member'),
				'point' => '0',
			);
			$this->m_auth->register($data);
			$this->session->set_flashdata('pesan', 'Register Berhasi, Silahkan Untuk Login');
			redirect('login');
		}
	}
}
