<?php
session_start();
function logaUsuario($email)
{
  $_SESSION['usuario_logado'] = $email;
}

function usuarioEstaLogado()
{
  return isset($_SESSION['usuario_logado']);
}

function verificaUsuario()
{
	if(!usuarioEstaLogado())
	{
    $_SESSION['danger'] = "Você não tem acesso a esta funcionalidade";
		header("Location: ../vista/index.php");
		die();
	}
}
function usuarioLogado()
{
  return  $_SESSION['usuario_logado'];
}
function logout()
{
  session_destroy();
  session_start();
}
