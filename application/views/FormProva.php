<!DOCKTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <meta charset="UTF-8">
        <title>Cadastro de provas</title>
    </head>
    <body>

        <div class="container-fluid">
            <div class="row">

                <nav class="navbar navbar-expand navbar-dark bg-dark col-md-12">
                    <a class="navbar-brand" href="#">Cadastro de Provas</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample02" aria-controls="navbarsExample02" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarsExample02">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="#">Cadastrar</a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="#">Visualizar</a>
                            </li>
                        </ul>
                        <form class="form-inline my-2 my-md-0">
                            <input class="form-control" type="text" placeholder="Search">
                        </form>
                    </div>
                </nav>

            </div>

            <?php
            $mensagem = $this->session->flashdata('mensagem');
            if (isset($mensagem)) {
                echo $mensagem;
            }
            ?>

            <form acttion="" method="POST">
                <input type="hidden" name="id" id="id" value="<?= (isset($prova)) ? $prova->id : ''; ?> ">
                <label for="nome">Nome:</label>
                <input type="text" name="nome" id="nome" value="<?= (isset($prova)) ? $prova->nome : ''; ?> ">
                <br>
                <label for="tempo">Tempo:</label>
                <input type="text" name="tempo" id="tempo" value="<?= (isset($prova)) ? $prova->tempo : ''; ?> ">
                <br>
                <label for="descricao">Descrição:</label>
                <input type="text" name="descricao" id="descricao" value="<?= (isset($prova)) ? $prova->descricao : ''; ?> ">
                <br>
                <label for="NIntegrante">Número de integrantes:</label>
                <input type="text" name="NIntegrantes" id="NIntegrantes" value="<?= (isset($prova)) ? $prova->NIntegrantes : ''; ?> ">
                <br>

                <button type="submit">Enviar</button>
                <button type="reset">Limpar</button>
            </form>

        </div>
    </body>
</html>
