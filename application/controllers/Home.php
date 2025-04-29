<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies
		$this->load->model('m_menu', 'menu');
	}

	// List all your items
	public function index()
	{
		$data = array(
			'title' => 'Beranda',
			'produk' => $this->menu->menu(),
			'chart' => $this->menu->selectKeranjang(),
			'isi' => 'frontend/v_home',
		);
		$this->load->view('frontend/v_wrapper', $data);
	}

	// Add a new item
	public function add()
	{
		$this->login->proteksi_halaman();
		$cek = $this->input->post('id_menu');
		$cek_menu = $this->menu->cek_keranjang($cek);
		if ($cek_menu) {
			$data = array(
				'qty_keranjang' => $cek_menu->qty_keranjang + 1
			);
			$this->menu->updateKeranjang($cek_menu->id_keranjang, $data);
		} else {
			$data = array(
				'id_menu' => $this->input->post('id_menu'),
				'id_pelanggan' => $this->session->userdata('id_pelanggan'),
				'qty_keranjang' => $this->input->post('qty_keranjang'),
			);
			$this->menu->insertKeranjang($data);
		}
		redirect('home', 'refresh');
	}

	//Update one item
	public function update()
	{
		$this->login->proteksi_halaman();
		$cart = $this->menu->selectKeranjang();
		$i = 1;
		foreach ($cart['cart'] as $key => $value) {
			$data = array(
				'qty_keranjang' => $this->input->post('qty_keranjang' . $i++)
			);
			$this->db->where('id_keranjang', $value->id_keranjang);
			$this->db->update('keranjang', $data);
			// echo $data['qty_cart'];
			// echo $value->id_cart;
		}
		redirect('chart', 'refresh');
	}

	//Delete one item
	public function delete($id_keranjang)
	{
		$this->login->proteksi_halaman();
		$this->menu->deleteKeranjang($id_keranjang);
		redirect('chart', 'refresh');
	}
}

/* End of file Home.php */
