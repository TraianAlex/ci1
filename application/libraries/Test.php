<?php

class Test {

	public $CI;

	public function __construct(){
		$this->CI =& get_instance();
		echo "Constructor was called<br>";
	}
	//a simple class without needs to be extended from CI classes
	//do not need constructor / not use CI classes / not extend other classes
    public function test1($value) {
        echo "You pass me a $value";
    }
    //use the CI library (ex Config)
    //use constructor and superobject CI / use other library
    public function test2(){
        //$this->load->library('config');
        $this->CI->load->library('config');
        echo "Your language is ". $this->CI->config->item('language');
    }
}
        