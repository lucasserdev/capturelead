<?php 
session_start();
require 'config.php';
require_once 'src/dao/LeadsDaoMySql.php';

$leadsDao = new LeadsDaoMysql($pdo);

$id = filter_input(INPUT_POST, 'id');
$nome = filter_input(INPUT_POST, 'nome');
$sobrenome = filter_input(INPUT_POST, 'sobrenome');
$email = filter_input(INPUT_POST, 'email');
$celular = filter_input(INPUT_POST, 'celular');
$descricao = filter_input(INPUT_POST, 'descricao');
$origem = filter_input(INPUT_POST, 'origem');

if($id && $nome && $sobrenome && $email && $celular && $descricao && $origem) {
    $l = new Leads();
    $l->setId($id);
    $l->setNome($nome);
    $l->setSobrenome($sobrenome);
    $l->setEmail($email);
    $l->setCelular($celular);
    $l->setDescricao($descricao);
    $l->setOrigem($origem);

    $leadsDao->update($l);

    header("Location: listar_leads.php");
    exit;
}