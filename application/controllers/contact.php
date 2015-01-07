<?php

class Contact extends CI_Controller {

    public function index() {
        // Loading the form helper
        $this->load->helper('form');

        // Loading the form_validation library
        $this->load->library('form_validation');

        $view_params['form']['attributes'] = array('id' => 'myform');

        // contact name details
        $view_params['form']['contact_name']['label'] = array('text' => 'Your name:',
                                                       'for' => 'name');
        $view_params['form']['contact_name']['field'] = array(
            'name' => 'contact_name',
            'id' => 'contact_name',
            'value' => isset($_POST['contact_name']) ? $_POST['contact_name'] : '',
            'maxlength' => '100',
            'size' => '30',
            'class' => 'input'
        );

        // contact name details
        $view_params['form']['contact_email']['label'] = array('text' => 'Your email:',
                                                        'for' => 'email');
        $view_params['form']['contact_email']['field'] = array(
            'name' => 'contact_email',
            'id' => 'contact_email',
            'value' => isset($_POST['contact_email']) ? $_POST['contact_email'] : '',
            'maxlength' => '100',
            'size' => '30',
            'class' => 'input'
        );

        // contact message details
        $view_params['form']['contact_message']['label'] = array('text' => 'Your message:',
                                                         'for' => 'message');
        $view_params['form']['contact_message']['field'] = array(
            'name' => 'contact_message',
            'id' => 'contact_message',
            'value' => isset($_POST['contact_message']) ? $_POST['contact_message'] : '',
            'rows' => '10',
            'cols' => '100',
            'class' => 'input'
        );

        // Setting validation rules
        $config_form_rules = array(
            array('field' => 'contact_name', 'label' => 'Contact Name',
                 'rules' => 'trim|required'),
            array('field' => 'contact_email', 'label' => 'Contact Email',
                 'rules' => 'trim|required|valid_email')
        );
        $this->form_validation->set_rules($config_form_rules);
        $this->form_validation->set_rules('contact_message', 'Contact Message',
                                    'trim|required');

        // Validating the form
        if ($this->form_validation->run() == FALSE) { // VAlidation failed
            $a_fields = array('contact_name', 'contact_email', 'contact_message');
            for ($index = 0; $index < count($a_fields); $index++) {
                $s_field = $a_fields[$index];
                if (form_error($s_field)) {
                    $view_params['form'][$s_field]['field']['class'] .= ' error';
                }
            }
            $data['title'] = ucfirst('Contact');
            $this->load->view('templates/header', $data);
            $this->load->view('contact/index', $view_params);
        } else { // VAlidation succeeded
            $this->load->library('email');
            $this->email->from($this->input->post('contact_email'),
                            $this->input->post('contact_name'));
            $this->email->to('victor_traian@yahoo.com');
            //$this->email->cc('victor_traian@yahoo.com');
            //$this->email->bcc('victor_traian@yahoo.com');
            $this->email->subject($this->input->post('contact_email'));
            $this->email->message($this->input->post('contact_message'));
            //$this->email->attach('/path/to/photo1.jpg');
            $this->email->send();
            //echo $this->email->print_debugger();

            $success_params = array('message' => 'Your message has been sent');
            $this->load->view('contact/contactsuccess', $success_params);
        }
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */