<?php
require_once "con.php";

function buscaUsuario($con, $email)
{
    $sql = "SELECT * FROM usuario WHERE email = :email";
    $stmt = $con->prepare($sql);
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetch();
}

function listaUsuarios($con)
{
    $sql = "SELECT * FROM usuario";
    return $con->query($sql)->fetchAll();
}

function cadastraUsuario($con, $usuario)
{
    $senhaHash = password_hash($usuario->senha, PASSWORD_DEFAULT);
    $sql = "INSERT INTO usuario(email, senha) VALUES(:email, :senha)";
    $stmt = $con->prepare($sql);
    $stmt->bindValue(':email', $usuario->email, PDO::PARAM_STR);
    $stmt->bindValue(':senha', $senhaHash, PDO::PARAM_STR);
    return $stmt->execute();
}

function removeUsuario($con, $id)
{
    $sql = "DELETE FROM usuario WHERE id = :id";
    $stmt = $con->prepare($sql);
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    return $stmt->execute();
}
