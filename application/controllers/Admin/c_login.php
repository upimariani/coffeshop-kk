<?php
defined('BASEPATH') or exit('No direct script access allowed');
class c_login extends CI_Controller
{
    public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'required', array(
            '%s Harus Diisi!!!'
        ));
        $this->form_validation->set_rules('password', 'Password', 'required', array(
            '%s Harus Diisi!!!'
        ));

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('Admin/vlogin');
        } else {
            $data = array(
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password')
            );
            $this->admin_login->login($data['username'], $data['password']);
        }
    }
    public function logout_admin()
    {
        $this->admin_login->logout();
    }
}
