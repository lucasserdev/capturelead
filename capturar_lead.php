<?php 
session_start();
require 'config.php';
require_once 'src/dao/LeadsDaoMySql.php';

$leadsDao = new LeadsDaoMysql($pdo);

$nome = filter_input(INPUT_POST, 'nome');
$sobrenome = filter_input(INPUT_POST, 'sobrenome');
$email = filter_input(INPUT_POST, 'email');
$celular = filter_input(INPUT_POST, 'celular');
$descricao = filter_input(INPUT_POST, 'descricao');
$origem = filter_input(INPUT_POST, 'origem');

$existe = false;

if($nome && $sobrenome && $email && $celular && $descricao && $origem) {

    $existe = $leadsDao->FindByEmail($email);

    if($existe === false) {

        $_SESSION['email'] = 'Esse email já está cadastrado';
        header("Location: index.php");
        exit;
    } else {

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

}


