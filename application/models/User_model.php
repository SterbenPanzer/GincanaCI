<?php

/**
 * Classe model da tabela usuario do banco de dados
 * 
 * @author Felipe
 */
class User_model extends CI_Model {

    public function getUser($email, $senha) {
        $this->db->where('email', $email);
        $this->db->where('senha', sha1($senha . 'felipeSENAC'));

        $query = $this->db->get('user');
        return $query->row(0);
    }

    public function verificaLogin() {
        //Resgata na sessão o status logado e o id do usuario
        $logado = $this->session->userdata('logado');
        $idUser = $this->session->userdata('idUser');

        //Verifica se o status está sendo setado, ou não está true, ou não tem idUsuario
        if ((!isset($logado)) || ($logado != true) || ($idUser <= 0)) {
            //Redireciona obrigando o login...
            redirect($this->config->base_url() . 'User/login');
        }
    }

}
