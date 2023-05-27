<?php
// Obtener los parámetros de la solicitud AJAX
$city = $_GET['city'];
$humidity = $_GET['humidity'];

// Validar y sanitizar los valores recibidos, si es necesario

// Establecer la conexión a la base de datos (reemplaza con tus propias configuraciones)
$host = 'localhost';
$db = 'prueba';
$user = 'root';
$password = '1234';

try {
    $conn = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Insertar el registro en la tabla historial
    $stmt = $conn->prepare("INSERT INTO historial (city, humidity) VALUES (:city, :humidity)");
    $stmt->bindParam(':city', $city);
    $stmt->bindParam(':humidity', $humidity);
    $stmt->execute();

    // Devolver una respuesta HTTP 200 (OK) para indicar que la inserción se realizó correctamente
    http_response_code(200);
} catch(PDOException $e) {
    // Devolver una respuesta HTTP 500 (Internal Server Error) en caso de error
    http_response_code(500);
    echo "Error al guardar en el historial: " . $e->getMessage();
}
?>
