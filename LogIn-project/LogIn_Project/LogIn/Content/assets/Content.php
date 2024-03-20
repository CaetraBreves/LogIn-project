<?php

session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Content</title>
</head>
<body>
    <h1>Content</h1>

    <?php echo "HELLO ". $_SESSION['username'] ?><br>

    <a href="FUNCTIONS\updateUser.php"><button>Atualizar a minha palavra passe.</button></a><br>
    <a href="FUNCTIONS\delete.php"><button>Apagar a minha conta.</button></a>
    <a href="logout.php"><button>Sair.</button></a>

    <?php echo '<h2> ' . $_SESSION['updMsg'] .'</h2>';?>
    
</body>
</html>