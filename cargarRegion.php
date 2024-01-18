
<?php
include('conexion.php');
function cargarRegiones() {
    global $conn;
    $query = "SELECT id, region FROM regiones";
    $result = $conn->query($query);

    $regiones = array();
    while ($row = $result->fetch_assoc()) {
        $regiones[] = $row;
    }
    echo json_encode($regiones);
}

function cargarComunas($regionId) {
    global $conn;
    $query = "SELECT id, comuna FROM comunas WHERE provincia_id IN (SELECT id FROM provincias WHERE region_id = ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $regionId);
    $stmt->execute();
    $result = $stmt->get_result();
    $comunas = array();
    while ($row = $result->fetch_assoc()) {
        $comunas[] = $row;
    }
    echo json_encode($comunas);
}

if (isset($_GET['tipo']) && $_GET['tipo'] == 'regiones') {
    cargarRegiones();
} elseif (isset($_GET['tipo']) && $_GET['tipo'] == 'comunas' && isset($_GET['regionId'])) {
    cargarComunas($_GET['regionId']);
} else {
    echo json_encode(array('error' => 'Solicitud no válida'));
}

$conn->close();
?>