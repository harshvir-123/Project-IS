<?php
require_once 'config.php';
require_once 'database.php';
 
header('Content-Type: application/json');
 
$db = new Database();
 
$data = json_decode(file_get_contents('php://input'), true);
 
$result = $db->submitFeedback($data['type'], $data['rating'], $data['text']);
 
echo json_encode(['success' => $result]);
