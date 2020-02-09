<?php
require_once '../modelo/banco-usuario.php';
require_once 'logica-usuario.php';

verificaUsuario();
$id = $_POST['id'];
removeUsuario($con, $id);
$_SESSION['success'] = "Usuario removido com sucesso!";
header("Location: ../vista/usuario-formulario.php");
die();