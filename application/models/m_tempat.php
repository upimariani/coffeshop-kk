<?php
class m_tempat extends CI_Model
{
    public function insert_tempat($data)
    {
        $this->db->insert('tempat', $data);
    }
    public function select_tempat()
    {
        $this->db->select('*');
        $this->db->from('tempat');
        return $this->db->get()->result();
    }
    public function update($id_tempat)
    {
        $data = array(
            'nama_kursi' => $this->input->post('kursi'),
            'no_kursi' => $this->input->post('no_kursi')
        );
        $this->db->where('id_tempat', $id_tempat);
        $this->db->update('tempat', $data);
    }
}
