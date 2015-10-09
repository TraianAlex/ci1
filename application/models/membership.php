<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Membership extends CI_Model {
    
    public function can_log_in(){
    	$this->db->where('email_address', $this->input->get_post('email'));
    	$this->db->where('password', sha1($this->input->get_post('password')));
    	$query = $this->db->get('membership');
    	return $query->num_rows == 1 ? $query->first_row('array') : false;
    }
}
        