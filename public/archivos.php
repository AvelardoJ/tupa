<?php
// Archivos - Listar y Subir Archivos
// Aquí gestionarías los archivos (ejemplo: PDF)
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestionar Archivos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2>Gestionar Archivos</h2>

        <!-- Tabla de Archivos -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre del Archivo</th>
                    <th>Tipo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <!-- Aquí debes llenar los archivos desde tu base de datos -->
                <!-- Ejemplo estático: -->
                <tr>
                    <td>1</td>
                    <td>archivo.pdf</td>
                    <td>PDF</td>
                    <td>
                        <a href="uploads/archivo.pdf" target="_blank" class="btn btn-info">Ver</a>
                        <button class="btn btn-danger">Eliminar</button>
                    </td>
                </tr>
            </tbody>
        </table>

        <!-- Botón para subir archivo -->
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalSubirArchivo">Subir Archivo</button>

        <!-- Modal para Subir Archivo -->
        <div class="modal fade" id="modalSubirArchivo" tabindex="-1" aria-labelledby="modalSubirArchivoLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalSubirArchivoLabel">Subir Archivo</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="archivo" class="form-label">Seleccionar Archivo</label>
                                <input type="file" class="form-control" id="archivo" required>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary">Subir</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
