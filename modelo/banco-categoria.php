<?php
require_once "con.php";

class BancoCategoria
{
    private $con;

    function __construct($con)
    {
        $this->con = $con;
    }

    public function listaCategorias()
    {
        $sql = "SELECT * FROM categoria";
        return $this->con->query($sql)->fetchAll();
    }
}
