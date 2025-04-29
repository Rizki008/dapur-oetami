<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Keranjang extends CI_Controller
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
			'title' => 'Chart',
			'chart' => $this->menu->selectKeranjang(),
			'isi' => 'frontend/cart/v_keranjang',
		);
		$this->load->view('frontend/v_wrapper', $data);
	}

	public function update_keranjang($id_keranjang)
	{
		$this->login->proteksi_halaman();
		$data = array(
			'id_keranjang' => $id_keranjang,
			'qty_keranjang' => $this->input->post('qty_keranjang')
		);
		$this->menu->update_keranjang($data);
		redirect('chart');
	}

	public function deleteCart($id_keranjang)
	{
		$this->login->proteksi_halaman();
		$this->menu->hapus($id_keranjang);
		redirect('chart');
	}

	//proses checkout
	public function checkout()
	{
		$this->login->proteksi_halaman();
		$this->form_validation->set_rules('kota', 'Kota', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat Lengkap', 'required');

		if ($this->form_validation->run() == FALSE) {
			$data = array(
				'title' => 'Order Pesanan Anda',
				'chart' => $this->menu->selectKeranjang(),
				'isi' => 'frontend/cart/v_checkout',
			);
			$this->load->view('frontend/v_wrapper', $data);
		} else {
			// $cart = $this->mKelolaDataMaster->select_kategori();
			$cart = $this->menu->selectKeranjang();
			$data = array(
				'no_order' => $this->input->post('no_order'),
				'id_pelanggan' => $this->session->userdata('id_pelanggan'),
				'grand_total' => $this->input->post('grand_total'),
				'total_bayar' => $this->input->post('total_bayar'),
				'no_hp' => $this->input->post('no_hp'),
				'kota' => $this->input->post('kota'),
				'alamat' => $this->input->post('alamat'),
				'estimasi' => $this->input->post('estimasi'),
				'ongkir' => $this->input->post('ongkir'),
				'status_order' => '0',
				'status_bayar' => '0',
				'status_pesanan' => $this->input->post('status_pesanan'),
				'bukti_bayar' => 'belum melakukan pembayaran',
				'tgl_pesanan' => date('Y-m-d'),
			);
			$this->db->insert('transaksi', $data);

			$i = 1;
			$j = 1;
			foreach ($cart['cart'] as $key => $item) {
				$data_rinci = array(
					'no_order' => $this->input->post('no_order'),
					'id_rinci' => $this->input->post('id_rinci' . $j++),
					'id_menu' => $item->id_menu,
					'qty' => $item->qty_keranjang,
				);
				$this->db->insert('detail_pesanan', $data_rinci);
			}

			// $this->cart->destroy();
			foreach ($cart['cart'] as $key => $valuesa) {
				$this->db->where('id_keranjang', $valuesa->id_keranjang);
				$this->db->delete('keranjang');
			}

			$this->session->set_flashdata('success', 'Pesanan Anda Berhasil, Silahkan melakukan pembayaran!');
			redirect('pesanan');
		}
	}

	public function pesanan()
	{
		$data = array(
			'title' => 'Data Pesanan',
			'chart' => $this->menu->selectKeranjang(),
			'pesanan' => $this->menu->pesanan(),
			'isi' => 'frontend/cart/v_pesanan'
		);
		$this->load->view('frontend/v_wrapper', $data, FALSE);
	}

	public function bayar($id_pesanan)
	{
		$this->form_validation->set_rules('total_bayar', 'Total Bayar', 'required');


		if ($this->form_validation->run() == TRUE) {
			$config['upload_path'] = './assets/images/pembayaran';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|ico';
			$config['max_size']             = 5000;
			$this->upload->initialize($config);
			$field_name = "bukti_bayar";
			if (!$this->upload->do_upload($field_name)) {
				$data = array(
					'title' => 'Pembayaran',
					'chart' => $this->menu->selectKeranjang(),
					'error' => $this->upload->display_error(),
					'pembayaran' => $this->menu->detail_pesanan($id_pesanan),
					'isi' => 'frontend/cart/v_pembayaran'
				);
				$this->load->view('frontend/v_wrapper', $data, FALSE);
			} else {
				$upload_data = array('uploads' => $this->upload->data());
				$config['image_library'] = 'gd2';
				$config['source_image'] = './assets/images/pembayaran' . $upload_data['uploads']['file_name'];
				$this->load->library('image_lib', $config);
				$data = array(
					'id_pesanan' => $id_pesanan,
					'total_bayar' => $this->input->post('total_bayar'),
					'status_order' => 1,
					'status_bayar' => 1,
					'bukti_bayar' => $upload_data['uploads']['file_name'],
				);
				$this->menu->bayar($data);
				$this->session->set_flashdata('success', 'Data Bukti Pembayaran Berhasil Dikirim!');
				redirect('pesanan');
			}
		}
		$data = array(
			'title' => 'Pembayaran',
			'chart' => $this->menu->selectKeranjang(),
			'pembayaran' => $this->menu->detail_pesanan($id_pesanan),
			'isi' => 'frontend/cart/v_pembayaran'
		);
		$this->load->view('frontend/v_wrapper', $data, FALSE);
	}

	public function detail_pesanan($id_pesanan)
	{
		$data = array(
			'title' => 'Detail Pesanan',
			'detail_pesanan' => $this->menu->detail_pesanan($id_pesanan),
			'chart' => $this->menu->selectKeranjang(),
			'isi' => 'frontend/cart/v_detail_pesanan'
		);
		// echo $this->db->last_query();
		// die();
		$this->load->view('frontend/v_wrapper', $data, FALSE);
	}
}

/* End of file Home.php */
