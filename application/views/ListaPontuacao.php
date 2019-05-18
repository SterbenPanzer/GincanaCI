
<div class="container mt-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Visualização de Pontuações Por Prova</li>
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
    <div class='mt-5 table-responsive shadow'>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Nome da equipe</th>
                    <th scope="col">Nome da prova</th>
                    <th scope="col">Pontuação</th>
                    <th scope="col">Opções</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($pontuacoes as $p) {
                    echo '<tr>';
                    echo '<td>' . $p->nomee . '</td>';
                    echo '<td>' . $p->nomep . '</td>';
                    echo '<td>' . $p->pontosT . '</td>';
                    echo '<td>'
                    . '<a class="btn btn-sm btn-outline-secondary mr-2"  role="button"   href="' . $this->config->base_url() . 'Pontuacao/alterar/' . $p->id . '"><i class="fas fa-pen"></i> Alterar </a>'
                    . '<a class="btn btn-sm btn-outline-secondary "  role="button"   href="' . $this->config->base_url() . 'Pontuacao/deletar/' . $p->id . '"><i class="fas fa-times"></i> Deletar </a>'
                    . '</td>';

                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
