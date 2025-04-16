<?php
$servidor = "localhost";
$usuario = "root";
$password = "";
$baseDeDatos = "crud";

try {
    $conexion = new PDO("mysql:host=$servidor;dbname=$baseDeDatos", $usuario, $password);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "ERROR: " . $e->getMessage();
}
?>