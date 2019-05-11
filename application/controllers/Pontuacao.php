<?php

defined('BASEPATH') OR exit('No direct script acces allowed');

class Pontuacao extends CI_Controller {

    public function __construct() {
        //Chama o construtor da classe pai(Ci_controller).
        parent:: __construct();

        //Chama o método que faz a validação de login do usuário.
        $this->load->model('User_model');
        $this->User_model->verificaLogin();
    }

    public function index() {
        $this->listarPontuacao();
    }

    public function listarPontuacao() {
        //Carrega pelo nome e apelido.
        $this->load->model('Pontuacao_model', 'pm');
        //$data tem que ser em formato de array para passa para a view 
        //por isso chamamos a função getALL da Pontuacao_model.
        $data['pontuacoes'] = $this->pm->getAll();

        //Carrega a view passando o conteúdo da variável $data.
        $this->load->view('Header');
        $this->load->view('ListaPontuacao', $data);
        $this->load->view('Footer');
    }

}
