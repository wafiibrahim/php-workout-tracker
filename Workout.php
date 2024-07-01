<?php
require_once 'Database.php';

class Workout {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function addWorkout($name, $sets, $reps, $type) {
        $stmt = $this->db->prepare("INSERT INTO workouts (name, sets, reps, type) VALUES (?, ?, ?, ?)");
        $stmt->bind_param('siis', $name, $sets, $reps, $type);
        $stmt->execute();
        $stmt->close();
    }

    public function getWorkouts() {
        $result = $this->db->query("SELECT * FROM workouts");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function removeWorkout($id) {
        $stmt = $this->db->prepare("DELETE FROM workouts WHERE id = ?");
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $stmt->close();
    }
}
