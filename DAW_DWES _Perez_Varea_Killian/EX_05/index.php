<?php
$servername = "db.fmesasc.com";
$username = "daw2";
$password = "Gimbernat";
$dbname = "nombre";

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

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['iniciar_sesion'])) {
        // Inicio de Sesión
        $usuario = $_POST['usuario'];
        $contrasena = $_POST['contrasena'];

        $query = "SELECT * FROM usuarios WHERE usuario = ?";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(1, $usuario);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result && password_verify($contrasena, $result['contrasena'])) {
            echo "Inicio de sesión exitoso. ¡Bienvenido, " . $usuario . "!";
        } else {
            echo "Usuario no encontrado o contraseña incorrecta.";
        }
    }
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}
?>
