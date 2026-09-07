<?php
require_once "../modelo/con.php";
require_once "../modelo/banco-produtos.php";
require_once "logica-usuario.php";
require_once "csrf.php";

verificaUsuario();
validarCSRF($_POST['csrf_token'] ?? '');

$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
if (!$id) {
    $_SESSION['danger'] = "ID de produto inválido!";
    header("Location: ../vista/produto-lista.php");
    die();
}

$produto = new BancoProduto($con);
$produto->removeProduto($id);
$_SESSION['success'] = "Produto removido com sucesso!";
header("Location: ../vista/produto-lista.php");
die();

