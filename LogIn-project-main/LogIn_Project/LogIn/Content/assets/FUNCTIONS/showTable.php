<?php
$hostName = "localhost";
$username = "Reg";
$password = "System32";
$databaseName = "LogInProject";
 
$conn = new PDO("mysql:host=$hostName;dbname=$databaseName", $username, $password);

$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

try {
$query = "SELECT ID, username, password FROM users";
$result = $conn->query($query);

 ?>
 <table border="1" cellpadding="10" cellspacing="0">
 <?php
 while($data = $result->fetch(PDO::FETCH_ASSOC)) {
   
   ?>
    <tr>
   <td><?php echo $data['ID']; ?> </td>
   <td><?php echo $data['username']; ?> </td>
   <td><?php echo $data['password']; ?> </td>
    </tr>
    <?php
  }
  ?>
</table>
  <?php
} catch(PDOException $err) {
  echo "Error: " . $err->getMessage();
}