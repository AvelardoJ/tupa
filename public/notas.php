<?php
// Notas - Listar Notas
// Aquí mostrarías las notas de la base de datos
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestionar Notas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2>Gestionar Notas</h2>

        <!-- Tabla de Notas -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nota</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <!-- Aquí debes llenar las notas desde tu base de datos -->
                <!-- Ejemplo estático: -->
                <tr>
                    <td>1</td>
                    <td>Nota de ejemplo</td>
                    <td>
                        <button class="btn btn-warning">Editar</button>
                        <button class="btn btn-danger">Eliminar</button>
                    </td>
                </tr>
            </tbody>
        </table>

        <!-- Botón para agregar nota -->
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAgregarNota">Agregar Nota</button>

        <!-- Modal para Agregar Nota -->
        <div class="modal fade" id="modalAgregarNota" tabindex="-1" aria-labelledby="modalAgregarNotaLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalAgregarNotaLabel">Agregar Nota</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="mb-3">
                                <label for="textoNota" class="form-label">Nota</label>
                                <textarea class="form-control" id="textoNota" required></textarea>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary">Guardar</button>
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
