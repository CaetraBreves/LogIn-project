<?php

session_start();

$servidor = "localhost";
$basedados = "LogInProject";
$utilizador = "Reg";
$password = "System32";
$dst="mysql:host=$servidor; dbname=$basedados; charset=UTF8";

try {
$conn = new PDO($dst, $utilizador, $password);

$_SESSION["username"] = filter_var($_POST["regName"], FILTER_SANITIZE_SPECIAL_CHARS);
$_SESSION["password"] = filter_var($_POST["regPass"], FILTER_SANITIZE_SPECIAL_CHARS);

$nome = $_SESSION['username'];
$password = $_SESSION['password'];


if (isset($nome) && isset($password)) {


        $sql = "INSERT INTO users (username, password)  VALUES ('$nome', '$password'); ";
        $pdo->prepare($sql);
        $stmt->execute([$nome, $password]);
        
        $registerFail = "";

        include '../LogIn/Content/assets/Content.php';
        
       
    } else {
       
        $registerFail = "Falha ao registar utilizador!";

        
        $_SESSION["username"] = NULL;
        $_SESSION["password"] = NULL;
		include '../LogIn/Register.php';
	}

} catch (PDOException $err) {
    die("A ligação ao servidor $servidor falhou com o erro: " . $err->getMessage());
}


?>