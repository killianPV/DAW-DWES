<?php
session_start();

if (!isset($_SESSION['nombre_usuario'])) {


    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Otra Página</title>
</head>
<body>
<h1>Otra Página</h1>

<p>Tus puntos acumulados: <?php echo $_SESSION['puntos_acumulados']; ?></p>
<a href="index.php">Volver a la página principal</a>
</body>
</html>

