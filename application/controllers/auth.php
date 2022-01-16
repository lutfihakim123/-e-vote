<?php
class Auth extends  CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_login');
        $this->load->library('form_validation');
    }
    public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login Page';
            $this->load->view('auth_templates/header', $data);
            $this->load->view('page/login');
            $this->load->view('auth_templates/footer');
        } else {
            $username = htmlspecialchars($this->input->post('username', true), ENT_QUOTES);
            $password = htmlspecialchars($this->input->post('password', true), ENT_QUOTES);
            if ($this->input->post('login')) {
                $where = array('username' => $username, 'password' => md5($password));
                $cek = $this->m_login->cek_login_admin($username, $password);
                if ($cek->num_rows() > 0) {
                    $user = $cek->row_array();
                    $data['title'] = 'Admin Page';
                    $data_session = array('username' => $username, 'level' => 'admin');
                    $this->session->set_userdata($data_session);
                    redirect(base_url('admin'), $data);
                } else {
                    $cek = $this->m_login->cek_login_voter($username, $password);
                    if ($cek->num_rows() > 0) {
                        $user = $cek->row_array();
                        if ($user['is_active'] == 0) {
                            $this->session->set_flashdata('message', '<div class="alert col-form-label alert-danger  text-center" role="alert">
                            Your Account is not active</b>
                            </div>');
                            redirect(base_url('auth'));
                        } else {
                            $data['title'] = 'Vote Your Candidate';
                            $data_session = array('email' => $username, 'level' => 'voter', 'candidate_id' => $user['candidate_id']);
                            $this->session->set_userdata($data_session);
                            redirect(base_url('voter'), $data);
                        }
                    } else {
                        $this->session->set_flashdata('message', '<div class="alert col-form-label alert-danger  text-center" role="alert">
                        <b>Wrong Email OR Password</b>
                        </div>');
                        redirect(base_url('auth'));
                    }
                }
            }
        }
    }
    public function page_not_found()
    {
        $data['title'] = 'EROR 404';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/404');
    }
    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('level');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('is_active');
        $this->session->set_flashdata('message', '<div class="alert alert-danger  text-center" role="alert">
        Logout Berhasil
        </div>');
        redirect(base_url());
    }
    public function register()
    {
        $data['email_erorr'] = '';
        $data['title'] = 'Register Page';
        $this->form_validation->set_rules(
            'email',
            'Email',
            'required|trim|is_unique[voter.email]|valid_email',
            array('is_unique' => 'Your email has been register'),
            array('valid_email' => 'Please enter valid email adress'),
        );
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[5]', array('min_length' => 'Minimum character is 5 character'));
        $this->form_validation->set_rules(
            'password2',
            'Password',
            'required|trim|matches[password1]',
            array('required' => 'You must enter Repeat Password field')
        );
        if ($this->form_validation->run() == false) {
            $this->load->view('auth_templates/header', $data);
            $this->load->view('page/register');
            $this->load->view('auth_templates/footer');
        } else {
            $email = htmlspecialchars($this->input->post('email', true));
            $e_email = explode('.', $email);
            if ($e_email[1] != 'r19mi@plb' && $e_email[1] != "r19ab@plb" && $e_email[1] != "r19ak@plb" && $e_email[1] != "r19hms@plb" && $e_email[1] != 'r20mi@plb' && $e_email[1] != "r20ab@plb" && $e_email[1] != "r20ak@plb" && $e_email[1] != "r20hms@plb" && $e_email[1] != 'r21mi@plb' && $e_email[1] != "r21ab@plb" && $e_email[1] != "r21ak@plb" && $e_email[1] != "r21hms@plb") {
                $data['email_erorr'] = '<small class="text-danger mt-3 ml-2">Email that can use only email plb</small>';
                $this->load->view('auth_templates/header', $data);
                $this->load->view('page/register', $data);
                $this->load->view('auth_templates/footer');
            } else {
            $pwd = md5(htmlentities($this->input->post('password2', TRUE)));
            $data = array(
                'candidate_id' => 0,
                'email' => htmlspecialchars($this->input->post('email', TRUE)),
                'password' => $pwd,
                'is_active' => 0
            );
            $this->db->insert('voter', $data);
            $config = [
                'protocol' => 'smtp',
                'smtp_host' => 'ssl://smtp.googlemail.com',
                'smtp_port' => 465,
                'smtp_user' => 'lutfirahman400@gmail.com',
                'smtp_pass' => '-',
                'mailtype'  => 'html',
                'charset'   => 'iso-8859-1'
            ];
            $this->load->library('email', $config);
            $this->email->set_newline("\r\n");
            $this->email->to($this->input->post('email'));
            $this->email->from('lutfirahman400@gmail.com', 'Lutfi Rahman Hakim');
            $this->email->subject('Account Verification');
            $this->email->message('hello world');
            // $this->email->message('Click this link to verify your account <a href="' . base_url() . 'auth/verify?email=' . $this->input->post('email', TRUE) . '">Activate</a>');
            $this->email->send();
            $this->session->set_flashdata('message', '<div class="alert col-form-label alert-success" role="alert">
                Congratulation Your Account has been Active <b>registered please check your email and activate your account!</b> 
                </div>');
            // redirect(base_url('auth'));
        }
        // }
    }
    public function verify()
    {
        $email = $this->input->get('email');

        $user = $this->db->get_where('voter', ['email' => $email])->num_rows();
        if ($user) {
            $this->db->set('is_active', 1);
            $this->db->where('email', $email);
            $this->db->update('voter');
            $this->session->set_flashdata('message', '<div class="alert col-form-label alert-success" role="alert">
                Congratulation Your Account has been activated</b> 
                </div>');
            redirect(base_url('auth'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert col-form-label alert-danger" role="alert">
                Activation Failed! Wrong Email</b> 
                </div>');
            redirect(base_url('auth'));
        }
    }
}
