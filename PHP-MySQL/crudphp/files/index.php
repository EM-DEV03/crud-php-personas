<?php
include_once 'conexion.php';

if (isset($_POST['buscar_text'])) {
    $buscar_text = $_POST['buscar_text'];

    $consulta = $conexion->prepare("SELECT * FROM persona WHERE nombre LIKE :buscar OR apellido LIKE :buscar");
    $consulta->execute(array(':buscar' => "%$buscar_text%"));
    $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);

    if (empty($resultado)) {
        echo "<script> alert('Esta persona no se encuentra registrada en la tabla, cree un nuevo cliente.');</script>";
    }
} else {
    $consulta = $conexion->prepare("SELECT * FROM persona");
    $consulta->execute();
    $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Inicio</title>
    <link rel="shortcut icon" href="../resources/icons/inicio.ico" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5">
        <h2 class="text-center mb-4">CRUD EN PHP CON MYSQL</h2>
        <div class="d-flex justify-content-space-between mb-3">
            <form class="d-flex" method="post" action="">
                <input type="text" name="buscar_text" class="form-control me-2 izquierda" placeholder="Buscar nombre o apellidos" value="<?php if (isset($_POST['buscar_text'])) echo $_POST['buscar_text']; ?>">
                <button type="submit" class="btn-buscar">Buscar</button>
            </form>
            <a href="insert.php" class="btn-nuevo">Nuevo</a>
        </div>
        <div class="table-responsive mx-auto" style="max-width: 1000px;">
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Teléfono</th>
                        <th>Ciudad</th>
                        <th>Correo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($resultado)): ?>
                        <?php foreach ($resultado as $fila): ?>
                            <tr>
                                <td><?php echo $fila['id']; ?></td>
                                <td><?php echo $fila['nombre']; ?></td>
                                <td><?php echo $fila['apellido']; ?></td>
                                <td><?php echo $fila['telefono']; ?></td>
                                <td><?php echo $fila['ciudad']; ?></td>
                                <td><?php echo $fila['correo']; ?></td>
                                <td>
                                    <a href="update.php?id=<?php echo $fila['id']; ?>" class="btn btn-warning btn-sm">Editar</a>
                                    <a href="delete.php?id=<?php echo $fila['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este registro?')">Eliminar</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="7" class="text-center">No hay registros disponibles.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>