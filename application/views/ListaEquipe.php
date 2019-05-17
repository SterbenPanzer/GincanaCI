
<div class="container mt-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Visualização de equipes</li>
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
    <div class="col-md-12">
        <div class="row">
            <div class="col-3"></div>
            <div class="col-5">
                <div class='mt-5 table-responsive shadow'>
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Logo</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Opções</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($equipes as $e) {
                                echo '<tr>';
                                echo '<td> <img class="img-fluid" style="max-height:60px; max-width:80px;" src="' .  $this->config->base_url() . 'uploads/' . $e->imagem . '"></td>';
                                echo '<td>' . $e->nome . '</td>';
                                echo '<td class="text-right">'
                                . '<a class="btn btn-sm btn-outline-secondary mr-2"  role="button"   href="' . $this->config->base_url() . 'Equipe/alterar/' . $e->id . '"><i class="fas fa-pen"></i> Alterar </a>'
                                . '<a class="btn btn-sm btn-outline-secondary "  role="button"   href="' . $this->config->base_url() . 'Equipe/deletar/' . $e->id . '"><i class="fas fa-times"></i> Deletar </a>'
                                . '</td>';
                                echo '</tr>';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
