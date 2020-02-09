<?php
require_once "con.php";

function buscaUsuario($con, $email, $senha)
{
  $senhaMd5 = md5($senha);
  $email = mysqli_real_escape_string($con, $email);
  $query = "SELECT * FROM usuario WHERE email='{$email}' AND senha='{$senhaMd5}'";
  $res = mysqli_query($con, $query);
  return mysqli_fetch_assoc($res);
}
function listaUsuarios($con)
{
  $usuarios = [];
  $query =  "SELECT * FROM usuario";
  $res = mysqli_query($con, $query);
  
  while($usuario = mysqli_fetch_assoc($res))
  {
    array_push($usuarios, $usuario);
  }
  return $usuarios;
}

function cadastraUsuario($con, $usuario)
{
  $senhaMd5 = md5($usuario->senha);
  $query = "INSERT INTO usuario(email, senha) VALUES('{$usuario->email}', '{$senhaMd5}')";
  return mysqli_query($con, $query);
}
function removeUsuario($con, $id)
{
  $query = "DELETE FROM usuario WHERE id='$id'";
  return  mysqli_query($con, $query);
}
