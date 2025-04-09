<?php



defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies
		$this->load->model('m_menu', 'menu');
		$this->load->model('m_kategori', 'kategori');
	}

	// List all your items
	public function index()
	{
		$data = array(
			'title' => 'Data Menu',
			'produk' => $this->menu->menu(),
			'isi' => 'backend/menu/v_menu'
		);
		$this->load->view('backend/v_wrapper', $data);
	}

	// Add a new item
	public function add()
	{
		$this->form_validation->set_rules('nama_menu', 'Menu Produk', 'required', array('required' => '%s Mohon Untuk Diisi'));
		if ($this->form_validation->run() == TRUE) {
			$config['upload_path'] = './assets/images/produk';
			$config['allowed_types'] = 'gif|jpg|jpeg|png';
			$config['max_size'] = '5000';
			$this->upload->initialize($config);
			$field_name = "gambar";
			if (!$this->upload->do_upload($field_name)) {
				$data = array(
					'title' => 'Tambah Menu Makanan',
					'kategori' => $this->kategori->kategori(),
					'error_upload' => $this->upload->display_errors(),
					'isi' => 'backend/menu/v_add'
				);
				$this->load->view('backend/v_wrapper', $data, FALSE);
			} else {
				$upload_data = array('uploads' => $this->upload->data());
				$config['image_library'] = 'gd2';
				$config['source_image'] = './assets/images/produk' . $upload_data['uploads']['file_name'];
				$this->load->library('image_lib', $config);
				$data = array(
					'id_kategori' => $this->input->post('id_kategori'),
					'nama_menu' => $this->input->post('nama_menu'),
					'harga' => $this->input->post('harga'),
					'deskripsi' => $this->input->post('deskripsi'),
					'gambar' => $upload_data['uploads']['file_name'],
				);
				$this->menu->add($data);
				redirect('menu', 'refresh');
			}
		}

		$data = array(
			'title' => 'Tambah Menu makanan',
			'kategori' => $this->kategori->kategori(),
			'isi' => 'backend/menu/v_add'
		);
		$this->load->view('backend/v_wrapper', $data, FALSE);
	}

	//Update one item
	public function update($id_menu)
	{
		$this->form_validation->set_rules('nama_menu', 'Menu Produk', 'required', array('required' => '%s Mohon Untuk Diisi'));
		if ($this->form_validation->run() == TRUE) {
			$config['upload_path'] = './assets/images/produk';
			$config['allowed_types'] = 'gif|jpg|jpeg|png';
			$config['max_size'] = '5000';
			$this->upload->initialize($config);
			$field_name = "gambar";
			if (!$this->upload->do_upload($field_name)) {
				$data = array(
					'title' => 'Update Menu Makanan',
					'produk' => $this->menu->detail_menu($id_menu),
					'kategori' => $this->kategori->kategori(),
					'error_upload' => $this->upload->display_errors(),
					'isi' => 'backend/menu/v_update'
				);
				$this->load->view('backend/v_wrapper', $data, FALSE);
			} else {
				$upload_data = array('uploads' => $this->upload->data());
				$config['image_library'] = 'gd2';
				$config['source_image'] = './assets/images/produk' . $upload_data['uploads']['file_name'];
				$this->load->library('image_lib', $config);
				$data = array(
					'id_menu' => $id_menu,
					'id_kategori' => $this->input->post('id_kategori'),
					'nama_menu' => $this->input->post('nama_menu'),
					'harga' => $this->input->post('harga'),
					'deskripsi' => $this->input->post('deskripsi'),
					'gambar' => $upload_data['uploads']['file_name'],
				);
				$this->menu->update($data);
				redirect('menu', 'refresh');
			}
			$data = array(
				'id_menu' => $id_menu,
				'id_kategori' => $this->input->post('id_kategori'),
				'nama_menu' => $this->input->post('nama_menu'),
				'harga' => $this->input->post('harga'),
				'deskripsi' => $this->input->post('deskripsi'),
			);
			$this->menu->update($data);
			redirect('menu', 'refresh');
		}

		$data = array(
			'title' => 'Update Menu makanan',
			'produk' => $this->menu->detail_menu($id_menu),
			'kategori' => $this->kategori->kategori(),
			'isi' => 'backend/menu/v_update'
		);
		$this->load->view('backend/v_wrapper', $data, FALSE);
	}

	//Delete one item
	public function delete($id_menu)
	{
		$data = array(
			'id_menu' => $id_menu,
		);
		$this->menu->delete($data);
		redirect('menu', 'refresh');
	}
}

/* End of file Master.php */
