<?php
class m_katalog extends CI_Model
{
    public function select_makanan()
    {
        $data = 'makanan';
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->join('kategori', 'produk.id_kategori = kategori.id_kategori', 'left');
        $this->db->where('kategori.nama_kategori', $data);
        return $this->db->get()->result();
    }
    public function select_minuman()
    {
        $data = 'coffe';
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->join('kategori', 'produk.id_kategori = kategori.id_kategori', 'left');
        $this->db->where('kategori.nama_kategori', $data);
        return $this->db->get()->result();
    }
    public function akun()
    {
        $this->db->select('*');
        $this->db->from('pelanggan');
        $this->db->where('id_pelanggan', $this->session->userdata('id_pelanggan'));
        return $this->db->get()->result();
    }
    public function produk()
    {
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->limit(4);
        return $this->db->get()->result();
    }
    public function kritik()
    {
        $this->db->select('*');
        $this->db->from('kritik');
        $this->db->join('pelanggan', 'kritik.id_pelanggan = pelanggan.id_pelanggan', 'left');

        return $this->db->get()->result();
    }
}
