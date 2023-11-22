<?php
class Model_Peserta extends CI_Model
{
    public function getPeserta()
    {
        return $this->db->get('peserta');
    }
    public function getWherePeserta($data)
    {
        return $this->db->get_where('peserta', $data);
    }
    public function addPeserta($data)
    {
        return $this->db->insert('peserta', $data);
    }
    public function updatePeserta($data, $where)
    {
        return $this->db->update('peserta', $data, $where);
    }
    public function deletePeserta($data)
    {
        return $this->db->delete('peserta', $data);
    }
}
?>