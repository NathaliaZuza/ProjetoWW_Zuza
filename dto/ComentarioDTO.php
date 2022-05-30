<?php

class ComentarioDTO {
    private $id;
    private $comentario;
    private $cliente_id;

    public function getId() {
        return $this->id;
    }
    public function setId( $id ) {
        $this->id = $id;
    }
    public function getComent() {
        return $this->comentario;
    }
    public function setComent($comentario) {
        $this->comentario = $comentario;
    }
    
    public function getClienteId() {
        return $this->cliente_id;
    }
    
    public function setClienteId( $cliente_id ) 
    {
        $this->cliente_id = $cliente_id;
    }
} 

?>
