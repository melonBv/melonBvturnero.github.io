<?php

$host = 'localhost'; 
$db = 'usuariosbd';
$user = 'root';
$pass = '';

$conn = new mysqli($host, $user, $pass, $db);{

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$nombre = $_POST['nombre'];
$apellido_paterno = $_POST['apellido_paterno'];
$apellido_materno = $_POST['apellido_materno'];
$nacimiento = $_POST['nacimiento'];
$edad = $_POST['edad'];
$direccion = $_POST['direccion'];
$sueldo_mensual = $_POST['sueldo_mensual'];
$ocupacion = $_POST['ocupacion'];
$ingresos = $_POST['ingresos'];
$gmail = $_POST['gmail'];
$telefono = $_POST['telefono'];

$sql = "INSERT INTO clientes (nombre, apellido_paterno, apellido_materno, nacimiento, edad, direccion, sueldo_mensual, ocupacion, ingresos, gmail, telefono)
VALUES ('$nombre', '$apellido_paterno', '$apellido_materno', '$nacimiento', $edad, '$direccion', $sueldo_mensual, '$ocupacion', '$ingresos', '$gmail', '$telefono')";

if ($conn->query($sql) === TRUE) {
    echo "Nuevo cliente registrado exitosamente.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();
header("Location: registrar_cliente.php");
exit();