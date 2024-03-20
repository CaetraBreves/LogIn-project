<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User</title>
</head>
<body>
     <form action="update.php" method="post">
        <h2>Insira o ID do utilizador que deseja alterar os dados</h2>
        <?php include 'showTable.php;' ?> 
        <input type="number" name="updID">
        <button type="submit">Pesquisar</button>
     </form>
</body>
</html>