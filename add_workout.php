<?php
require_once 'Workout.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $sets = $_POST['sets'];
    $reps = $_POST['reps'];
    $type = $_POST['type'];

    $workout = new Workout();
    $workout->addWorkout($name, $sets, $reps, $type);

    header("Location: main.php");
    exit();
}
?>
