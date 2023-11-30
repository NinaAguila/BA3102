<?php
session_start();

// Include your database connection file
include 'connection.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Retrieve form data
    $equipmentId = mysqli_real_escape_string($conn, $_POST['equipmentId']);
    $quantity = mysqli_real_escape_string($conn, $_POST['quantity']);
    $purchaseDate = date('Y-m-d H:i:s', strtotime($_POST['purchaseDate']));
    $equipmentCondition = mysqli_real_escape_string($conn, $_POST['equipmentCondition']);

    // Check if the equipmentId already exists
    $checkQuery = "SELECT * FROM addquantity WHERE equipmentId = ?";
    $checkStmt = mysqli_prepare($conn, $checkQuery);
    mysqli_stmt_bind_param($checkStmt, "s", $equipmentId);
    mysqli_stmt_execute($checkStmt);
    $checkResult = mysqli_stmt_get_result($checkStmt);

    if (mysqli_num_rows($checkResult) > 0) {
        // EquipmentId already exists, show an error message
        echo "Error: Equipment ID '$equipmentId' already exists.";
    } else {
        // EquipmentId does not exist, proceed with the insert
        if (isset($_SESSION['empid'])) {
            $empid = $_SESSION['empid'];

            $insertQuery = "INSERT INTO addquantity (equipmentId, quantity, purchaseDate, equipmentCondition, empid) VALUES (?, ?, ?, ?, ?)";
            $insertStmt = mysqli_prepare($conn, $insertQuery);
            mysqli_stmt_bind_param($insertStmt, "ssssi", $equipmentId, $quantity, $purchaseDate, $equipmentCondition, $empid);

            if (mysqli_stmt_execute($insertStmt)) {
                echo "Record inserted successfully";
            } else {
                echo "Error: Unable to insert record. Please try again later.";
            }
        } else {
            echo "Error: Session variable 'empid' is not set.";
        }
    }

    // Close the statement
    mysqli_stmt_close($checkStmt);
    mysqli_stmt_close($insertStmt);

    // Close the database connection
    mysqli_close($conn);
}
?>
