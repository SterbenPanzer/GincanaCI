
<div class="container mt-3">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= $this->config->base_url() . 'index.php' ?>">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Cadastro de Provas</li>
        </ol>
    </nav>
    <div class="alert alert-light mt-3" role="alert">
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
                        <h2>Formulário de provas</h2>
                        <br>
                        <input class="form-control form-control-lg" type="hidden" name='id' id='id' value='<?= (isset($prova)) ? $prova->id : ''; ?>' >
                        <label for="nome">Nome:</label>
                        <input  class="form-control form-control-lg" type="text" name="nome" id="nome"  value="<?= (isset($prova)) ? $prova->nome : ''; ?> ">
                        <br>
                        <label for="tempo">Tempo:</label>
                        <input class="form-control form-control-lg" type="text" name="tempo" id="tempo" value="<?= (isset($prova)) ? $prova->tempo : ''; ?> ">
                        <br>
                        <label for="descricao">Descrição:</label>
                        <textarea class="form-control form-control-lg"  name="descricao" id="descricao" value=""><?= (isset($prova)) ? $prova->descricao : ''; ?></textarea>
                        <br>
                        <label for="NIntegrante">Número de integrantes:</label>
                        <input class="form-control form-control-lg" type="text" name="NIntegrantes" id="NIntegrantes" value="<?= (isset($prova)) ? $prova->NIntegrantes : ''; ?> ">
                        <br>

                        <button type="submit" class="btn btn-outline-success">Enviar</button>
                        <button type="reset" class="btn btn-outline-secondary">Limpar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


