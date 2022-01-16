<?php
class m_leader extends  CI_Model
{
    public function add_leader($data)
    {
        if ($this->db->insert("leader", $data)) {
            return true;
        }
    }
}
