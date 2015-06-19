<?php

class Hello extends CI_Controller {

    public function index() {
        //start from dropdown
        $variable = null;
        $this->load->helper('form');
        $this->load->library('form_validation');
        $urlarray = array('1' => 'www.this.com',
                        '2' => 'www.that.com',
                        '3' => 'www.theother.com');
        $variable .= form_dropdown('url', $urlarray, '1');
        //end form dropdown
        $view_params = array(
                        'mega_title' => 'Codeigniter - Hello World',
                        'title' => 'Welcome to Codegniter',
                        'message' => 'Hello World',
                        'variable' => $variable
                        );

        $data['title'] = ucfirst($view_params['title']);
        $this->load->view('templates/header', $data);
        $this->load->view('helloview', $view_params);

        $this->divers();

        $this->addStaff();

        $this->load->view('templates/footer', $data);
    }

    public function divers() {

        $data['title'] = "Welcome";
        $data['content'] = '<br>Controler divers in controler hello';
        $data['val1'] = "2";
        $data['val2'] = "3";

        $this->load->model('math');

        $data['addTotal'] = $this->math->add($data['val1'], $data['val2']);
        $data['subTotal'] = $this->math->sub($data['val1'], $data['val2']);
        $this->load->view('divers', $data);
    }

    public function addStaff() {

        $this->load->model('math');
        echo $this->math->add(2, 3);
    }

}