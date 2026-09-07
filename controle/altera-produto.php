<?php
	require_once "../modelo/banco-categoria.php";
	require_once "../modelo/banco-produtos.php";
	require_once "../modelo/con.php";
	require_once "logica-usuario.php";
	require_once "csrf.php";

	verificaUsuario();
	validarCSRFOrDie();

	$dados = $_POST;
	$dados['usado'] = array_key_exists('usado', $dados) ? 1 : 0;

	$produto = new BancoProduto($con);

	if ($produto->alteraProduto($dados)) {
		$_SESSION['success'] = "Produto " . htmlspecialchars($dados['produto']) . " foi alterado";
		header("Location: ../vista/produto-lista.php");
		die();
	} else {
		$_SESSION['text-danger'] = "Erro ao alterar produto";
		header("Location: ../vista/produto-lista.php");
		die();
	}
