<?php

session_start();


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User</title>
</head>
<body>
    <?php

    if($_SESSION["username"] === 'admin' ){

    
    include 'showTable.php';

    ?>
     <form action="update.php" method="post">
        <h2>Insira o ID do utilizador que deseja alterar os dados</h2>
        <?php include 'showTable.php;' ?> 
        <input type="number" name="updID"><br>
        <hr>

        <h2>Insira um novo nome</h2><br>
        <input type="text" name="nomeNovo"><br>

        <h2>Insira uma nova passe</h2><br>
        <input type="password" name="passNova">

        <button type="submit">Pesquisar</button>
        

        <?php echo '<h2>'. $_SESSION['updMsg'].'</h2>'?>
     </form>

     <a href="../Admin.php"><button>Voltar</button></a>

     <?php
    }else{
    ?>
    <form action="update.php" method="post">
        <h2>Insira a sua palavra pass Nova:</h2><br>
        <input type="password" name="passNova"><br>
        <h2>Insira a sua nova palavra pass outra vez:</h2><br>
        <input type="password" name="passNovaConfirm"><br>
        <button type="submit">Atualizar</button>
    </form>

    <a href="../Content.php"><button>Voltar</button></a>
    <?php
    }
    ?>
</body>
</html>