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

    <?php echo "HELLO ". $_SESSION['username'] ?>
    
</body>
</html>