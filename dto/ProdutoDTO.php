<?php

class ProdutoDTO {
    private $id;
    private $nome;
    private $descricao;
    private $cores;
    private $material;
    private $tamanho;
    private $prazo;
    private $preco;
    private $qtd;
    private $foto;  
    private $fotoBanner;
    private $categoriaId;

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
    public function getDesc() {
        return $this->descricao;
    }
    public function setDesc( $descricao ) {
        $this->descricao = $descricao;
    }
    public function getPreco() {
        return $this->preco;
    }
    public function setPreco( $preco ) {
        $this->preco = $preco;
    }
    public function getCores() {
        return $this->cores;
    }
    public function setCores( $cores ) {
        $this->cores = $cores;
    }
    public function getMaterial() {
        return $this->material;
    }
    public function setMaterial( $material ) {
        $this->material = $material;
    }
    public function getTamanho() {
        return $this->tamanho;
    }
    public function setTamanho( $tamanho ) {
        $this->tamanho = $tamanho;
    }
    public function getPrazo() {
        return $this->prazo;
    }
    public function setPrazo( $prazo ) {
        $this->prazo = $prazo;
    }
    public function getQtd() {
        return $this->qtd;
    }
    public function setQtd( $qtd ) {
        $this->qtd = $qtd;
    }
    public function getFoto() {
        return $this->foto;
    }
    public function setFoto( $foto ) {
        $this->foto = $foto;
    }
    public function getFotoBanner() {
        return $this->fotoBanner;
    }
    public function setFotoBanner( $fotoBanner ) {
        $this->fotoBanner = $fotoBanner;
    }
    public function getCategoriaId() {
        return $this->categoriaId;
    }

    public function setCategoriaId( $categoriaId ) {
        $this->categoriaId = $categoriaId;
    }
}
?>
