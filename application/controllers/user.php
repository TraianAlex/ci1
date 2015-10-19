<?php

class User extends CI_Controller {

    public function __construct(){
        parent::__construct();
        if (!$this->session->userdata('is_logged_in')) {
        	redirect('auth');
        }
    }

    public function users(){
		$view_params['users'] = $this->usermodel->get_users();
		$view_params['main'] = 'users/userview';
		$this->load->view('templates/template', $view_params);
	}

	public function create(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('user_fname', 'First name', 'trim|required|min_length[3]|max_length[12]|xss_clean');
		$this->form_validation->set_rules('user_lname', 'Last name', 'trim|required|min_length[3]|max_length[12]|xss_clean');
		$this->form_validation->set_rules('user_email', 'Email', 'trim|required|min_length[5]|max_length[35]|valid_email|is_unique[users.user_email]|xss_clean');
		if($this->form_validation->run() == FALSE){
			$data['main'] = 'users/add_edit_users';
			$this->load->view('templates/template', $data);
		}else{
			$data = $this->usermodel->array_from_post(['user_fname', 'user_lname', 'user_email']);
			$this->usermodel->add_user($data);
			redirect('user/users');	
		}
	}

	public function update(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('user_fname', 'First name', 'trim|required|min_length[3]|max_length[12]|xss_clean');
		$this->form_validation->set_rules('user_lname', 'Last name', 'trim|required|min_length[3]|max_length[12]|xss_clean');
		$this->form_validation->set_rules('user_email', 'Email', 'trim|required|min_length[5]|max_length[35]|valid_email|callback__unique_email|xss_clean');
		if($this->form_validation->run() == FALSE){
			$data = $this->usermodel->get_user();
			$data['main'] = 'users/add_edit_users';
			$this->load->view('templates/template', $data);
		}else{
			$data = $this->usermodel->array_from_post(['user_fname', 'user_lname', 'user_email']);
			$data['created_at'] = $this->usermodel->created_at()->created_at;
			$data['updated_at'] = date('Y-m-d H:i:s');
			$this->usermodel->update_user($data);
			redirect('user');
		}
	}

	public function delete(){
		$this->usermodel->delete_user();
		$this->session->set_flashdata('message', 'User deleted');
		redirect('user/users');
	}
	// Do NOT validate if email already exists
	// UNLESS it's the email for the current user
	public function _unique_email ($str){
		
		$id = $this->uri->segment(3);
		$this->db->where('user_email', $this->input->post('user_email'));
		!$id || $this->db->where('id !=', $id);
		$user = $this->db->get('users')->result();
		
		if (count($user)) {
			$this->form_validation->set_message('_unique_email', '%s should be unique');
			return FALSE;
		}
		return TRUE;
	}
}