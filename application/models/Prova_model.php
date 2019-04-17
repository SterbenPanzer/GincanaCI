<?php

class Prova_model extends CI_model {

    public function getAll() {
        $query = $this->db->get('prova');

        return $query->result();
    }

    public function insert($data = array()) {
        $this->db->insert('prova', $data);

        return $this->db->affected_rows();
    }

    public function getOne($id) {
        $this->db->where('id', $id);

        $query = $this->db->get('prova');

        return $query->row(0);
    }

}
