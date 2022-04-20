<?php
class m_login_admin extends CI_Model
{
    public function login_admin($username, $password)
    {
        $this->db->select('*');
        $this->db->from('admin');
        $this->db->where(array(
            'username' => $username,
            'password' => $password
        ));
        return $this->db->get()->row();
    }
    public function akun_admin()
    {
        $this->db->select('*');
        $this->db->from('admin');
        return $this->db->get()->result();
    }
}
