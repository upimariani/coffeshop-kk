<?php
class m_pesanan_pelanggan extends CI_Model
{
    public function select_pesanan()
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->join('detail_boking', 'transaksi.id_transaksi = detail_boking.id_transaksi', 'left');
        $this->db->join('tempat', 'detail_boking.id_tempat = tempat.id_tempat', 'left');
        $this->db->join('detail_pembayaran', 'transaksi.id_transaksi = detail_pembayaran.id_transaksi', 'left');
        $this->db->where('detail_pembayaran.bayar=0');
        $this->db->where('id_pelanggan', $this->session->userdata('id_pelanggan'));
        return $this->db->get()->result();
    }
    public function detail_pesanan($id_transaksi)
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->join('detail_pesan', 'transaksi.id_transaksi = detail_pesan.id_transaksi', 'left');
        $this->db->join('produk', 'detail_pesan.id_produk = produk.id_produk', 'left');
        $this->db->where('transaksi.id_transaksi', $id_transaksi);
        return $this->db->get()->result();
    }
    public function batalkan_pesanan($id_transaksi)
    {
        $this->db->trans_start();
        $this->db->delete('transaksi', array('id_transaksi' => $id_transaksi));
        $this->db->delete('detail_pesan', array('id_transaksi' => $id_transaksi));
        $this->db->delete('detail_boking', array('id_transaksi' => $id_transaksi));
        $this->db->delete('detail_pembayaran', array('id_transaksi' => $id_transaksi));
        $this->db->trans_complete();
    }
}
