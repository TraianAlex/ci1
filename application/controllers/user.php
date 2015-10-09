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

	public function add_new(){
		$data['main'] = 'users/add_edit_users';
		$this->load->view('templates/template', $data);
	}

	public function create(){
		$data = [
			'user_fname' => $this->input->post('fname'),
			'user_lname' => $this->input->post('lname'),
			'user_email' => $this->input->post('email')
		];
		$this->usermodel->add_user($data);
		$this->users();
	}

	public function update(){
		if($_POST){
			$data = [
				'user_fname' => $this->input->post('fname'),
				'user_lname' => $this->input->post('lname'),
				'user_email' => $this->input->post('email')
			];
			$this->usermodel->update_user($data);
			redirect('user');
		}
		$data = $this->usermodel->get_user();
		$data['main'] = 'users/add_edit_users';
		$this->load->view('templates/template', $data);
	}

	public function delete(){
		$this->usermodel->delete_user();
		$this->users();
	}
}