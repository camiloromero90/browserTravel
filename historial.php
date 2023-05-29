<?php
$city = $_GET['city'];
$humidity = $_GET['humidity'];

$host = 'localhost';
$db = 'prueba';
$user = 'root';
$password = '1234';

try {
    $conn = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    $stmt = $conn->prepare("INSERT INTO historial (city, humidity) VALUES (:city, :humidity)");
    $stmt->bindParam(':city', $city);
    $stmt->bindParam(':humidity', $humidity);
    $stmt->execute();

    http_response_code(200);
} catch(PDOException $e) {
    http_response_code(500);
    echo "Error al guardar en el historial: " . $e->getMessage();
}
?>
