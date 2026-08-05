<?php
require_once "con.php";

function listaCategorias($con)
{
    $sql = "SELECT * FROM categoria";
    return $con->query($sql)->fetchAll();
}
