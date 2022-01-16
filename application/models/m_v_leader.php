<?php
class m_v_leader extends  CI_Model
{
    public function add_v_leader($data)
    {
        if ($this->db->insert("v_leader", $data)) {
            return true;
        }
    }
}
