<div class="container mt-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Cadastro de equipes</li>
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
                    <form acttion="" enctype="multipart/form-data" method="POST">
                        <h2>Formulário de equipes</h2>
                        <br>
                        <input class="form-control form-control-lg" type="hidden" name='id' id='id' value='<?= (isset($equipe)) ? $equipe->id : ''; ?>' >
                        <label for="nome">Nome da equipe:</label>
                        <input  class="form-control form-control-lg" type="text" name="nome" id="nome"  value="<?= (isset($equipe)) ? $equipe->nome : ''; ?> ">
                        <br>
                        <div class="input-group mb-3">
                            <div class="custom-file">
                                <input type="file" name="userfile" class="custom-file-input" id="inputGroupFile03" aria-describedby="inputGroupFileAddon03">
                                <label class="custom-file-label" for="inputGroupFile03">Selecione a logo da sua equipe</label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-outline-success">Enviar</button>
                        <button type="reset" class="btn btn-outline-secondary">Limpar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
