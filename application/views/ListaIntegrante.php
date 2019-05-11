
<div class="container mt-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Visualização de integrantes</li>
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
                    <th scope="col">Equipe</th>
                    <th scope="col">Data de nascimento</th>
                    <th scope="col">RG</th>
                    <th scope="col">CPF</th>
                    <th scope="col">Opções</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($integrantes as $i) {
                    echo '<tr>';
                    echo '<td>' . $i->nome . '</td>';
                    echo '<td>' . $i->nomee . '</td>';
                    echo '<td>' . $i->dataNascimento . '</td>';
                    echo '<td>' . $i->rg . '</td>';
                    echo '<td>' . $i->cpf . '</td>';
                    echo '<td>'
                    . '<a class="btn btn-sm btn-outline-secondary mr-2"  role="button"   href="' . $this->config->base_url() . 'Integrante/alterar/' . $i->id . '"><i class="fas fa-pen"></i> Alterar </a>'
                    . '<a class="btn btn-sm btn-outline-secondary "  role="button"   href="' . $this->config->base_url() . 'Integrante/deletar/' . $i->id . '"><i class="fas fa-times"></i> Deletar </a>'
                    . '</td>';

                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
