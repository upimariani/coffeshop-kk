<?php
defined('BASEPATH') or exit('No direct script access allowed');
class c_tempat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_tempat');
    }
    public function index()
    {
        $this->admin_login->cek_halaman();
        $data = array(
            'tempat' => $this->m_tempat->select_tempat()
        );
        $this->load->view('Admin/head');
        $this->load->view('Admin/nav');
        $this->load->view('Admin/header');
        $this->load->view('Admin/vtempat', $data);
        $this->load->view('Admin/footer');
    }
    public function insert_tempat()
    {
        $data = array(
            'nama_kursi' => $this->input->post('kursi'),
            'no_kursi' => $this->input->post('no')
        );
        $this->m_tempat->insert_tempat($data);
        $this->session->set_flashdata('pesan', 'Data Tempat Berhasil Disimpan!!!');
        redirect('Admin/c_tempat');
    }
    public function update_tempat($id_tempat)
    {
        $this->m_tempat->update($id_tempat);
        $this->session->set_flashdata('pesan', 'Data Tempat Berhasil Diperbaharui!!!');
        redirect('Admin/c_tempat');
    }
}
