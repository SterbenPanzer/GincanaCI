<?php

class Pontuacao_model extends CI_Model {

    //Método que realiza a busca de todos as pontuações das equipes no Banco de Dados.
    public function getAll() {
        $this->db->select('pontuacao.*,equipe.nome as nomee');
        $this->db->join('equipe', 'equipe.id = pontuacao.id_equipe', 'inner');
        //Pega a tabela equipe no Banco de Dados.
        $query = $this->db->get('pontuacao');
        //Retorna em formato de array
        return $query->result();
    }

    //Método que recebe dados por parâmetro.
    public function insert($data = array()) {
        $this->db->insert('pontuacao', $data);
        return $this->db->affected_rows();
    }

    //Método que recebe um id por parâmetro e busca ele no banco de Dados.
    public function getOne($id) {
        $this->db->where('id', $id);
        //Busca a pontuação respeitando o filtro
        $query = $this->db->get('pontuacao');
        //retorna a primeira linha
        return $query->row(0);
    }

}
