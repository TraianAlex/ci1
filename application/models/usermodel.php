<?php

class Usermodel extends CI_Model {

	public function get_users(){
		$query = $this->db->get('users');
		return $query->result();
	}

	public function get_user(){
        $this->db->select()->from('users')->where(['id' => $this->uri->segment(3)]);
        $query = $this->db->get();
        return $query->first_row('array');
    }

	public function add_user($data){
		$this->db->insert('users', $data);
		return;
	}

	public function update_user($data){
		$this->db->where('id', $this->uri->segment(3));
        $this->db->update('users', $data);
    }

    public function created_at(){
        $this->db->where('id', $this->uri->segment(3));
        $this->db->select('created_at')->from('users');
        $q = $this->db->get();
        return $q->first_row();
    }

    public function delete_user() {
        $this->db->where('id', $this->uri->segment(3));
        $this->db->delete('users');
    }
    /*
    * get all email from table
    */
    public function get_emails(){
        $this->db->select('user_email')->from('users');
        $q = $this->db->get();
        return $q->result_array();
    }

    public function array_from_post($fields){
        $data = array();
        foreach ($fields as $field) {
            $data[$field] = $this->input->post($field);
        }
        return $data;
    }
}