<?php
    class Grupos extends CI_Controller {
        public function index($data = null) {
            //if (!file_exists(APPPATH.'views/paginas/'.$page.'.php'))
                //show_404();

            $data['grupos'] = $this->grupo_modelo->getGrupos();

            $this->load->view('templates/Header');
            $this->load->view('paginas/grupos/indice', $data);
            $this->load->view('templates/Footer');
        }

        public function ver($slug = null) {
            $data['grupo'] = $this->grupo_modelo->getGrupo($slug);

            if (empty($data['grupo']))
                show_404();

            $this->load->view('templates/Header');
            $this->load->view('paginas/grupos/ver', $data);
            $this->load->view('templates/Footer');    
        }

        public function crear() {
            $this->form_validation->set_rules('nombre', 'Nombre', 'required');
            $this->form_validation->set_rules('contenido', 'Contenido', 'required');
            $this->form_validation->set_message('required', 'El campo %s es requerido');
            
            //Si el usuario ingreso todos los adatos requeridos
            if ($this->form_validation->run() == true) {
                try {
                    $this->crearGrupo();
                    $data['exito'] = true;
                    $data['mensaje'] = "El Grupo " . $this->input->post('nombre') 
                        . " ha sido crado exitosmanete";
                } catch (Exception $e) {
                    $data['exito'] = false;
                    $data['mensaje'] = "El Grupo " . $this->input->post('nombre') 
                        . " NO fue creado. Razón: " . $e->getMessage();
                }

                $this->index();
            } else {
                $this->load->view('templates/Header');
                $this->load->view('paginas/grupos/crear');
                $this->load->view('templates/Footer');
            }
        }

        private function crearGrupo() {
            $data = array(
                'Nombre' => $this->input->post('nombre'),
                'HTML' => $this->input->post('contenido')
            );

            $this->grupo_modelo->insertarGrupo($data);
        }

        public function editar() {
            
        }

        public function eliminar() {
            $this->grupo_modelo->eliminarGrupo($this->input->post('id'));
            $this->index(array(
                    "exito" => true,
                    "mensaje" => "El grupo ha sido eliminado."
                )
            );
        }
    }