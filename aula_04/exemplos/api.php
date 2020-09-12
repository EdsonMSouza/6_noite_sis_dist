<?php

# envia os dados para API
$array = array("type" => "login");
$json = json_encode($array);
$ch = curl_init('https://www.edsonmelo.com.br/api_rest/user.php');
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Content-Length: ' . strlen($json)));

# recupera os dados retornados da API
$obj = json_decode(curl_exec($ch));

# verifica se ocorreu algum erro na requisição
if ($obj === null && json_last_error() !== JSON_ERROR_NONE) {
    echo json_encode(["Mensagem:" => "Incorrect Request"]);
    die();
}