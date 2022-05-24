<?php
 
 class enderecoDTO{

    private $id;
    private $cep;
    private $endereco;
    private $numero_casa;
    private $complemento;
    private $cidade;
    private $uf;
    private $cliente_id;

    
    public function getId()
    {
        return $this->id;
    }

    
    public function setId($id)
    {
        $this->id = $id;

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

    public function getNumero_casa()
    {
        return $this->numero_casa;
    }

    public function setNumero_casa($numero_casa)
    {
        $this->numero_casa = $numero_casa;

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


?>