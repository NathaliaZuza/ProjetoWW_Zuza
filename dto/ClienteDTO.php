<?php

class ClienteDTO {
    private $id;
    private $nome;
    private $cpf;    
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
}


    // private $telefone;
    // private $email;
    // private $senha;
    // private $cep;
    // private $estado;
    // private $cidade;
    // private $endereco;
    // private $numero_casa;

    
    // public function getTelefone() {
    //     return $this->telefone;
    // }
    // public function setTelefone( $telefone ) {
    //     $this->telefone = $telefone;
    // }
    // public function getCep() {
    //     return $this->cep;
    // }
    // public function setCep($cep) {
    //     $this->cep = $cep;
    //     return $this;
    // }
    // public function getEstado() {
    //     return $this->estado;
    // }
    // public function setEstado($estado) {
    //     $this->estado = $estado;
    //     return $this;
    // }
    // public function getCidade() {
    //     return $this->cidade;
    // }
    // public function setCidade($cidade) {
    //     $this->cidade = $cidade;
    //     return $this;
    // }
    // public function getEndereco() {
    //     return $this->endereco;
    // }
    // public function setEndereco($endereco) {
    //     $this->endereco = $endereco;
    //     return $this;
    // }
    // public function getNumero_casa() {
    //     return $this->numero_casa;
    // }
    // public function setNumero_casa($numero_casa) {
    //     $this->numero_casa = $numero_casa;
    //     return $this;
    // }

