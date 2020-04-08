<?php
    /**
     * Clase que realiza CRUD a la entidad Usuario
     */
    class Usuario_Modelo extends CI_Model {
        /**
         * Constructor
         */
        public function __contruct() {
            $this->load->database();
        }

        /**
         * Funcion que retorna un usuario con el nombre y contrasena
         * @param $usuario       nombre del usuario para ingresar al portal
         * @param $contrasena   palabra clave secreta que utiliza el usuairo para ingresar
         * @return array con informacion del usuario; null en caso de que no exista
         */
        public function getUsuario($usuario, $contrasena) {
            $resultado =  $this->db->get_where('Usuario', 
                array(
                    'Usuario' => $usuario,
                    'Contrasena' => $contrasena))
                ->row_array();

            return $resultado;
        }
    }