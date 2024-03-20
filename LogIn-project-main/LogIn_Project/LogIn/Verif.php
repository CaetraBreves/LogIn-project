<?php

session_start();

$servidor = "localhost";
$basedados = "LogInProject";
$utilizador = "Reg";
$password = "System32";
$dst="mysql:host=$servidor; dbname=$basedados; charset=UTF8";

try {

$conn = new PDO($dst, $utilizador, $password);

$nome = filter_var($_POST["logName"], FILTER_SANITIZE_SPECIAL_CHARS);
$pass = filter_var($_POST["logPass"], FILTER_SANITIZE_SPECIAL_CHARS);

 
 

$sql = "SELECT * FROM users where username='$nome' and password='$pass'";
$stmt = $conn->query($sql);
$stmt->setFetchMode(PDO::FETCH_ASSOC);

if ($row = $stmt->fetch()) {

    $_SESSION['username'] = $nome;
    $_SESSION['password'] = $pass;


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