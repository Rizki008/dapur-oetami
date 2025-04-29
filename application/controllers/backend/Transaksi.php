<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies
		$this->load->model('m_transaksi', 'transaksi');
	}

	// List all your items
	public function index()
	{
		$data = array(
			'title' => 'Data Transaksi',
			'transaksi' => $this->transaksi->transaksi(),
			'isi' => 'backend/transaksi/v_transaksi'
		);
		$this->load->view('backend/v_wrapper', $data, FALSE);
	}

	// Add a new item
	public function detail_transaksi($id_pesanan)
	{
		$data = array(
			'title' => 'Detail Pesanan',
			'detail' => $this->transaksi->detail_transaksi($id_pesanan),
			'isi' => 'backend/transaksi/v_detail'
		);
		$this->load->view('backend/v_wrapper', $data, FALSE);
	}

	//Update one item
	public function konfirmasi($id_pesanan)
	{
		$data = array(
			'id_pesanan' => $id_pesanan,
			'status_order' => 2
		);
		$this->transaksi->update_status($data);
		$this->session->set_flashdata('pesan', 'Data Pesanan Berhasil Dikonfirmasi');
		redirect('transaksi', 'refresh');
	}
	public function kirim($id_pesanan)
	{
		$data = array(
			'id_pesanan' => $id_pesanan,
			'status_order' => 3
		);
		$this->transaksi->update_status($data);
		$this->session->set_flashdata('pesan', 'Data Pesanan Berhasil Dikirim/Dihidangkan');
		redirect('transaksi', 'refresh');
	}
	public function selesai($id_pesanan)
	{
		$data = array(
			'id_pesanan' => $id_pesanan,
			'status_order' => 4
		);
		$this->transaksi->update_status($data);
		$this->session->set_flashdata('pesan', 'Data Pesanan Berhasil Dikonfirmasi');
		redirect('pesanan', 'refresh');
	}
}

/* End of file Transaksi.php */
