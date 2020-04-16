<?php
    /**
     * Controlador de la clase Noticias
     */
    class Noticias extends CI_Controller {
        /**
         * Metodo que carga la pagina inicial del controlador
         */
        public function index($data = null) {
            $noticias = $this->noticia_modelo->getNoticias();
            $data['noticias'] = array();

            foreach ($noticias as $noticia) {
                $noticia["imagen"] = $this->getImagen($grupo["Contenido"]);
                array_push($data['noticias'], $noticia);
            }

            $data['usuario'] = (!empty($this->session->get_userdata('usuario')) && isset($this->session->get_userdata('usuario')["usuario"])) 
                ? $this->session->get_userdata('usuario')["usuario"] : null; 

            $this->load->view('templates/Header', $data);
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

            $data['usuario'] = (!empty($this->session->get_userdata('usuario')) && isset($this->session->get_userdata('usuario')["usuario"])) 
                ? $this->session->get_userdata('usuario')["usuario"] : null; 

            $this->load->view('templates/Header', $data);
            $this->load->view('paginas/noticias/ver', $data);
            $this->load->view('templates/Footer');    
        }

        /**
         * Metodo que carga la vista de creacion de grupo
         */
        public function crear() {
            $this->verificarPermisos();

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
                $data['usuario'] = (!empty($this->session->get_userdata('usuario')) && isset($this->session->get_userdata('usuario')["usuario"])) 
                ? $this->session->get_userdata('usuario')["usuario"] : null; 

                $this->load->view('templates/Header', $data);
                $this->load->view('paginas/noticias/crear');
                $this->load->view('templates/Footer');
            }
        }

        /**
         * Metodo que crea una noticia
         */
        private function crearNoticia() {
            $this->verificarPermisos();

            $data = array(
                'Titulo' => $this->input->post('titulo'),
                'Contenido' => $this->input->post('contenido')
            );

            $this->noticia_modelo->insertarNoticia($data);
        }

        /**
         * Metodo que carga vista de edicion de una noticia
         * @param $id identificador de la noticia a editar
         */
        public function editar($id) {
            if (!isset($id))
                show_404();
                
            $this->verificarPermisos();

            $data["grupo"] = $this->noticia_modelo->getGrupo($id);
            $data['usuario'] = (!empty($this->session->get_userdata('usuario')) && isset($this->session->get_userdata('usuario')["usuario"])) 
                ? $this->session->get_userdata('usuario')["usuario"] : null; 

            $this->form_validation->set_rules('titulo', 'Titulo', 'required');
            $this->form_validation->set_rules('contenido', 'Contenido', 'required');
            $this->form_validation->set_message('required', 'El campo %s es requerido');

            $this->load->view('templates/Header', $data);
            $this->load->view('paginas/noticias/editar', $data);
            $this->load->view('templates/Footer');
        }

        /**
         * Metodo que actualiza una noticia
         */
        public function actualizar() {
            $this->verificarPermisos();
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
            if (!isset($id))
                show_404();

            $this->verificarPermisos();
            $this->noticia_modelo->eliminarNoticia($id);
            redirect('noticias');
        }

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

        private function getContenido($html) {
            $lastPos = 0;
            $contenido = "";

            while (($lastPos = strpos($html, "<p>", $lastPos)) !== false) {
                $lastPos = $lastPos + 3;
                $fin = strpos($html, "</p>", $lastPos);
                $contenido = $paragraph = substr($html, $lastPos, $fin - $lastPos);

                if (!preg_match("#^(<[^>]*>)+$#", $contenido)) 
                    break;
                else 
                    $contenido = "";
            }

            return $contenido;
        }

        private function getImagen($html) {
            $lastPos = 0;
            $positions = array();
            $direccion = 'src="../assets/ckeditor/uploads/';

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
                $imagen = base_url("assets/images/muestra/".$dir[array_rand($dir, 1)]);
            }

            return $imagen;
        }

        private function endsWith($str, $sub) {
            return (substr($str, strlen($str) - strlen($sub)) == $sub);
        }
    }