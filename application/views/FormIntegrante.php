
<div class="container mt-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Cadastro de integrantes</li>
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
                        <h2>Formulário de integrantes</h2>
                        <br>
                        <input class="form-control form-control-lg" type="hidden" name='id' id='id' value='<?= (isset($integrante)) ? $integrante->id : ''; ?>' >
                        <label for="nome">Nome:</label>
                        <input  class="form-control form-control-lg" type="text" name="nome" id="nome"  value="<?= (isset($integrante)) ? $integrante->nome : ''; ?> ">
                        <br>
                        <select class="custom-select mb-4" name="id_equipe" id="id_equipe">
                            <option selected hidden disabled>Selecione uma equipe</option>
                            <?php
                            if ($equipes != null) {
                                foreach ($equipes as $e) {
                                    echo '<option ';
                                    ((isset($integrante)) && $e->id == $integrante->id_equipe ) ? 'selected' : '';
                                    echo 'value="' . $e->id . '">' . $e->nome . '</option>';
                                }
                            }
                            ?>

                        </select>
                        <br>
                        <label for="dataNascimento">Data de nascimento:</label>
                        <input class="form-control form-control-lg" type="date" name="dataNascimento" id="dataNascimento" value="<?= (isset($integrante)) ? $integrante->dataNascimento : ''; ?>">
                        <br>
                        <label for="rg">RG:</label>
                        <input class="form-control form-control-lg" type="text"  name="rg" id="rg" value="<?= (isset($integrante)) ? $integrante->rg : ''; ?>">
                        <br>
                        <label for="cpf">CPF:</label>
                        <input class="form-control form-control-lg" type="text" name="cpf" id="cpf" value="<?= (isset($integrante)) ? $integrante->cpf : ''; ?> ">
                        <br>

                        <button type="submit" class="btn btn-outline-success">Enviar</button>
                        <button type="reset" class="btn btn-outline-secondary">Limpar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
