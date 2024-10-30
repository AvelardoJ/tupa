<?php
// Incluir conexión a la base de datos
include 'conexion.php';

// Obtener el término de búsqueda y validarlo
$query = isset($_POST['query']) ? trim($_POST['query']) : '';
if (empty($query)) {
    echo json_encode(['status' => 'error', 'message' => 'No se proporcionó término de búsqueda.']);
    exit;
}

// Preparar la consulta SQL
$sql = "
    SELECT p.*, 
       o.nombre_oficina, o.direccion,
       m.nombre_mesa_partes, m.tipo_atencion, m.url_mesa_virtual,
       r.descripcion AS requisito_desc, r.codigo_requisito AS requisito_codigo, r.ruta_pdf_ejemplo, -- Aquí incluimos `ruta_pdf_ejemplo`
       n.codigo_nota, n.descripcion AS nota_desc,
       d.nombre_documento, d.ruta_documento, d.formato_documento
FROM procedimientos p 
LEFT JOIN procedimiento_oficina po ON p.id_procedimiento = po.id_procedimiento
LEFT JOIN oficinas o ON po.id_oficina = o.id_oficina
LEFT JOIN procedimiento_mesa_partes pm ON p.id_procedimiento = pm.id_procedimiento
LEFT JOIN mesa_partes m ON pm.id_mesa_partes = m.id_mesa_partes
LEFT JOIN requisitos r ON p.id_procedimiento = r.id_procedimiento
LEFT JOIN notas n ON p.id_procedimiento = n.id_procedimiento
LEFT JOIN documentos d ON p.id_procedimiento = d.id_procedimiento
WHERE p.nombre LIKE :query 
ORDER BY p.nombre ASC
";

try {
    $stmt = $conn->prepare($sql);
    $searchTerm = "%" . $query . "%";
    $stmt->bindValue(':query', $searchTerm, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Inicializar un array para almacenar los resultados
    $data = [];

    foreach ($result as $row) {
        // Estructura para los procedimientos
        $procedimiento_id = $row['id_procedimiento'];
    
        // Si el procedimiento no existe en el array, crearlo
        if (!isset($data[$procedimiento_id])) {
            $data[$procedimiento_id] = [
                'procedimiento' => [
                    'id' => $procedimiento_id,
                    'codigo' => $row['codigo_procedimiento'],
                    'nombre' => $row['nombre'],
                    'plazo' => $row['plazo_atencion'],
                    'costo' => $row['costo_tramite'],
                    'descripcion' => $row['descripcion'],
                ],
                'oficinas' => [],
                'mesa_partes' => [],
                'requisitos' => [],
                'notas' => [],
                'documentos' => []
            ];
        }
    
        // Agregar oficinas
        if (isset($row['nombre_oficina']) && !in_array($row['nombre_oficina'], array_column($data[$procedimiento_id]['oficinas'], 'nombre_oficina'))) {
            $data[$procedimiento_id]['oficinas'][] = [
                'nombre_oficina' => $row['nombre_oficina'],
                'direccion' => $row['direccion']
            ];
        }
    
        // Agregar mesa de partes
        if (isset($row['nombre_mesa_partes']) && !in_array($row['nombre_mesa_partes'], array_column($data[$procedimiento_id]['mesa_partes'], 'nombre_mesa_partes'))) {
            $data[$procedimiento_id]['mesa_partes'][] = [
                'nombre_mesa_partes' => $row['nombre_mesa_partes'],
                'tipo_atencion' => $row['tipo_atencion'],
                'url_mesa_virtual' => $row['url_mesa_virtual']
            ];
        }
    
        // Agregar requisitos
        if (isset($row['requisito_desc']) && !in_array($row['codigo_requisito'] ?? null, array_column($data[$procedimiento_id]['requisitos'], 'codigo'))) {
            $data[$procedimiento_id]['requisitos'][] = [
                'descripcion' => $row['requisito_desc'],
                'codigo' => $row['codigo_requisito'] ?? 'Sin código',
                'documento' => [
                    'url' => isset($row['ruta_pdf_ejemplo']) ? $row['ruta_pdf_ejemplo'] : null
                ]
            ];
        }
    
        // Agregar notas
        if (isset($row['codigo_nota']) && isset($row['nota_desc']) && !in_array($row['codigo_nota'], array_column($data[$procedimiento_id]['notas'], 'codigo_nota'))) {
            $data[$procedimiento_id]['notas'][] = [
                'codigo_nota' => $row['codigo_nota'],
                'descripcion' => $row['nota_desc']
            ];
        }
    
        // Agregar documentos
        if (isset($row['nombre_documento']) && !in_array($row['nombre_documento'], array_column($data[$procedimiento_id]['documentos'], 'nombre_documento'))) {
            $data[$procedimiento_id]['documentos'][] = [
                'nombre_documento' => $row['nombre_documento'],
                'ruta_documento' => isset($row['ruta_documento']) ? $row['ruta_documento'] : null,
                'formato_documento' => isset($row['formato_documento']) ? $row['formato_documento'] : null
            ];
        }
    }
    
    // Devolver la respuesta en formato JSON
    header('Content-Type: application/json');
    echo json_encode(['status' => 'success', 'data' => array_values($data)], JSON_PRETTY_PRINT);
} catch (PDOException $e) {
    echo json_encode(['status' => 'error', 'message' => 'Error en la consulta: ' . $e->getMessage()]);
}
?>
