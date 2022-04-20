<?php
defined('BASEPATH') or exit('No direct script access allowed');
class c_dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_dashboard');
    }
    public function index()
    {
        $data = array(
            'jml_pemesanan' => $this->m_dashboard->pemesanan_masuk(),
            'jml_menu' => $this->m_dashboard->jml_menu(),
            'boking' => $this->m_dashboard->boking()
        );
        $this->admin_login->cek_halaman();
        $this->load->view('Admin/head');
        $this->load->view('Admin/nav');
        $this->load->view('Admin/header');
        $this->load->view('Admin/vdashboard', $data);
        $this->load->view('Admin/footer');
    }
}
