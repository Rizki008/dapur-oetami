<?php



defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies
		$this->load->model('m_kategori', 'kategori');
	}

	// List all your items
	public function index()
	{
		$data = array(
			'title' => 'Kategori Menu',
			'kategori' => $this->kategori->kategori(),
			'isi' => 'backend/kategori/v_kategori'
		);
		$this->load->view('backend/v_wrapper', $data);
	}

	// Add a new item
	public function add()
	{
		$data = array(
			'nama_kategori' => $this->input->post('nama_kategori'),
		);
		$this->kategori->add($data);
		redirect('backend/kategori', 'refresh');
	}

	//Update one item
	public function update($id_kategori)
	{
		$data = array(
			'id_kategori' => $id_kategori,
			'nama_kategori' => $this->input->post('nama_kategori'),
		);
		$this->kategori->update($data);
		redirect('backend/kategori', 'refresh');
	}

	//Delete one item
	public function delete($id_kategori)
	{
		$data = array(
			'id_kategori' => $id_kategori,
		);
		$this->kategori->delete($data);
		redirect('backend/kategori', 'refresh');
	}
}

/* End of file Master.php */
