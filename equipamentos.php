<?php

require 'php/conexao.php';

$sql =
"SELECT * FROM equipamentos";

$resultado =
$conn->query($sql);
?>

<table>

<tr>
<th>Equipamento</th>
<th>Status</th>
<th>Limite</th>
</tr>

<?php
while(
$linha =
$resultado->fetch_assoc()
){
?>

<tr>

<td>
<?= $linha['nome']; ?>
</td>

<td>
<?= $linha['status']; ?>
</td>

<td>
<?= $linha['tempo_limite']; ?>
min
</td>

</tr>

<?php } ?>

</table>