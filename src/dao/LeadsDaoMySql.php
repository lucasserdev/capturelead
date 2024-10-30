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

                $array[] = $l;
            }
        }

        return $array;
    }

    public function FindById($id)
    {
        
    }

    public function FindByEmail($email)
    {
        
    }

    public function update(Leads $l)
    {
        
    }

    public function delete($id)
    {
        
    }
}