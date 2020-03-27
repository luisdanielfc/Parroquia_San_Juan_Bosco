<?php
    /**
     * Clase que realiza CRUD a la entidad Grupo
     */
    class Grupo_Modelo extends CI_Model {
        /**
         * Constructor
         */
        public function __contruct() {
            $this->load->database();
        }

        /**
         * Funcion que retorna todos los grupos en orden alfabetico
         */
        public function getGrupos() {
            return $this->db->order_by('Nombre', 'ASC')->get('Grupo')->result_array();
        }

        /**
         * Funcion que retorna un grupo en especifico dado su ID
         */
        public function getGrupo($slug) {
            return $this->db->get_where('Grupo', array('Id' => $slug))->row_array();
        }

        /**
         * Funcion que agrega un nuevo grupo
         */
        public function insertarGrupo($data) {
            $this->db->insert('Grupo', $data);
        }

        /**
         * Funcion que actualiza la informacion de un grupo
         */
        public function actualizarGrupo($data) {
            $this->db->where('Id', $data['Id']);
            $this->db->update('Grupo', $data);
        }

        /**
         * Funcion que elimina un grupo dado su ID
         */
        public function eliminarGrupo($id) {
            $this->db->where('Id', $id);
            $this->db->delete('Grupo');
        }
    }