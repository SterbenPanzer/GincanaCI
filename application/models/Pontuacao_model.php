<?php

class Pontuacao_model extends CI_Model {

    //Método que realiza a busca de todos as pontuações das equipes no Banco de Dados.
    public function getAll() {
        $this->db->select('pontuacao.*,sum(pontos) as pontosT,equipe.nome as nomee,prova.nome as nomep');
        $this->db->join('equipe', 'equipe.id = pontuacao.id_equipe', 'inner');
        $this->db->join('prova', 'prova.id = pontuacao.id_prova', 'inner');
        $this->db->group_by('nomep,nomee');
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

    public function getEquipe() {
        //Pega  a tabela equipe no Banco de Dados.
        $query = $this->db->get('equipe');
        //Retorna em formato de array
        return $query->result();
    }

    public function getProva() {
        //Pega a tabela prova no Banco de Dados.
        $query = $this->db->get('prova');
        //Retorna em formato de array
        return $query->result();
    }

    public function getPontuacaoGeral() {
        $this->db->select('pontuacao.*,sum(pontos) as pontosT,equipe.nome as nomee,prova.nome as nomep');
        $this->db->join('equipe', 'equipe.id = pontuacao.id_equipe', 'inner');
        $this->db->join('prova', 'prova.id = pontuacao.id_prova', 'inner');
        $this->db->order_by('pontosT', 'desc');
        $this->db->group_by('');
        //Pega a tabela pontuacao no Banco de Dados.
        $query = $this->db->get('pontuacao');
        //Retorna em formato de array
        return $query->result();
    }

    //Método que recebe o ID da pontuação a alterar
    //e os dados para alterar e faz o update na base de dados
    public function update($id, $data = array()) {
        if ($id > 0) {
            //filtra a pontuação que será alterada
            $this->db->where('id', $id);
            //altera os dados de acordo com o recebido por parametro
            $this->db->update('pontuacao', $data);
            //retorno do numero de linhas afetadas
            return $this->db->affected_rows();
        } else {
            return false;
        }
    }

    public function delete($id) {
        if ($id > 0) {
            $this->db->where('id', $id);
            $this->db->delete('Pontuacao');

            return $this->db->affected_rows();
        } else {
            return false;
        }
    }

}
