<?php
$servidor = "mysql:dbname=" . DB . ";host=" . SERVIDOR;

try {
    $pdo = new PDO($servidor, USUARIO, PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    //echo "<script>alert('Conectado...');</script>";
} catch (PDOException $e) {
    // echo "<script>alert('Error: " . $e->getMessage() . "');</script>";
}
