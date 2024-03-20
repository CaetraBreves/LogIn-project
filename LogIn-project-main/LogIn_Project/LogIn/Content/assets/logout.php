<?php
	// Iniciar sessão
	session_start();

	// remove todas as varáveis de sessão
	session_unset();

	// Destroi a sessão
	session_destroy();

    header('Location: ../../LogIn.php');
?>

</body>
</html>