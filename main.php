<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Workout Tracker</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<div class="container">
    <h1>Workout Tracker</h1>

    <!-- Form to add new workout -->
    <form method="post" action="add_workout.php">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>
        
        <label for="sets">Sets:</label>
        <input type="number" id="sets" name="sets" required><br><br>
        
        <label for="reps">Reps:</label>
        <input type="number" id="reps" name="reps" required><br><br>
        
        <label for="type">Type:</label>
        <input type="text" id="type" name="type" required><br><br>
        
        <button type="submit">Add Workout</button>
    </form>

    <?php
    // Database connection
    $connection = mysqli_connect('localhost', 'root', '', 'test');

    if ($connection) {
        // Retrieve workouts from database
        $sql = "SELECT * FROM workouts";
        $result = mysqli_query($connection, $sql);
        $results = mysqli_fetch_all($result, MYSQLI_ASSOC);

        // Display workouts
        if ($results) {
            echo "<h2>Workouts</h2>";
            echo "<table border='1'>
                    <tr>
                        <th>Name</th>
                        <th>Sets</th>
                        <th>Reps</th>
                        <th>Type</th>
                        <th>Action</th>
                    </tr>";
            foreach ($results as $workout) {
                echo "<tr>
                        <td>{$workout['Name']}</td>
                        <td>{$workout['Sets']}</td>
                        <td>{$workout['Reps']}</td>
                        <td>{$workout['Type']}</td>
                        <td>
                            <form method='post' action='remove_workout.php' style='display:inline;'>
                                <input type='hidden' name='id' value='{$workout['ID']}'>
                                <button type='submit'>Remove</button>
                            </form>
                        </td>
                      </tr>";
            }
            echo "</table>";
        } else {
            echo "<p>No workouts found.</p>";
        }

        // Close database connection
        mysqli_close($connection);
    } else {
        die("Database connection failed");
    }
    ?>
    </div>
</body>
</html>
