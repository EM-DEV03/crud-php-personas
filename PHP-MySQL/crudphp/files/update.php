<?php
include_once("conexion.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conexion->prepare("SELECT * FROM persona WHERE id = ?");
    $stmt->execute([$id]);
    $persona = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$persona) {
        echo "<p>Registro no encontrado.</p>";
        exit();
    }
}

if (isset($_POST['actualizar'])) {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];
    $ciudad = $_POST['ciudad'];

    if (!empty($nombre) && !empty($apellido) && !empty($telefono) && !empty($ciudad) && filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        $sql = "UPDATE persona SET nombre = ?, apellido = ?, correo = ?, telefono = ?, ciudad = ? WHERE id = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->execute([$nombre, $apellido, $correo, $telefono, $ciudad, $id]);

        header("Location: index.php");
        exit();
    } else {
        echo "<p class='text-danger text-center'>Todos los campos son obligatorios y el correo debe ser válido.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Persona</title>
    <link rel="shortcut icon" href="../resources/icons/editar.ico" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h3 class="text-center">EDITAR CLIENTE</h3>
            </div>
            <div class="card-body">
                <form method="POST" action="update.php">
                    <input type="hidden" name="id" value="<?= htmlspecialchars($persona['id'] ?? '') ?>">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="nombre" class="form-label">Nombres:</label>
                            <input type="text" name="nombre" id="nombre" class="form-control" value="<?= htmlspecialchars($persona['nombre'] ?? '') ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label for="apellido" class="form-label">Apellidos:</label>
                            <input type="text" name="apellido" id="apellido" class="form-control" value="<?= htmlspecialchars($persona['apellido'] ?? '') ?>" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="telefono" class="form-label">Teléfono:</label>
                            <input type="text" name="telefono" id="telefono" class="form-control" value="<?= htmlspecialchars($persona['telefono'] ?? '') ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label for="ciudad" class="form-label">Ciudad:</label>
                            <input type="text" name="ciudad" id="ciudad" class="form-control" value="<?= htmlspecialchars($persona['ciudad'] ?? '') ?>" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="correo" class="form-label">Correo electrónico:</label>
                        <input type="email" name="correo" id="correo" class="form-control" value="<?= htmlspecialchars($persona['correo'] ?? '') ?>" required>
                    </div>
                    <div class="d-flex justify-content-between">
                        <a href="index.php" class="btn btn-secondary">Regresar</a>
                        <button type="submit" name="actualizar" class="btn btn-success">Actualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>