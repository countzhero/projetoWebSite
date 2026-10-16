<?php

require 'php/conexao.php';

$sql = "
SELECT
    u.nome,
    e.nome AS equipamento,
    TIMESTAMPDIFF(
        MINUTE,
        ut.inicio,
        NOW()
    ) AS tempo

FROM utilizacao ut

JOIN usuarios u
ON u.id = ut.usuario_id

JOIN equipamentos e
ON e.id = ut.equipamento_id

WHERE ut.status='Ativo'
";

$resultado = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Painel do Instrutor</title>
</head>
<body>

<h1>Monitoramento dos Equipamentos</h1>

<table border="1">
    <tr>
        <th>Aluno</th>
        <th>Equipamento</th>
        <th>Tempo de Uso</th>
        <th>Status</th>
    </tr>

    <?php while($linha = $resultado->fetch_assoc()){ ?>

    <tr>
        <td><?php echo $linha['nome']; ?></td>

        <td><?php echo $linha['equipamento']; ?></td>

        <td><?php echo $linha['tempo']; ?> min</td>

        <td>
            <?php

            if($linha['tempo'] > 10){
                echo "<span style='color:red'>Tempo Esgotado</span>";
            } else {
                echo "<span style='color:green'>Utilizando</span>";
            }

            ?>
        </td>
    </tr>

    <?php } ?>

</table>

</body>
</html>