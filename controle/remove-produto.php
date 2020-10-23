<?php
require_once "../modelo/con.php";
require_once "../modelo/banco-produtos.php";
require_once "logica-usuario.php";

verificaUsuario();
$produto = new BancoProduto($con);

$id = $_POST['id'];
$produto->removeProduto($id);
$_SESSION['success'] = "Produto removido com sucesso!";
header("Location: ../vista/produto-lista.php");
die();

