
<div class="container mt-3">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Visualização de Provas</li>
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

    <div class='mt-5 table-responsive'>
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


