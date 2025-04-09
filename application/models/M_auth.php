<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_auth extends CI_Model
{

	public function user_login($username, $password)
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where(array('username' => $username, 'password' => $password));
		return $this->db->get()->row();
	}

	//pelanggan
	public function register($data)
	{
		$this->db->insert('pelanggan', $data);
	}
	public function pelanggan_login($username, $password)
	{
		$this->db->select('*');
		$this->db->from('pelanggan');
		// $this->db->where('email', $username)->or_where('username', $username);
		// $this->db->where('password', $password);
		$this->db->where(array('username' => $username, 'password' => $password));
		$this->db->or_where(array('email' => $username, 'password' => $password));
		return $this->db->get()->row();
	}
}
