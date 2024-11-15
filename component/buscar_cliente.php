<?php
header('Content-Type: application/json');

// Capturar el DNI desde la solicitud POST
$dni = $_POST['dni'];

// Token de autorización para la API
$token = 'apis-token-9266.OUsDbIHQtZ7NGkzuREN84o3SSrs7fBUP';

// URL de la API para búsquedas por DNI
$url = 'https://api.apis.net.pe/v2/reniec/dni?numero=' . $dni;

// Configuración de cURL para realizar la solicitud
$curl = curl_init();
curl_setopt_array($curl, array(
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_SSL_VERIFYPEER => 0, // No verificar el certificado SSL
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_CUSTOMREQUEST => 'GET',
    CURLOPT_HTTPHEADER => array(
        'Referer: http://apis.net.pe/api-ruc',
        'Authorization: Bearer ' . $token
    ),
));

$response = curl_exec($curl);
curl_close($curl);

$data = json_decode($response, true);

if (isset($data['nombres']) && isset($data['apellidoPaterno']) && isset($data['apellidoMaterno'])) {
    $result = [
        'success' => true,
        'nombres' => $data['nombres'],
        'apellidoPaterno' => $data['apellidoPaterno'],
        'apellidoMaterno' => $data['apellidoMaterno']
    ];
} else {
    $result = [
        'success' => false,
        'message' => 'No se encontraron datos para el DNI proporcionado.'
    ];
}

// Devolver la respuesta como JSON
echo json_encode($result);
