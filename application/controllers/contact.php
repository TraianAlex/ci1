<?php

class Contact extends CI_Controller {

    public function index() {

        $this->load->helper('form');
        $this->load->library('form_validation');

        $view_params['form']['attributes'] = [
                              'id' => 'myform'
        ];
        // contact name details
        $view_params['form']['contact_name']['label'] = [
                            'text' => 'Your name:',
                             'for' => 'name'
         ];
        $view_params['form']['contact_name']['field'] = [
                            'name' => 'contact_name',
                              'id' => 'contact_name',
                           'value' => isset($_POST['contact_name']) ? $_POST['contact_name'] : '',
                       'maxlength' => '100',
                            'size' => '30',
                           'class' => 'input'
        ];
        // contact email details
        $view_params['form']['contact_email']['label'] = [
                            'text' => 'Your email:',
                             'for' => 'email'
         ];
        $view_params['form']['contact_email']['field'] = [
                            'name' => 'contact_email',
                              'id' => 'contact_email',
                           'value' => isset($_POST['contact_email']) ? $_POST['contact_email'] : '',
                       'maxlength' => '100',
                            'size' => '30',
                           'class' => 'input'
        ];
        // contact message details
        $view_params['form']['contact_message']['label'] = [
                            'text' => 'Your message:',
                             'for' => 'message'
         ];
        $view_params['form']['contact_message']['field'] = [
                            'name' => 'contact_message',
                              'id' => 'contact_message',
                           'value' => isset($_POST['contact_message']) ? $_POST['contact_message'] : '',
                            'rows' => '10',
                            'cols' => '100',
                           'class' => 'input'
        ];
        // Setting validation rules
        $config_form_rules = [
                [
                 'field' => 'contact_name',
                 'label' => 'Contact Name',
                 'rules' => 'trim|required'
                 ],
                [
                 'field' => 'contact_email',
                 'label' => 'Contact Email',
                 'rules' => 'trim|required|valid_email'
                 ]
        ];
        $this->form_validation->set_rules($config_form_rules);
        $this->form_validation->set_rules('contact_message', 'Contact Message', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $a_fields = ['contact_name', 'contact_email', 'contact_message'];
            for ($index = 0; $index < count($a_fields); $index++) {
                $s_field = $a_fields[$index];
                if (form_error($s_field)) {
                    $view_params['form'][$s_field]['field']['class'] .= ' error';
                }
            }
            $view_params['main'] = 'contact/index';
            $this->load->view('templates/template', $view_params);
        } else {
            $this->load->library('email');
            $this->email->from($this->input->post('contact_email'),
                               $this->input->post('contact_name'));
            $this->email->to('victor_traian@yahoo.com');
            $this->email->subject($this->input->post('contact_email'));
            $this->email->message($this->input->post('contact_message'));
            //$this->email->attach('/path/to/photo1.jpg');
            $this->email->send();
            //echo $this->email->print_debugger();

            $success_params = ['main' => 'contact/contactsuccess', 'message' => 'Your message has been sent'];
            $this->load->view('templates/template', $success_params);
        }
    }

    public function multiple_email(){
        $this->load->model('usermodel');
        $emails = $this->usermodel->get_emails();
        $this->load->library('email');
        $config['mailtype'] = 'html';
        $this->email->initialize($config);

        foreach ($emails as $row) {
            if($row['user_email']){
                $this->email->from('victor_traian@yahoo.com', 'Traian Alexandru');
                $this->email->to($row['user_email']);
                $this->email->subject('Test Newsletter');
                $this->email->message('Your message goes there <strong>Bold</strong>');
                $this->email->send();
                $this->email->clear();
            }
         }
         redirect('/');
    }
}