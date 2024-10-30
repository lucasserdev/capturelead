<?php 
require 'config.php';
require_once 'src/dao/LeadsDaoMySql.php';

$leadsDao = new LeadsDaoMysql($pdo);

$nome = filter_input(INPUT_POST, 'nome');
$sobrenome = filter_input(INPUT_POST, 'sobrenome');
$email = filter_input(INPUT_POST, 'email');
$celular = filter_input(INPUT_POST, 'celular');
$descricao = filter_input(INPUT_POST, 'descricao');
$origem = filter_input(INPUT_POST, 'origem');

if($nome && $sobrenome && $email && $celular && $descricao && $origem) {

    $novoLead = new Leads();
    $novoLead->setNome($nome);
    $novoLead->setSobrenome($sobrenome);
    $novoLead->setEmail($email);
    $novoLead->setCelular($celular);
    $novoLead->setDescricao($descricao);
    $novoLead->setOrigem($origem);

    $leadsDao->add($novoLead);

    header("Location: obrigado.php");
    exit;

}


