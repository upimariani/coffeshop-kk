<?php
defined('BASEPATH') or exit('No direct script access allowed');
class cek_boking
{
    protected $ci;
    public function __construct()
    {
        $this->ci = &get_instance();
        $this->ci->load->model('m_boking');
    }
    public function cek_boking($datein, $kursi)
    {
        $cek = $this->ci->m_boking->cek_boking($datein, $kursi);
        if ($cek) {
            //jika kursi sudah ada yang dipesan
            $this->ci->session->set_flashdata('gagal', 'Data Boking Ada Yang Pesan!!!');
            redirect('Pelanggan/c_katalog');
        } else {
            //jika kursi dan tanggal kosong
            $this->ci->session->set_flashdata('pesan', 'Tanggal dan Kursi Kosong!!!');
            redirect('Pelanggan/c_katalog');
        }
    }
    public function pesan($datein, $kursi)
    {
        $cek = $this->ci->m_boking->cek_boking($datein, $kursi);
        if ($cek) {
            //jika kursi sudah ada yang dipesan
            $this->ci->session->set_flashdata('gagal', 'Data Boking Ada Yang Pesan!!!');
            redirect('Pelanggan/c_katalog/checkout');
        } else {
            //jika kursi dan tanggal kosong
            $this->ci->m_boking->boking();
            $this->ci->session->set_flashdata('pesan', 'Tanggal dan Kursi Kosong!!!');
            redirect('Pelanggan/c_katalog/pesanan_saya');
        }
    }
}
