<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

require 'php/conexao.php';

if(isset($_POST['login'])){

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $stmt = $conn->prepare(
        "SELECT * FROM usuarios WHERE email=?"
    );

    $stmt->bind_param(
        "s",
        $email
    );

    $stmt->execute();

    $resultado =
    $stmt->get_result();

    // $resultado =
    // $conn->query($sql);

    if($resultado->num_rows > 0){

        $usuario =
        $resultado->fetch_assoc();

        if(
            password_verify(
                $senha,
                $usuario['senha']
            )
        ){

            $_SESSION['id'] =
            $usuario['id'];

            $_SESSION['nome'] =
            $usuario['nome'];

            $_SESSION['perfil'] =
            $usuario['perfil'];

            header(
                "Location: dashboard.php"
            );

            exit;
        }
    }

    echo "Usuário ou senha inválidos";
}
?>

<form method="POST">
 
<input
type="email"
name="email"
required
placeholder="Email">

<input
type="password"
name="senha"
required
placeholder="Senha">

<button name="login">
Entrar
</button>

</form>

<?php

/* $host = "localhost";
$user = "root";
$pass = "";
$db = "flowfit";

$conn = new mysqli(
    $host,
    $user,
    $pass,
    $db
);

if ($conn->connect_error) {
    die("Erro: " . $conn->connect_error);
}
?>*/