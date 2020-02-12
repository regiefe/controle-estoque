<?php
	require_once "con.php";
	require_once "classes/Produto.php";
	
	function insereProduto($con, $produto) {
		$sql = "INSERT INTO produto( produto, 
									 preco, 
									 descricao, 
									 categoria_id, 
									 usado) 
							 VALUES('{$produto->produto}', 
									{$produto->preco}, 
								   '{$produto->descricao}', 
								    {$produto->categoria_id}, 
									{$produto->usado})";
		return $con->exec($sql);
	}

	function listaProdutos($con) {
		$produtos =[];
		$sql = "SELECT p.*,c.nome AS categoria_nome  FROM produto AS p JOIN categoria AS c ON c.id=p.categoria_id";
		$resultado = $con->query($sql);

		while($produto = $resultado->fetch(PDO::FETCH_ASSOC)){
			array_push($produtos, $produto);
		}
		return $produtos;
	}

	function alteraProduto($con, $produto) {
		$sql = "UPDATE produto SET produto='{$produto->produto}', 
								   preco={$produto->preco}, 
								   descricao='{$produto->descricao}', 
								   categoria_id={$produto->categoria_id}, 
								   usado={$produto->usado} 
								 WHERE id={$produto->id}";
		return $con->exec($sql);
	}

	function buscaProduto($con, $id) {
		$sql =  "SELECT * FROM produto WHERE id = {$id}";
		$resultado = $con->query($sql);
        $obj = $resultado->fetch(PDO::FETCH_ASSOC);
		 
		 $produto = new Produto($obj['id'], 
								$obj['produto'], 
								$obj['preco'], 
								$obj['descricao'],
								$obj['categoria_id'],
								$obj['usado']);
		return	$produto;
	}	

	function removeProduto($con, $id) {
		$sql = "DELETE FROM produto where id={$id}";
		return $con->exec($sql);
	}
