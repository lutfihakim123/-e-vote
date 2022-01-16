<?php
class Admin extends  CI_Controller
{
    public function index()
    {
        $data['leader'] = $this->db->get('leader')->num_rows();
        $data['v_leader'] = $this->db->get('v_leader')->num_rows();
        $data['candidate'] = $this->db->get('candidate')->num_rows();
        $data['voter'] = $this->db->get('voter')->num_rows();
        $data['title'] = 'Dashboard';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('page/dashboard.php');
        $this->load->view('templates/footer');
    }
}
