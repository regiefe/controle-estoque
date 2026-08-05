<?php
require_once "classes/Produto.php";

class BancoProduto
{
    private $con;

    function __construct($con)
    {
        $this->con = $con;
    }

    public function insereProduto($produto)
    {
        $sql = "INSERT INTO produto(produto, preco, descricao, categoria_id, usado)
                VALUES(:produto, :preco, :descricao, :categoria_id, :usado)";
        $stmt = $this->con->prepare($sql);
        $stmt->bindValue(':produto', $produto['produto'], PDO::PARAM_STR);
        $stmt->bindValue(':preco', $produto['preco']);
        $stmt->bindValue(':descricao', $produto['descricao'], PDO::PARAM_STR);
        $stmt->bindValue(':categoria_id', $produto['categoria_id'], PDO::PARAM_INT);
        $stmt->bindValue(':usado', $produto['usado'], PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function listaProdutos()
    {
        $sql = "SELECT p.*, c.nome AS categoria_nome FROM produto AS p
                JOIN categoria AS c ON c.id = p.categoria_id";
        return $this->con->query($sql)->fetchAll();
    }

    public function alteraProduto($produto)
    {
        $sql = "UPDATE produto SET
                    produto = :produto,
                    preco = :preco,
                    descricao = :descricao,
                    categoria_id = :categoria_id,
                    usado = :usado
                WHERE id = :id";
        $stmt = $this->con->prepare($sql);
        $stmt->bindValue(':produto', $produto['produto'], PDO::PARAM_STR);
        $stmt->bindValue(':preco', $produto['preco']);
        $stmt->bindValue(':descricao', $produto['descricao'], PDO::PARAM_STR);
        $stmt->bindValue(':categoria_id', $produto['categoria_id'], PDO::PARAM_INT);
        $stmt->bindValue(':usado', $produto['usado'], PDO::PARAM_INT);
        $stmt->bindValue(':id', $produto['id'], PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function buscaProduto($id)
    {
        $sql = "SELECT * FROM produto WHERE id = :id";
        $stmt = $this->con->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function removeProduto($id)
    {
        $sql = "DELETE FROM produto WHERE id = :id";
        $stmt = $this->con->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
