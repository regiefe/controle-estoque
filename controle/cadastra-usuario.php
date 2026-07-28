<?php
require_once '../vista/mostra-alerta.php';
require_once '../modelo/banco-usuario.php';
require_once '../modelo/con.php';
require_once '../modelo/classes/Usuario.php';
require_once '../vista/usuario-formulario.php';
session_start();

$valida = $_SERVER["REQUEST_METHOD"] == "POST" && $_POST['email'] !== "";
if($valida)

{
    $usuario = criaUsuario($_POST['email'], $_POST['senha'], $_POST['confirma']);
    
    try {
        if(cadastraUsuario($con, $usuario)){
            $_SESSION['success'] = "Usuario cadastrado com sucesso!";
            header("Location: ../vista/usuario-formulario.php");
        } else {
            $_SESSION['danger'] = "Erro ao cadastrar usuario";
            header("Location: ../vista/usuario-formulario.php");
        }
    } catch (PDOException $e) {
        $_SESSION['danger'] = "Erro ao cadastrar usuario: " . $e->getMessage();
        header("Location: ../vista/usuario-formulario.php");
    }     
}
function criaUsuario($email, $senha, $confirma)
    {
        if($senha === $confirma)
        {
            $usuario = new Usuario($email, $senha, $confirma);
            return $usuario;
        }
    }

