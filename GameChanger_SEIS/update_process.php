<?php
session_start();
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Process the form data
    $equipmentId = $_POST['equipmentId'];
    $updateDate = $_POST['updateDate'];
    $originalValue = $_POST['originalValue'];
    $valueToAdd = $_POST['valueToAdd'];

    // Get the current quantity from the addquantity table
    $sqlSelect = "SELECT quantity FROM addquantity WHERE equipmentId = ?";
    $stmtSelect = mysqli_prepare($conn, $sqlSelect);
    mysqli_stmt_bind_param($stmtSelect, 's', $equipmentId);
    mysqli_stmt_execute($stmtSelect);
    mysqli_stmt_bind_result($stmtSelect, $originalQuantity);
    mysqli_stmt_fetch($stmtSelect);
    mysqli_stmt_close($stmtSelect);

    // Check if the session variable 'empid' is set
    if (isset($_SESSION['empid'])) {
        $empid = $_SESSION['empid'];

        // Calculate the new quantity based on the update
        $newQuantity = $originalQuantity + $valueToAdd;

        // Update the quantity in the addquantity table
        $sqlUpdate = "UPDATE addquantity SET quantity = ? WHERE equipmentId = ?";
        $stmtUpdate = mysqli_prepare($conn, $sqlUpdate);
        mysqli_stmt_bind_param($stmtUpdate, 'is', $newQuantity, $equipmentId);
        mysqli_stmt_execute($stmtUpdate);
        mysqli_stmt_close($stmtUpdate);

        // Insert a record into the equipmentupdates table
        $sqlInsert = "INSERT INTO equipmentupdates (equipmentId, updateDate, originalValue, valueToAdd, empid) VALUES (?, ?, ?, ?, ?)";
        $stmtInsert = mysqli_prepare($conn, $sqlInsert);
        mysqli_stmt_bind_param($stmtInsert, 'issis', $equipmentId, $updateDate, $originalValue, $valueToAdd, $empid);
        mysqli_stmt_execute($stmtInsert);
        mysqli_stmt_close($stmtInsert);
    } else {
        echo "Error: Session variable 'empid' is not set.";
    }
}
?>
