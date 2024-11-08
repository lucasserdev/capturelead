<?php 
session_start();
require 'config.php';
require_once 'src/dao/ContatoDaoMySql.php';

$contatoDao = new ContatoDaoMysql($pdo);

$id = filter_input(INPUT_POST, 'id');
$nome = filter_input(INPUT_POST, 'nome');
$sobrenome = filter_input(INPUT_POST, 'sobrenome');
$email = filter_input(INPUT_POST, 'email');
$celular = filter_input(INPUT_POST, 'celular');
$descricao = filter_input(INPUT_POST, 'descricao');
$origem = filter_input(INPUT_POST, 'origem');

if($id && $nome && $sobrenome && $email && $celular && $descricao && $origem) {
    $c = new Contato();
    $c->setId($id);
    $c->setNome($nome);
    $c->setSobrenome($sobrenome);
    $c->setEmail($email);
    $c->setCelular($celular);
    $c->setDescricao($descricao);
    $c->setOrigem($origem);

    $contatoDao->update($c);

    header("Location: listar_contatos.php");
    exit;
}