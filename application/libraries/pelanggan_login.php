<?php
defined('BASEPATH') or exit('No direct script access allowed');
class pelanggan_login
{
    protected $ci;
    public function __construct()
    {
        $this->ci = &get_instance();
        $this->ci->load->model('m_login_pelanggan');
    }
    public function login($email, $password)
    {
        $cek = $this->ci->m_login_pelanggan->login_pelanggan($email, $password);
        if ($cek) {
            $email = $cek->email;
            $id_pelanggan = $cek->id_pelanggan;
            //session
            $this->ci->session->set_userdata('email', $email);
            $this->ci->session->set_userdata('id_pelanggan', $id_pelanggan);
            redirect('Pelanggan/c_katalog');
        } else {
            //jika salah
            $this->ci->session->set_flashdata('gagal', 'Email Atau Password Salah!!!');
            redirect('Pelanggan/c_login');
        }
    }
    public function cek_halaman()
    {
        if ($this->ci->session->userdata('email') == '') {
            $this->ci->session->set_flashdata('gagal', 'Anda Belum login!!!');
            redirect('Pelanggan/c_login');
        }
    }
    public function logout()
    {
        $this->ci->session->unset_userdata('email');
        $this->ci->session->unset_userdata('id_pelanggan');
        $this->ci->session->set_flashdata('pesan', 'Anda Berhasil Logout!!!');
        redirect('Pelanggan/c_login');
    }
}
