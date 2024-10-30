<?php

class Leads {

    private $id;
    private $nome;
    private $sobrenome;
    private $celular;
    private $email;
    private $descricao;
    private $origem;
    private $dataCriacao;

    public function getId() {
        return $this->id;
    }
    public function setId($id) {
        $this->id = $id;
    }

    public function getNome() {
        return $this->nome;
    }
    public function setNome($nome) {
        $this->nome = ucwords(trim($nome));
    }

    public function getSobrenome() {
        return $this->sobrenome;
    }
    public function setSobrenome($sobrenome) {
        $this->sobrenome = ucwords(trim($sobrenome));
    }

    public function getEmail() {
        return $this->email;
    }
    public function setEmail($email) {
        $this->email = trim($email);
    }

    public function getCelular() {
        return $this->celular;
    }
    public function setCelular($celular) {
        $this->celular = $celular;
    }

    public function getDescricao() {
        return $this->descricao;
    }
    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    public function getOrigem() {
        return $this->origem;
    }

    public function setOrigem($origem) {
        $this->origem = $origem;
    }

    public function getDataCriacao() {
        return $this->dataCriacao;
    }

    public function setDataCriacao($dataCriacao) {
        $this->dataCriacao = $dataCriacao;
    }
}

interface LeadsDao {

    public function add(Leads $l);
    public function FindAll();
    public function FindById($id);
    public function FindByEmail($email);
    public function update(Leads $l);
    public function delete($id);
}