<?php
$servidor = "localhost";
$basedados = "LogInProject";
$utilizador = "Reg";
$password = "System32";

$dst="mysql:host=$servidor; dbname=$basedados; charset=UTF8";

try {
    $conn = new PDO($dst, $utilizador, $password);
    echo "Ligação ao servidor $servidor, base de dados $basedados, efetuada com sucesso";
} catch (PDOException $err) {
    die("A ligação ao servidor $servidor falhou com o erro: " . $err->getMessage());
}
?> 