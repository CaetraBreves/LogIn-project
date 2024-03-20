<?php

session_start();

$servidor = "localhost";
$basedados = "LogInProject";
$utilizador = "Reg";
$password = "System32";
$dst="mysql:host=$servidor; dbname=$basedados; charset=UTF8";

try {

$conn = new PDO($dst, $utilizador, $password);

$_SESSION["username"] = filter_var($_POST["logName"], FILTER_SANITIZE_SPECIAL_CHARS);
$_SESSION["password"] = filter_var($_POST["logPass"], FILTER_SANITIZE_SPECIAL_CHARS);

$nome = $_SESSION['username'];
$pass = $_SESSION['password'];

$sql = "SELECT * FROM users where username='$nome' and password='$pass'";
$stmt = $conn->query($sql);
$stmt->setFetchMode(PDO::FETCH_ASSOC);

if ($row = $stmt->fetch()) {


    if($nome == 'admin' && $pass == 'System32'){

        header('Location:../LogIn/Content/assets/Admin.php');

        $logInFail = "";

    }else{
        header('Location: ../LogIn/Content/assets/Content.php');
        $logInFail = "";
    }
    
       
    } else {
       
        $logInFail = "Username ou Password Invalida.";

        
        $_SESSION["username"] = NULL;
        $_SESSION["password"] = NULL;
		include 'LogIn.php';
	}

} catch (PDOException $err) {
    die("A ligação ao servidor $servidor falhou com o erro: " . $err->getMessage());
}


?>