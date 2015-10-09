<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class MY_Form_validation extends CI_Form_validation {

    public function __construct() {
        parent::__construct();
    }

    public function test() {
        echo "testing the extend form validation library";
    }
    //$params from []
    public function strong_pass($value, $params){

    	$this->CI->form_validation->set_message('strong_pass', 'The %s is not strong enough');
    	$score = 0;
    	if(preg_match('!\d!', $value))     $score++;
    	if(preg_match('!\[A-z]!', $value)) $score++;
    	if(preg_match('!\W!', $value))     $score++;
    	if(strlen($value) >= 8)            $score++;
    	if($score < $params)               return false;
    	return true;
    }
}
        