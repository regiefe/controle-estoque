<?php

use PHPUnit\Framework\TestCase;
require_once __DIR__ . '/../modelo/classes/Produto.php';

class ProdutoTest extends TestCase {
    public function testAdicionarEstoque() {
        $produto = new Produto("Teclado", 10);
        $produto->adicionarEstoque(5);
        $this->assertEquals(15, $produto->quantidade);
    }

    public function testRemoverEstoqueComSucesso() {
        $produto = new Produto("Mouse", 20);
        $produto->removerEstoque(5);
        $this->assertEquals(15, $produto->quantidade);
    }

    public function testRemoverEstoqueInsuficiente() {
        $this->expectException(Exception::class);
        $produto = new Produto("Monitor", 2);
        $produto->removerEstoque(5);
    }
}

