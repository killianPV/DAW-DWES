<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configuración de Usuario</title>
</head>
<body>

<h1>Configuración de Usuario</h1>

<?php

if(isset($_COOKIE["username"]) && isset($_COOKIE["language"])) {
    echo "<p>Última configuración guardada:</p>";

    echo "<p>Nombre de Usuario: {$_COOKIE["username"]}</p>";
    echo "<p>Lengua Preferida: {$_COOKIE["language"]}</p>";
}
?>

<form action="cookies.php" method="post">
    <label for="username">Nombre de Usuario:</label>
    <input type="text" id="username" name="username" required><br>

    <label for="language">Lengua Preferida:</label>

    <select id="language" name="language" required>
        <option value="es">Español</option>

        <option value="en">Inglés</option>
        <option value="de">Alemán</option>
    </select><br>

    <button type="submit">Guardar Configuración</button>
</form>

</body>
</html>
