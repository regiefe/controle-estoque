<?php
require_once "con.php";

function buscaUsuario($con, $email, $senha) {
  $senhaMd5 = md5($senha);

  $sql = "SELECT * FROM usuario WHERE email='{$email}' AND senha='{$senhaMd5}'";
  $resultado = $con->query($sql);
  return $resultado->fetch();
}

function listaUsuarios($con) {
  $usuarios = [];
  $sql =  "SELECT * FROM usuario";
  $resultado = $con->query($sql);
  
  while($usuario = $resultado->fetch()) {
    array_push($usuarios, $usuario);
  }
  return $usuarios;
}

function cadastraUsuario($con, $usuario) {
  $senhaMd5 = md5($usuario->senha);
  $sql = "INSERT INTO usuario(email, senha) VALUES('{$usuario->email}', '{$senhaMd5}')";
  return $con->exec($sql);
}

function removeUsuario($con, $id) {
  $sql = "DELETE FROM usuario WHERE id='$id'";
  return $con->exec($sql);
}
