<?php
session_start();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Login</title>
    <link rel="stylesheet" href="assets/css/login.css">
</head>
<body>

    <div class="container_form">
        <h3>Login</h3>
        <form action="login_action.php" method="post">
            <label for="">
                Usuario: <br>
                <input type="text" name="usuario" id="">
            </label> <br> <br>
            <label for="">
                Senha: <br>
                <input type="password" name="pass" id="">
            </label> <br> <br>
            <input type="submit" value="Entrar">
        </form>
    </div>
</body>
</html>
