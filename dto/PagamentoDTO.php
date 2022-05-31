<?php

class PagamentoDTO {

    private $id;
    private $n_cartao;
    private $pedido_id;
    private $nome_cartao;
    private $validade;
    private $verificacao;
    private $cpf;
    private $data_nasc;
    private $parcelamento;
    private $cliente_id;

    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
    }
    public function getN_cartao(){
        return $this->n_cartao;
    }
    public function setN_cartao($n_cartao){
        $this->n_cartao = $n_cartao;
    }
    public function getNome_cartao(){
        return $this->nome_cartao;
    }
    public function setNome_cartao($nome_cartao){
        $this->nome_cartao = $nome_cartao;
    }
    public function getValidade(){
        return $this->validade;
    }
    public function setValidade($validade){
        $this->validade = $validade;
    }
    public function getVerificacao(){
        return $this->verificacao;
    }
    public function setVerificacao($verificacao){
        $this->verificacao = $verificacao;
    }
    public function getCpf(){
        return $this->cpf;
    }
    public function setCpf($cpf){
        $this->cpf = $cpf;
    }
    public function getData_nasc(){
        return $this->data_nasc;
    }
    public function setData_nasc($data_nasc){
        $this->data_nasc = $data_nasc;
    }
    public function getParcelamento(){
        return $this->parcelamento;
    }
    public function setParcelamento($parcelamento){
        $this->parcelamento = $parcelamento;
    }
    public function getPedido_id(){
        return $this->pedido_id;
    }
    public function setPedido_id($pedido_id){
        $this->pedido_id = $pedido_id;
    }

    public function getCliente_id()
    {
        return $this->cliente_id;
    }

    public function setCliente_id($cliente_id)
    {
        $this->cliente_id = $cliente_id;

        return $this;
    }
}