<?php
session_start();
require 'config.php';
require_once 'src/dao/ContatoDaoMySql.php';

$contatoDao = new ContatoDaoMysql($pdo);
$lista = $contatoDao->FindAll();

if($_SESSION['papel'] != 'admin') {

    header("Location: login.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Document</title>
</head>
<body>
    <a href="sair.php">Sair</a>
    <h1>TABELA DE CONTATOS</h1>
    <a href="index.php">VISUALIZAR SUA LANDING PAGE</a>
    <table border="1" width="100%">
        <tr>
            <th>Cod Contato</th>
            <th>Nome</th>
            <th>Sobrenome</th>
            <th>Celular</th>
            <th>Email</th>
            <th>Descrição</th>
            <th>Fonte Lead</th>
            <th>Data de Criação</th>
            <th>AÇÕES</th>
        </tr>

        <?php foreach($lista as $contato): ?>
            <tr>
                
                <td><?= $contato->getId(); ?> </td>
                <td><?= $contato->getNome() ?> </td>
                <td><?= $contato->getSobrenome(); ?> </td>
                <td><?= $contato->getCelular(); ?> </td>
                <td><?= $contato->getEmail(); ?> </td>
                <td><?= $contato->getDescricao(); ?> </td>
                <td><?= $contato->getOrigem(); ?> </td>
                <td><?= $contato->getDataCriacao(); ?> </td>
                <td>
                    <a href="editar_contato.php?id=<?= $contato->getId(); ?> ">[ Editar ]</a>
                    <a href="excluir_contato.php?id=<?= $contato->getId(); ?> " onclick="return confirm('Tem certeza que deseja excluir esse contato?')">[ Excluir ]</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <script src="https://kit.fontawesome.com/468f44bb2c.js" crossorigin="anonymous"></script>
</body>
</html>

