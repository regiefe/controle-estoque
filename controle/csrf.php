<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function gerarCSRFToken()
{
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

function csrfToken()
{
    return gerarCSRFToken();
}

function validarCSRF($token)
{
    if (empty($_SESSION['csrf_token']) || empty($token)) {
        return false;
    }
    return hash_equals($_SESSION['csrf_token'], $token);
}

function validarCSRFOrDie()
{
    if (!validarCSRF($_POST['csrf_token'] ?? '')) {
        $_SESSION['danger'] = "Token de segurança inválido. Tente novamente.";
        header("Location: " . $_SERVER['HTTP_REFERER'] ?? '../vista/index.php');
        die();
    }
}
