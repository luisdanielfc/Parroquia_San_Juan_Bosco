<?php 
    /**
     * Controlador que redirecciona a las paginas de cada modulo de la pagina
     */
    class Paginas extends CI_Controller {
        /**
         * Metodo que carga la pagina a la que se desea visitar
         */
        public function view($page = 'inicio') {
            if (!file_exists(APPPATH.'views/paginas/'.$page.'.php'))
                show_404();
                     
            $data['usuario'] = (!empty($this->session->get_userdata('usuario')) && isset($this->session->get_userdata('usuario')["usuario"])) 
                ? $this->session->get_userdata('usuario')["usuario"] : null; 

            if ($page == "inicio")
                $data["slides"] = $this->slidesInicio();
            
            if ($this->session->flashdata("mensaje") !== null) {
                $data["exito"] = $this->session->flashdata("mensaje")["exito"];
                $data["mensaje"] = $this->session->flashdata("mensaje")["mensaje"];
            }
            
            $this->load->view('templates/Header', $data);
            $this->load->view('paginas/'.$page, $data);
            $this->load->view('templates/Footer');
        }

        /**
         * Funcion que retorna la lista
         */
        private function slidesInicio() {
            $cantidadMaximaSlides = 4;
            $mitad = intval($cantidadMaximaSlides / 2);
            $grupos = $this->grupo_modelo->getGrupos();
            $noticias = $this->noticia_modelo->getNoticias();
            $newGs = array();
            $newNs = array();

            if (count($grupos) >= $mitad && count($noticias) >= $mitad) {
                $gs = array_rand($grupos, $mitad);
                $filtrados = array();

                foreach ($gs as $id) {
                    array_push($filtrados, $grupos[$id]);
                }

                $grupos = $filtrados;
                $noticias = array_slice($noticias, 2, $mitad);
            } elseif (count($grupos) >= $mitad && count($noticias) < $mitad 
                        && count($grupos) >= $cantidadMaximaSlides - count($noticias)) {
                $gs = array_rand($grupos, $cantidadMaximaSlides - count($noticias));
                $filtrados = array();

                foreach ($gs as $id) {
                    array_push($filtrados, $grupos[$id]);
                }

                $grupos = $filtrados;

            } elseif (count($grupos) < $mitad && count($noticias) >= $mitad 
                        && count($noticias) >= $cantidadMaximaSlides - count($grupos)) {
                $noticias = array_slice($noticias, $cantidadMaximaSlides - count($grupos), $cantidadMaximaSlides - count($grupos));
            }

            foreach ($grupos as $grupo) {
                $grupo["imagen"] = $this->getImagen($grupo["Contenido"]);
                $grupo["Contenido"] = $this->getContenido($grupo["Contenido"]);

                if ($grupo["Contenido"] == "")
                    $grupo["Contenido"] = "Grupo de la Parroquia. Lea más información sobre este!";

                array_push($newGs, $grupo);
            }

            foreach ($noticias as $noticia) {
                $noticia["imagen"] = $this->getImagen($noticia["Contenido"]);
                $noticia["Contenido"] = $this->getContenido($noticia["Contenido"]);

                if ($noticia["Contenido"] == "")
                    $noticia["Contenido"] = "Noticia de la Parroquia. Lea más información sobre esta!";

                array_push($newNs, $noticia);
            }

            return array(
                "grupos" => $newGs,
                "noticias" => $newNs
            );
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

        private function endsWith($str, $sub) {
            return (substr($str, strlen($str) - strlen($sub)) == $sub);
        }
    } 