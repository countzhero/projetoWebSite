<?php

mysqli_report(
    MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT
);

$host = "localhost";
$user = "root";
$pass = "senha"; // Substitua "senha" pela senha do 
                    // seu banco de dados
$db   = "flowfit";

try {

    $conn = new mysqli(
        $host,
        $user,
        $pass,
        $db
    );

    $conn->set_charset("utf8");

} catch (Exception $e) {

    die(
        "Falha na conexão: " .
        $e->getMessage()
    );

}

?>