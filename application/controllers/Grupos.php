<?php
    /**
     * Controlador de la clase Grupos
     */
    class Grupos extends CI_Controller {
        /**
         * Metodo que carga la pagina inicial del controlador
         */
        public function index($data = null) {
            $grupos = $this->grupo_modelo->getGrupos();
            $data['grupos'] = array();
            
             if (empty($grupos)) {
                for ($i = 0; $i < 3; $i++) {
                    $grupos = $this->grupo_modelo->getGrupos();
                    
                    if (!empty($grupos)) 
                        break;
                }
            }

            foreach ($grupos as $grupo) {
                $grupo["imagen"] = $this->getImagen($grupo["Contenido"]);
                $grupo["Contenido"] = $this->getContenido($grupo["Contenido"]);

                if (strlen($grupo["Contenido"]) > 30)
                    $grupo["Contenido"] = substr($grupo["Contenido"], 0, 31)."...";

                array_push($data['grupos'], $grupo);
            }

            $data['usuario'] = (!empty($this->session->get_userdata('usuario')) && isset($this->session->get_userdata('usuario')["usuario"])) 
                ? $this->session->get_userdata('usuario')["usuario"] : null; 

            //$this->output->cache(604800);

            $this->load->view('templates/Header', $data);
            $this->load->view('paginas/grupos/indice', $data);
            $this->load->view('templates/Footer');
        }

        /**
         * Metodo que carga la vista para ver informacion de un grupo especifico
         * @param $slug identificador del grupo a ver
         */
        public function ver($slug = null) {
            $data['grupo'] = $this->grupo_modelo->getGrupo($slug);

            if (empty($data['grupo'])) {
                for ($i = 0; $i < 3; $i++) {
                    $data['grupo'] = $this->grupo_modelo->getGrupo($slug);
                    
                    if (!empty($data['grupo'])) 
                        break;
                }

                if (empty($data['grupo'])) 
                    show_404();
            }
            
            $data['usuario'] = (!empty($this->session->get_userdata('usuario')) && isset($this->session->get_userdata('usuario')["usuario"])) 
                ? $this->session->get_userdata('usuario')["usuario"] : null; 

            //$this->output->cache(604800);

            $this->load->view('templates/Header', $data);
            $this->load->view('paginas/grupos/ver', $data);
            $this->load->view('templates/Footer');    
        }

        /**
         * Metodo que carga la vista de creacion de grupo
         */
        public function crear() {
            $this->verificarPermisos();

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
                $data['usuario'] = (!empty($this->session->get_userdata('usuario')) && isset($this->session->get_userdata('usuario')["usuario"])) 
                    ? $this->session->get_userdata('usuario')["usuario"] : null; 

                //$this->output->cache(604800);

                $this->load->view('templates/Header', $data);
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
        public function editar($id = null) {
            if (!isset($id))
                show_404();

            $this->verificarPermisos();

            $data["grupo"] = $this->grupo_modelo->getGrupo($id);
            
            if (empty($data['grupo'])) {
                for ($i = 0; $i < 3; $i++) {
                    $data['grupo'] = $this->grupo_modelo->getGrupo($id);
                    
                    if (!empty($data['grupo'])) 
                        break;
                }

                if (empty($data['grupo'])) 
                    show_404();
            }

            $this->form_validation->set_rules('nombre', 'Nombre', 'required');
            $this->form_validation->set_rules('contenido', 'Contenido', 'required');
            $this->form_validation->set_message('required', 'El campo %s es requerido');

            //$this->output->cache(604800);

            $this->load->view('templates/Header');
            $this->load->view('paginas/grupos/editar', $data);
            $this->load->view('templates/Footer');
        }

        /**
         * Metodo que actualiza un grupo
         */
        public function actualizar() {
            $this->verificarPermisos();
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
            if (!isset($id))
                show_404();

            $this->verificarPermisos();
            $this->grupo_modelo->eliminarGrupo($id);
            redirect('grupos');
        }

        /**
         * Metodo que verifica si el usuario actual posee permisos para hacer esta accion.
         */
        private function verificarPermisos() {
            if (empty($this->session->get_userdata('usuario'))) {
                $this->session->set_flashdata('mensaje', 
                    array(
                        'exito' => false,
                        'mensaje' => 'Debe iniciar sesión para realizar esta acción.'
                    )
                );

                redirect('inicio');
            }
        }

        /**
         * Funcion que extrae contenido limpio para mostrar en la lista de este modulo
         * @param $html   Codigo HTML que posee
         * @return   texto con el contenido a mostrar
         */
        private function getContenido($html) {
            $lastPos = 0;
            $contenido = "";

            while (($lastPos = strpos($html, "<p>", $lastPos)) !== false) {
                $lastPos = $lastPos + 3;
                $fin = strpos($html, "</p>", $lastPos);
                $contenido = $paragraph = substr($html, $lastPos, $fin - $lastPos);

                //if (!preg_match("#^(<[^>]*>)+$#", $contenido)) 
                if (!preg_match("/<[^<]+>/", $contenido)) 
                    break;
                else 
                    $contenido = "";
            }

            return ($contenido != "") ? $contenido : "Grupo de la Parroquia. Lea más información sobre este!";
        }

        /**
         * Funcion que extrae una imagen para mostrar a la entidad
         * @param $html   Codigo HTML que posee
         * @return URL de ubicacion de la imagen
         */
        private function getImagen($html) {
            $lastPos = 0;
            $positions = array();
            $direccion = '/assets/ckeditor/uploads/';

            while (($lastPos = strpos($html, $direccion, $lastPos)) !== false) {
                $positions[] = $lastPos + strlen($direccion);
                $lastPos = $lastPos + strlen($direccion);
            }

            $imagen = "";

            foreach ($positions as $position) {
                $caracteres = str_split($html);

                for ($i = $position; $i < count($caracteres); $i++) {
                    if ($caracteres[$i] != '"')
                        $imagen .= $caracteres[$i];
                    else
                        break;
                }

                if ($imagen != "")
                    break;
            }

            if ($imagen != "" || $this->endsWith($imagen, "jpg") || $this->endsWith($imagen, "jpeg") || $this->endsWith($imagen, "png")) {
                $imagen = base_url("assets/ckeditor/uploads/".$imagen);
            } else {
                $dir = scandir(FCPATH."assets/images/muestra/");

                while ($imagen == "" || substr($imagen, 0, 1) == ".")
                    $imagen = $dir[array_rand($dir, 1)];
                
                $imagen = base_url("assets/images/muestra/".$imagen);
            }

            return $imagen;
        }

        /**
         * Funcion que verifica si una cadena de caracteres termina con una dada
         * @param   $str   Cadena a verificar
         * @param   $sub   Cadena que puede o no que termine $str
         * @return   true, en case de que si termine.
         */
        private function endsWith($str, $sub) {
            return (substr($str, strlen($str) - strlen($sub)) == $sub);
        }
    }