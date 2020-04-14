<?php
    /**
     * Controlador de la clase Grupos
     */
    class Grupos extends CI_Controller {
        /**
         * Metodo que carga la pagina inicial del controlador
         */
        public function index($data = null) {
            $data['grupos'] = $this->grupo_modelo->getGrupos();

            $this->load->view('templates/Header');
            $this->load->view('paginas/grupos/indice', $data);
            $this->load->view('templates/Footer');
        }

        /**
         * Metodo que carga la vista para ver informacion de un grupo especifico
         * @param $slug identificador del grupo a ver
         */
        public function ver($slug = null) {
            $data['grupo'] = $this->grupo_modelo->getGrupo($slug);

            if (empty($data['grupo']))
                show_404();

            $this->load->view('templates/Header');
            $this->load->view('paginas/grupos/ver', $data);
            $this->load->view('templates/Footer');    
        }

        /**
         * Metodo que carga la vista de creacion de grupo
         */
        public function crear() {
            //Se establecen las reglas de los campos necesarios
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

                $this->index($data);
            } else {
                $this->load->view('templates/Header');
                $this->load->view('paginas/grupos/crear');
                $this->load->view('templates/Footer');
            }
        }

        /**
         * Metodo que crea un grupo
         */
        private function crearGrupo() {
            $data = array(
                'Nombre' => $this->input->post('nombre'),
                'Contenido' => $this->input->post('contenido')
            );

            $this->grupo_modelo->insertarGrupo($data);
        }

        /**
         * Metodo que carga vista de edicion de grupo
         * @param $id identificador del grupo a editar
         */
        public function editar($id) {
            $data["grupo"] = $this->grupo_modelo->getGrupo($id);

            $this->form_validation->set_rules('nombre', 'Nombre', 'required');
            $this->form_validation->set_rules('contenido', 'Contenido', 'required');
            $this->form_validation->set_message('required', 'El campo %s es requerido');

            $this->load->view('templates/Header');
            $this->load->view('paginas/grupos/editar', $data);
            $this->load->view('templates/Footer');
        }

        /**
         * Metodo que actualiza un grupo
         */
        public function actualizar() {
            $this->grupo_modelo->actualizarGrupo(array(
                'Id' => $this->input->post('id'),
                'Nombre' => $this->input->post('nombre'),
                'Contenido' => $this->input->post('contenido')
                )
            );
            
            redirect('grupos');
        }

        /**
         * Metodo que elimina un grupo
         * @param $id identificador del grupo a eliminar
         */
        public function eliminar($id) {
            $this->grupo_modelo->eliminarGrupo($id);
            /*$this->index(array(
                    "exito" => true,
                    "mensaje" => "El grupo ha sido eliminado."
                )
            );*/
            redirect('grupos');
        }

        /*public function uploads($nombreImagen) {
            die();
            $imagen = __DIR__."assets/ckeditor/uploads/".$nombreImagen. base_url("assets/ckeditor/uploads/".$nombreImagen);
            //header("Content-type: image/png");
            //header("Content-length: $size");
            header("Content-Disposition: attachment; filename=$nombreImagen");       
            echo '<img src="'.base_url("assets/ckeditor/uploads/".$nombreImagen).'">';
        }*/
    }