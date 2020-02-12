<?php
class Produto {
    public $id, $produto, $preco, $descricao, $categoria_id, $usado;
             
    function    __construct( $id = '', $produto, $preco, $descricao,  $categoria_id, $usado) {
        $this->id = $id;
        $this->produto = $produto;
        $this->preco = $preco;
        $this->descricao = $descricao;
        $this->categoria_id = $categoria_id;
        $this->usado = $usado;
    }
}
