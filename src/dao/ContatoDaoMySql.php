<?php

require 'src/Models/Contato.php';

class ContatoDaoMySql implements ContatoDao {

    private $pdo;

    public function __construct(PDO $driver) {
        $this->pdo = $driver;
    }

    public function add(Contato $c) {
        $sql = $this->pdo->prepare("INSERT INTO contato (nome, sobrenome, celular, email, descricao, origem) VALUES (?, ?, ?, ?, ?, ?)");
        $sql->execute([$c->getNome(), $c->getSobrenome(), $c->getCelular(), $c->getEmail(), $c->getDescricao(), $c->getOrigem()]);
    }

    public function FindAll()
    {
        
    }

    public function FindById($id)
    {
        
    }

    public function update(Contato $c)
    {
        
    }

    public function delete($id)
    {
        
    }
}