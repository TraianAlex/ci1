<?php

class Hello extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->is_logged_in();
        $this->load->model('posts');
        $this->output->enable_profiler(TRUE);
    }

    public function is_logged_in(){
        $is_logged_in = $this->session->userdata('is_logged_in');
        if(!isset($is_logged_in) || $is_logged_in != true){
            $this->session->set_flashdata('message', 'Please Login');
            redirect('auth');
        }
    }
    public function index() {

        $this->load->library('table');
        $datas = $this->posts->get();
        $posts = [];
        foreach ($datas as $data) {
            $posts[] = [
                $data->postID,
                $data->title,
                $data->post,
                $data->date_added,
                anchor('hello/view/'.$data->postID, 'View').' | '.
                anchor('hello/delete/'.$data->postID, 'Delete')
            ];
        }
        $this->load->view('templates/template', ['main' => 'hello/helloview', 'posts' => $posts]);
    }

    public function new_post(){
        
        if(!$this->correct_permissions('author')){
            redirect('auth');
        }
        $this->load->library('form_validation');
        $this->form_validation->set_rules('title', 'Title', 'trim|required|alpha|min_length[3]|max_length[255]|xss_clean');
        $this->form_validation->set_rules('post', 'Text', 'trim|required|min_length[2]|max_length[255]|xss_clean');
        $this->form_validation->set_error_delimiters('<div class="alert alert-info" role="alert">', '</div>');
        if($this->form_validation->run() == false){
            $this->index();
        }else{
            $post = new Posts();
            $post->title = $this->input->post('title');
            $post->post = $this->input->post('post');
            $post->date_added = date('Y-m-d H:i:s');
            $post->userID = $this->session->userdata('userID');
            $post->active = 1;
            $post->save();
            $this->session->set_flashdata('message', 'Data inserted');
            redirect('hello');
        }
    }

    public function view($postID){
        $post = new Posts();
        $post->load($postID);
        if (!$post->postID) {
            show_404();
        }
        $this->load->view('templates/template', ['main' => 'hello/post', 'post' => $post]);
    }

    public function edit($postID){
        $post = new Posts();
        $post->load($postID);
        if (!$post->postID) {
            show_404();
        }

        $this->load->library('form_validation');
        $this->form_validation->set_rules('title', 'Title', 'trim|required|min_length[3]|max_length[255]|xss_clean');
        $this->form_validation->set_rules('post', 'Text', 'trim|required|min_length[2]|max_length[255]|xss_clean');
        $this->form_validation->set_error_delimiters('<div class="alert alert-info" role="alert">', '</div>');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/template', ['main' => 'hello/add-edit', 'post' => $post]);
        }else{
            $post = new Posts();
            $post->postID = $this->uri->segment(3);
            $post->title = $this->input->post('title');
            $post->post = $this->input->post('post');
            $post->date_added = date('Y-m-d H:i:s');
            $post->userID = $this->session->userdata('userID');
            $post->active = 1;
            $post->save();
            $this->session->set_flashdata('message', 'Data updated');
            redirect('hello/view/'.$postID);
        }
    }

    public function delete($postID){
        $post = new Posts();
        $post->load($postID);
        if (!$post->postID) {
            show_404();
        }
        if($post->delete()){
            $this->session->set_flashdata('message', 'Data deleted');
        }else{
            $this->session->set_flashdata('message', 'Problem deleting data');
        }
        redirect('hello');
    }

    public function correct_permissions($required){
        $user_type = $this->session->userdata('user_type');
        if($required == 'user'){
           if ($user_type == 'user') return true;
        }elseif ($required == 'author') {
            if ($user_type == 'admin' || $user_type == 'author') return true;
        }elseif ($required == 'admin') {
            if ($user_type == 'admin') return true;
        }
    }

    public function divers() {

        $data['title'] = "Welcome";
        $data['content'] = '<br>Controler divers in controler hello';
        $data['val1'] = "2";
        $data['val2'] = "3";

        $this->load->model('math');

        $data['addTotal'] = $this->math->add($data['val1'], $data['val2']);
        $data['subTotal'] = $this->math->sub($data['val1'], $data['val2']);
        $data['main'] = 'hello/divers';
        $this->load->view('templates/template', $data);
    }

    public function addStaff() {
        $this->load->model('math');
        echo $this->math->add(2, 3);
    }
}