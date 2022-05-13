<?php
class Upload {
    private $nome;

    public function __construct( $arquivo ) {
        $this->nome = uniqid() . '.' . $this->getExtensao( $arquivo );
    }               

    /**
     * retorna a extensao da imagem
     *
     * @param array $arquivo
     * @return string
     */
    private function getExtensao( $arquivo ) {
        $extensao = pathinfo( $arquivo['name'], PATHINFO_EXTENSION );
        $extensao = strtolower( $extensao );
        return $extensao;
    }

    /**
     * extensoes permitidas
     *
     * @param string $extensao
     * @return boolean
     */
    private function ehImagem( $extensao ) {
        $extensoes = array( 'gif', 'jpeg', 'jpg', 'png' ); //
        if ( in_array( $extensao, $extensoes ) ) {
            return true;
        }
    }

    public function salvar( $arquivo, $pasta ) {

        if ( isset( $arquivo ) && $arquivo["error"] == 0 ) {
            $extensao = $this->getExtensao( $arquivo );

            $destino = $pasta . $this->nome;

            if ( $arquivo['size'] > ( 30 * ( 1024 * 1024 ) ) ) {
                throw new RuntimeException( 'O tamanho do arquivo deve ser no máximo 30 MB.' );
            }

            if ( $this->ehImagem( $extensao ) ) {
                if ( move_uploaded_file( $arquivo['tmp_name'], $destino ) ) {
                    return true;
                } else {
                    throw new RuntimeException( 'Falha ao mover o arquivo enviado. ' . $this->arquivo['error'] );
                }
            } else {
                throw new RuntimeException( 'Não é uma extensão permitida.' );
            }

        }
    }

    public function getNome() {
        return $this->nome;
    }

}