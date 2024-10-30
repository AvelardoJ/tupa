<?php
session_start();
include 'conexion.php'; // Incluye el archivo de conexión

try {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Consulta para obtener el usuario
        $sql = "SELECT * FROM user_login WHERE email = :email";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Verificar si el usuario existe y si la contraseña es correcta
        if ($user && $password === $user['password_hash']) {
            // Guardar información del usuario en la sesión
            $_SESSION['id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];

            // Actualizar el último inicio de sesión
            $updateSql = "UPDATE user_login SET last_login = NOW() WHERE id = :id";
            $updateStmt = $conn->prepare($updateSql);
            $updateStmt->bindParam(':id', $user['id']);
            $updateStmt->execute();

            // Redirigir según el rol del usuario
            if ($user['role'] == 'admin') {
                header("Location: ../public/administrador.php"); // Redirige al panel de administrador
            } else {
                header("Location: ../public/usuario.php"); // Redirige al panel de usuario
            }
            exit();
        } else {
            // Mostrar mensaje de error
            echo '<div class="alert alert-danger" role="alert">Credenciales incorrectas.</div>';
        }
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
