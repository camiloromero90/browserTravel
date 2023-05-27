<?php
// Establecer la conexión a la base de datos (reemplaza con tus propias configuraciones)
$host = 'localhost';
$db = 'prueba';
$user = 'root';
$password = '1234';

try {
    $conn = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Consultar el historial de la base de datos
    $stmt = $conn->query("SELECT * FROM historial");
    $historial = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    echo "Error al obtener el historial: " . $e->getMessage();
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Historial de Humedades</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        

        <table class="table table-striped">
            <thead>
                <tr>
                    <th><h1>Historial de Humedades</h1></th>
                    <th><h1><a href="index.html" >Regresar</a></h1></th>
                </tr>
                <tr>
                    <th>ID</th>
                    <th>Ciudad</th>
                    <th>Humedad</th>
                    <th>Fecha y Hora</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($historial as $registro) { ?>
                    <tr>
                        <td><?php echo $registro['id']; ?></td>
                        <td><?php echo $registro['city']; ?></td>
                        <td><?php echo $registro['humidity']; ?></td>
                        <td><?php echo $registro['timestamp']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
