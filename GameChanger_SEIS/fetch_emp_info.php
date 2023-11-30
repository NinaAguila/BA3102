<?php
include 'connection.php';

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $empid = mysqli_real_escape_string($conn, $_POST['empid']);

    // Fetch firstName and lastName from tbempinfo
    $fetchQuery = "SELECT firstName, lastName FROM tbempinfo WHERE empid = ?";
    $fetchStmt = mysqli_prepare($conn, $fetchQuery);
    mysqli_stmt_bind_param($fetchStmt, "i", $empid);
    mysqli_stmt_execute($fetchStmt);
    mysqli_stmt_bind_result($fetchStmt, $firstName, $lastName);
    mysqli_stmt_fetch($fetchStmt);
    mysqli_stmt_close($fetchStmt);

    // Return the result as JSON
    echo json_encode(array('firstName' => $firstName, 'lastName' => $lastName));
}

mysqli_close($conn);
?>
