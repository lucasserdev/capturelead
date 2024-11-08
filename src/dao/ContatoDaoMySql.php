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

    public function FindAll() {
        $array = [];

        $sql = $this->pdo->query("SELECT * FROM contato");
        if($sql->rowCount() > 0) {
            $data = $sql->fetchAll();
            foreach($data as $item) {
                $c = new Contato();
                $c->setId($item['id']);
                $c->setNome($item['nome']);
                $c->setSobrenome($item['sobrenome']);
                $c->setCelular($item['celular']);
                $c->setEmail($item['email']);
                $c->setDescricao($item['descricao']);
                $c->setOrigem($item['origem']);
                $c->setDataCriacao($item['data_criacao']);

                $array[] = $c;
            }
        }

        return $array;
    }

    public function FindById($id) {
        $sql = $this->pdo->prepare("SELECT * FROM contato WHERE id = ?");
        $sql->execute([$id]);

        if($sql->rowCount() > 0) {
            $data = $sql->fetch();
            $c = new Contato();
            $c->setId($data['id']);
            $c->setNome($data['nome']);
            $c->setSobrenome($data['sobrenome']);
            $c->setCelular($data['celular']);
            $c->setEmail($data['email']);
            $c->setDescricao($data['descricao']);
            $c->setOrigem($data['origem']);
            $c->setDataCriacao($data['data_criacao']);

            return $c;
        }
    }

    public function update(Contato $c) {
        $sql = $this->pdo->prepare("UPDATE contato SET nome = ?, sobrenome = ?, celular = ?, email = ?, descricao = ?, origem = ? WHERE id = ?");
        $sql->execute([$c->getNome(), $c->getSobrenome(), $c->getCelular(), $c->getEmail(), $c->getDescricao(), $c->getOrigem(), $c->getId()]);
    }

    public function delete($id) {
        $sql = $this->pdo->prepare("DELETE FROM contato WHERE id = ?");
        $sql->execute([$id]);
    }
}