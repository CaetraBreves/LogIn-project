<?php

session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Menu</title>
</head>
<body>

<?php
include "showTable.php";

?>

    <form action="delete.php" method="post">
        <h1>Insira o ID do utilizador que deseja Apagar.</h1><br>
        <input type="number" name="delID"><br>
        <br>
        <button type="submit">APAGAR</button>
    </form>
    <a href="../Admin.php"><button>sair</button></a>
    
    <?php echo "<h2> ".  $_SESSION['delMsg']  ."</h2>";?>
</body>
</html>