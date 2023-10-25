<?php
session_start();

if (!isset($_SESSION['nombre_usuario'])) {

    header("Location: login.php");
    exit();
}


$_SESSION['puntos_acumulados'] += 10;
?>

<!DOCTYPE html>
<html lang="es">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Página Principal</title>

</head>

<body>
<h1>Bienvenido, <?php echo $_SESSION['nombre_usuario']; ?>!</h1>

<p>Tus puntos acumulados: <?php echo $_SESSION['puntos_acumulados']; ?></p>
<a href="index2.php">Ir a otra página</a>
<br>

<a href="logout.php">Cerrar sesión</a>
</body>
</html>
