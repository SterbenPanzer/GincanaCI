
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
            <div class="col-2"></div>
            <div class="col-7">
                <?php
                foreach ($equipes as $e) {

                    echo '<button type="button" class="btn btn-light mr-4 mb-3 mt-4 shadow text-center"><img class="img-fluid mb-2" style="max-height:150px; max-width:150px;" src="' . $this->config->base_url() . 'uploads/' . $e->imagem . '">';
                    echo '<hr>';
                    echo '<h6 class="mb-5">' . $e->nome . '</h6>';
                    echo '<a class="pl-2" href="' . $this->config->base_url() . 'Equipe/alterar/' . $e->id . '"><i class="fas fa-pen text-dark border rounded shadow-sm py-1 px-2"></i></a>';
                    echo '<a class="pl-2 ml-2 mr-3" href="' . $this->config->base_url() . 'Equipe/deletar/' . $e->id . '"><i class="fas fa-times text-dark border rounded shadow-sm py-1 px-2"></i></a>';
                    echo '</button>';
                }
                ?>
            </div>
        </div>
    </div>
</div>
