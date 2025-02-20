<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies

	}

	// List all your items
	public function index()
	{
		$data = array(
			'title' => 'Berada',
			'isi' => 'frontend/v_home',
		);
		$this->load->view('frontend/v_wrapper', $data);
	}

	// Add a new item
	public function add() {}

	//Update one item
	public function update($id = NULL) {}

	//Delete one item
	public function delete($id = NULL) {}
}

/* End of file Home.php */
