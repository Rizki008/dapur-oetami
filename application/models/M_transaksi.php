<?php


defined('BASEPATH') or exit('No direct script access allowed');

class M_transaksi extends CI_Model
{

	// List all your items
	public function transaksi()
	{
		$this->db->select('*');
		$this->db->select_sum('qty');
		$this->db->from('transaksi');
		$this->db->join('pelanggan', 'transaksi.id_pelanggan = pelanggan.id_pelanggan', 'left');
		$this->db->join('detail_pesanan', 'transaksi.no_order = detail_pesanan.no_order', 'left');
		$this->db->group_by('transaksi.id_pesanan');

		return $this->db->get()->result();
	}

	public function detail_transaksi($id_pesanan)
	{
		$this->db->select('*');
		$this->db->from('transaksi');
		$this->db->join('pelanggan', 'transaksi.id_pelanggan = pelanggan.id_pelanggan', 'left');
		$this->db->join('detail_pesanan', 'transaksi.no_order = detail_pesanan.no_order', 'left');
		$this->db->join('menu_makanan', 'detail_pesanan.id_menu = menu_makanan.id_menu', 'left');
		$this->db->where('transaksi.id_pesanan', $id_pesanan);
		return $this->db->get()->result();
	}

	//Update one item
	public function update_status($data)
	{
		$this->db->where('transaksi.id_pesanan', $data['id_pesanan']);
		$this->db->update('transaksi', $data);
	}
}

/* End of file M_transaksi.php */
