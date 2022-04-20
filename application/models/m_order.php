<?php
class m_order extends CI_Model
{
    public function select_tempat()
    {
        $this->db->select('*');
        $this->db->from('tempat');
        return $this->db->get()->result();
    }
    //menampilkan hasil transaksi -> admin
    public function select_transaksi()
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->join('detail_pembayaran', 'transaksi.id_transaksi = detail_pembayaran.id_transaksi', 'left');
        return $this->db->get()->result();
    }
    public function detail_transaksi($id_transaksi)
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->join('detail_boking', 'transaksi.id_transaksi = detail_boking.id_transaksi', 'left');
        $this->db->join('detail_pembayaran', 'transaksi.id_transaksi = detail_pembayaran.id_transaksi', 'left');
        $this->db->where('transaksi.id_transaksi', $id_transaksi);
        return $this->db->get()->result();
    }
    public function detail_pemesanan($id_transaksi)
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->join('detail_pesan', 'transaksi.id_transaksi = detail_pesan.id_transaksi', 'left');
        $this->db->join('produk', 'detail_pesan.id_produk = produk.id_produk', 'left');
        $this->db->where('transaksi.id_transaksi', $id_transaksi);
        return $this->db->get()->result();
    }
}
