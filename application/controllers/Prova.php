<?php

defined('BASEPATH') OR exit('No direct script acces allowed');

class Prova extends CI_Controller {
    
    public function __construct(){
        parent:: __construct();
        
        $this->load->model('User_model');
        $this->User_model->verificaLogin();
}

    public function index() {
        $this->listar();
    }

    public function listar() {
        $this->load->model('Prova_model', 'pm');

        $data['provas'] = $this->pm->getAll();

        $this->load->view('ProvaUser', $data);
    }

    public function cadastrar() {
        $this->form_validation->set_rules('nome', 'nome', 'required');
        $this->form_validation->set_rules('tempo', 'tempo', 'required');
        $this->form_validation->set_rules('descricao', 'descricao', 'required');
        $this->form_validation->set_rules('NIntegrantes', 'NIntegrantes', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('FormProva');
        } else {
            $this->load->model('Prova_model');

            $data = array(
                'nome' => $this->input->post('nome'),
                'tempo' => $this->input->post('tempo'),
                'descricao' => $this->input->post('descricao'),
                'NIntegrantes' => $this->input->post('NIntegrantes')
            );

            if ($this->Prova_model->insert($data)) {

                $this->session->set_flashdata('mensagem', 'Prova cadastrada com sucesso!!!');
                redirect('Prova/listar');
            } else {
                $this->session->set_flashdata('mensagem', 'Erro ao cadastrar prova!!!');
                redirect('Prova/cadastrar');
            }
        }
    }

    public function alterar($id) {
        if ($id > 0) {
            $this->load->model('Prova_model');

            $this->form_validation->set_rules('nome', 'nome', 'required');
            $this->form_validation->set_rules('tempo', 'tempo', 'required');
            $this->form_validation->set_rules('descricao', 'descricao', 'required');
            $this->form_validation->set_rules('NIntegrantes', 'NIntegrantes', 'required');

            if ($this->form_validation->run() == false) {

                $data['prova'] = $this->Prova_model->getOne($id);

                $this->load->view('FormProva', $data);
            } else {
                $data = array(
                    'nome' => $this->input->post('nome'),
                    'tempo' => $this->input->post('tempo'),
                    'descricao' => $this->input->post('descricao'),
                    'NIntegrantes' => $this->input->post('NIntegrantes')
                );

                if ($this->Prova_model->update($id, $data)) {
                    $this->session->set_flashdata('mensagem', 'Prova alterada com sucesso!!!');
                    redirect('Prova/listar');
                } else {
                    $this->session->set_flashdata('mensagem', 'Erro ao alterar prova...');
                    redirect('Prova/alterar/' . $id);
                }
            }
        } else {
            redirect('Prova/listar');
        }
    }

    public function deletar($id) {
        If ($id > 0) {
            $this->load->model('Prova_model');
            //Manda para o model deletar e ja valida o retorno para ver se deu certo 
            if ($this->Prova_model->delete($id)) {
                $this->session->set_flashdata('mensagem', 'Prova deletada com sucesso!!!');
            } else {
                $this->session->set_flashdata('mensagem', 'Erro ao deletar prova...');
            }
        }
        redirect('Prova/listar');
    }

}
