<?php
class vote extends CI_Controller
{
    public function index()
    {
        $this->db->join('candidate', 'candidate.id_candidate=voter.candidate_id');
        $this->db->join('leader', 'leader.id_leader=candidate.leader_id');
        $this->db->join('v_leader', 'v_leader.id_v_leader=candidate.v_leader_id');
        $data['voter'] = $this->db->get('voter')->result();
        $this->db->join('leader', 'leader.id_leader=candidate.leader_id');
        $this->db->join('v_leader', 'v_leader.id_v_leader=candidate.v_leader_id');
        $this->db->join('voter', 'voter.candidate_id=candidate.id_candidate');
        $this->db->order_by('candidate', 'ASC');
        $data['candidate'] = $this->db->get('candidate')->row_array();
        $data['title'] = "Data Vote";
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('page/vote.php');
        $this->load->view('templates/footer');
    }
}
