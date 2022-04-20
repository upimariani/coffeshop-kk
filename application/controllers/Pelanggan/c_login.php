<?php
defined('BASEPATH') or exit('No direct script access allowed');
class c_login extends CI_Controller
{
    public function index()
    {
        $this->form_validation->set_rules('email', 'Email', 'required', array(
            'required' => '%s Harus Diisi!!!'
        ));
        $this->form_validation->set_rules('password', 'Email', 'required', array(
            'required' => '%s Harus Diisi!!!'
        ));

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('Pelanggan/head');
            $this->load->view('Pelanggan/header');
            $this->load->view('Pelanggan/vlogin');
            $this->load->view('Pelanggan/footer');
        } else {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $this->pelanggan_login->login($email, $password);
        }
    }
    public function register()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required', array(
            'required' => '%s Harus Diisi!!!'
        ));
        $this->form_validation->set_rules('no_telp', 'No Telepon', 'required|min_length[11]|max_length[13]', array(
            'required' => '%s Harus Diisi!!!',
            'min_lenght' => '%s Minimal 11 Digit!!!',
            'max_lenght' => '%s Maksimal 13 Digit!!!'
        ));
        $this->form_validation->set_rules('alamat', 'Alamat', 'required', array(
            'required' => '%s Harus Diisi!!!'
        ));
        $this->form_validation->set_rules('email', 'Email', 'required', array(
            'required' => '%s Harus Diisi!!!'
        ));
        $this->form_validation->set_rules('password', 'Password', 'required', array(
            'required' => '%s Harus Diisi!!!'
        ));


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('Pelanggan/head');
            $this->load->view('Pelanggan/header');
            $this->load->view('Pelanggan/vregister');
            $this->load->view('Pelanggan/footer');
        } else {
            $data = array(
                'nama' => $this->input->post('nama'),
                'no_telp' => $this->input->post('no_telp'),
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password'),
                'alamat' => $this->input->post('alamat')

            );
            $this->db->insert('pelanggan', $data);
            $this->session->set_flashdata('pesan', 'Anda Berhasil Registrasi Akun!!!');

            redirect('Pelanggan/c_login');
        }
    }
    public function logout_pelanggan()
    {
        $this->pelanggan_login->logout();
    }
}
