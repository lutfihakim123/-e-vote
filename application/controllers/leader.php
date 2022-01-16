<?php
class leader extends  CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('m_leader');
    }
    public function index()
    {
        $this->db->order_by('nama_lengkap_leader', 'ASC');
        $query = $this->db->get('leader');
        $data['leader'] = $query->result();
        $data['title'] = 'Leader';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('leader/index.php');
        $this->load->view('templates/footer');
    }
    public function add_leader()
    {
        $this->form_validation->set_rules('nama_lengkap_leader', 'Full Name', 'required|trim');
        $this->form_validation->set_rules('sd_leader', 'Education', 'required|trim');
        $this->form_validation->set_rules('smp_leader', 'Education', 'required|trim');
        $this->form_validation->set_rules('smk_leader', 'Education', 'required|trim');
        $this->form_validation->set_rules('achievement_1_leader', 'Achivement', 'required|trim');
        $this->form_validation->set_rules('achievement_2_leader', 'Achivement', 'required|trim');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Add Leader';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('leader/v_add_leader.php');
            $this->load->view('templates/footer');
        } else {
            $image_leader = $_FILES['img_leader']['name'];
            if ($image_leader) {
                $config['upload_path']          = './assets/img/profile/leader/';
                $config['allowed_types']        = 'jpg|png|jpeg';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('img_leader')) {
                    $new_image = $this->upload->data('file_name');
                    $data = array(
                        'nama_lengkap_leader' => htmlspecialchars($this->input->post('nama_lengkap_leader', true)),
                        'sd_leader' => htmlspecialchars($this->input->post('sd_leader', true)),
                        'smp_leader' => htmlspecialchars($this->input->post('smp_leader', true)),
                        'smk_leader' => htmlspecialchars($this->input->post('smk_leader', true)),
                        'achievement_1_leader' => htmlspecialchars($this->input->post('achievement_1_leader', true)),
                        'achievement_2_leader' => htmlspecialchars($this->input->post('achievement_2_leader', true)),
                        'img_leader' => $new_image,
                        'is_candidate' => ''
                    );
                    $this->m_leader->add_leader($data);
                    $this->session->set_flashdata('message', '<div class="alert ml-4 mb-2 col-form-label alert-primary  text-center" role="alert">
                    Data has increased 
                    </div>');
                    redirect(base_url('leader'));
                } else {
                    $this->session->set_flashdata('message', '<div class="alert col-form-label alert-danger  text-center" role="alert">
                    only file JPG, PNG and JPEG  can upload here ! 
                    </div>');
                    redirect(base_url('leader/add_leader'));
                }
            }
        }
    }
    public function delete_leader()
    {
        $id_leader = $this->uri->segment('3');
        $data['leader'] = $this->db->get_where('leader', array("id_leader" => $id_leader))->row_array();
        $old_image = $data['leader']['img_leader'];
        if ($old_image != 'default.png') {
            unlink(FCPATH . 'assets/img/profile/leader/' . $old_image);
        }
        $this->db->delete('leader', 'id_leader =' . $id_leader);
        $this->session->set_flashdata('message', '<div class="alert ml-4 mb-2 col-form-label alert-danger  text-center" role="alert">
        Delete Data Success
        </div>');
        redirect(base_url('leader'));
    }
    public function edit_leader()
    {
        $id_leader = $this->uri->segment('3');
        $data['leader'] = $this->db->get_where('leader', array("id_leader" => $id_leader))->row_array();
        $this->form_validation->set_rules('nama_lengkap_leader', 'Full Name', 'required|trim');
        $this->form_validation->set_rules('sd_leader', 'Education', 'required|trim');
        $this->form_validation->set_rules('smp_leader', 'Education', 'required|trim');
        $this->form_validation->set_rules('smk_leader', 'Education', 'required|trim');
        $this->form_validation->set_rules('achievement_1_leader', 'Achivement', 'required|trim');
        $this->form_validation->set_rules('achievement_2_leader', 'Achivement', 'required|trim');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Edit Leader';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('leader/v_edit_leader.php');
            $this->load->view('templates/footer');
        } else {
            $image_leader = $_FILES['img_leader']['name'];
            if ($image_leader) {
                $config['upload_path']          = './assets/img/profile/leader/';
                $config['allowed_types']        = 'jpg|png|jpeg';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('img_leader')) {
                    $old_image = $this->input->post('old_image');
                    if ($old_image != 'default.png') {
                        unlink(FCPATH . 'assets/img/profile/leader/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('img_leader', $new_image);
                } else {
                    $this->session->set_flashdata('message', '<div class="alert col-form-label alert-danger  text-center" role="alert">
                    only file JPG, PNG and JPEG  can upload in edit form ! 
                    </div>');
                    redirect(base_url("leader"));
                }
            }
            $data = array(
                'nama_lengkap_leader' => htmlspecialchars($this->input->post('nama_lengkap_leader', true)),
                'sd_leader' => htmlspecialchars($this->input->post('sd_leader', true)),
                'smp_leader' => htmlspecialchars($this->input->post('smp_leader', true)),
                'smk_leader' => htmlspecialchars($this->input->post('smk_leader', true)),
                'achievement_1_leader' => htmlspecialchars($this->input->post('achievement_1_leader', true)),
                'achievement_2_leader' => htmlspecialchars($this->input->post('achievement_2_leader', true)),
            );
            $old_id_leader = $this->input->post('id_leader');
            $this->db->where('id_leader', $old_id_leader);
            $this->db->update('leader', $data);
            $this->session->set_flashdata('message', '<div class="alert ml-4 mb-2 col-form-label alert-success  text-center" role="alert">
            Data has Edited 
            </div>');
            redirect(base_url("leader"));
        }
    }
    public function detail_leader()
    {
        $data['title'] = 'Detail Leader';
        $id_leader = $this->uri->segment('3');
        $data['leader'] = $this->db->get_where('leader', array("id_leader" => $id_leader))->row_array();
        $this->load->view('leader/detail', $data);
    }
}
