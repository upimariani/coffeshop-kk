<?php
defined('BASEPATH') or exit('No direct script access allowed');
class c_produk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_produk');
    }
    public function produk()
    {
        $this->admin_login->cek_halaman();
        $data = array(
            'produk' => $this->m_produk->select_produk(),
            'kategori' => $this->m_produk->select_kategori()
        );
        $this->load->view('Admin/head');
        $this->load->view('Admin/nav');
        $this->load->view('Admin/header');
        $this->load->view('Admin/vproduk', $data);
        $this->load->view('Admin/footer');
    }
    public function kategori()
    {
        $this->admin_login->cek_halaman();
        $data = array(
            'kategori' => $this->m_produk->select_kategori()
        );
        $this->load->view('Admin/head');
        $this->load->view('Admin/nav');
        $this->load->view('Admin/header');
        $this->load->view('Admin/vkategori', $data);
        $this->load->view('Admin/footer');
    }
    public function insert_kategori()
    {
        $data = array(
            'nama_kategori' => $this->input->post('nama')
        );
        $this->m_produk->insert_kategori($data);
        redirect('Admin/c_produk/kategori');
    }
    public function insert_produk()
    {
        $config['upload_path']          = './asset/gambar/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 3000;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('gambar')) {
            $data = array(
                'produk' => $this->m_produk->select_produk(),
                'kategori' => $this->m_produk->select_kategori(),
                'error' => $this->upload->display_errors()
            );
            $this->load->view('Admin/head');
            $this->load->view('Admin/nav');
            $this->load->view('Admin/header');
            $this->load->view('Admin/vproduk', $data);
            $this->load->view('Admin/footer');
        } else {
            $upload_data = $this->upload->data();
            $data = array(
                'id_kategori' => $this->input->post('kategori'),
                'nama_produk' => $this->input->post('nama'),
                'harga' => $this->input->post('harga'),
                'deskripsi' => $this->input->post('deskripsi'),
                'gambar' => $upload_data['file_name']
            );
            $this->db->insert('produk', $data);
            $this->session->set_flashdata('pesan', 'Data Produk Berhasil Disimpan!!!');
            redirect('Admin/c_produk/produk');
        }
    }
    public function edit_produk($id_produk)
    {
        $this->form_validation->set_rules('nama', 'Nama Produk', 'required', array('required' => '%s Mohon Untuk Diisi !!!'));
        if ($this->form_validation->run() == TRUE) {
            $config['upload_path']          = './asset/gambar/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['max_size']             = 3000;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('gambar')) {
                $data = array(
                    'produk' => $this->m_produk->select_produk(),
                    'kategori' => $this->m_produk->select_kategori()
                );
                $this->load->view('Admin/head');
                $this->load->view('Admin/nav');
                $this->load->view('Admin/header');
                $this->load->view('Admin/vproduk', $data);
                $this->load->view('Admin/footer');
            } else {
                $produk = $this->m_produk->select_produk();
                if ($produk->gambar !== "") {
                    unlink('./asset/gambar/' . $produk->gambar);
                }
                $upload_data =  $this->upload->data();
                $data = array(
                    'id_kategori' => $this->input->post('kategori'),
                    'nama_produk' => $this->input->post('nama'),
                    'harga' => $this->input->post('harga'),
                    'deskripsi' => $this->input->post('deskripsi'),
                    'gambar' => $upload_data['file_name']
                );
                $this->db->where('id_produk', $id_produk);
                $this->db->update('produk', $data);
                $this->session->set_flashdata('pesan', 'Data Produk Berhasil Diperbaharui!!!');
                redirect('Admin/c_produk/produk');
            } //tanpa ganti gambar
            $data = array(
                'id_kategori' => $this->input->post('kategori'),
                'nama_produk' => $this->input->post('nama'),
                'harga' => $this->input->post('harga'),
                'deskripsi' => $this->input->post('deskripsi')
            );
            $this->db->where('id_produk', $id_produk);
            $this->db->update('produk', $data);
            $this->session->set_flashdata('pesan', 'Data Produk Berhasil Diperbaharui!!!');
            redirect('Admin/c_produk/produk');
        }
        redirect('Admin/c_produk/produk');
    }
    public function hapus_produk($id_produk)
    {
        $this->m_produk->hapus_produk($id_produk);
        $this->session->set_flashdata('pesan', 'Data Produk Berhasil Dihapus!!!');
        redirect('Admin/c_produk/produk');
    }
    public function edit_kategori($id_kategori)
    {
        $this->m_produk->edit_kategori($id_kategori);
        $this->session->set_flashdata('pesan', 'Data Kategori Berhasil Diperbaharui!!!');
        redirect('Admin/c_produk/kategori');
    }
    public function hapus_kategori($id_kategori)
    {
        $this->m_produk->hapus_kategori($id_kategori);
        $this->session->set_flashdata('pesan', 'Data Kategori Berhasil Dihapus!!!');
        redirect('Admin/c_produk/kategori');
    }
}
