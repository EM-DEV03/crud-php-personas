<?php
include_once("conexion.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    try {
        $sql = "DELETE FROM persona WHERE id = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->execute([$id]);

        header("Location: index.php");
        exit();
    } catch (PDOException $e) {
        echo "Error al eliminar: " . $e->getMessage();
    }
} else {
    echo "ID no proporcionado.";
}
?>
