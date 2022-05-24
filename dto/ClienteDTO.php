<?php

class ClienteDTO {
    private $id;
    private $nome;
    private $cpf;   
    private $telefone;
    private $cep;
    private $endereco;
    private $num_casa;
    private $complemento;
    private $cidade;
    private $uf;
    private $usuario_id;

    public function getId() {
        return $this->id;
    }
    public function setId( $id ) {
        $this->id = $id;
    }
    public function getNome() {
        return $this->nome;
    }
    public function setNome( $nome ) {
        $this->nome = $nome;
    }
    public function getCpf() {
        return $this->cpf;
    }
    public function setCpf( $cpf ) {
        $this->cpf = $cpf;
    }
    public function getEmail() {
        return $this->email;
    }
    public function setEmail($email) {
        $this->email = $email;
        return $this;
    }
    public function getSenha(){
        return $this->senha;
    }
    public function setSenha($senha) {
        $this->senha = $senha;
        return $this;
    }
    public function getUsuario_id() {
        return $this->usuario_id;
    }
    public function setUsuario_id( $usuario_id ) {
        $this->usuario_id = $usuario_id;
    }
    public function getTelefone() {
        return $this->telefone;
    }
    public function setTelefone($telefone) {
        $this->telefone = $telefone;
        return $this;
}

    public function getCep()
    {
        return $this->cep;
    }

    public function setCep($cep)
    {
        $this->cep = $cep;

        return $this;
    }

    public function getEndereco()
    {
        return $this->endereco;
    }

    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;

        return $this;
    }
 
    public function getNum_casa()
    {
        return $this->num_casa;
    }

    public function setNum_casa($num_casa)
    {
        $this->num_casa = $num_casa;

        return $this;
    }

    public function getComplemento()
    {
        return $this->complemento;
    }

    public function setComplemento($complemento)
    {
        $this->complemento = $complemento;

        return $this;
    }

    public function getCidade()
    {
        return $this->cidade;
    }

    public function setCidade($cidade)
    {
        $this->cidade = $cidade;

        return $this;
    }

    public function getUf()
    {
        return $this->uf;
    }

    public function setUf($uf)
    {
        $this->uf = $uf;

        return $this;
    }
}
