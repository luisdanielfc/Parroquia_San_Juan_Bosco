<?php
    class Grupo_Modelo extends CI_Model {
        public function __contruct() {
            $this->load->database();
        }

        public function getGrupos() {
            return $this->db->get('Grupo')->result_array();
        }

        public function getGrupo($slug) {
            return $this->db->get_where('Grupo', array('slug' => $slug))->row_array();
        }
    }