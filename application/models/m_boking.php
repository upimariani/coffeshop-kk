<?php
class m_boking extends CI_Model
{
    public function cek_boking($datein, $kursi)
    {
        $this->db->select('*');
        $this->db->from('detail_boking');
        $this->db->where(array(
            'tgl_boking' => $datein,
            'id_tempat' => $kursi
        ));
        return $this->db->get()->row();
    }
    public function boking()
    {
        $data = array(
            'id_transaksi' => $this->input->post('id_transaksi'),
            'id_pelanggan' => $this->session->userdata('id_pelanggan'),
            'atas_nama' => $this->input->post('nama'),
            'no_telpn' => $this->input->post('no_tlp'),
            'total_bayar' => $this->input->post('tot_bayar'),
            'catatan' => $this->input->post('catatan'),
            'pembayaran' => $this->input->post('pembayaran')
        );
        $this->db->insert('transaksi', $data);

        $detail = array(
            'id_tempat' => $this->input->post('kursi'),
            'id_transaksi' => $this->input->post('id_transaksi'),
            'tgl_boking' => $this->input->post('datein')
        );
        $this->db->insert('detail_boking', $detail);

        $i = 1;
        foreach ($this->cart->contents() as $item) {
            $data_rinci = array(
                'id_transaksi' => $this->input->post('id_transaksi'),
                'id_produk' => $item['id'],
                'qty' => $this->input->post('qty' . $i++)
            );
            $this->db->insert('detail_pesan', $data_rinci);
            $this->cart->destroy();
        }
        $pembayaran = array(
            'id_transaksi' => $this->input->post('id_transaksi'),
            'bayar' => '0',
            'kembali' => '0'
        );
        $this->db->insert('detail_pembayaran', $pembayaran);
    }
    public function pesan()
    {
        $data = array(
            'id_transaksi' => $this->input->post('id_transaksi'),
            'id_pelanggan' => $this->session->userdata('id_pelanggan'),
            'atas_nama' => $this->input->post('nama'),
            'no_telpn' => $this->input->post('no_tlp'),
            'total_bayar' => $this->input->post('tot_bayar'),
            'catatan' => $this->input->post('catatan'),
            'pembayaran' => $this->input->post('pembayaran')
        );
        $this->db->insert('transaksi', $data);

        $detail = array(
            'id_tempat' => '-',
            'id_transaksi' => $this->input->post('id_transaksi'),
            'tgl_boking' => '-'
        );
        $this->db->insert('detail_boking', $detail);
        $i = 1;
        foreach ($this->cart->contents() as $item) {
            $data_rinci = array(
                'id_transaksi' => $this->input->post('id_transaksi'),
                'id_produk' => $item['id'],
                'qty' => $this->input->post('qty' . $i++)
            );
            $this->db->insert('detail_pesan', $data_rinci);
            $this->cart->destroy();
        }
        $pembayaran = array(
            'id_transaksi' => $this->input->post('id_transaksi'),
            'bayar' => '0',
            'kembali' => '0'
        );
        $this->db->insert('detail_pembayaran', $pembayaran);
    }

    public function detail_boking()
    {
        $this->db->select('*');
        $this->db->from('detail_boking');
        $this->db->join('tempat', 'detail_boking.id_tempat = tempat.id_tempat', 'left');
        $this->db->order_by('tgl_boking', 'desc');
        return $this->db->get()->result();
    }
}
