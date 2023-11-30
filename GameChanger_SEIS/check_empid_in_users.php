<?php
// Include your database connection file
include('connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['empid'])) {
    $empid = $_POST['empid'];

    // Perform a query to check if empid exists in the users table
    $stmt = mysqli_prepare($conn, "SELECT COUNT(*) FROM users WHERE empid = ?");
    mysqli_stmt_bind_param($stmt, 's', $empid);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $count);
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);

    if ($count > 0) {
        // If empid exists in the users table
        echo 'exists_in_users_table';
    } else {
        // If empid does not exist in the users table
        echo 'not_exists_in_users_table';
    }
} else {
    // If the request method is not POST or empid is not set in the request
    echo 'invalid_request';
}

// Close the database connection
mysqli_close($conn);
?>
