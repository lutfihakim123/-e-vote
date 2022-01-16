<?php
class v_leader extends  CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('m_v_leader');
    }
    public function index()
    {
        $this->db->order_by('nama_lengkap_v_leader', 'ASC');
        $query = $this->db->get('v_leader');
        $data['v_leader'] = $query->result();
        $data['title'] = 'Vice Leader';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('v_leader/index.php');
        $this->load->view('templates/footer');
    }
    public function add_v_leader()
    {
        $this->form_validation->set_rules('nama_lengkap_v_leader', 'Full Name', 'required|trim');
        $this->form_validation->set_rules('sd_v_leader', 'Education', 'required|trim');
        $this->form_validation->set_rules('smp_v_leader', 'Education', 'required|trim');
        $this->form_validation->set_rules('smk_v_leader', 'Education', 'required|trim');
        $this->form_validation->set_rules('achievement_1_v_leader', 'Achivement', 'required|trim');
        $this->form_validation->set_rules('achievement_2_v_leader', 'Achivement', 'required|trim');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Add Vice Leader';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('v_leader/v_add_v_leader.php');
            $this->load->view('templates/footer');
        } else {
            $image_v_leader = $_FILES['img_v_leader']['name'];
            if ($image_v_leader) {
                $config['upload_path']          = './assets/img/profile/v_leader/';
                $config['allowed_types']        = 'jpg|png|jpeg';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('img_v_leader')) {
                    // $id_v_leader = $this->uri->segment('3');
                    // $data['v_leader'] = $this->db->get_where('id_v_leader', $id_v_leader)->result();
                    // $old_image = $data['v_leader']['img_v_leader'];
                    // if ($old_image != 'default.png') {
                    //     unlink(FCPATH . 'assets/img/profile' . $old_image);
                    // }
                    $new_image = $this->upload->data('file_name');
                    $data = array(
                        'nama_lengkap_v_leader' => htmlspecialchars($this->input->post('nama_lengkap_v_leader', true)),
                        'sd_v_leader' =>  htmlspecialchars($this->input->post('sd_v_leader', true)),
                        'smp_v_leader' => htmlspecialchars($this->input->post('smp_v_leader', true)),
                        'smk_v_leader' => htmlspecialchars($this->input->post('smk_v_leader', true)),
                        'achievement_1_v_leader' => htmlspecialchars($this->input->post('achievement_1_v_leader', true)),
                        'achievement_2_v_leader' => htmlspecialchars($this->input->post('achievement_2_v_leader', true)),
                        'img_v_leader' => $new_image,
                        'is_candidate' => ''
                    );
                    $this->m_v_leader->add_v_leader($data);
                    $this->session->set_flashdata('message', '<div class="alert ml-4 mb-2 col-form-label alert-primary  text-center" role="alert">
                    Data has increased 
                    </div>');
                    redirect(base_url('v_leader'));
                } else {
                    $this->session->set_flashdata('message', '<div class="alert col-form-label alert-danger  text-center" role="alert">
                    only file JPG, PNG and JPEG  can upload here ! 
                    </div>');
                    redirect(base_url('v_leader/add_v_leader'));
                }
            }
        }
    }
    public function delete_v_leader()
    {
        $id_v_leader = $this->uri->segment('3');
        $data['v_leader'] = $this->db->get_where('v_leader', array("id_v_leader" => $id_v_leader))->row_array();
        $old_image = $data['v_leader']['img_v_leader'];
        if ($old_image != 'default.png') {
            unlink(FCPATH . 'assets/img/profile/v_leader/' . $old_image);
        }
        $this->db->delete('v_leader', 'id_v_leader =' . $id_v_leader);
        $this->session->set_flashdata('message', '<div class="alert ml-4 mb-2 col-form-label alert-danger  text-center" role="alert">
        Delete Data Success
        </div>');
        redirect(base_url('v_leader'));
    }
    public function edit_v_leader()
    {
        $id_v_leader = $this->uri->segment('3');
        $data['v_leader'] = $this->db->get_where('v_leader', array("id_v_leader" => $id_v_leader))->row_array();
        $this->form_validation->set_rules('nama_lengkap_v_leader', 'Full Name', 'required|trim');
        $this->form_validation->set_rules('sd_v_leader', 'Education', 'required|trim');
        $this->form_validation->set_rules('smp_v_leader', 'Education', 'required|trim');
        $this->form_validation->set_rules('smk_v_leader', 'Education', 'required|trim');
        $this->form_validation->set_rules('achievement_1_v_leader', 'Achivement', 'required|trim');
        $this->form_validation->set_rules('achievement_2_v_leader', 'Achivement', 'required|trim');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Edit Vice Leader';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('v_leader/v_edit_v_leader.php');
            $this->load->view('templates/footer');
        } else {
            $image_v_leader = $_FILES['img_v_leader']['name'];
            if ($image_v_leader) {
                $config['upload_path']          = './assets/img/profile/v_leader/';
                $config['allowed_types']        = 'jpg|png|jpeg';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('img_v_leader')) {
                    $old_image = $this->input->post('old_image');
                    if ($old_image != 'default.png') {
                        unlink(FCPATH . 'assets/img/profile/v_leader/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('img_v_leader', $new_image);
                } else {
                    $this->session->set_flashdata('message', '<div class="alert col-form-label alert-danger  text-center" role="alert">
                    only file JPG, PNG and JPEG  can upload in edit form ! 
                    </div>');
                    redirect(base_url("v_leader"));
                }
            }
            $data = array(
                'nama_lengkap_v_leader' => htmlspecialchars($this->input->post('nama_lengkap_v_leader', true)),
                'sd_v_leader' =>  htmlspecialchars($this->input->post('sd_v_leader', true)),
                'smp_v_leader' => htmlspecialchars($this->input->post('smp_v_leader', true)),
                'smk_v_leader' => htmlspecialchars($this->input->post('smk_v_leader', true)),
                'achievement_1_v_leader' => htmlspecialchars($this->input->post('achievement_1_v_leader', true)),
                'achievement_2_v_leader' => htmlspecialchars($this->input->post('achievement_2_v_leader', true)),
            );
            $old_id_v_leader = $this->input->post('id_v_leader');
            $this->db->where('id_v_leader', $old_id_v_leader);
            $this->db->update('v_leader', $data);
            $this->session->set_flashdata('message', '<div class="alert ml-4 mb-2 col-form-label alert-success  text-center" role="alert">
            Data has Edited 
            </div>');
            redirect(base_url("v_leader"));
        }
    }
    public function detail_v_leader()
    {
        $data['title'] = 'Detail Vice Leader';
        $id_v_leader = $this->uri->segment('3');
        $data['v_leader'] = $this->db->get_where('v_leader', array("id_v_leader" => $id_v_leader))->row_array();
        $this->load->view('v_leader/detail', $data);
    }
}
