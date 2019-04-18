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

    public function update($id, $data = array()) {
        if ($id > 0) {
            //filtra o cliente que será alterado
            $this->db->where('id', $id);
            //altera os dados de acordo com o recebido por parametro
            $this->db->update('prova', $data);
            //retorno do numero de linhas afetadas
            return $this->db->affected_rows();
        } else {
            return false;
        }
    }

    public function delete($id) {
        if ($id > 0) {
            $this->db->where('id', $id);
            $this->db->delete('Prova');

            return $this->db->affected_rows();
        } else {
            return false;
        }
    }

}
