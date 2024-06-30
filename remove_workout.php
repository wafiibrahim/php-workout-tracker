<?php
// Database connection
$connection = mysqli_connect('localhost', 'root', '', 'test');

if ($connection) {
    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST['id'];

        // Delete workout from database
        $sql = "DELETE FROM workouts WHERE id = $id";
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
