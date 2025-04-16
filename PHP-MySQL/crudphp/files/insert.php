<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Cliente</title>
    <link rel="shortcut icon" href="../resources/icons/agregar.ico" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container nuevo-registro mt-5">
        <h2 class="text-center mb-4">AGREGAR CLIENTE</h2>
        <form method="POST" action="insert.php">
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre" required>
                </div>
                <div class="col-md-6">
                    <label for="apellido" class="form-label">Apellidos</label>
                    <input type="text" name="apellido" id="apellido" class="form-control" placeholder="Apellidos" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="telefono" class="form-label">Teléfono</label>
                    <input type="text" name="telefono" id="telefono" class="form-control" placeholder="Teléfono" required>
                </div>
                <div class="col-md-6">
                    <label for="ciudad" class="form-label">Ciudad</label>
                    <input type="text" name="ciudad" id="ciudad" class="form-control" placeholder="Ciudad" required>
                </div>
            </div>
            <div class="mb-3">
                <label for="correo" class="form-label">Correo Electrónico</label>
                <input type="email" name="correo" id="correo" class="form-control" placeholder="Correo electrónico" required>
            </div>
            <div class="d-flex justify-content-between">
                <a href="index.php" class="btn btn-secondary">Regresar</a>
                <button type="submit" name="guardar" class="btn btn-primary">Guardar</button>
            </div>
        </form>
    </div>
</body>

</html>

<?php
include_once 'conexion.php';

if (isset($_POST['guardar'])) {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $telefono = $_POST['telefono'];
    $ciudad = $_POST['ciudad'];
    $correo = $_POST['correo'];

    if (!empty($nombre) && !empty($apellido) && !empty($telefono) && !empty($ciudad) && !empty($correo)) {
        if (filter_var($correo, FILTER_VALIDATE_EMAIL)) {
            $consulta_verificar = $conexion->prepare('SELECT * FROM persona WHERE correo = :correo OR telefono = :telefono');
            $consulta_verificar->execute(array(
                ':correo' => $correo,
                ':telefono' => $telefono
            ));
            $resultado = $consulta_verificar->fetch(PDO::FETCH_ASSOC);

            if ($resultado) {
                echo "<script> alert('El correo o el número de teléfono ya están en uso.');</script>";
            } else {
                $consulta_insert = $conexion->prepare('INSERT INTO persona(nombre,apellido,telefono,ciudad,correo) VALUES(:nombre,:apellido,:telefono,:ciudad,:correo)');
                $consulta_insert->execute(array(
                    ':nombre' => $nombre,
                    ':apellido' => $apellido,
                    ':telefono' => $telefono,
                    ':ciudad' => $ciudad,
                    ':correo' => $correo
                ));
                header('Location: index.php');
            }
        } else {
            echo "<script> alert('Correo no válido');</script>";
        }
    } else {
        echo "<script> alert('Los campos están vacíos');</script>";
    }
}
?>