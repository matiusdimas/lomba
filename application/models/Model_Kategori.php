<?php
class Model_Kategori extends CI_Model
{
    public function getKategori()
    {
        return $this->db->get('lomba');
    }
    public function getWhereKategori($data)
    {
        return $this->db->get_where('lomba', $data);
    }
    public function addKategori($data)
    {
        return $this->db->insert('lomba', $data);
    }
    public function updateKategori($data, $where)
    {
        return $this->db->update('lomba', $data ,$where);
    }
    public function deleteKategori($data)
    {
        return $this->db->delete('lomba', $data);
    }
}
?>