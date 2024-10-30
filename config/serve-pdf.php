<?php
$file = $_GET['file'];

// Define la ruta del archivo
$filePath = __DIR__ . '/../fpdf/' . $file;

// Verifica si el archivo existe
if (file_exists($filePath)) {
    // Establecer encabezados
    header('Content-Type: application/pdf');
    header('Content-Disposition: inline; filename="' . basename($filePath) . '"');
    header('Content-Length: ' . filesize($filePath));
    // Lee el archivo y lo envía al navegador
    readfile($filePath);
    exit;
} else {
    echo json_encode(['error' => 'El archivo PDF no existe.']);
}
