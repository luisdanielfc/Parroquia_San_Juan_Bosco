<?php
    /**
     * Clase que maneja las berturas y cierres de sesion de los administradores
     */
    class Usuarios extends CI_Controller {
        /**
         * Metodo que permite al usuario ingresar a la session actual
         */
        public function logIn() {
            $usuario = $this->usuario_modelo->getUsuario($this->input->post('usuario'), $this->input->post('contrasena'));

            //Si existe usuario se loguea
            if ($usuario != null) {
                $this->session->set_userdata('usuario', 
                    array(
                        'Id' => $usuario['Id'],
                        'Nombre' => $usuario['Nombre'],
                        'usuario' => $usuario['Usuario'],
                        'Contrasena' => $usuario['Contrasena']
                    )
                );

                $data['usuario'] = $usuario;

                //echo print_r($data['usuario']);
                //$this->load->view('templates/Header', $data);
                //$this->load->view('paginas/administracion', $data);
                //$this->load->view('templates/Footer');
                redirect('administracion?usuario='.urlencode($usuario));
            } else {
                $data['exito'] = false;
                $data['mensaje'] = 'El nombre de usuario y/o contraseña son inválidos';
                
                $this->session->set_flashdata('mensaje', 
                    array(
                        'exito' => false,
                        'mensaje' => 'El nombre de usuario y/o contraseña son inválidos'
                    )
                );
                redirect('inicio');
                //$this->load->view('templates/Header', $data);
                //$this->load->view('paginas/inicio');
                //$this->load->view('templates/Footer');
            }
        }

        /**
         * Metodo que permite salir al usuario de la session actual
         */
        public function logOut() {
            $this->session->sess_destroy();

            $this->load->view('templates/Header');
            $this->load->view('paginas/inicio');
            $this->load->view('templates/Footer');
        }
    }