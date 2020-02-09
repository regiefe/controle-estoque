<?php
require_once "../modelo/banco-produtos.php";
require_once "logica-usuario.php";

verificaUsuario();
$id = $_POST['id'];
removeProduto($con, $id);
$_SESSION['success'] = "Produto removido com sucesso!";
header("Location: ../vista/produto-lista.php");
die();

