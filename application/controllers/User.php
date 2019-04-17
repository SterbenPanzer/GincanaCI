<?php

defined('BASEPATH') OR exit('No direct script acces allowed');

class User extends CI_Controller {

    public function index() {
        $this->listar();
    }

    public function listar() {
        $this->load->model('Prova_model', 'pm');

        $data['provas'] = $this->pm->getAll();

        $this->load->view('ProvaUser', $data);
    }

}
