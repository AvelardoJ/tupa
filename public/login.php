<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>
    <div class="container">
        <div class="login-container">
            <div class="login-image">
                <div class="login-image-text">
                    <h2>Bienvenido</h2>
                    <p>Sistema de Administración TUPA</p>
                </div>
            </div>
            <div class="login-form">
                <div class="login-header">
                    <img src="../images/logo_municipalidad.png" alt="Logo Municipalidad">
                    <h1>Iniciar Sesión</h1>
                    <p>Ingrese sus credenciales para acceder al sistema</p>
                </div>
                <form id="loginForm" action="../config/loginController.php" method="POST">
                    <div class="form-group">
                        <label for="email">Correo electrónico</label>
                        <div class="input-group">
                            <i class="fas fa-user"></i>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="error-message" id="email-error">Correo electrónico inválido</div>
                    </div>
                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <div class="input-group">
                            <i class="fas fa-lock"></i>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="error-message" id="password-error">Contraseña inválida</div>
                    </div>
                    <div class="remember-forgot">
                        <label class="remember-me">
                            <input type="checkbox" name="remember"> Recordarme
                        </label>
                        <a href="#" class="forgot-password">¿Olvidó su contraseña?</a>
                    </div>
                    <button type="submit" class="btn-login">
                        Ingresar
                    </button>
                </form>
                <a href="../index.html" class="back-to-home">
                    <i class="fas fa-arrow-left"></i>
                    Volver al inicio
                </a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            document.querySelectorAll('.error-message').forEach(el => el.style.display = 'none');
            
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            
            let hasError = false;
            
            if (!email || !email.includes('@')) {
                document.getElementById('email-error').style.display = 'block';
                hasError = true;
            }
            
            if (!password || password.length < 6) {
                document.getElementById('password-error').style.display = 'block';
                hasError = true;
            }
            
            if (!hasError) {
                this.submit();
            }
        });
    </script>
</body>
</html>
