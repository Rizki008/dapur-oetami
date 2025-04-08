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
}

/* End of file M_menu.php */
