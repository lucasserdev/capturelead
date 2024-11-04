<?php
session_start();

?>
<h1>Pagina de login</h1>
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