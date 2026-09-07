<?php
require_once '../modelo/banco-usuario.php';
require_once '../modelo/con.php';
require_once 'logica-usuario.php';
require_once 'csrf.php';

verificaUsuario();
validarCSRF($_POST['csrf_token'] ?? '');

$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
if (!$id) {
    $_SESSION['danger'] = "ID de usuário inválido!";
    header("Location: ../vista/usuario-formulario.php");
    die();
}

removeUsuario($con, $id);
$_SESSION['success'] = "Usuário removido com sucesso!";
header("Location: ../vista/usuario-formulario.php");
die();