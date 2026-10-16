<?php

session_start();

require 'php/conexao.php';

$equipamento = $_GET['equipamento'];
$usuario = $_SESSION['id'];

$stmt = $conn->prepare(
"
INSERT INTO utilizacao
(usuario_id,equipamento_id,inicio,status)
VALUES (?,?,NOW(),'Ativo')
"
);

$stmt->bind_param(
"ii",
$usuario,
$equipamento
);

$stmt->execute();

$conn->query(
"
UPDATE equipamentos
SET status='Ocupado'
WHERE id=$equipamento
"
);

echo "Check-in realizado!";