<?php

class Pages extends CI_Controller {

       public function view($page = 'home'){

           if ( ! file_exists('application/views/pages/'.$page.'.php')){
                    // Whoops, we don't have a page for that!
                    show_404();
            }

            $data['title'] = ucfirst($page); // Capitalize the first letter

            $this->load->view('templates/header', $data);
            $this->load->view('pages/'.$page, $data);

            $this->load->spark('example-spark/1.0.0'); # Don't forget to add the version!
            $this->example_spark->printHello(); # echo's "Hello from the example spark!"

            $this->load->view('templates/footer', $data);
        }
}
