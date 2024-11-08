<?php
session_start();
require 'config.php';
require 'src/dao/ContatoDaoMySql.php';

$contatoDao = new ContatoDaoMySql($pdo);
$id = filter_input(INPUT_GET, 'id');

$contatoDao->delete($id);

header("Location: listar_contatos.php");
exit;
