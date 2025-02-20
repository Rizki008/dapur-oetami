<?php

defined('BASEPATH') or exit('No direct script access allowed');

class admin extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies

	}

	// List all your items
	public function index($offset = 0)
	{
		$data = array(
			'title' => 'Beranda',
			'isi' => 'backend/v_admin',
		);
		$this->load->view('backend/v_wrapper', $data);
	}

	// Add a new item
	public function add() {}

	//Update one item
	public function update($id = NULL) {}

	//Delete one item
	public function delete($id = NULL) {}
}

/* End of file admin.php */
