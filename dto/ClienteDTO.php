<?php

class ClienteDTO {
    private $id;
    private $nome;
    private $cpf;   
    private $telefone; 
    private $email; 
    private $senha;
    private $perfil;
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
 
    public function getPerfil()
    {
        return $this->perfil;
    }
    
    public function setPerfil($perfil)
    {
        $this->perfil = $perfil;

        return $this;
    }
}
