<?php 
    class Paginas extends CI_Controller {
        public function view($page = 'inicio') {
            if (!file_exists(APPPATH.'views/paginas/'.$page.'.php'))
                show_404();

            $this->load->view('templates/Header');
            //$this->load->view("paginas/".$page, $data);
            $this->load->view('paginas/'.$page);
            $this->load->view('templates/Footer');
        }
    } 