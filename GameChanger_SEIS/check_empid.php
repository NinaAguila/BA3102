<?php
include 'connection.php';

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $empid = mysqli_real_escape_string($conn, $_POST['empid']);

    // Check in the 'tbempinfo' table
    $checkQueryEmpInfo = "SELECT COUNT(*) AS count FROM tbempinfo WHERE empid = ?";
    $checkStmtEmpInfo = mysqli_prepare($conn, $checkQueryEmpInfo);
    mysqli_stmt_bind_param($checkStmtEmpInfo, "i", $empid);
    mysqli_stmt_execute($checkStmtEmpInfo);
    mysqli_stmt_bind_result($checkStmtEmpInfo, $countEmpInfo);
    mysqli_stmt_fetch($checkStmtEmpInfo);
    mysqli_stmt_close($checkStmtEmpInfo);

    if ($countEmpInfo > 0) {
        // empid exists in the 'tbempinfo' table
        echo 'exists_in_tbempinfo';
    } else {
        // empid does not exist in the 'tbempinfo' table
        echo 'not_exists';
    }
}

mysqli_close($conn);
?>
