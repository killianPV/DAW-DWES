<?php
$servername = "db.fmesasc.com";
$username = "daw2";
$password = "Gimbernat";
$dbname = "";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conexión exitosa<br>";


    $conn = null;
} catch (PDOException $e) {
    die("La conexión falló: " . $e->getMessage());
}

$conexion = new PDO('mysql:host=db.fmesasc.com;dbname=daw2', 'daw2', 'Gimbernat');
$resultados = $conexion->query("SELECT * FROM usuarios");

foreach($resultados as $fila) {
    echo $fila['id'] . " - " .$fila['nombre'] . '</br>';
}

$sql_create_table = "CREATE TABLE IF NOT EXISTS kperezv1_usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255) NOT NULL,
    correo VARCHAR(255) NOT NULL,
    contra VARCHAR(255) NOT NULL,
    nacimiento DATE,
    permisos_admin BOOLEAN,
    imagen LONGBLOB
)";

$conexion->exec($sql_create_table);
?>
