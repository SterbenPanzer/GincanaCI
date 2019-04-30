<!DOCKTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <meta charset="UTF-8">
        <title>Lista de provas</title>
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
                                <a class="nav-link" href="<?= $this->config->base_url() . 'Prova/cadastrar' ?>"><i class="far fa-edit mr-1"></i>Cadastrar</a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="<?= $this->config->base_url() . 'Prova/listar' ?>"><i class="far fa-sticky-note mr-1"></i>Visualizar</a>
                            </li>
                        </ul>
                        <form class="form-inline mr-auto my-2">
                            <input class="form-control" type="text" placeholder="Buscar...">
                        </form>
                        <ul class="navbar-nav justify-content-end">
                            <li class="nav-item">
                                <a class="nav-link" href="<?= $this->config->base_url() . 'User/sair' ?>">
                                    <i class="fas fa-sign-out-alt"></i> Sair
                                </a>
                            </li>
                        </ul>
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
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">Tempo</th>
                            <th scope="col">Descrição</th>
                            <th scope="col">Número de integrantes</th>
                            <th scope="col">Opções</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($provas as $p) {
                            echo '<tr>';
                            echo '<td>' . $p->nome . '</td>';
                            echo '<td>' . $p->tempo . '</td>';
                            echo '<td>' . $p->descricao . '</td>';
                            echo '<td>' . $p->NIntegrantes . '</td>';
                            echo '<td class="text-right">'
                            . '<a class="btn btn-sm btn-outline-secondary mr-2"  role="button"   href="' . $this->config->base_url() . 'Prova/alterar/' . $p->id . '"><i class="fas fa-pen"></i> Alterar </a>'
                            . '<a class="btn btn-sm btn-outline-secondary "  role="button"   href="' . $this->config->base_url() . 'Prova/deletar/' . $p->id . '"><i class="fas fa-times"></i> Deletar </a>'
                            . '</td>';

                            echo '</tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

    </body>
</html>



