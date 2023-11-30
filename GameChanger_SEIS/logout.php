<?php
session_start();
require_once 'connection.php'; // Include your database connection script.

if (isset($_SESSION["userName"])) {
    // Log the logout event in the database
    $event_type = 'logout';
    $userRole = $_SESSION["userRole"]; // Get the user's role from the session
    $empid = $_SESSION["empid"]; // Get the employee ID from the session

    // Set the time zone to 'Asia/Manila' (Philippine time)
    date_default_timezone_set('Asia/Manila');

    $timestamp = date('Y-m-d H:i:s'); // Adjusted to Philippine time

    // Rest of the code to log the event

    $insert_log_query = "INSERT INTO login_logout_log (username, empid, userRole, event_type, timestamp) VALUES (?, ?, ?, ?, ?)";
    $insert_log_stmt = mysqli_stmt_init($conn);

    if (mysqli_stmt_prepare($insert_log_stmt, $insert_log_query)) {
        mysqli_stmt_bind_param($insert_log_stmt, "sssss", $_SESSION["userName"], $empid, $userRole, $event_type, $timestamp);
        if (mysqli_stmt_execute($insert_log_stmt)) {
            // Query executed successfully
            mysqli_stmt_close($insert_log_stmt); // Close the statement
        } else {
            // Query execution failed
            echo "Error executing query: " . mysqli_error($conn);
        }
    } else {
        // Statement preparation failed
        echo "Error preparing statement: " . mysqli_error($conn);
    }

    // Clear all session variables
    session_unset();

    // Destroy the session
    session_destroy();

    // Close the database connection
    mysqli_close($conn);
}

// Redirect to the login page
header("location: login.php");
exit();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<body>
    
</body>
</html>