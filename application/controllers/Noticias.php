<?php
    /**
     * Controlador de la clase Noticias
     */
    class Noticias extends CI_Controller {
        /**
         * Metodo que carga la pagina inicial del controlador
         */
        public function index($data = null) {
            $data['noticias'] = $this->noticia_modelo->getGrupos();

            $this->load->view('templates/Header');
            $this->load->view('paginas/noticias/indice', $data);
            $this->load->view('templates/Footer');
        }

        /**
         * Metodo que carga la vista para ver informacion de una noticia en especifico
         * @param $slug identificador de la noticia a ver
         */
        public function ver($slug = null) {
            $data['noticia'] = $this->noticia_modelo->getNoticia($slug);

            if (empty($data['noticia']))
                show_404();

            $this->load->view('templates/Header');
            $this->load->view('paginas/noticias/ver', $data);
            $this->load->view('templates/Footer');    
        }

        /**
         * Metodo que carga la vista de creacion de grupo
         */
        public function crear() {
            //Se establecen las reglas de los campos necesarios
            $this->form_validation->set_rules('titulo', 'Titulo', 'required');
            $this->form_validation->set_rules('contenido', 'Contenido', 'required');
            $this->form_validation->set_message('required', 'El campo %s es requerido');
            
            //Si el usuario ingreso todos los adatos requeridos
            if ($this->form_validation->run() == true) {
                try {
                    $this->crearNoticia();
                    $data['exito'] = true;
                    $data['mensaje'] = "La noticia " . $this->input->post('titulo') 
                        . " ha sido crado exitosmanete";
                } catch (Exception $e) {
                    $data['exito'] = false;
                    $data['mensaje'] = "La noticia " . $this->input->post('titulo') 
                        . " NO fue creado. Razón: " . $e->getMessage();
                }

                $this->index($data);
            } else {
                $this->load->view('templates/Header');
                $this->load->view('paginas/noticias/crear');
                $this->load->view('templates/Footer');
            }
        }

        /**
         * Metodo que crea una noticia
         */
        private function crearNoticia() {
            $data = array(
                'Titulo' => $this->input->post('titulo'),
                'Contenido' => $this->input->post('contenido')
            );

            $this->noticia_modelo->insertarGrupo($data);
        }

        /**
         * Metodo que carga vista de edicion de una noticia
         * @param $id identificador de la noticia a editar
         */
        public function editar($id) {
            $data["grupo"] = $this->noticia_modelo->getGrupo($id);

            $this->form_validation->set_rules('titulo', 'Titulo', 'required');
            $this->form_validation->set_rules('contenido', 'Contenido', 'required');
            $this->form_validation->set_message('required', 'El campo %s es requerido');

            $this->load->view('templates/Header');
            $this->load->view('paginas/noticias/editar', $data);
            $this->load->view('templates/Footer');
        }

        /**
         * Metodo que actualiza una noticia
         */
        public function actualizar() {
            $this->noticia_modelo->actualizarnoticia(array(
                'Id' => $this->input->post('id'),
                'Titulo' => $this->input->post('titulo'),
                'Contenido' => $this->input->post('contenido')
                )
            );
            
            redirect('noticias');
        }

        /**
         * Metodo que elimina una noticia
         * @param $id identificador de la noticia a eliminar
         */
        public function eliminar($id) {
            $this->noticia_modelo->eliminarNoticia($id);
            /*$this->index(array(
                    "exito" => true,
                    "mensaje" => "El grupo ha sido eliminado."
                )
            );*/
            redirect('noticias');
        }
    }