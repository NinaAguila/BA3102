<?php
// Include your database connection code here
include 'connection.php';

// Function to fetch a list of users
function getUsersList() {
    global $conn;

    // Prepare the SQL statement to retrieve a list of users from the 'users' table
    $sql = "SELECT userId, empid, firstName, lastName, userName, userRole, userImage FROM users";
    
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }

    $users = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $users[] = $row;
    }

    mysqli_free_result($result);

    return $users;
}

$users = getUsersList();
?>
