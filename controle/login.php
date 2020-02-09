<?php
require_once "../modelo/banco-usuario.php";
require_once "logica-usuario.php";

$usuario = buscaUsuario($con, $_POST['email'], $_POST['senha']);
if($usuario){
  logaUsuario($usuario['email']);
  $_SESSION['success'] = "Logado com sucesso!";
  header("Location: ../vista/index.php");
}else{
  $_SESSION['danger'] = "Usuario ou senha invalido!";
  header("Location: ../vista/index.php");
}
