<?php
// Include your database connection file
include 'connection.php';

// Check if the userName parameter is set in the POST request
if (isset($_POST['userName'])) {
    // Get the userName from the POST data
    $userName = $_POST['userName'];

    // Perform a query to check if the userName exists in the users table
    $query = "SELECT COUNT(*) AS count FROM users WHERE userName = ?";
    $stmt = mysqli_prepare($conn, $query);

    // Bind the parameter
    mysqli_stmt_bind_param($stmt, "s", $userName);

    // Execute the query
    mysqli_stmt_execute($stmt);

    // Bind the result
    mysqli_stmt_bind_result($stmt, $count);

    // Fetch the result
    mysqli_stmt_fetch($stmt);

    // Close the statement
    mysqli_stmt_close($stmt);

    // Check the count of rows with the given userName
    if ($count > 0) {
        // If the userName exists, send a response indicating existence
        echo 'exists_in_users_table';
    } else {
        // If the userName does not exist, send a response indicating non-existence
        echo 'not_exists';
    }
} else {
    // If userName is not set in the POST data, send an error response
    echo 'error';
}

// Close the database connection
mysqli_close($conn);
?>
