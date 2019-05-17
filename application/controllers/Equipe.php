<?php

defined('BASEPATH') OR exit('No direct script acces allowed');

class Equipe extends CI_Controller {

    public function __construct() {
        //Chama o construtor da classe pai(Ci_controller).
        parent:: __construct();

        //Chama o método que faz a validação de login do usuário.
        $this->load->model('User_model');
        $this->User_model->verificaLogin();
        $this->load->model('Equipe_model');
    }

    public function index() {
        $this->listarEquipe();
    }

    public function listarEquipe() {
        //$data tem que ser em formato de array para passa para a view 
        //por isso chamamos a função getALL do Equipe_model.
        $data['equipes'] = $this->Equipe_model->getAll();

        //Carrega a view passando o conteúdo da variável $data.
        $this->load->view('Header');
        $this->load->view('ListaEquipe', $data);
        $this->load->view('Footer');
    }
    

    public function cadastrar() {
        //Regras de validação.
        $this->form_validation->set_rules('nome', 'nome', 'required');

        //verifica se os dados foram atendidos corretamente.
        if ($this->form_validation->run() == false) {
            //Se não tiver passado na validação,então o formulario sera carregado.
            $this->load->view('Header');
            $this->load->view('FormEquipe');
            $this->load->view('Footer');
        } else {
            //Resgata os dados por post.
            $data = array(
                'nome' => $this->input->post('nome'),
            );

            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_width'] = 1024;
            $config['max_height'] = 768;
            $config['encrypt_name'] = true;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('userfile')) {
                //Cria uma sessão com o error e redireciona
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('mensagem', '<div class="alert alert-succsess">' . $error . '</div>');
                redirect('Equipe/cadastrar');
                exit();
            } else {
                //Pega o nome do arquivo que foi enviado e adiciona no array $data
                $data['imagem'] = $this->upload->data('file_name');
            }

            //Chama o método insert do Model passando os dados a inserir, e já valida se teve linhas afetadas.
            if ($this->Equipe_model->insert($data)) {
                //Salva uma mensagem rapida na sessão.
                $this->session->set_flashdata('mensagem', 'Equipe cadastrada com sucesso!!!');
                redirect('equipe/listarEquipe');
            } else {
                unlink('./uploads/' . $data['imagem']);
                $this->session->set_flashdata('mensagem', 'Erro ao cadastrar equipe!!!');
                redirect('equipe/cadastrar');
            }
        }
    }

    public function alterar($id) {
        if ($id > 0) {

            //cria as regras de validação do formulário.
            $this->form_validation->set_rules('nome', 'nome', 'required');
            //valida se o formulario ja foi preenchida
            if ($this->form_validation->run() == false) {
                //Monta a variavel data para mandar dados para a view e chama o metodo getOne do cliente model
                //para resgatar os dados do cliente a ser alterado.
                $data['equipe'] = $this->Equipe_model->getOne($id);

                $this->load->view('Header');
                $this->load->view('FormEquipe', $data);
                $this->load->view('Footer');
            } else {
                $data = array(
                    'nome' => $this->input->post('nome'),
                );
                
                  $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_width'] = 1024;
            $config['max_height'] = 768;
            $config['encrypt_name'] = true;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('userfile')) {
                //Cria uma sessão com o error e redireciona
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('mensagem', '<div class="alert alert-succsess">' . $error . '</div>');
                redirect('Equipe/cadastrar');
                exit();
            } else {
                //Pega o nome do arquivo que foi enviado e adiciona no array $data
                $data['imagem'] = $this->upload->data('file_name');
            }

                //chama o método update do Equipe_model e já valida se teve linhas afetadas.
                if ($this->Equipe_model->update($id, $data)) {
                    $this->session->set_flashdata('mensagem', 'Equipe alterada com sucesso!!!');
                    redirect('Equipe/listarEquipe');
                } else {
                    $this->session->set_flashdata('mensagem', 'Erro ao alterar equipe...');
                    redirect('Equipe/alterar/' . $id);
                }
            }
        } else {
            redirect('Equipe/listarEquipe');
        }
    }

    public function deletar($id) {
        If ($id > 0) {
            //Manda para o model deletar e já valida o retorno para ver se deu certo.
            unlink('./uploads/' . $data['imagem']);
            if ($this->Equipe_model->delete($id)) {
                $this->session->set_flashdata('mensagem', 'Equipe deletada com sucesso!!!');
            } else {
                $this->session->set_flashdata('mensagem', 'Erro ao deletar equipe...');
            }
        }
        redirect('Equipe/listarEquipe');
    }

}
