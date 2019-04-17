<!DOCKTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Lista de provas</title>
    </head>
    <body>
        <table border="1">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Tempo</th>
                    <th>Descrição</th>
                    <th>Número de Integrantes</th>
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
                    echo '<td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>

    </body>
</html>



