<?php
// Configuración de la conexión a la base de datos
$host = 'localhost';  // Cambia según tu configuración
$dbname = 'proceso_tupa';  // Nombre de tu base de datos
$username = 'root';  // Nombre de usuario de la base de datos
$password = '';  // Contraseña de la base de datos (ajústala si es necesario)

try {
    // Crear una nueva instancia de PDO para conectarse a la base de datos
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

    // Configurar el modo de errores de PDO para que arroje excepciones
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Puedes usar $conn para realizar consultas SQL
    // echo "Conexión exitosa";  // Este mensaje se puede usar para verificar que la conexión es correcta (opcional)
    
} catch (PDOException $e) {
    // Capturar y mostrar cualquier error en la conexión
    echo 'Error en la conexión: ' . $e->getMessage();
    exit;
}
?>
