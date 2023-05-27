<?php

// Función para obtener la humedad de una ciudad utilizando la API de OpenWeatherMap
function getHumidity($city) {
    $apiKey = '8bd59f5b687e4d56f3b491f9e52a661a'; // Reemplaza con tu clave de API de OpenWeatherMap
    $apiUrl = 'http://api.openweathermap.org/data/2.5/weather?q=' . urlencode($city) . '&appid=' . $apiKey;

    // Realizar la solicitud a la API y obtener los datos en formato JSON
    $json = file_get_contents($apiUrl);

    // Decodificar el JSON
    $data = json_decode($json, true);

    // Obtener la humedad si la respuesta es válida
    if ($data && isset($data['main']['humidity'])) {
        $humidity = $data['main']['humidity'];
        return $humidity;
    } else {
        return 'Error al obtener la humedad';
    }
}

// Obtener la ciudad desde el parámetro de la solicitud
$city = $_GET['city'];

// Obtener la humedad de la ciudad correspondiente
$humidity = getHumidity($city);

// Crear un array con la ciudad y la humedad
$result = array($city => $humidity);

// Devolver el resultado como JSON
header('Content-Type: application/json');
echo json_encode($result);

?>
