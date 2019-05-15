<?php

class Integrante_model extends CI_Model {

    //Método que realiza a busca de todos os clientes no Banco de Dados.
    public function getAll() {
        $this->db->select('integrante.*,equipe.nome as nomee');
        $this->db->join('equipe', 'equipe.id = integrante.id_equipe', 'inner');
        //Pega  a tabela integrante no Banco de Dados.
        $query = $this->db->get('integrante');
        //Retorna em formato de array
        return $query->result();
    }

    //Método que recebe dados por parâmetro.
    public function insert($data = array()) {
        $this->db->insert('integrante', $data);
        return $this->db->affected_rows();
    }

    //Método que recebe um id por parâmetro e busca ele no Banco de Dados.
    public function getOne($id) {
        $this->db->where('id', $id);
        //Busca o integrante na base respeitando o filtro.
        $query = $this->db->get('integrante');
        //Retorna apenas a primeira linha.
        return $query->row(0);
    }

    public function getEquipe() {
        //Pega  a tabela equipe no Banco de Dados.
        $query = $this->db->get('equipe');
        //Retorna em formato de array
        return $query->result();
    }

    //Método que recebe o ID do integrante a alterar
    //e os dados para alterar e faz o update na base de dados
    public function update($id, $data = array()) {
        if ($id > 0) {
            //filtra o integrante que será alterado
            $this->db->where('id', $id);
            //altera os dados de acordo com o recebido por parametro
            $this->db->update('integrante', $data);
            //retorno do numero de linhas afetadas
            return $this->db->affected_rows();
        } else {
            return false;
        }
    }
    
    public function delete($id) {
        if ($id > 0) {
            $this->db->where('id', $id);
            $this->db->delete('Integrante');

            return $this->db->affected_rows();
        } else {
            return false;
        }
    }

}
