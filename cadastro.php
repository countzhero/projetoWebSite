<?php

require __DIR__ . '/conexao.php';

if(isset($_POST['cadastrar'])){

    $nome = $_POST['nome'];
    $email = $_POST['email'];

    $senha = password_hash(
        $_POST['senha'],
        PASSWORD_DEFAULT
    );

    $perfil = "aluno";

    
    $stmt = $conn->prepare(
    "INSERT INTO usuarios
    (nome,email,senha,perfil)
    VALUES (?,?,?,?)
    "
    );

    $stmt->bind_param(
    "ssss",
    $nome,
    $email,
    $senha,
    $perfil
);

    $stmt->execute();

    header("Location: ../login.php");
    exit;
}
?>

<form method="POST">

<input
type="text"
name="nome"
placeholder="Nome"
required>

<input
type="email"
name="email"
placeholder="Email"
required>

<input
type="password"
name="senha"
placeholder="Senha"
required>

<button name="cadastrar">
Cadastrar
</button>

</form>