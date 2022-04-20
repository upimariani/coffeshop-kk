<?php
class m_dashboard extends CI_Model
{
    public function pemesanan_masuk()
    {
        $tot_bayar = '0';
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where('transaksi.total_bayar', $tot_bayar);
        return $this->db->get()->num_rows();
    }
    public function jml_menu()
    {
        $this->db->select('*');
        $this->db->from('produk');
        return $this->db->get()->num_rows();
    }
    public function boking()
    {
        $this->db->select('*');
        $this->db->from('detail_boking');
        $this->db->join('tempat', 'detail_boking.id_tempat = tempat.id_tempat', 'left');
        $this->db->join('transaksi', 'transaksi.id_transaksi = detail_boking.id_transaksi', 'left');
        return $this->db->get()->result();
    }
}
