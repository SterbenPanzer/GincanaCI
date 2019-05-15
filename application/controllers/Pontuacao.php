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

    public function listarPontuacaoGeral() {
        //Carrega pelo nome e apelido.
        $this->load->model('Pontuacao_model', 'pm');
//$data tem que ser em formato de array para passa para a view 
//por isso chamamos a função getALL da Pontuacao_model.
        $data['pontuacoes'] = $this->pm->getAll();

//Carrega a view passando o conteúdo da variável $data.
        $this->load->view('Header');
        $this->load->view('ListaPontuacaoGeral', $data);
        $this->load->view('Footer');
    }

    public function cadastrar() {
        //Regras de validação.
        $this->form_validation->set_rules('id_equipe', 'id_equipe', 'required');
        $this->form_validation->set_rules('id_prova', 'id_prova', 'required');
        $this->form_validation->set_rules('pontos', 'pontos', 'required');

        $this->load->model('Pontuacao_model');
        //verifica se os dados foram atendidos corretamente.
        if ($this->form_validation->run() == false) {
            $data['equipes'] = $this->Pontuacao_model->getEquipe();
            $data['provas'] = $this->Pontuacao_model->getProva();
            //Se não tiver passado na validação,então o formulario sera carregado.
            $this->load->view('Header');
            $this->load->view('FormPontuacao', $data);
            $this->load->view('Footer');
        } else {
            //Carrega o model.
            //Resgata os dados por post.
            $data = array(
                'id_equipe' => $this->input->post('id_equipe'),
                'id_prova' => $this->input->post('id_prova'),
                'pontos' => $this->input->post('pontos')
            );
            //Chama o método insert do Model passando os dados a inserir, e já valida se teve linhas afetadas.
            if ($this->Pontuacao_model->insert($data)) {
                //Salva uma mensagem rapida na sessão.
                $this->session->set_flashdata('mensagem', 'Pontuação cadastrada com sucesso!!!');
                redirect('pontuacao/listarPontuacao');
            } else {
                $this->session->set_flashdata('mensagem', 'Erro ao cadastrar integrante!!!');
                redirect('pontuacao/cadastrar');
            }
        }
    }

    public function alterar($id) {
        if ($id > 0) {
            $this->load->model('Pontuacao_model');

            //cria as regras de validação do formulário.
            $this->form_validation->set_rules('id_equipe', 'id_equipe', 'required');
            $this->form_validation->set_rules('id_prova', 'id_prova', 'required');
            $this->form_validation->set_rules('pontos', 'pontos', 'required');
            //valida se o formulario ja foi preenchida
            if ($this->form_validation->run() == false) {
                $this->load->model('Equipe_model', 'em');
                $this->load->model('Prova_model', 'pm');

                $data['equipes'] = $this->em->getAll();
                $data['provas'] = $this->pm->getAll();
                //Monta a variavel data para mandar dados para a view e chama o metodo getOne da pontuacao model
                //para resgatar os dados da pontuação a ser alterado.
                $data['pontuacao'] = $this->Pontuacao_model->getOne($id);

                $this->load->view('Header');
                $this->load->view('FormPontuacao', $data);
                $this->load->view('Footer');
            } else {
                $data = array(
                    'id_equipe' => $this->input->post('id_equipe'),
                    'id_prova' => $this->input->post('id_prova'),
                    'pontos' => $this->input->post('pontos')
                );

                //chama o método update da Pontuacao_model e já valida se teve linhas afetadas.
                if ($this->Pontuacao_model->update($id, $data)) {
                    $this->session->set_flashdata('mensagem', 'Pontuação alterada com sucesso!!!');
                    redirect('Pontuacao/listarPontuacao');
                } else {
                    $this->session->set_flashdata('mensagem', 'Erro ao alterar pontuação...');
                    redirect('Pontuacao/alterar/' . $id);
                }
            }
        } else {
            redirect('Pontuacao/listarPontuacao');
        }
    }

    public function deletar($id) {
        If ($id > 0) {
            $this->load->model('Pontuacao_model');
            //Manda para o model deletar e já valida o retorno para ver se deu certo. 
            if ($this->Pontuacao_model->delete($id)) {
                $this->session->set_flashdata('mensagem', 'Pontuação deletada com sucesso!!!');
            } else {
                $this->session->set_flashdata('mensagem', 'Erro ao deletar pontuação...');
            }
        }
        redirect('Pontuacao/listarPontuacao');
    }

}
