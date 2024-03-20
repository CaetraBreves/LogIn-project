<?php
session_start();

$hostName = "localhost";
$username = "Reg";
$password = "System32";
$databaseName = "LogInProject";
 
$conn = new PDO("mysql:host=$hostName;dbname=$databaseName", $username, $password);

$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$delID = filter_var($_POST["delID"], FILTER_SANITIZE_SPECIAL_CHARS);



if($_SESSION['username'] == 'admin'){

    $sqlS = "SELECT * FROM users where ID='$delID' ";
    $stmtS = $conn->query($sqlS);
    $stmtS->setFetchMode(PDO::FETCH_ASSOC);
  
   if ($row = $stmtS->fetch() && $delID !=1) {
        try {
          
            $sql = 'DELETE FROM users WHERE ID =:id';
            $stmt = $conn->prepare($sql);
            $stmt->execute([':id' => $delID]);

            $_SESSION['delMsg'] =  "Registro Apagado";

            header('Location: deleteMenu.php');

        } catch (PDOException $err) {
            die($err);
        }

    }else if($delID == '1'){
        $_SESSION['delMsg'] =  "O admin, não pode ser apagado.";
        header('Location: deleteMenu.php');

    }else{
        $_SESSION['delMsg'] =  "ID não encontrado";
        header('Location: deleteMenu.php');
    }




}else if(isset($_SESSION['username'])){

    
    $sqlSD = "SELECT * FROM users where username='$_SESSION[username]' ";
    $stmtSD = $conn->query($sqlSD);
    $stmtSD->setFetchMode(PDO::FETCH_ASSOC);
  
    if ($row = $stmtSD->fetch()) {
        try {
          
            $sql = 'DELETE FROM users WHERE username =:onesName';
            $stmt = $conn->prepare($sql);
            $stmt->execute([':onesName' => $_SESSION['username']]);


            header('Location: ../logout.php');

        } catch (PDOException $err) {
            die($err);
        }

    }else{
        $_SESSION['delMsg'] =  "Algo correu mal";
    }
}else{
    
    echo 'não têm sessão iniciada';
    
}


?>