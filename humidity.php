<?php


function getHumidity($city) {
    $apiKey = '8bd59f5b687e4d56f3b491f9e52a661a';
    $apiUrl = 'http://api.openweathermap.org/data/2.5/weather?q=' . urlencode($city) . '&appid=' . $apiKey;


    $json = file_get_contents($apiUrl);


    $data = json_decode($json, true);

    if ($data && isset($data['main']['humidity'])) {
        $humidity = $data['main']['humidity'];
        return $humidity;
    } else {
        return 'Error al obtener la humedad';
    }
}


$city = $_GET['city'];

$humidity = getHumidity($city);

$result = array($city => $humidity);

header('Content-Type: application/json');
echo json_encode($result);

?>
