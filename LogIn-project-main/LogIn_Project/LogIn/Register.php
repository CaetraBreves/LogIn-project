<?php
    session_start();

    $_SESSION["username"];
    $_SESSION["password"];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Now!</title>
    <link rel="stylesheet" href="Register.css">
</head>
<body>
    <main>
        <div id="registerBox">
            <h1>Sign Up!</h1>

            <div id="formBox">
                <form action="../LogIn/Insert.php" method="post">
                    <h2>Username:</h2>
                    <input type="text" name="regName">
                    <h2>Password:</h2>
                    <input type="password" name="regPass"><br>
                    <p>Already have an account? <a href="LogIn.php">Click here.</a></p>
                    <button id="signUp" type="submit">Sign up!</button>
                </form>
                <?php echo $_SESSION['regMsg'];?>
            </div>
            <div id="circles">
                <button class="buttons"></button>
                <button class="buttons"></button>
                <button class="buttons"></button>
            </div>
        </div>
    </main>
</body>
</html>