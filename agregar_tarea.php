<?php
require_once __DIR__ . '/includes/functions.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = crearTarea($_POST['curso'], $_POST['descripcion'], $_POST['fechaEntrega']);
    if ($id) {
        header("Location: index.php?mensaje=Tarea creada con éxito");
        exit;
    } else {
        $error = "No se pudo crear la tarea.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Nueva Tarea</title>
    <link rel="stylesheet" href="public/css/styles.css">
</head>
<body>
    <div class="container">
        <h1>Agregar Nueva Tarea</h1>
        <?php if (isset($error)): ?>
            <div class="error"><?php echo $error; ?></div>
        <?php endif; ?>
        <form method="POST">
    <label>Curso: <input type="text" name="curso" required></label>
    <label>Descripción: <textarea name="descripcion" required></textarea></label>
    <label>Fecha de Entrega: <input type="date" name="fechaEntrega" required></label>
    <input type="submit" value="Crear Tarea">
</form>
<a href="index.php" class="button">Volver a la lista de tareas</a>
</div>
</body>
</html>
