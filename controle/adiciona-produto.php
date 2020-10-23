<?php
	require_once "../vista/cabecalho.php";
	require_once "../modelo/banco-produtos.php";
	require_once "../modelo/con.php";
	require_once "logica-usuario.php";
	require_once "../modelo/classes/Produto.php";

	verificaUsuario();
	$_POST;

	isset($_POST['usado']) ? $_POST['usado'] = 0 : $_POST['usado'] = 1;

	$produto = new BancoProduto($con);
	
	if($produto->insereProduto($_POST)):
		$_SESSION['success'] = "Produto {$dados['produto']} foi alterado";
		header("Location: ../vista/produto-lista.php");
	else: 
 		$msg = 'Erro ao atualizar produto';
		$_SESSION['text-danger'] = "Erro: {$msg}, ao alterar produto {$dados['produto']}";
		header("Location: ../vista/produto-lista.php");
	endif; 
	require_once "../vista/rodape.php"; 



	 