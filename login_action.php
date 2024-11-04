<?php
session_start();
require 'config.php';
require 'src/dao/UsuarioDaoMySql.php';

$usuarioDao = new UsuarioDaoMySql($pdo);

$usuario = filter_input(INPUT_POST, 'usuario');
$senha = filter_input(INPUT_POST, 'pass');

$userNome = false;
$userSenha = false;

if($usuario && $senha) {
    
    $userNome = $usuarioDao->FindByNome($usuario);
    $userSenha = $usuarioDao->FindBySenha($senha);

    if($userNome != false && $userSenha != false) {
        
        $papel = $userNome->getPapel();

        $_SESSION['papel'] = $papel;

        header("Location: listar_leads.php");
        exit;
    } else {

        header("Location: login.php");
        exit;
    }
}

echo '<pre>';
print_r($userNome);
echo $_SESSION['papel'];
