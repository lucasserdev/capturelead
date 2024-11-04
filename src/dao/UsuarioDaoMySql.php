<?php

require 'config.php';
require 'src/Models/Usuario.php';

class UsuarioDaoMySql {

    private $pdo;

    public function __construct(PDO $driver) {
        $this->pdo = $driver;
    }

    public function FindByNome($nome) {

        $sql = $this->pdo->prepare("SELECT * FROM usuario WHERE nome = ?");
        $sql->execute([$nome]);

        if($sql->rowCount() > 0) {
            $data = $sql->fetch();
            $u = new Usuario();
            $u->setId($data['id']);
            $u->setNome($data['nome']);
            $u->setEmail($data['email']);
            $u->setSenha($data['senha']);
            $u->setPapel($data['papel']);
            $u->setDataCriacao($data['data_criacao']);

            return $u;
        } else {

            return false;
        }
    }

    public function FindBySenha($senha) {

        $sql = $this->pdo->prepare("SELECT * FROM usuario WHERE senha = ?");
        $sql->execute([$senha]);

        if($sql->rowCount() > 0) {
            $data = $sql->fetch();
            $u = new Usuario();
            $u->setId($data['id']);
            $u->setNome($data['nome']);
            $u->setEmail($data['email']);
            $u->setSenha($data['senha']);
            $u->setPapel($data['papel']);
            $u->setDataCriacao($data['data_criacao']);

            return $u;
        } else {

            return false;
        }
    }

    
}