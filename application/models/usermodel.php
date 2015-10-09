<?php

class Usermodel extends CI_Model {

    public function __construct(){
        parent::__construct();
    }

	public function get_users(){
		$query = $this->db->get('users');
		return $query->result();
	}

	public function get_user(){
        $this->db->select()->from('users')->where(['user_id' => $this->uri->segment(3)]);
        $query = $this->db->get();
        return $query->first_row('array');
    }

	public function add_user($data){
		$this->db->insert('users', $data);
		return;
	}

	public function update_user($data){
		$this->db->where('user_id', $this->uri->segment(3));
        $this->db->update('users', $data);
    }

    public function delete_user() {
        $this->db->where('user_id', $this->uri->segment(3));
        $this->db->delete('users');
    }

    public function get_emails(){
        $this->db->select('user_email')->from('users');
        $q = $this->db->get();
        return $q->result_array();
    }
}