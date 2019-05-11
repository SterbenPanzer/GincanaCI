<?php

defined('BASEPATH') OR exit('No direct script acces allowed');

Class User extends CI_Controller {

    public function index() {
        $this->load->view('Login');
    }

    public function login() {
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('senha', 'senha', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('Login');
        } else {
            $this->load->model('User_model');

            $user = $this->User_model->getUser(
                    $this->input->post('email'), $this->input->post('senha')
            );

            if ($user) {
                $data = array(
                    'idUser' => $user->id,
                    'email' => $user->email,
                    'logado' => TRUE
                );
                $this->session->set_userdata($data);
                
                redirect($this->config->base_url('index.php'));
            } else {
                $this->session->set_flashdata('mensagem', 'Usuário e Senha incorretos!!!');

                redirect($this->config->base_url() . 'User/Login');
            }
        }
    }

    public function sair() {
        $this->session->sess_destroy();
        redirect($this->config->base_url('index.php'));
    }

}
