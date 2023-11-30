<?php
// removeUser.php

// Include the database connection file
include 'connection.php';

// Check if the request is a POST request
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    // Check if the userId parameter is set
    if (isset($_POST["userId"])) {
        $userId = $_POST["userId"];

        // Sanitize the user input (prevent SQL injection)
        $userId = mysqli_real_escape_string($conn, $userId);

        // Perform the user removal (adjust this query based on your database schema)
        $query = "DELETE FROM users WHERE userId = '$userId'";
        $result = mysqli_query($conn, $query);

        if ($result) {
            // Successfully removed the user
            echo "User removed successfully!";
        } else {
            // Failed to remove the user
            echo "Error removing user: " . mysqli_error($conn);
        }
    } else {
        // userId parameter is not set
        echo "User ID parameter is missing.";
    }
} else {
    // Invalid request method
    echo "Invalid request method.";
}

// Close the database connection
mysqli_close($conn);
?>
