<!DOCKTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <meta charset="UTF-8">
        <title>Cadastro de provas</title>
    </head>
    <body>

        <div class="container">
            <div class="row">

                <nav class="navbar navbar-expand navbar-dark bg-dark col-md-12">
                    <a class="navbar-brand" href="<?= $this->config->base_url() . 'index.php/Prova/cadastrar' ?>">Cadastro de Provas</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample02" aria-controls="navbarsExample02" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarsExample02">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="<?= $this->config->base_url() . 'index.php/Prova/cadastrar' ?>"><i class="far fa-edit mr-1"></i>Cadastrar</a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="<?= $this->config->base_url() . 'index.php/Prova/listar' ?>"><i class="far fa-sticky-note mr-1"></i>Visualizar</a>
                            </li>
                        </ul>
                        <form class="form-inline my-2 my-md-0">
                            <input class="form-control" type="text" placeholder="Buscar...">
                        </form>
                    </div>
                </nav>

            </div>

            <div class="alert alert-light mt-3" role="alert">
                <?php
                $mensagem = $this->session->flashdata('mensagem');
                if (isset($mensagem)) {
                    echo $mensagem;
                }
                ?>
            </div>

            <div class='row mt-5'>
                <div class='col-md-12'>
                    <div class='card'>
                        <div class='card-body'>
                            <form acttion="" method="POST">
                                <input class="form-control form-control-lg" type="hidden" name='id' id='id' value='<?= (isset($prova)) ? $prova->id : ''; ?>' >
                                <label for="nome">Nome:</label>
                                <input  class="form-control form-control-lg" type="text" name="nome" id="nome"  value="<?= (isset($prova)) ? $prova->nome : ''; ?> ">
                                <br>
                                <label for="tempo">Tempo:</label>
                                <input class="form-control form-control-lg" type="text" name="tempo" id="tempo" value="<?= (isset($prova)) ? $prova->tempo : ''; ?> ">
                                <br>
                                <label for="descricao">Descrição:</label>
                                <input class="form-control form-control-lg" type="text" name="descricao" id="descricao" value="<?= (isset($prova)) ? $prova->descricao : ''; ?> ">
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
    </body>
</html>
