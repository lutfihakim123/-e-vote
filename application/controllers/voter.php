<?php
class voter extends  CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }
    public function index()
    {
        if ($_SESSION['candidate_id'] != 0) {
            $this->db->join('candidate', 'candidate.id_candidate=voter.candidate_id');
            $this->db->join('leader', 'leader.id_leader=candidate.leader_id');
            $this->db->join('v_leader', 'v_leader.id_v_leader=candidate.v_leader_id');
            $data['h_vote'] = $this->db->get_where('voter', ['email' => $_SESSION['email']])->row_array();
            $this->db->join('leader', 'leader.id_leader=candidate.leader_id');
            $this->db->join('v_leader', 'v_leader.id_v_leader=candidate.v_leader_id');
            $this->db->join('voter', 'voter.candidate_id=candidate.id_candidate');
            $data['d_vote'] = $this->db->get_where('candidate', ['id_candidate' => $data['h_vote']['candidate_id']])->row_array();
        } else {
            $this->db->join('leader', 'leader.id_leader=candidate.leader_id');
            $this->db->join('v_leader', 'v_leader.id_v_leader=candidate.v_leader_id');
            $this->db->order_by('candidate', 'ASC');
            $data['candidate'] = $this->db->get('candidate')->result();
        }
        $data['title'] = 'Vote Your Candidate';
        $this->load->view('voter/index', $data);
    }
    public function detail_leader()
    {
        $id_leader = $this->uri->segment(3);
        $data['leader'] = $this->db->get_where('leader', ['id_leader' => $id_leader])->row_array();
        $data['title'] = $data['leader']['nama_lengkap_leader'];
        $this->load->view('voter/detail_leader', $data);
    }
    public function detail_v_leader()
    {
        $id_v_leader = $this->uri->segment(3);
        $data['v_leader'] = $this->db->get_where('v_leader', ['id_v_leader' => $id_v_leader])->row_array();
        $data['title'] = $data['v_leader']['nama_lengkap_v_leader'];
        $this->load->view('voter/detail_v_leader', $data);
    }
    public function vote()
    {
        $id_candidate = $this->input->get('id_candidate');
        $this->db->set('candidate_id', $id_candidate);
        $this->db->where('email', $_SESSION['email']);
        $this->db->update('voter');
        $this->session->set_flashdata('message', '<div class="alert col-form-label alert-success  text-center" role="alert">
                        <b>Thanks For Your Vote</b>
                        </div>');
        redirect(base_url('auth'));
    }
}
