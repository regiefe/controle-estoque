<?php
	require_once "../vista/cabecalho.php";
	require_once "../modelo/banco-categoria.php";
	require_once "../modelo/banco-produtos.php";
	require_once "../modelo/con.php";
	require_once "logica-usuario.php";
	
	verificaUsuario();
	  
	$dados = $_POST;

	if (array_key_exists('usado', $dados)){
		$dados['usado'] = 0;
	}else{
		$dados['usado'] = 1;
	}

	$produto = new BancoProduto($con);

	if($produto->alteraProduto($dados)): 
		$_SESSION['success'] = "Produto {$dados['produto']} foi alterado";
		header("Location: ../vista/produto-lista.php");
	else: 
 		$msg = 'Erro ao atualizar produto';
		$_SESSION['text-danger'] = "Erro: {$msg}, ao alterar produto {$dados['produto']}";
		header("Location: ../vista/produto-lista.php");
	endif; 
	require_once "../vista/rodape.php"; 
