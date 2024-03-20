<?php

session_start();

if($_SESSION['username'] === 'admin'){


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page!</title>
</head>
<body>
    <h1>Hello Mr.<?php echo $_SESSION['username'];?></h1>
    <p>You're currently in the administration page.</p>


    <?php include 'FUNCTIONS/showTable.php';?>
    <br>
    <a href="FUNCTIONS/updateUser.php"><button>Atualize alguém da tabela</button></a><br>
    <a href="FUNCTIONS/deleteMenu.php"><button>Remova alguém da tabela</button></a><br>
    <a href="logout.php"><button>Sair.</button></a>

    
</body>
</html>

<?php
}else{
    echo "Você não têm acesso a esta página";
}
?>