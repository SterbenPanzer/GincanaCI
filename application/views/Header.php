<!DOCKTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="ie-edge">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <title>Cadastro de provas</title>
    </head>
    <body>
        <nav class="navbar navbar-expand-md navbar-dark bg-dark">
            <a class="navbar-brand" href="<?= $this->config->base_url() . 'index.php/Prova/cadastrar' ?>"><i class="fas fa-store text-light"></i> Gincana</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active dropdown">
                        <a href="#" id="menuProvas" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown">Provas</a>
                        <div class="dropdown-menu" aria-labelledby="menuProvas">
                            <a class="dropdown-item" href="<?= $this->config->base_url() . 'Prova/cadastrar' ?>">Cadastrar</a>
                            <a class="dropdown-item" href="<?= $this->config->base_url() . 'prova/listar' ?>">Visualizar</a>
                        </div>
                    </li>
                    <li class="nav-item active dropdown">
                        <a href="#" id="menuIntegrantes" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown">Integrantes</a>
                        <div class="dropdown-menu" aria-labelledby="menuIntegrantes">
                            <a class="dropdown-item" href="<?= $this->config->base_url() . 'Integrante/cadastrar' ?>">Cadastrar</a>
                            <a class="dropdown-item" href="<?= $this->config->base_url() . 'Integrante/listarIntegrante' ?>">Visualizar</a>
                        </div>
                    </li>
                    <li class="nav-item active dropdown">
                        <a href="#" id="menuEquipes" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown">Equipes</a>
                        <div class="dropdown-menu" aria-labelledby="menuEquipes">
                            <a class="dropdown-item" href="<?= $this->config->base_url() . 'Equipe/cadastrar' ?>">Cadastrar</a>
                            <a class="dropdown-item" href="<?= $this->config->base_url() . 'Equipe/listarEquipe' ?>">Visualizar</a>
                        </div>
                    </li>
                    <li class="nav-item active dropdown">
                        <a href="#" id="menuPontuacao" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown">Pontuação</a>
                        <div class="dropdown-menu" aria-labelledby="menuPontuacao">
                            <a class="dropdown-item" href="<?= $this->config->base_url() . 'Pontuacao/cadastrar' ?>">Cadastrar</a>
                            <a class="dropdown-item" href="<?= $this->config->base_url() . 'Pontuacao/listarPontuacao' ?>">Pontuações Por Prova</a>
                            <a class="dropdown-item" href="<?= $this->config->base_url() . 'Pontuacao/listarPontuacaoGeral' ?>">Pontuação Geral</a>
                        </div>
                    </li>
                </ul>
                <ul class="navbar-nav justify-content-end">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= $this->config->base_url() . 'User/sair' ?>">
                            <i class="fas fa-sign-out-alt"></i> Sair
                        </a>
                    </li>
                </ul>
            </div>
        </nav>




