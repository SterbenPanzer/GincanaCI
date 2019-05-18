<div class="container mt-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Cadastro de pontos</li>
        </ol>
    </nav>
    <div class="alert alert-light mt-3 " role="alert">
        <?php
        $mensagem = $this->session->flashdata('mensagem');
        if (isset($mensagem)) {
            echo $mensagem;
        }
        ?>
    </div>  
    <div class='row mt-5'>
        <div class="col-md-3"></div>
        <div class='col-md-6'>
            <div class='card'>
                <div class='card-body'>
                    <form acttion="" method="POST">
                        <h2>Formulário de Pontuação</h2>
                        <br>
                        <input class="form-control form-control-lg" type="hidden" name='id' id='id' value='<?= (isset($pontuacao)) ? $pontuacao->id : ''; ?>' >
                        <select class="custom-select mb-4" name="id_equipe" id="id_equipe">
                            <option selected hidden disabled>Selecione uma equipe</option>
                            <?php
                            if ($equipes != null) {
                                foreach ($equipes as $e) {
                                    echo '<option ';
                                    ((isset($pontuacao)) && $e->id == $pontuacao->id_equipe) ? 'selected' : '';
                                    echo ' value="' . $e->id . '">' . $e->nome . '</option>';
                                }
                            }
                            ?>
                        </select>
                        <select class="custom-select mb-4" name="id_prova" id="id_prova">
                            <option selected hidden disabled>Selecione uma prova</option>
                            <?php
                            if ($provas != null) {
                                foreach ($provas as $p) {
                                    echo '<option ';
                                    ((isset($pontuacao)) && $p->id == $pontuacao->id_prova) ? 'selected' : '';
                                    echo ' value="' . $p->id . '">' . $p->nome . '</option>';
                                }
                            }
                            ?>
                        </select>
                        <br>
                        <label for="pontos">Pontos:</label>
                        <input  class="form-control form-control-lg" type="number" name="pontos" id="pontos"  value="<?= (isset($pontuacao)) ? $pontuacao->pontos : ''; ?> ">
                        <br>
                        <button type="submit" class="btn btn-outline-success">Enviar</button>
                        <button type="reset" class="btn btn-outline-secondary">Limpar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>