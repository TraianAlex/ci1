<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('membership');
    }

    public function index() {
        $this->login();
    }

    public function login(){
    	$data['main'] = 'auth/login';
    	$this->load->view('templates/template', $data, FALSE);
    }

    public function login_validation(){
    	$this->load->library('form_validation');
    	$this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[5]|max_length[100]|valid_email|xss_clean|callback_validate_credentials');
    	$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[100]|xss_clean');
    	if($this->form_validation->run() == FALSE){
    		$this->login();
    	}else{
            $query = $this->membership->can_log_in();
    		$data = [
              'email' => $this->input->post('email'),
              'userID' => $query['id'],
              'user_type' => $query['user_type'],
            'is_logged_in' => 1
            ];
            $this->session->set_userdata($data);
            redirect('user');
    	}
    }

    public function validate_credentials(){
        $query = $this->membership->can_log_in();
    	if ($query){
    		return true;
    	}else{
    		$this->form_validation->set_message('validate_credentials', 'Incorrect username / password.');
    		return false;
    	}
    }

    public function logout(){
    	$this->session->sess_destroy();
    	redirect('auth');
    }
}
        