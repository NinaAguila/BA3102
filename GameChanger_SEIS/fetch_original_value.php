<?php
// Include your database connection file
include 'connection.php';

if (isset($_GET['equipmentId'])) {
    $equipmentId = $_GET['equipmentId'];

    // Fetch the original value from the 'addquantity' table
    $sqlSelect = "SELECT quantity FROM addquantity WHERE equipmentId = ?";
    $stmtSelect = mysqli_prepare($conn, $sqlSelect);
    mysqli_stmt_bind_param($stmtSelect, 'i', $equipmentId);
    mysqli_stmt_execute($stmtSelect);
    mysqli_stmt_bind_result($stmtSelect, $originalValue);

    if (mysqli_stmt_fetch($stmtSelect)) {
        // Output the original value as the response to the AJAX request
        echo $originalValue;
    } else {
        // Output a default value or an error message
        echo "Not found";
    }

    mysqli_stmt_close($stmtSelect);
}
?>
