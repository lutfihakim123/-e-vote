<?php
class m_login extends CI_Model
{
    function cek_login_admin($username, $password)
    {
        $query = $this->db->query("SELECT * FROM admin WHERE username='$username' AND password=MD5('$password') LIMIT 1");
        return $query;
    }
    function cek_login_voter($username, $password)
    {
        $query = $this->db->query("SELECT * FROM voter WHERE email='$username' AND password=MD5('$password') LIMIT 1");
        return $query;
    }
}
