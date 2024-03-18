<?php

session_start();

$servidor = "localhost";
$basedados = "LogInProject";
$utilizador = "Reg";
$password = "System32";
$dst="mysql:host=$servidor; dbname=$basedados; charset=UTF8";

try {
$conn = new PDO($dst, $utilizador, $password);

$_SESSION["username"] = filter_var($_POST["name"], FILTER_SANITIZE_SPECIAL_CHARS);
$_SESSION["password"] = filter_var($_POST["pass"], FILTER_SANITIZE_SPECIAL_CHARS);

$nome = $_SESSION['username'];
$password = $_SESSION['password'];

$sql = "SELECT * FROM users where username='$nome' and password='$password'";
$stmt = $conn->query($sql);
$stmt->setFetchMode(PDO::FETCH_ASSOC);

if ($row = $stmt->fetch()) {
    
        include '../LogIn/Content/assets/Content.php';
        $logInFail = "";
       
    } else {
       
        $logInFail = "Username ou Password Invalida.";

        
        $_SESSION["username"] = NULL;
        $_SESSION["password"] = NULL;
		include 'index.php';
	}

} catch (PDOException $err) {
    die("A ligação ao servidor $servidor falhou com o erro: " . $err->getMessage());
}


?>