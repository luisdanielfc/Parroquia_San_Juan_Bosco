<?php 
    class Paginas extends CI_Controller {
        public function view($page = 'inicio') {
            if (!file_exists(APPPATH.'views/paginas/'.$page.'.php'))
                show_404();
                       
            $data['usuario'] = (!empty($this->session->get_userdata('usuario'))) 
                ? $this->session->get_userdata('usuario') : null; 
                        
            /*if (!empty($this->session->flashdata('mensaje'))) {
                $data['exito'] = $this->session->flashdata('mensaje')['exito'];
                $data['mensaje'] = $this->session->flashdata('mensaje')['mensaje'];
            }

            echo print_r($data['usuario']);*/
            //echo print(count($data['usuario']));
            
            $this->load->view('templates/Header', $data);
            $this->load->view('paginas/'.$page);
            $this->load->view('templates/Footer');
        }
    } 