<?php
defined('BASEPATH') or exit('No direct script access allowed');
class c_transaksi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_order');
    }
    public function index()
    {
        $this->admin_login->cek_halaman();
        $data = array(
            'transaksi' => $this->m_order->select_transaksi()
        );
        $this->load->view('Admin/head');
        $this->load->view('Admin/nav');
        $this->load->view('Admin/header');
        $this->load->view('Admin/vtransaksi', $data);
        $this->load->view('Admin/footer');
    }
    public function detail_transaksi($id_transaksi)
    {
        $data = array(
            'detail_transaksi' => $this->m_order->detail_transaksi($id_transaksi),
            'detail_pemesanan' => $this->m_order->detail_pemesanan($id_transaksi)
        );
        $this->load->view('Admin/head');
        $this->load->view('Admin/nav');
        $this->load->view('Admin/header');
        $this->load->view('Admin/vdetail_transaksi', $data);
        $this->load->view('Admin/footer');
    }
    public function bayar()
    {
        $isi['v1'] = (int)$this->input->post('total', true); //mengambil nilai yg dimasukan
        $isi['v2'] = (int)$this->input->post('bayar', true); //mengambil nilai yg dimasukan
        $isi['hasil'] = $isi['v2'] - $isi['v1'];
        $data = array(
            'bayar' => $this->input->post('bayar'),
            'kembali' => $isi['hasil'],
            'id_transaksi' => $this->input->post('id_transaksi')
        );
        $this->db->where('id_transaksi', $data['id_transaksi']);
        $this->db->update('detail_pembayaran', $data);


        $delete_boking = array(
            'id_transaksi' => $this->input->post('id_transaksi'),
        );
        $this->db->where('detail_boking.id_transaksi', $delete_boking['id_transaksi']);
        $this->db->delete('detail_boking');


        $this->session->set_flashdata('pesan', 'Pesanan Sudah Dibayar!!!');
        redirect('Admin/c_laporan/struk_pembelian/' . $data['id_transaksi']);
    }
}
