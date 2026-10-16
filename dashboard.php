<?php

session_start();

if(
    !isset($_SESSION['id'])
){
    header(
        "Location: login.php"
    );
}
?>
<!DOCTYPE html>
<html>
<head>

<title>Aluno</title>

<link rel="stylesheet" href="css/style.css">

</head>

<body>

<h1>Painel do Aluno</h1>

<div class="cards">

<div class="card">

<?php

require 'php/conexao.php';

$sql =
"SELECT * FROM equipamentos";

$resultado =
$conn->query($sql);

while(
$equip =
$resultado->fetch_assoc()
){
?>
<div class="card">

<h3><?= $equip['nome']; ?></h3>

<p>
Status:
<?= $equip['status']; ?>
</p>

</div>

<?php } ?>

<button onclick="iniciarUso('Supino',10)">
Iniciar Uso
</button>

</div>

<div class="card">

<h3>Esteira</h3>

<p>Status: Ocupada</p>

<p>Restam 8 min</p>

<button onclick="solicitarRevezamento()">
Solicitar Revezamento
</button>

</div>

<div class="card">

<h3>QR Check-in</h3>

<button onclick="checkinQr()">
Escanear QR
</button>

</div>

</div>

<div id="cronometro">

00:00

</div>

<script src="js/app.js"></script>

</body>
</html>