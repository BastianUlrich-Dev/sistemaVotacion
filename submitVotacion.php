<?php
include('conexion.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombreApellido = trim($_POST['nombreApellido']);
    $alias = trim($_POST['alias']);
    $rut = trim($_POST['rut']);
    $email = trim($_POST['email']);
    $region = $_POST['region'];
    $comuna = $_POST['comuna'];
    $candidato = $_POST['candidato'];
    $comoSeEntero = isset($_POST['comoSeEntero']) ? $_POST['comoSeEntero'] : array();
    $region = intval($region);
    $comuna = intval($comuna);
    if (empty($nombreApellido)) {
        echo json_encode(array('error' => 'Nombre y apellido no pueden quedar en blanco'));
        exit;
    }

    if (strlen($alias) < 5 || !preg_match('/^[a-zA-Z0-9]+$/', $alias)) {
        echo json_encode(array('error' => 'El alias debe contener al menos 5 caracteres y contener letras y números'));
        exit;
    }

    if (count($comoSeEntero) < 2) {
        echo json_encode(array('error' => 'Debe elegir al menos dos opciones en "¿Cómo se enteró de nosotros?"'));
        exit;
    }

    $queryDuplicado = "SELECT COUNT(*) as cantidad FROM votos WHERE rut = ?";
    $stmtDuplicado = $conn->prepare($queryDuplicado);
    $stmtDuplicado->bind_param("s", $rut);
    $stmtDuplicado->execute();
    $resultDuplicado = $stmtDuplicado->get_result();
    $rowDuplicado = $resultDuplicado->fetch_assoc();
    $comoSeEntero = isset($_POST['comoSeEntero']) ? $_POST['comoSeEntero'] : array();

    if ($rowDuplicado['cantidad'] > 0) {
        echo json_encode(array('error' => 'Ya se ha registrado un voto con este RUT'));
        exit;
    }

    if (count($comoSeEntero) < 2) {
        echo "Debe elegir al menos dos opciones en 'Como se enteró de nosotros'.";
        exit;
    }
    $candidato = mysqli_real_escape_string($conn, $candidato);
    $query = "INSERT INTO votos (nombreApellido, alias, rut, email, region, comuna, candidato, comoSeEntero) VALUES ('$nombreApellido', '$alias', '$rut', '$email', '$region', '$comuna', '$candidato','$comoSeEntero[0]')";
    $stmt = $conn->prepare($query);
    if ($stmt->execute()) {
        echo "Datos insertados correctamente";
    } else {
        echo "Error al insertar datos: " . $stmt->error;
    }
    $stmt->close();
    $conn->close();
} else {
    echo json_encode(array('error' => 'Solicitud no válida'));
}
?>
