<?php
require_once "../modelo/banco-usuario.php";
require_once "../modelo/con.php";
require_once "logica-usuario.php";
require_once "../controle/csrf.php";

validarCSRF($_POST['csrf_token'] ?? '');

$email = $_POST['email'] ?? '';
$senha = $_POST['senha'] ?? '';

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['danger'] = "Email inválido!";
    header("Location: ../vista/index.php");
    die();
}

$bancoUsuario = new BancoUsuario($con);
$usuario = $bancoUsuario->buscaUsuario($email);
if ($usuario && password_verify($senha, $usuario['senha'])) {
    logaUsuario($usuario['email']);
    $_SESSION['success'] = "Logado com sucesso!";
    header("Location: ../vista/index.php");
} else {
    $_SESSION['danger'] = "Usuário ou senha inválidos!";
    header("Location: ../vista/index.php");
}
die();
