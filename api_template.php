<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

$data = json_decode(file_get_contents('php://input'), true);

$response = array(
  'received_instructions' => $data['instructions'],
  'received_command' => $data['command']
);

echo json_encode($response);
?>