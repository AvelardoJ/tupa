<?php
// Requisitos - Listar Requisitos
// Aquí mostrarías los requisitos de la base de datos
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestionar Requisitos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2>Gestionar Requisitos</h2>

        <!-- Tabla de Requisitos -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre del Requisito</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <!-- Aquí debes llenar los requisitos desde tu base de datos -->
                <!-- Ejemplo estático: -->
                <tr>
                    <td>1</td>
                    <td>Requisito 1</td>
                    <td>Descripción del Requisito 1</td>
                    <td>
                        <button class="btn btn-warning">Editar</button>
                        <button class="btn btn-danger">Eliminar</button>
                    </td>
                </tr>
            </tbody>
        </table>

        <!-- Botón para agregar requisito -->
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAgregarRequisito">Agregar Requisito</button>

        <!-- Modal para Agregar Requisito -->
        <div class="modal fade" id="modalAgregarRequisito" tabindex="-1" aria-labelledby="modalAgregarRequisitoLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalAgregarRequisitoLabel">Agregar Requisito</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="mb-3">
                                <label for="nombreRequisito" class="form-label">Nombre del Requisito</label>
                                <input type="text" class="form-control" id="nombreRequisito" required>
                            </div>
                            <div class="mb-3">
                                <label for="descripcionRequisito" class="form-label">Descripción</label>
                                <textarea class="form-control" id="descripcionRequisito" required></textarea>
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
