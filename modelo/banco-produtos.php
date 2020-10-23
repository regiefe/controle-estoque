<?php
require_once "classes/Produto.php";
	
class BancoProduto{

  private $con;

 function __construct($con){
    $this->con = $con;
  }

	public  function insereProduto($produto) {
		
		$sql = "INSERT INTO produto( produto, 
									 preco, 
									 descricao, 
									 categoria_id, 
									 usado) 
							 VALUES('{$produto['produto']}', 
									{$produto['preco']}, 
								   '{$produto['descricao']}', 
								    {$produto['categoria_id']}, 
									{$produto['usado']})";
		return $this->con->exec($sql);
	}

	public  function listaProdutos() {
		$produtos =[];
		$sql = "SELECT p.*,c.nome AS categoria_nome  FROM produto AS p JOIN categoria AS c ON c.id=p.categoria_id";
		$resultado = $this->con->query($sql);

		while($produto = $resultado->fetch(PDO::FETCH_ASSOC)){
			array_push($produtos, $produto);
		}
		return $produtos;
	}

 	public  function alteraProduto($produto) {
		$sql = "UPDATE produto SET produto='{$produto['produto']}', 
								   preco={$produto['preco']}, 
								   descricao='{$produto['descricao']}', 
								   categoria_id={$produto['categoria_id']}, 
								   usado={$produto['usado']} 
								 WHERE id={$produto['id']}";
								 
		return $this->con->exec($sql);
	}

	public  function buscaProduto($id) {
		$sql =  "SELECT * FROM produto WHERE id = {$id}";
		$resultado = $this->con->query($sql);
		
		return $resultado->fetch(PDO::FETCH_ASSOC);
	}	

	public  function removeProduto($id) {
		$sql = "DELETE FROM produto where id={$id}";
		return $this->con->exec($sql);
	}
}
