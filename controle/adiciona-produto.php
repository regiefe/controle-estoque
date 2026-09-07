<?php
	require_once "../modelo/banco-produtos.php";
	require_once "../modelo/con.php";
	require_once "logica-usuario.php";
	require_once "csrf.php";
	require_once "../modelo/classes/Produto.php";

	verificaUsuario();
	validarCSRFOrDie();

	$_POST['usado'] = isset($_POST['usado']) ? 1 : 0;

	$produto = new BancoProduto($con);

	if($produto->insereProduto($_POST)){
		$_SESSION['success'] = "Produto " . htmlspecialchars($_POST['produto']) . " foi adicionado";
		header("Location: ../vista/produto-lista.php");
		die();
	} else {
		$_SESSION['text-danger'] = "Erro ao adicionar produto";
		header("Location: ../vista/produto-lista.php");
		die();
	}