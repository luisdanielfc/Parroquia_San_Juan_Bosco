<?php
    /**
     * Clase que realiza CRUD a la entidad Noticia
     */
    class Noticia_Modelo extends CI_Model {
        /**
         * Constructor
         */
        public function __contruct() {
            $this->load->database();
        }

        /**
         * Funcion que retorna todos las noticias en orden de mas reciente a menos eciente
         */
        public function getNoticias() {
            $this->db->order_by("Fecha", "DESC");
            $query = $this->db->get("Noticia");
            /*$data = array();*/
            /*if($query !== FALSE && $query->num_rows() > 0){
                //$data = $query->result_array();
                print_r($query);
            }*/
            
            return ($query !== FALSE && $query->num_rows() > 0) ? $query->result_array() : array();
        }

        /**
         * Funcion que retorna una noticia en especifico dado su ID
         * @param $slug identificador unico de la noticia a ver
         * @return array con informacion de la noticia buscada; null en caso contrario
         */
        public function getNoticia($slug) {
            //return $this->db->get_where('Noticia', array('Id' => $slug))->row_array();
            $query = $this->db->get_where('Noticia', array('Id' => $slug));
            return ($query !== FALSE && $query->num_rows() > 0) ? $query->row_array() : null;
        }

        /**
         * Funcion que agrega una nueva notica
         */
        public function insertarNoticia($data) {
            $this->db->insert('Noticia', $data);
        }

        /**
         * Funcion que actualiza la informacion de una noticia
         */
        public function actualizarNoticia($data) {
            $this->db->where('Id', $data['Id']);
            $this->db->update('Noticia', $data);
        }

        /**
         * Funcion que elimina una noticia dado su ID
         */
        public function eliminarNoticia($id) {
            $this->db->where('Id', $id);
            $this->db->delete('Noticia');
        }
    }