<?php

class News extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->model('news_model');
	}

	public function index(){
	    $data['news'] = $this->news_model->get_news();
	    $data['title'] = 'News archive';
        $data['main'] = 'news/index';
	    $this->load->view('templates/template', $data);
    }

	public function view($slug){

	    $data['news_item'] = $this->news_model->get_news($slug);

        if (empty($data['news_item'])){
		  show_404();
        }
        $data['title'] = $data['news_item']['title'];
        $data['main'] = 'news/view';
        $this->load->view('templates/template', $data);
    }

    public function create(){

        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('text', 'text', 'required');

        if ($this->form_validation->run() === FALSE){
            $data['main'] = 'news/create';
        }else{
            $this->news_model->set_news();
            $data['main'] = 'news/success';
        }
        $this->load->view('templates/template', $data);
    }
}