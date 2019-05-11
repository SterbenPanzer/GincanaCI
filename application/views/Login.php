<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login de Usuário</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    </head>
    <body>
        <div class="container mt-5">
            <div class="card mx-auto" style="max-width: 300px;">
                <div class="card-header">
                    Login de Usuário 
                </div>
                <div class="card-body">
                    <?php
                    $mensagem = $this->session->flashdata('mensagem');
                    echo (isset($mensagem) ? ' <div class="alert alert-warning" role="alert">' . $mensagem . '</div>' : '' );
                    ?>
                    <form action="" method="POST" name="login">
                        <div class="form-group">
                            <label for="email">E-mail:</label>
                            <input type="text" class="form-control" name="email" id="email">
                        </div>
                        <div class="form-group">
                            <label for="senha">Senha:</label>
                            <input type="password" class="form-control" name="senha" id="senha">  
                        </div>
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-check"></i> Acessar
                        </button>
                </div> 
            </div>
        </div>
    </body>
</html>
