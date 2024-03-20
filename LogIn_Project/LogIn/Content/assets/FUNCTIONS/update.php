<?php
$hostName = "localhost";
$username = "Reg";
$password = "System32";
$databaseName = "LogInProject";
 
$conn = new PDO("mysql:host=$hostName;dbname=$databaseName", $username, $password);

$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$updID = $_POST["updID"];


try {
    
    $stmt = $pdo->prepare("SELECT ID FROM users WHERE ID = :ID");
    
    $stmt->execute(['ID' => $updID]);

    if($stmt->rowCount() > 0) {

        $msgUpd= "Esse ID";
        echo $msgUpd;
        
    } else {
        $msgUpd= "Esse ID não existe";
        echo $msgUpd;
    }
  ?>
</table>
  <?php
} catch(PDOException $err) {
  echo "Error: " . $err->getMessage();
}