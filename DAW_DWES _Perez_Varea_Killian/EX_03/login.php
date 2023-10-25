<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    $_SESSION['nombre_usuario'] = $_POST['nombre_usuario'];
    $_SESSION['puntos_acumulados'] = 0;
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
<h1>Login</h1>

<form method="post" action="">
    <label for="nombre_usuario">Nombre de usuario:</label>
    <input type="text" id="nombre_usuario" name="nombre_usuario" required>
    <button type="submit">Iniciar sesión</button>
</form>
</body>
</html>

