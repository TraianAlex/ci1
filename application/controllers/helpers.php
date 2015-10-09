<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Helpers extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

/*-------------------EXTEND HELPERS-------------------------------------------------------------*/
    //create
    public function area_of_circle($radius) {
        $this->load->helper('math');
        echo "A circle with radius $radius has area ". circle_area($radius);
    }
    //extend
    public function show_mysql_date(){
    	$this->load->helper('date');//this loads boths the original and the new one
    	echo "Current date in mysql format ". date_mysql();
    }

/* ------------------EXTEND LIBRARY-----------------------------------------------------------*/

    //simple, independent class
    public function new_library(){
        $this->load->library('test');
        $this->test->test1('bar');
    }
    //use CI library
    public function new_library2(){
        $this->load->library('test');
        $this->test->test2();
    }
    //extends CI library
     public function test_form(){
        $this->load->library('form_validation');
        $this->form_validation->test();
    }
    //exemple
    public function form(){
        $this->load->library('form_validation');
        $data['main'] = 'test_form';
        $this->load->view('templates/template', $data);
    }
    //implement a new rule strong_pass[3] by score
    public function form_submit(){
        
        $this->load->library('form_validation');
        $data['main'] = 'test_form';
        $this->form_validation->set_rules('username', 'Username', 'required|alpha_numeric|min_length[6]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|strong_pass[3]');
        if(!$this->form_validation->run()){
            $this->load->view('templates/template', $data);
        }else{
            echo "success";
        }
    }
}
