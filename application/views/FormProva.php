<!DOCKTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Cadastro de provas</title>
    </head>
    <body>
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
    </body>
</html>
