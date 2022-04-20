<?php
class m_produk extends CI_Model
{
    public function insert_kategori($data)
    {
        $this->db->insert('kategori', $data);
        $this->session->set_flashdata('pesan', 'Data Kategori Berhasil Ditambahkan!!!');
    }
    public function select_kategori()
    {
        $this->db->select('*');
        $this->db->from('kategori');
        return $this->db->get()->result();
    }
    public function select_produk()
    {
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->join('kategori', 'produk.id_kategori = kategori.id_kategori', 'left');
        return $this->db->get()->result();
    }
    public function hapus_produk($id_produk)
    {
        $this->db->where('id_produk', $id_produk);
        $this->db->delete('produk');
    }
    public function edit_kategori($id_kategori)
    {
        $data = array(
            'nama_kategori' => $this->input->post('nama')
        );
        $this->db->where('id_kategori', $id_kategori);
        $this->db->update('kategori', $data);
    }
    public function hapus_kategori($id_kategori)
    {
        $this->db->where('id_kategori', $id_kategori);
        $this->db->delete('kategori');
    }
}
