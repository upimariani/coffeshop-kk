<?php
class m_login_pelanggan extends CI_Model
{
    public function register($data)
    {
        $this->db->insert('pelanggan', $data);
    }
    public function login_pelanggan($email, $password)
    {

        $this->db->select('*');
        $this->db->from('pelanggan');
        $this->db->where(array(
            'email' => $email,
            'password' => $password
        ));
        return $this->db->get()->row();

        $query = $this->db->query("delete from detail_boking where tgl_boking < DATE_SUB(NOW() , INTERVAL 1 DAY)");
        return $query;
    }
}
