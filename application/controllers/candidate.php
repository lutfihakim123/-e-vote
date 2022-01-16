<?php
class candidate extends  CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }
    public function index()
    {
        $this->db->join('leader', 'leader.id_leader=candidate.leader_id');
        $this->db->join('v_leader', 'v_leader.id_v_leader=candidate.v_leader_id');
        $this->db->order_by('candidate', 'ASC');
        $data['candidate'] = $this->db->get('candidate')->result();
        $data['title'] = 'Candidate';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('candidate/index.php');
        $this->load->view('templates/footer');
    }
    public function add_candidate()
    {
        $this->form_validation->set_rules('leader_id', 'Leader', 'required|trim');
        $this->form_validation->set_rules('v_leader_id', 'Vice Leader', 'required|trim');
        $this->form_validation->set_rules('visi', 'Visi', 'required|trim');
        $this->form_validation->set_rules('misi', 'Misi', 'required|trim');
        if ($this->form_validation->run() == false) {
            $data['leader'] = $this->db->get_where('leader', array('is_candidate' => ''))->result();
            $data['v_leader'] = $this->db->get_where('v_leader', array('is_candidate' => ''))->result();
            $data['c_candidate'] = $this->db->get('candidate')->num_rows();
            $data['title'] = 'Add Candidate';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('candidate/v_add_candidate.php');
            $this->load->view('templates/footer');
        } else {
            $candidate2 = $this->input->post('candidate', true);
            $image_candidate = $_FILES['img_candidate']['name'];
            if ($image_candidate) {
                $config['upload_path']          = './assets/img/profile/candidate/';
                $config['allowed_types']        = 'jpg|png|jpeg';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('img_candidate')) {
                    $new_image = $this->upload->data('file_name');
                    $data = array(
                        'leader_id' => htmlspecialchars($this->input->post('leader_id', true)),
                        'v_leader_id' => htmlspecialchars($this->input->post('v_leader_id', true)),
                        'candidate' => htmlspecialchars($this->input->post('candidate', true)),
                        'visi' => htmlspecialchars($this->input->post('visi', true)),
                        'misi' => htmlspecialchars($this->input->post('misi', true)),
                        'img_candidate' => $new_image
                    );
                    $this->db->insert('candidate', $data);

                    // change is_candidate leader
                    $this->db->set('is_candidate', $this->input->post('candidate', true));
                    $this->db->where('id_leader', $this->input->post('leader_id', true));
                    $this->db->update('leader');

                    // change is_candidate vice leader
                    $this->db->set('is_candidate', $candidate2);
                    $this->db->where('id_v_leader', $this->input->post('v_leader_id', true));
                    $this->db->update('v_leader');
                    $this->session->set_flashdata('message', '<div class="alert mb-2 col-form-label alert-primary  text-center" role="alert">
                    Data has increased 
                    </div>');
                    redirect(base_url('candidate'));
                } else {
                    $this->session->set_flashdata('message', '<div class="alert col-form-label alert-danger  text-center" role="alert">
                    only file JPG, PNG and JPEG  can upload here ! 
                    </div>');
                    redirect(base_url('candidate/v_add_candidate'));
                }
            }
        }
    }
    public function delete_candidate()
    {
        $id_candidate = $this->uri->segment('3');
        $data['candidate'] = $this->db->get_where('candidate', array("id_candidate" => $id_candidate))->row_array();
        $old_leader = $data['candidate']['leader_id'];
        $old_v_leader = $data['candidate']['v_leader_id'];

        // set is candidate as ''
        $this->db->set('is_candidate', '');
        $this->db->where('id_leader', $old_leader);
        $this->db->update('leader');


        // set is candidate as ''
        $this->db->set('is_candidate', '');
        $this->db->where('id_v_leader', $old_v_leader);
        $this->db->update('v_leader');



        $old_image = $data['candidate']['img_candidate'];
        if ($old_image != 'default.png') {
            unlink(FCPATH . 'assets/img/profile/candidate/' . $old_image);
        }
        $this->db->delete('candidate', 'id_candidate =' . $id_candidate);
        $this->session->set_flashdata('message', '<div class="alert ml-4 mb-2 col-form-label alert-danger  text-center" role="alert">
        Delete Data Success
        </div>');
        redirect(base_url('candidate'));
    }
    public function edit_candidate()
    {
        $id_candidate = $this->uri->segment('3');
        $data['leader'] = $this->db->get_where('leader', array('is_candidate' => ''))->result();
        $data['v_leader'] = $this->db->get_where('v_leader', array('is_candidate' => ''))->result();
        $this->db->join('leader', 'leader.id_leader=candidate.leader_id');
        $this->db->join('v_leader', 'v_leader.id_v_leader=candidate.v_leader_id');
        $data['candidate'] = $this->db->get_where('candidate', array("id_candidate" => $id_candidate))->row_array();

        $this->form_validation->set_rules('leader_id', 'Leader', 'required|trim');
        $this->form_validation->set_rules('v_leader_id', 'Vice Leader', 'required|trim');
        $this->form_validation->set_rules('visi', 'Visi', 'required|trim');
        $this->form_validation->set_rules('misi', 'Misi', 'required|trim');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Edit Candidate';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('candidate/v_edit_candidate');
            $this->load->view('templates/footer');
        } else {
            $image_candidate = $_FILES['img_candidate']['name'];
            if ($image_candidate) {
                $config['upload_path']          = './assets/img/profile/candidate/';
                $config['allowed_types']        = 'jpg|png|jpeg';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('img_candidate')) {
                    $old_image = $this->input->post('old_image');
                    if ($old_image != 'default.png') {
                        unlink(FCPATH . 'assets/img/profile/candidate/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('img_candidate', $new_image);
                } else {
                    $this->session->set_flashdata('message', '<div class="alert col-form-label alert-danger  text-center" role="alert">
                        only file JPG, PNG and JPEG  can upload in edit form ! 
                        </div>');
                    redirect(base_url("candidate"));
                }
            }
            $data = array(
                'leader_id' => htmlspecialchars($this->input->post('leader_id', true)),
                'v_leader_id' => htmlspecialchars($this->input->post('v_leader_id', true)),
                'candidate' => htmlspecialchars($this->input->post('candidate', true)),
                'visi' => htmlspecialchars($this->input->post('visi', true)),
                'misi' => htmlspecialchars($this->input->post('misi', true)),
            );
            $old_id_candidate = $this->input->post('id_candidate');
            $this->db->where('id_candidate', $old_id_candidate);
            $this->db->update('candidate', $data);

            // change is_candidate vice leader
            $this->db->set('is_candidate', $this->input->post('candidate', true));
            $this->db->where('id_leader', $this->input->post('leader_id', true));
            $this->db->update('leader');

            // change is_candidate vice leader
            $this->db->set('is_candidate', $this->input->post('candidate', true));
            $this->db->where('id_v_leader', $this->input->post('v_leader_id', true));
            $this->db->update('v_leader');

            // change leader to ''
            if ($this->input->post('leader_id', true) != $this->input->post('old_leader_id', true)) {
                $this->db->set('is_candidate', '');
                $this->db->where('id_leader', $this->input->post('old_leader_id', true));
                $this->db->update('leader');
            }

            // change vice leader to ''
            if ($this->input->post('v_leader_id', true) != $this->input->post('old_v_leader_id', true)) {
                $this->db->set('is_candidate', '');
                $this->db->where('id_v_leader', $this->input->post('old_v_leader_id', true));
                $this->db->update('v_leader');
            }

            // give flash data 
            $this->session->set_flashdata('message', '<div class="alert ml-4 mb-2 col-form-label alert-success  text-center" role="alert">
                Data has Edited 
                </div>');
            redirect(base_url("candidate"));
        }
    }
    public function detail_candidate()
    {
        $data['title'] = 'Detail Candidate';
        $id_candidate = $this->uri->segment('3');
        $this->db->join('leader', 'leader.id_leader=candidate.leader_id');
        $this->db->join('v_leader', 'v_leader.id_v_leader=candidate.v_leader_id');
        $data['candidate'] = $this->db->get_where('candidate', array("id_candidate" => $id_candidate))->row_array();
        $this->load->view('candidate/detail', $data);
    }
}
