<?php

require 'src/Models/Leads.php';

class LeadsDaoMysql implements LeadsDao {

    private $pdo;

    public function __construct(PDO $driver) {
        $this->pdo = $driver;
    }

    public function add(Leads $l) {
        $sql = $this->pdo->prepare("INSERT INTO leads (nome, sobrenome, email, celular, descricao, origem) VALUES (?, ?, ?, ?, ?, ?)");
        $sql->execute([$l->getNome(), $l->getSobrenome(), $l->getEmail(), $l->getCelular(), $l->getDescricao(), $l->getOrigem()]);
    }

    public function FindAll() {
        $array = [];

        $sql = $this->pdo->query("SELECT * FROM leads");
        if($sql->rowCount() > 0) {
            $data = $sql->fetchAll();
            foreach($data as $item) {
                $l = new Leads();
                $l->setId($item['id']);
                $l->setNome($item['nome']);
                $l->setSobrenome($item['sobrenome']);
                $l->setEmail($item['email']);
                $l->setCelular($item['celular']);
                $l->setDescricao($item['descricao']);
                $l->setOrigem($item['origem']);
                $l->setDataCriacao($item['data_criacao']);
                $l->setStatusContato($item['status_contato']);

                $array[] = $l;
            }
        }

        return $array;
    }

    public function FindById($id) {
        $sql = $this->pdo->prepare("SELECT * FROM leads WHERE id = ?");
        $sql->execute([$id]);

        if($sql->rowCount() > 0) {
            $data = $sql->fetch();
            $l = new Leads();
            $l->setId($data['id']);
            $l->setNome($data['nome']);
            $l->setSobrenome($data['sobrenome']);
            $l->setEmail($data['email']);
            $l->setCelular($data['celular']);
            $l->setDescricao($data['descricao']);
            $l->setOrigem($data['origem']);
            $l->setDataCriacao($data['data_criacao']);
            $l->setStatusContato($data['status_contato']);

            return $l;   
        } else {

            header("Location: listar_leads.php");
            exit;
        }
    }

    public function FindByEmail($email) {
        $sql = $this->pdo->prepare("SELECT * FROM leads WHERE email = ?");
        $sql->execute([$email]);

        if($sql->rowCount() > 0) {

            return false;
        } else {

            $data = $sql->fetch();
            $l = new Leads();
            $l->getId($data['id']);
            $l->getNome($data['nome']);
            $l->getSobrenome($data['sobrenome']);
            $l->getEmail($data['email']);
            $l->getCelular($data['celular']);
            $l->getDescricao($data['descricao']);
            $l->getOrigem($data['origem']);
            $l->getDataCriacao($data['data_criacao']);

            return $l;   
        }
    }

    public function update(Leads $l) {
        $sql = $this->pdo->prepare("UPDATE leads SET nome = ?, sobrenome = ?, email = ?, celular = ?, descricao = ?, origem = ? WHERE id = ? ");
        $sql->execute([$l->getNome(), $l->getSobrenome(), $l->getEmail(), $l->getCelular(), $l->getDescricao(), $l->getOrigem(), $l->getId()]);
    }

    public function delete($id) {
        $sql = $this->pdo->prepare("DELETE FROM leads WHERE id = ? ");
        $sql->execute([$id]);
    }

    public function check($id) {
        $sql = $this->pdo->prepare("UPDATE leads SET status_contato = 'contactado' WHERE id = ?");
        $sql->execute([$id]);
    }

    public function disCheck($id) {
        $sql = $this->pdo->prepare("UPDATE leads SET status_contato = 'pendente' WHERE id = ?");
        $sql->execute([$id]);
    }
}