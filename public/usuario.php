<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Usuario - TUPA</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome para los íconos -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        .navbar {
            background-color: #003f91;
            color: white;
        }
        .sidebar {
            height: 100vh;
            background-color: #f8f9fa;
            padding-top: 20px;
        }
        .content {
            margin-left: 250px;
            padding: 20px;
        }
        .table th, .table td {
            vertical-align: middle;
        }
        .btn-action {
            margin-right: 5px;
        }
    </style>
</head>
<body>

    <!-- Menú de navegación -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Panel de Usuario - TUPA</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#procedimientos">Procedimientos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#logout">Cerrar Sesión</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Sidebar -->
    <div class="d-flex">
        <div class="sidebar p-3">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link active" href="#procedimientos"><i class="fas fa-list"></i> Ver Procedimientos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#editar"><i class="fas fa-edit"></i> Editar Procedimientos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#descargas"><i class="fas fa-download"></i> Descargas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#imprimir"><i class="fas fa-print"></i> Imprimir Resúmenes</a>
                </li>
            </ul>
        </div>

        <!-- Contenido principal -->
        <div class="content">
            <h2>Gestionar Procedimientos TUPA</h2>

            <!-- Tabla de Procedimientos -->
            <div class="table-responsive">
                <table class="table table-bordered table-hover mt-4" id="tablaProcedimientos">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Procedimiento</th>
                            <th>Descripción</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Aquí se llenarán los procedimientos desde PHP -->
                    </tbody>
                </table>
            </div>

            <!-- Modal para Editar Procedimiento -->
            <div class="modal fade" id="modalEditar" tabindex="-1" aria-labelledby="modalEditarLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalEditarLabel">Editar Procedimiento</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="formEditarProcedimiento">
                                <div class="mb-3">
                                    <label for="nombreProcedimiento" class="form-label">Nombre del Procedimiento</label>
                                    <input type="text" class="form-control" id="nombreProcedimiento" required>
                                </div>
                                <div class="mb-3">
                                    <label for="descripcionProcedimiento" class="form-label">Descripción</label>
                                    <textarea class="form-control" id="descripcionProcedimiento" required></textarea>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal para Descargar Archivos -->
            <div class="modal fade" id="modalDescargar" tabindex="-1" aria-labelledby="modalDescargarLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalDescargarLabel">Descargar Archivos</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Seleccione el archivo que desea descargar:</p>
                            <ul>
                                <li><a href="ruta_al_pdf/procedimiento.pdf" class="btn btn-primary">Descargar PDF</a></li>
                                <li><a href="ruta_a_la_plantilla/plantilla.docx" class="btn btn-primary">Descargar Plantilla</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal para Imprimir Resumen -->
            <div class="modal fade" id="modalImprimir" tabindex="-1" aria-labelledby="modalImprimirLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalImprimirLabel">Imprimir Resumen</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Imprimir un resumen del procedimiento seleccionado.</p>
                            <button class="btn btn-primary">Imprimir</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
