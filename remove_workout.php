<?php
require_once 'Workout.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];

    $workout = new Workout();
    $workout->removeWorkout($id);

    header("Location: main.php");
    exit();
}
?>
