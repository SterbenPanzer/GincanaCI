<?php

defined('BASEPATH') OR exit('No direct script acces allowed');

class Integrante extends CI_Controller {

    public function __construct() {
        //Chama o construtor da classe pai(Ci_controller).
        parent:: __construct();

        //Chama o método que faz a validação de login do usuário.
        $this->load->model('User_model');
        $this->User_model->verificaLogin();
    }

    public function index() {
        $this->listarIntegrante();
    }

    public function listarIntegrante() {
        //Carrega pelo nome e apelido.
        $this->load->model('Integrante_model', 'im');
        //$data tem que ser em formato de array para passa para a view 
        //por isso chamamos a função getALL do Integrante_model.
        $data['integrantes'] = $this->im->getAll();

        //Carrega a view passando o conteúdo da variável $data.
        $this->load->view('Header');
        $this->load->view('ListaIntegrante', $data);
        $this->load->view('Footer');
    }

    public function cadastrar() {
        //Regras de validação.
        $this->form_validation->set_rules('nome', 'nome', 'required');
        $this->form_validation->set_rules('id_equipe', 'id_equipe', 'required');
        $this->form_validation->set_rules('dataNascimento', 'dataNascimento', 'required');
        $this->form_validation->set_rules('rg', 'rg', 'required');
        $this->form_validation->set_rules('cpf', 'cpf', 'required');

        $this->load->model('Integrante_model');
        //verifica se os dados foram atendidos corretamente.
        if ($this->form_validation->run() == false) {
            $data['equipes'] = $this->Integrante_model->getEquipe();
            //Se não tiver passado na validação,então o formulario sera carregado.
            $this->load->view('Header');
            $this->load->view('FormIntegrante', $data);
            $this->load->view('Footer');
        } else {
            //Carrega o model.
            //Resgata os dados por post.
            $data = array(
                'nome' => $this->input->post('nome'),
                'id_equipe' => $this->input->post('id_equipe'),
                'dataNascimento' => $this->input->post('dataNascimento'),
                'rg' => $this->input->post('rg'),
                'cpf' => $this->input->post('cpf')
            );
            //Chama o método insert do Model passando os dados a inserir, e já valida se teve linhas afetadas.
            if ($this->Integrante_model->insert($data)) {
                //Salva uma mensagem rapida na sessão.
                $this->session->set_flashdata('mensagem', 'Integrante cadastrado com sucesso!!!');
                redirect('integrante/listarIntegrante');
            } else {
                $this->session->set_flashdata('mensagem', 'Erro ao cadastrar integrante!!!');
                redirect('integrante/cadastrar');
            }
        }
    }

    public function alterar($id) {
        if ($id > 0) {
            $this->load->model('Integrante_model');

            //cria as regras de validação do formulário.
            $this->form_validation->set_rules('nome', 'nome', 'required');
            $this->form_validation->set_rules('id_equipe', 'id_equipe', 'required');
            $this->form_validation->set_rules('dataNascimento', 'dataNascimento', 'required');
            $this->form_validation->set_rules('rg', 'rg', 'required');
            $this->form_validation->set_rules('cpf', 'cpf', 'required');
            //valida se o formulario ja foi preenchida
            if ($this->form_validation->run() == false) {
                $this->load->model('Equipe_model', 'em');

                $data['equipes'] = $this->em->getAll();
                //Monta a variavel data para mandar dados para a view e chama o metodo getOne do integrante model
                //para resgatar os dados do integrante a ser alterado.
                $data['integrante'] = $this->Integrante_model->getOne($id);

                $this->load->view('Header');
                $this->load->view('FormIntegrante', $data);
                $this->load->view('Footer');
            } else {
                $data = array(
                    'nome' => $this->input->post('nome'),
                    'id_equipe' => $this->input->post('id_equipe'),
                    'dataNascimento' => $this->input->post('dataNascimento'),
                    'rg' => $this->input->post('rg'),
                    'cpf' => $this->input->post('cpf')
                );

                //chama o método update do Integrante_model e já valida se teve linhas afetadas.
                if ($this->Integrante_model->update($id, $data)) {
                    $this->session->set_flashdata('mensagem', 'Integrante alterada com sucesso!!!');
                    redirect('Integrante/listarIntegrante');
                } else {
                    $this->session->set_flashdata('mensagem', 'Erro ao alterar integrante...');
                    redirect('Integrante/alterar/' . $id);
                }
            }
        } else {
            redirect('Integrante/listarIntegrante');
        }
    }

}
