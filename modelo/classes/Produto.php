<?php
class Produto
{
    public $id, $nome, $preco, $descricao, $categoria_id, $usado;
             
    function    __construct( $id = '', $nome, $preco, $descricao,  $categoria_id, $usado)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->preco = $preco;
        $this->descricao = $descricao;
        $this->categoria_id = $categoria_id;
        $this->usado = $usado;
    }

    function nome()
    {
        return $this->nome;
    }

    function preco()
    {
        return $this->preco;
    }
}
