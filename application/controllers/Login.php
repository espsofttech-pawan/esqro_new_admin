<?php
if (!defined('BASEPATH'))

    exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('admin/user');
        $this->load->helper(array('form'));
    }

    public function index() {
        $this->load->view('admin/login_header');
        $this->load->view('admin/login');
        $this->load->view('admin/login_footer');
    }

    public function signin() 
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('user_name', 'User Name', 'trim|required|xss_clean');

        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');

        $data['error'] = "";
        
        if ($this->form_validation->run() == FALSE) 
        {
            //Field validation failed.  User redirected to login page
            $this->load->view('admin/login_header');
            $this->load->view('admin/login');
            $this->load->view('admin/login_footer');
        } 
        else 
        {
            //Go to private area
            $email = $this->input->post('user_name');
            $password = md5($this->input->post('password'));

            $result = $this->user->login($email, $password);
            if ($result) {
                $user_data = (array)$result[0];
                $this->session->set_userdata("user_id",$result[0]->id);
                $this->session->set_userdata("user_role",$result[0]->user_role);
                $this->session->set_userdata('user_data', $result[0]);
                redirect('home');
            }
            else 
            {
                $data['error'] = "Invalid usrername or password";
                $this->load->view('admin/login_header');
                $this->load->view('admin/login', $data);
                $this->load->view('admin/login_footer');
            }
        }
    }

}