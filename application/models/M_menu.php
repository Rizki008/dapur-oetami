<?php



defined('BASEPATH') or exit('No direct script access allowed');

class M_menu extends CI_Model
{
	// List all your items
	public function menu()
	{
		$this->db->select('*');
		$this->db->from('menu_makanan');
		$this->db->join('kategori', 'menu_makanan.id_kategori = kategori.id_kategori', 'left');
		return $this->db->get()->result();
	}

	public function detail_menu($id_menu)
	{
		$this->db->select('*');
		$this->db->from('menu_makanan');
		$this->db->join('kategori', 'menu_makanan.id_kategori = kategori.id_kategori', 'left');
		$this->db->where('id_menu', $id_menu);
		return $this->db->get()->row();
	}
	// Add a new item
	public function add($data)
	{
		$this->db->insert('menu_makanan', $data);
	}

	//Update one item
	public function update($data)
	{
		$this->db->where('id_menu', $data['id_menu']);
		$this->db->update('menu_makanan', $data);
	}

	//Delete one item
	public function delete($data)
	{
		$this->db->where('id_menu', $data['id_menu']);
		$this->db->delete('menu_makanan', $data);
	}

	//KERANJANG
	public function cek_keranjang($id_menu)
	{
		$this->db->select('*');
		$this->db->from('keranjang');
		$this->db->where('id_menu', $id_menu);
		$this->db->where('id_pelanggan', $this->session->userdata('id_pelanggan'));
		return $this->db->get()->row();
	}
	public function insertKeranjang($data)
	{
		$this->db->insert('keranjang', $data);
	}
	public function updateKeranjang($id_keranjang, $data)
	{
		$this->db->where('id_keranjang', $id_keranjang);
		$this->db->update('keranjang', $data);
	}
	public function selectKeranjang()
	{
		if ($this->session->userdata('id_pelanggan') != '') {
			$data['jml'] = $this->db->query("SELECT SUM(qty_keranjang) as jml FROM `keranjang` WHERE id_pelanggan=" . $this->session->userdata('id_pelanggan'))->row();
			$data['cart'] = $this->db->query("SELECT * FROM `keranjang` JOIN menu_makanan ON keranjang.id_menu=menu_makanan.id_menu WHERE id_pelanggan=" . $this->session->userdata('id_pelanggan'))->result();
			return $data;
		}
	}
	public function deleteKeranjang($id_keranjang)
	{
		$this->db->where('id_keranjang', $id_keranjang);
		$this->db->delete('keranjang');
	}

	public function update_keranjang($data)
	{
		$this->db->where('id_keranjang', $data['id_keranjang']);
		$this->db->update('keranjang', $data);
	}
	public function hapus($data)
	{
		$this->db->where('id_keranjang', $data['id_keranjang']);
		$this->db->delete('keranjang');
	}
	//end keranjang

	//pesanan
	public function pesanan()
	{
		$this->db->select('*');
		$this->db->from('transaksi a');
		$this->db->join('detail_pesanan b', 'a.no_order = a.no_order', 'left');
		$this->db->join('menu_makanan c', 'b.id_menu = c.id_menu', 'left');
		$this->db->where('a.id_pelanggan', $this->session->userdata('id_pelanggan'));
		$this->db->group_by('a.no_order');
		$this->db->order_by('a.tgl_pesanan', 'desc');
		return $this->db->get()->result();
	}
	public function detail_pesanan($id_pesanan)
	{
		$this->db->select('*');
		$this->db->from('transaksi a');
		$this->db->join('detail_pesanan b', 'a.no_order = b.no_order', 'left');
		$this->db->join('menu_makanan c', 'b.id_menu = c.id_menu', 'left');
		$this->db->where('a.id_pesanan', $id_pesanan);
		$this->db->order_by('a.tgl_pesanan', 'desc');
		// echo $this->db->last_query();
		// die();
		return $this->db->get()->result();
	}

	public function bayar($data)
	{
		$this->db->where('id_pesanan', $data['id_pesanan']);
		$this->db->update('transaksi', $data);
	}
}

/* End of file M_menu.php */
