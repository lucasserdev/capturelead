<?php
session_start();
require 'config.php';
require_once 'src/dao/LeadsDaoMySql.php';

$leadsDao = new LeadsDaoMysql($pdo);
$lista = $leadsDao->FindAll();

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
    <h1>TABELA DE LEADS</h1>
    <a href="index.php">VISUALIZAR SUA LANDING PAGE</a>
    <table border="1" width="100%">
        <tr>
            <th>Status Lead</th>
            <th>Cod Lead</th>
            <th>Nome</th>
            <th>Sobrenome</th>
            <th>Celular</th>
            <th>Email</th>
            <th>Descrição</th>
            <th>Fonte Lead</th>
            <th>Data de Criação</th>
            <th>AÇÕES</th>
        </tr>

        <?php foreach($lista as $lead): ?>
            <tr>
                <td>
                    <?php if($lead->getStatusContato() === 'pendente'): ?>
                        <a href="check.php?id=<?= $lead->getId(); ?>" style="color: #333;" onclick="return confirm('Tem certeza que já entrou em contato com <?= $lead->getNome(); ?>')"><i class="fa-solid fa-square-check"></i></a>
                    <?php else: ?>
                        <a href="discheck.php?id=<?= $lead->getId(); ?>" style="color: green;" onclick="return confirm('Tem certeza que deseja deixar o lead com status pendente?')"><i class="fa-solid fa-square-check"></i></a>
                    <?php endif; ?>
                </td>
                <td><?= $lead->getId(); ?> </td>
                <td><?= $lead->getNome() ?> </td>
                <td><?= $lead->getSobrenome(); ?> </td>
                <td><?= $lead->getCelular(); ?> </td>
                <td><?= $lead->getEmail(); ?> </td>
                <td><?= $lead->getDescricao(); ?> </td>
                <td><?= $lead->getOrigem(); ?> </td>
                <td><?= $lead->getDataCriacao(); ?> </td>
                <td>
                    <a href="editar.php?id=<?= $lead->getId(); ?> ">[ Editar ]</a>
                    <a href="excluir.php?id=<?= $lead->getId(); ?> " onclick="return confirm('Tem certeza que deseja excluir esse lead?')">[ Excluir ]</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <script src="https://kit.fontawesome.com/468f44bb2c.js" crossorigin="anonymous"></script>
</body>
</html>

