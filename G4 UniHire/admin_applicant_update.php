<?php

include("db.php");

header('Content-Type: application/json'); 

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["updateData"])) {
    
    $updatedData = json_decode($_POST["updateData"], true);

    $applicationNo = mysqli_real_escape_string($conn, $updatedData["appno"]);
    $appStatus = mysqli_real_escape_string($conn, $updatedData["appstatus"]);

    $updateSql = "UPDATE tbjobapplication SET 
    appstatus = ?,
    statusdate = NOW()
    WHERE appno = ?";

    $stmt = $conn->prepare($updateSql);
    $stmt->bind_param("ss", $appStatus, $applicationNo);

    if ($stmt->execute()) {
        echo json_encode(array("status" => "success", "message" => "Application status updated successfully"));
    } else {
        echo json_encode(array("status" => "error", "message" => "Error updating record", "error" => $stmt->error));
    }

    $stmt->close();
} else {
    echo json_encode(array("status" => "error", "message" => "Invalid request"));
}

$conn->close();

?>