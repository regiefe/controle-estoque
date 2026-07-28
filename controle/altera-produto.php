<?php
	require_once "../modelo/banco-categoria.php";
	require_once "../modelo/banco-produtos.php";
	require_once "../modelo/con.php";
	require_once "logica-usuario.php";
	
	verificaUsuario();
	  
	$dados = $_POST;

	$dados['usado'] = array_key_exists('usado', $dados) ? 1 : 0;

	$produto = new BancoProduto($con);

	if($produto->alteraProduto($dados)): 
		$_SESSION['success'] = "Produto {$dados['produto']} foi alterado";
		header("Location: ../vista/produto-lista.php");
		die();
	else: 
  		$_SESSION['text-danger'] = "Erro ao alterar produto {$dados['produto']}";
		header("Location: ../vista/produto-lista.php");
		die();
	endif;
