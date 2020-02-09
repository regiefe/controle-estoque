<?php
	require_once "con.php";
	require_once "classes/Produto.php";
	
	function insereProduto($con, $produto)
	{
		$produto->nome = mysqli_real_escape_string($con, $produto->nome);
		$descricao = mysqli_real_escape_string($con, $descricao);
		$query = "INSERT INTO produto( nome, 
									   preco, 
									   descricao, 
									   categoria_id, 
									   usado) 
							 VALUES('{$produto->nome}', 
									{$produto->preco}, 
								   '{$produto->descricao}', 
								    {$produto->categoria_id}, 
									{$produto->usado})";
		return mysqli_query($con, $query);
	}

	function listaProdutos($con)
	{
		$produtos =[];
		$query = "SELECT p.*,c.nome AS categoria_nome  FROM produto AS p JOIN categoria AS c ON c.id=p.categoria_id";
		$res = mysqli_query($con, $query);

		while($produto = mysqli_fetch_assoc($res)){
			array_push($produtos, $produto);
		}
		return $produtos;
	}
	function alteraProduto($con, $produto)
	{
		$produto->nome = mysqli_real_escape_string($con, $produto->nome);
		$produto->descricao = mysqli_real_escape_string($con, $produto->descricao);
		$query = "UPDATE produto SET nome='{$produto->nome}', 
									 preco={$produto->preco}, 
									 descricao='{$produto->descricao}', 
									 categoria_id={$produto->categoria_id}, 
									 usado={$produto->usado} 
								 WHERE id={$produto->id}";
		return mysqli_query($con, $query);
	}
	function buscaProduto($con, $id)
	{
		$query =  "SELECT * FROM produto WHERE id = {$id}";
		$res = mysqli_query($con, $query);
		//var_dump($res);
		 $obj = mysqli_fetch_assoc($res);
		 
		 $produto = new Produto($obj['id'], 
								$obj['nome'], 
								$obj['preco'], 
								$obj['descricao'],
								$obj['categoria_id'],
								$obj['usado']);
		return	$produto;
	}	

	function removeProduto($con, $id)
	{
		$query = "DELETE FROM produto where id={$id}";
		return mysqli_query($con, $query);
	}
