<?php
require_once 'conn.php';


session_start();

$nome = filter_var($_POST["regName"], FILTER_SANITIZE_SPECIAL_CHARS);
$pass = filter_var($_POST["regPass"], FILTER_SANITIZE_SPECIAL_CHARS);



try {
    
    $conn = new PDO($dst, $utilizador, $password);

    if(isset($_POST["regName"]) && ($_POST["regPass"])){

        $_SESSION['username'] = $nome;
        $_SESSION['password']  = $pass;
        

        $sql = "INSERT INTO users (username, password) VALUES (:username, :password);";
        $stmt = $conn->prepare($sql);
        $stmt->execute([':username' => $nome,
                        ':password' => $pass]);
        
        header('Location: Content\assets\Content.php');

    }else{


        $nome = NULL;
        $pass = NULL;

        $_SESSION["username"] = NULL;
        $_SESSION["password"] = NULL;
    }
} catch (PDOException $err) {
    $_SESSION['regMsg'] = "Nome já existe!";
    header ('Location: Register.php');
    die($err);
}