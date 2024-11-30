<?php
$conexion = mysqli_connect('localhost', 'root', '', 'turnerobd');

if (!$conexion) {
    die("Conexión fallida: " . mysqli_connect_error());
}

$ventanilla = $tramite = $preferencia = $nombre = $telefono  = "";
$actionType = "add"; 
$id = 0;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tramite = $_POST['tramite'];
    $preferencia = $_POST['preferencia'];
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];

    $turnos = json_decode(file_get_contents('turnos.json'), true);
    $turnoGlobalCount = count($turnos) + 1;

    $prefijo = $preferencia === "VIP" ? "VIP" : strtoupper(substr($tramite, 0, 1));
    $referencia = $prefijo . $turnoGlobalCount;

    $turno = [
        'referencia' => $referencia,
        'tramite' => $tramite,
        'preferencia' => $preferencia,
        'nombre' => $nombre,
        'telefono' => $telefono
    ];

    $turnos[] = $turno;
    file_put_contents('turnos.json', json_encode($turnos));

    echo "Turno registrado: $referencia";
}
?>
