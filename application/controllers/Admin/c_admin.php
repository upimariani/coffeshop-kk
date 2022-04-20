<?php
defined('BASEPATH') or exit('No direct script access allowed');
class c_admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_login_admin');
    }
    public function index()
    {
        $this->admin_login->cek_halaman();
        $data = array(
            'admin' => $this->m_login_admin->akun_admin()
        );
        $this->load->view('Admin/head');
        $this->load->view('Admin/nav');
        $this->load->view('Admin/header');
        $this->load->view('Admin/vadmin', $data);
        $this->load->view('Admin/footer');
    }
    public function insert_admin()
    {
        $data = array(
            'nama' => $this->input->post('nama'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password')
        );
        $this->db->insert('admin', $data);
        $this->session->set_flashdata('pesan', 'Data Admin Berhasil Ditambahkan!!!');
        redirect('Admin/c_admin');
    }
    public function edit_admin($id_admin)
    {
        $data = array(
            'nama' => $this->input->post('nama'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password')
        );
        $this->db->where('id_admin', $id_admin);
        $this->db->update('admin', $data);
        $this->session->set_flashdata('pesan', 'Data Admin Berhasil Diperbaharui!!!');
        redirect('Admin/c_admin');
    }
    public function hapus_admin($id_admin)
    {
        $this->db->where('id_admin', $id_admin);
        $this->db->delete('admin');
        $this->session->set_flashdata('pesan', 'Data Admin Berhasil Dihapus!!!');
        redirect('Admin/c_admin');
    }
}
