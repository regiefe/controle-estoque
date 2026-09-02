<?php
require_once "con.php";

class BancoUsuario
{
    private $con;

    function __construct($con)
    {
        $this->con = $con;
    }

    public function buscaUsuario($email)
    {
        $sql = "SELECT * FROM usuario WHERE email = :email";
        $stmt = $this->con->prepare($sql);
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function listaUsuarios()
    {
        $sql = "SELECT * FROM usuario";
        return $this->con->query($sql)->fetchAll();
    }

    public function cadastraUsuario($usuario)
    {
        $senhaHash = password_hash($usuario->senha, PASSWORD_DEFAULT);
        $sql = "INSERT INTO usuario(email, senha) VALUES(:email, :senha)";
        $stmt = $this->con->prepare($sql);
        $stmt->bindValue(':email', $usuario->email, PDO::PARAM_STR);
        $stmt->bindValue(':senha', $senhaHash, PDO::PARAM_STR);
        return $stmt->execute();
    }

    public function removeUsuario($id)
    {
        $sql = "DELETE FROM usuario WHERE id = :id";
        $stmt = $this->con->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
