<?php
$servername = "db.fmesasc.com";
$username = "daw2";
$password = "Gimbernat";
$dbname = "nombre_de_tu_base_de_datos";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['registrar'])) {
        // Registro de Usuarios
        $usuario = $_POST['usuario'];
        $contrasena = password_hash($_POST['contrasena'], PASSWORD_DEFAULT);

        $query = "INSERT INTO usuarios (usuario, contrasena, es_admin) VALUES (?, ?, false)";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(1, $usuario);
        $stmt->bindParam(2, $contrasena);

        if ($stmt->execute()) {
            echo "Usuario registrado exitosamente.";
        } else {
            echo "Error al registrar el usuario: " . $stmt->errorInfo()[2];
        }
    }

    $porPagina = 3;
    $pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
    $inicio = ($pagina - 1) * $porPagina;

    $query = "SELECT * FROM usuarios LIMIT $inicio, $porPagina";
    $stmt = $conn->query($query);

    echo "<h2>Lista de Usuarios</h2>";

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "Usuario: " . $row['usuario'] . "<br>";
        // Mostrar otros detalles del usuario según tu estructura de base de datos
        echo "<hr>";
    }

    $totalUsuarios = // Obtén el total de usuarios desde la base de datos;
    $totalPaginas = ceil($totalUsuarios / $porPagina);

    // Muestra enlaces de páginas
    for ($i = 1; $i <= $totalPaginas; $i++) {
        if ($i === $pagina) {
            echo "<strong>$i</strong> ";
        } else {
            echo "<a href='?pagina=$i'>$i</a> ";
        }
    }
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro e Inicio de Sesión</title>
</head>
<body>
<h2>Registro de Usuario</h2>
<form action="" method="post">
    Usuario: <input type="text" name="usuario" required><br>
    Contraseña: <input type="password" name="contrasena" required><br>
    <input type="submit" name="registrar" value="Registrar">
</form>
</body>
</html>
