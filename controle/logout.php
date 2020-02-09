<?php
require_once "logica-usuario.php";
logout();
$_SESSION['success'] = "Deslogado com sucesso!";
header("Location: ../vista/index.php");
