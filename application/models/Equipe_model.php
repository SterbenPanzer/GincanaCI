<?php

class Equipe_model extends CI_Model {

    //Método que realiza a busca de todos as equipes no Banco de Dados.
    public function getAll() {
        //Pega a tabela equipe no Banco de Dados.
        $query = $this->db->get('equipe');
        //Retorna em formato de array
        return $query->result();
    }

    //Método que recebe dados por parâmetro.
    public function insert($data = array()) {
        $this->db->insert('equipe', $data);
        return $this->db->affected_rows();
    }

    //Método que recebe um id por parâmetro e busca ele no Banco de Dados.
    public function getOne($id) {
        $this->db->where('id', $id);
        //Busca o integrante na base respeitando o filtro.
        $query = $this->db->get('equipe');
        //Retorna apenas a primeira linha.
        return $query->row(0);
    }

    //Método que recebe o ID da equipe a alterar
    //e os dados para alterar e faz o update na base de dados
    public function update($id, $data = array()) {
        if ($id > 0) {
            //filtra a equipe que será alterado
            $this->db->where('id', $id);
            //altera os dados de acordo com o recebido por parametro
            $this->db->update('equipe', $data);
            //retorno do numero de linhas afetadas
            return $this->db->affected_rows();
        } else {
            return false;
        }
    }

    public function delete($id) {
        if ($id > 0) {
            $this->db->where('id', $id);
            $this->db->delete('Equipe');

            return $this->db->affected_rows();
        } else {
            return false;
        }
    }

}
