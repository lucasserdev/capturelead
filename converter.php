<?php
session_start();
require 'config.php';
require_once 'src/dao/LeadsDaoMySql.php';
require_once 'src/dao/ContatoDaoMySql.php';

$leadsDao = new LeadsDaoMysql($pdo);
$contatoDao = new ContatoDaoMySql($pdo);

$id = filter_input(INPUT_GET, 'id');

$newContato = $leadsDao->FindById($id);

if($newContato) {
    $nome = $newContato->getId();
    $sobrenome = $newContato->getNome();
    $celular = $newContato->getCelular();
    $email = $newContato->getEmail();
    $descricao = $newContato->getDescricao();
    $origem = $newContato->getOrigem();

    if($nome && $sobrenome && $celular && $email && $descricao && $origem) {
        $c = new Contato();
        $c->setNome($nome);
        $c->setSobrenome($sobrenome);
        $c->setCelular($celular);
        $c->setEmail($email);
        $c->setDescricao($descricao);
        $c->setOrigem($origem);

        $contatoDao->add($c);
        $leadsDao->delete($id);

        header("Location: listar_contatos.php");
        exit;
    }
    
}



echo '<pre>';
print_r($newContato);