<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Sistema de Trámites Municipales</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }
        body {
            display: flex;
            background-color: #f0f2f5;
        }
        .sidebar {
            width: 250px;
            background: linear-gradient(180deg, #000000, #434343);
            color: white;
            padding: 20px;
            height: 100vh;
            border-radius: 30px 0 0 30px;
            position: relative;
        }
        .sidebar .profile {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 40px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.3);
            padding-bottom: 20px;
        }
        .sidebar .profile img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            margin-bottom: 15px;
        }
        .sidebar .profile .name {
            font-size: 18px;
            font-weight: bold;
        }
        .sidebar .profile .age {
            font-size: 14px;
            color: #b3b3b3;
        }
        .sidebar .profile .id {
            font-size: 12px;
            color: #6A8EFC;
            background-color: white;
            padding: 5px 10px;
            border-radius: 12px;
        }
        .menu-item {
            padding: 12px 20px;
            margin-bottom: 10px;
            cursor: pointer;
            display: flex;
            align-items: center;
            transition: transform 0.3s ease, background-color 0.3s ease;
            border-radius: 15px;
            background-color: rgba(255, 255, 255, 0.1);
        }
        .menu-item:hover {
            background-color: rgba(255, 255, 255, 0.3);
            transform: scale(1.05);
        }
        .menu-item.active {
            background-color: #6366F1;
        }
        .menu-item i {
            margin-right: 15px;
            font-size: 20px;
            color: white;
        }
        .content {
            flex: 1;
            padding: 20px;
            animation: fadeIn 0.5s ease-in-out;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            background-color: white;
            padding: 15px 30px;
            border-radius: 15px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .search-bar {
            padding: 10px 20px;
            border-radius: 20px;
            border: 1px solid #e0e0e0;
            width: 300px;
            font-size: 14px;
        }
        .user-profile {
            display: flex;
            align-items: center;
        }
        .user-profile img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 15px;
        }
        .user-info {
            display: flex;
            flex-direction: column;
        }
        .user-name {
            font-weight: bold;
        }
        .user-email {
            font-size: 12px;
            color: #666;
        }
        .main-content {
            background-color: white;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
    <script>
        function navigateTo(page) {
            document.querySelectorAll('.menu-item').forEach(item => item.classList.remove('active'));
            event.currentTarget.classList.add('active');
            document.getElementById('pageTitle').innerText = page;
            
            switch(page) {
                case 'Procedimientos':
                    showProcedimientos();
                    break;
                case 'Reportes':
                    showReportes();
                    break;
                case 'Cerrar Sesión':
                    cerrarSesion();
                    break;
                default:
                    document.getElementById('pageContent').innerHTML = `Contenido de la página ${page}`;
            }
        }

        function showProcedimientos() {
            let content = `
                <h2>Lista de Procedimientos</h2>
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Nombre del Procedimiento</th>
                        <th>Acciones</th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Licencia de Funcionamiento</td>
                        <td>
                            <button class="action-btn view-btn" onclick="verProcedimiento(1)">Ver</button>
                            <button class="action-btn edit-btn" onclick="editarProcedimiento(1)">Editar</button>
                            <button class="action-btn delete-btn" onclick="eliminarProcedimiento(1)">Eliminar</button>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Certificado de Residencia</td>
                        <td>
                            <button class="action-btn view-btn" onclick="verProcedimiento(2)">Ver</button>
                            <button class="action-btn edit-btn" onclick="editarProcedimiento(2)">Editar</button>
                            <button class="action-btn delete-btn" onclick="eliminarProcedimiento(2)">Eliminar</button>
                        </td>
                    </tr>
                </table>
            `;
            document.getElementById('pageContent').innerHTML = content;
        }

        function showReportes() {
            let content = `
                <h2>Reportes de Visitas al Sistema</h2>
                <div>
                    <p>Total de visitas: 1,234</p>
                    <canvas id="visitasChart" width="400" height="200"></canvas>
                </div>
            `;
            document.getElementById('pageContent').innerHTML = content;
            
            let ctx = document.getElementById('visitasChart').getContext('2d');
            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo'],
                    datasets: [{
                        label: 'Visitas por día',
                        data: [65, 59, 80, 81, 56, 55, 40],
                        borderColor: 'rgb(75, 192, 192)',
                        tension: 0.1
                    }]
                }
            });
        }

        function cerrarSesion() {
            if(confirm('¿Está seguro que desea cerrar sesión?')) {
                window.location.href = 'index.html';
            }
        }

        function verProcedimiento(id) {
            alert(`Ver detalles del procedimiento ${id}`);
        }

        function editarProcedimiento(id) {
            alert(`Editar procedimiento ${id}`);
        }

        function eliminarProcedimiento(id) {
            if(confirm(`¿Está seguro que desea eliminar el procedimiento ${id}?`)) {
                alert(`Procedimiento ${id} eliminado`);
            }
        }
    </script>
</head>
<body>
    <div class="sidebar">
        <div class="profile">
            <img src="https://via.placeholder.com/80" alt="Profile Picture">
            <span class="name">Administrador</span>
            <span class="age">26 y/o</span>
            <span class="id">#362780</span>
        </div>
        <div class="menu-item active" onclick="navigateTo('Perfil')"><i>👤</i> Perfil</div>
        <div class="menu-item" onclick="navigateTo('Procedimientos')"><i>📋</i> Procedimientos</div>
        <div class="menu-item" onclick="navigateTo('Requisitos')"><i>📝</i> Requisitos</div>
        <div class="menu-item" onclick="navigateTo('Usuarios')"><i>👥</i> Usuarios</div>
        <div class="menu-item" onclick="navigateTo('Reportes')"><i>📊</i> Reportes</div>
        <div class="menu-item" onclick="navigateTo('Cerrar Sesión')"><i>🚪</i> Cerrar Sesión</div>
    </div>
    <div class="content">
        <div class="header">
            <input type="text" class="search-bar" placeholder="Buscar...">
            <div class="user-profile">
                <img src="https://via.placeholder.com/40" alt="User Profile">
                <div class="user-info">
                    <span class="user-name">administrador</span>
                    <span class="user-email">administrador@example.com</span>
                </div>
            </div>
        </div>
        <div class="main-content">
            <h1 id="pageTitle">Perfil</h1>
            <div id="pageContent">Contenido de la página de Perfil</div>
        </div>
    </div>
</body>
</html>
