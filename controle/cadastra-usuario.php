<?php
require_once '../modelo/banco-usuario.php';
require_once '../modelo/con.php';
require_once '../modelo/classes/Usuario.php';
require_once '../controle/csrf.php';
require_once '../vista/mostra-alerta.php';
require_once '../vista/usuario-formulario.php';
session_start();

$valida = $_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['email']);

if ($valida) {
    validarCSRF($_POST['csrf_token'] ?? '');

    $email = $_POST['email'];
    $senha = $_POST['senha'] ?? '';
    $confirma = $_POST['confirma'] ?? '';

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['danger'] = "Email inválido!";
        header("Location: ../vista/usuario-formulario.php");
        die();
    }

    if ($senha !== $confirma) {
        $_SESSION['danger'] = "Senhas não conferem!";
        header("Location: ../vista/usuario-formulario.php");
        die();
    }

    $usuario = new Usuario($email, $senha, $confirma);

    try {
        if (cadastraUsuario($con, $usuario)) {
            $_SESSION['success'] = "Usuário cadastrado com sucesso!";
            header("Location: ../vista/usuario-formulario.php");
        } else {
            $_SESSION['danger'] = "Erro ao cadastrar usuário";
            header("Location: ../vista/usuario-formulario.php");
        }
    } catch (PDOException $e) {
        $_SESSION['danger'] = "Erro ao cadastrar usuário. Tente novamente.";
        error_log("PDOException: " . $e->getMessage());
        header("Location: ../vista/usuario-formulario.php");
    }
    die();
}

function criaUsuario($email, $senha, $confirma)
{
    if ($senha === $confirma) {
        return new Usuario($email, $senha, $confirma);
    }
    return null;
}
