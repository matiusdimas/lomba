<?php
class Model_User extends CI_Model
{
    public function getUser()
    {
        return $this->db->get('admin');
    }
    public function getWhereUser($data)
    {
        return $this->db->get_where('admin', $data);
    }
    public function addUser($data)
    {
        return $this->db->insert('admin', $data);
    }
    public function updateUser($data, $where)
    {
        return $this->db->update('admin', $data, $where);
    }
    public function deleteUser($where)
    {
        return $this->db->delete('admin', $where);
    }
}
?>