<?php
class Produto {
    private $data = array();
    public $quantidade;

    public function __construct($nome = null, $quantidade = 0) {
        $this->data['produto'] = $nome;
        $this->quantidade = $quantidade;
    }

    public function __get($prop){
        return $this->data[$prop];
    }

    public function __set($prop, $value){
        $this->data[$prop] = $value;
    }

    public function getData(){
        return $this->data;
    }

    public function adicionarEstoque($quantidade) {
        $this->quantidade += $quantidade;
    }

    public function removerEstoque($quantidade) {
        if ($quantidade > $this->quantidade) {
            throw new Exception("Estoque insuficiente");
        }
        $this->quantidade -= $quantidade;
    }
}
