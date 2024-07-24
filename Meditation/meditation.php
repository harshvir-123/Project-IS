<?php
require_once 'config.php';
require_once 'Database.php';
 
$db = new Database();
 
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['id'])) {
        echo json_encode($db->getMeditationSession($_GET['id']));
    } else {
        $category = isset($_GET['category']) ? $_GET['category'] : null;
        echo json_encode($db->getMeditationSessions($category));
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    $result = $db->addMeditationSession($data['title'], $data['description'], $data['duration'], $data['audioFile'], $data['category']);
    echo json_encode(['success' => $result]);
}
