<?php
session_start();
require 'config.php';
require_once 'src/dao/LeadsDaoMySql.php';

$leadsDao = new LeadsDaoMysql($pdo);
$lista = $leadsDao->FindAll();

?>

<table border="1" width="100%">
    <tr>
        <th>Cod Lead </th>
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
                <a href="excluir.php?id=<?= $lead->getId(); ?> ">[ Excluir ]</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>