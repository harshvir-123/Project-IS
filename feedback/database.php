<?php
class Database {
    private $conn;
 
    public function __construct() {
        $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }
 
    public function getMeditationSessions($category = null) {
        $sql = "SELECT * FROM meditation_sessions";
        if ($category) {
            $sql .= " WHERE category = ?";
        }
        $sql .= " ORDER BY created_at DESC";
        
        $stmt = $this->conn->prepare($sql);
        if ($category) {
            $stmt->bind_param("s", $category);
        }
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
 
    public function getMeditationSession($id) {
        $sql = "SELECT * FROM meditation_sessions WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }
 
    public function addMeditationSession($title, $description, $duration, $audioFile, $category) {
        $sql = "INSERT INTO meditation_sessions (title, description, duration, audio_file, category) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssiss", $title, $description, $duration, $audioFile, $category);
        return $stmt->execute();
    }
 
    public function __destruct() {
        $this->conn->close();
    }
    public function submitFeedback($type, $rating, $text) {
        $sql = "INSERT INTO feedback (feedback_type, rating, feedback_text) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sis", $type, $rating, $text);
        return $stmt->execute();
    }
    public function getFeedback() {
        $sql = "SELECT * FROM feedback ORDER BY created_at DESC";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
?>