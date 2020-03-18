<?php
    class Grupos extends CI_Controller {
        public function index() {
            //if (!file_exists(APPPATH.'views/paginas/'.$page.'.php'))
                //show_404();

            $data['grupos'] = $this->grupo_modelo->getGrupos();

            $this->load->view('templates/Header');
            $this->load->view('paginas/grupos', $data);
            $this->load->view('templates/Footer');
        }

        public function ver($slug = null) {
            $data['grupo'] = $this->grupo_modelo->getGrupo($slug);

            if (empty($data['grupo']))
                show_404();

            $this->load->view('templates/Header');
            $this->load->view('paginas/ver', $data);
            $this->load->view('templates/Footer');    
        }
    }