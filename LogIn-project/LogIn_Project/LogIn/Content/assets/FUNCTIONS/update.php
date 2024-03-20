<?php
session_start();

$hostName = "localhost";
$username = "Reg";
$password = "System32";
$databaseName = "LogInProject";
 
$conn = new PDO("mysql:host=$hostName;dbname=$databaseName", $username, $password);

$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


//so admin
$idPSQ = filter_var($_POST["updID"], FILTER_SANITIZE_SPECIAL_CHARS);
$novoNome = filter_var($_POST["nomeNovo"], FILTER_SANITIZE_SPECIAL_CHARS);

//Para users comums
$passNovaConfirm = filter_var($_POST["passNovaConfirm"], FILTER_SANITIZE_SPECIAL_CHARS);
$passNova = filter_var($_POST["passNova"], FILTER_SANITIZE_SPECIAL_CHARS);




if($_SESSION['username'] == 'admin'){

  $sqlS = "SELECT * FROM users where ID='$idPSQ' ";
  $stmtS = $conn->query($sqlS);
  $stmtS->setFetchMode(PDO::FETCH_ASSOC);

  if ($row = $stmtS->fetch()) {
      
     
      try {
        

        $sql = 'UPDATE users 
                SET username=:newUsername,
                password=:newPassword
                where ID=:id';

        $stmt = $conn->prepare($sql);

        $stmt->execute([':newUsername' => $novoNome,
                        ':id' => $idPSQ,
                        ':newPassword' => $passNova]);
                        
      $_SESSION['updMsg'] = NULL;

      header('Location: updateUser.php');

      } catch (PDOException $err) {
        die($err);
      }
  }else{
    $_SESSION['updMsg'] = 'ID não encontrado!';

    header ('Location: updateUser.php');
  }


}else if(isset($_SESSION['username'])){

  if($passNovaConfirm == $passNova){
    
   
    $sqlN = "SELECT * FROM users where username='$_SESSION[username]'";
    $stmtN = $conn->query($sqlN);
    $stmtN->setFetchMode(PDO::FETCH_ASSOC);
  
    if ($row = $stmtN->fetch()) {
       
      try {
        
  
        $sqlR = 'UPDATE users 
                SET password=:newPassword
                WHERE username=:userName';
  
        $stmtR = $conn->prepare($sqlR);
  
        $stmtR->execute([':userName' => $_SESSION['username'],
                        ':newPassword' => $passNova]);
                        
      $_SESSION['updMsg'] = 'A sua palavra pass foi atualizada!';
  
      header('Location: ../Content.php');
  
      } catch (PDOException $err) {
        die($err);
      }
  }else{
    $_SESSION['updMsg'] = 'Algo não correu bem';
  }

  }

}else{
  echo 'Você não têm possui sessão iniciada.';
}

