<?php
    class Grupo_Modelo extends CI_Model {
        public function __contruct() {
            $this->load->database();
        }

        public function getGrupos() {
            return $this->db->order_by('Nombre', 'ASC')->get('Grupo')->result_array();
        }

        public function getGrupo($slug) {
            return $this->db->get_where('Grupo', array('Id' => $slug))->row_array();
        }

        public function insertarGrupo($data) {
            $this->db->insert('Grupo', $data);
        }

        public function actualizarGrupo($data) {
            $this->db->where('Id', $data['id']);
            $this->db->update('Grupo', $data);
        }

        public function eliminarGrupo($id) {
            $this->db->where('Id', $id);
            $this->db->delete('Grupo');
        }
    }