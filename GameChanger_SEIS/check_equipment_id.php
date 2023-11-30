<?php
include 'connection.php';

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $equipmentId = mysqli_real_escape_string($conn, $_POST['equipmentId']);

    // Check in the 'addquantity' table first
    $checkQueryAddQuantity = "SELECT COUNT(*) AS count FROM addquantity WHERE equipmentId = ?";
    $checkStmtAddQuantity = mysqli_prepare($conn, $checkQueryAddQuantity);
    mysqli_stmt_bind_param($checkStmtAddQuantity, "i", $equipmentId);
    mysqli_stmt_execute($checkStmtAddQuantity);
    mysqli_stmt_bind_result($checkStmtAddQuantity, $countAddQuantity);
    mysqli_stmt_fetch($checkStmtAddQuantity);
    mysqli_stmt_close($checkStmtAddQuantity);

    // Check in the 'equipment' table if not found in 'addquantity'
    if ($countAddQuantity > 0) {
        // Equipment ID exists in the 'addquantity' table
        echo 'exists_in_addquantity';
    } else {
        $checkQueryEquipment = "SELECT COUNT(*) AS count FROM equipment WHERE equipmentId = ?";
        $checkStmtEquipment = mysqli_prepare($conn, $checkQueryEquipment);
        mysqli_stmt_bind_param($checkStmtEquipment, "i", $equipmentId);
        mysqli_stmt_execute($checkStmtEquipment);
        mysqli_stmt_bind_result($checkStmtEquipment, $countEquipment);
        mysqli_stmt_fetch($checkStmtEquipment);
        mysqli_stmt_close($checkStmtEquipment);

        if ($countEquipment > 0) {
            // Equipment ID exists in the 'equipment' table
            echo 'exists_in_equipment';
        } else {
            // Equipment ID does not exist in either table
            echo 'not_exists';
        }
    }
}

mysqli_close($conn);
?>
