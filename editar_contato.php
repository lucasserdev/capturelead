<?php 
session_start();
require 'config.php';
require_once 'src/dao/ContatoDaoMysql.php';

$contatoDao = new ContatoDaoMysql($pdo);
$id = filter_input(INPUT_GET, 'id');
$contato = $contatoDao->FindById($id);


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Editar Lead</title>
</head>
<body>
    <h1>Editar Lead</h1>

    <form action="editar_contato_action.php" method="post">
        <input type="hidden" name="id" value="<?= $contato->getId(); ?>">
        <label for="">
            Nome: <br>
            <input type="text" name="nome" id="" required value="<?= $contato->getNome(); ?>">
        </label> <br> <br>

        <label for="">
            Sobrenome: <br>
            <input type="text" name="sobrenome" id="" required value="<?= $contato->getSobrenome(); ?>">
        </label> <br> <br>

        <label for="">
            Email: <br>
            <input type="text" name="email" id="" required value="<?= $contato->getEmail(); ?>">
        </label> <br> <br>

        <label for="">
            Whatsapp: <br>
            <input type="text" name="celular" id="" required value="<?= $contato->getCelular(); ?>">
        </label> <br> <br>

        <label for="">
            Descrição: <br>
            <textarea name="descricao" id="">
                <?= $contato->getDescricao(); ?>
            </textarea>
        </label> <br> <br>

        <input type="hidden" name="origem" value="<?= $contato->getOrigem(); ?>">

        <input type="submit" value="Enviar">

    </form>

    <script defer>
        const inputSubmit = document.querySelector('input[type="submit"');
        inputSubmit.addEventListener('click', () => {
            const descricao = document.querySelector('textarea');
            if(descricao.value.trim() === '') {
                descricao.value = 'Lead não deixou nenhuma descrição...';
            }
        })
    </script>
</body>
</html>