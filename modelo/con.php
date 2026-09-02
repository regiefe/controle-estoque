<?php
define('DB_PATH', __DIR__ . '/database/loja.db');

try {
    $con = new PDO('sqlite:' . DB_PATH);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $con->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    error_log("Erro ao conectar ao banco de dados: " . $e->getMessage());
    die("Erro ao conectar ao banco de dados.");
}
