<?php
// Database connection
$connection = mysqli_connect('localhost', 'root', '', 'test');

if ($connection) {
    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'];
        $sets = $_POST['sets'];
        $reps = $_POST['reps'];
        $type = $_POST['type'];

        // Insert workout into database
        $sql = "INSERT INTO workouts (name, sets, reps, type) VALUES ('$name', '$sets', '$reps', '$type')";
        if (mysqli_query($connection, $sql)) {
            // Redirect to avoid form resubmission
            header("Location: main.php");
            exit();
        } else {
            echo "<p>Error: " . mysqli_error($connection) . "</p>";
        }
    }

    // Close database connection
    mysqli_close($connection);
} else {
    die("Database connection failed");
}
?>
