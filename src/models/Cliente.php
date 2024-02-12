<?php

class Cliente
{    
    public function __construct(
        private $id,
        private $nome,
        private $cpf,
        private $endereco,
        private $telefone,
        private $email
    )
    {}

    public function getId()
    {
        return $this->id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getCpf()
    {
        return $this->cpf;
    }

    public function getEndereco()
    {
        return $this->endereco;
    }

    public function getTelefone()
    {
        return $this->telefone;
    }

    public function getEmail()
    {
        return $this->email;
    }
}
