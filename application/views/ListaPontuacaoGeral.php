
<div class="container mt-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Visualização de Pontuação Geral</li>
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
                    <th scope="col">Colocação</th>
                    <th scope="col">Nome da equipe</th>
                    <th scope="col">Pontuação</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $count = 1;
                $ultimaP = 0;
                foreach ($pontuacoes as $p) {
                    if ($ultimaP == $p->pontosT) {
                        $count--;
                    }
                    echo '<tr>';
                    echo '<td>' . $count . '</td>';
                    echo '<td>' . $p->nomee . '</td>';
                    echo '<td>' . $p->pontosT . '</td>';
                    echo '<td>';
                    echo'</td>';
                    echo '</tr>';
                    $ultimaP = $p->pontosT;
                    $count++;
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
