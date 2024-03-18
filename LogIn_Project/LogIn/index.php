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
    <title>Log in!</title>
    <link rel="stylesheet" href="Style.css">
    
</head>
<body>
    <main><div id="">

          </div>
        <div id="mainContent">
            <h1>Advantages of Logging in.</h1>
            
                <h2>・ Free Patinhos</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique illum provident, veniam nobis minima voluptatibus corporis fugiat enim vel sequi mollitia alias eaque, asperiores neque deleniti nihil. Reprehenderit, fugit iusto.</p>
                <h2>・ Free Macaquins</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut cumque laboriosam, accusamus odit pariatur animi reiciendis quidem nobis eaque culpa vero porro unde fugiat veniam? Laboriosam eaque modi vel cupiditate.</p>
                <h2>・ Free MacBook</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores rerum vero eveniet aut repellendus fugiat deserunt qui inventore illo, beatae velit, assumenda temporibus sunt corporis neque nemo nulla deleniti quod!</p>
                <br>
            
            
                <button id="buttonMainContent1"></button>
                <button id="buttonMainContent2"></button>
                <button id="buttonMainContent3"></button>
            
        </div>
        <div id="logIn">
            <h1>Log In</h1>
            <form id="logInForm" action="Verif.php" method="post">
                <h2>Username</h2>
                <input type="text" name="name">
                <h2>Password</h2>
                <input type="password" name="pass"> <br>
                <p style="color: red; font-weight:700; font-size:20px;"><?php echo $logInFail; ?></p>
                    <button type="submit">Log In</button>
                </form>

                <div id="registerButton">
                    <h2>Don't have an account?</h2>
                    <a href="Register.php"><button id="regButton">Register Now!</button></a>
                </div>
               
            
        </div>
    </main>
</body>
</html>