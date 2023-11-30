<?php

include("db.php");

header('Content-Type: application/json'); // Set the content type to JSON

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["updateData"])) {
    $updatedData = json_decode($_POST["updateData"], true);

    $jobTitle = mysqli_real_escape_string($conn, $updatedData["jobtitle"]);
    $deptName = mysqli_real_escape_string($conn, $updatedData["departmentname"]);
    $quantity = mysqli_real_escape_string($conn, $updatedData["quantity"]);
    $education = mysqli_real_escape_string($conn, $updatedData["education"]);
    $experience = mysqli_real_escape_string($conn, $updatedData["experience"]);
    $expertise = mysqli_real_escape_string($conn, $updatedData["expertise"]);
    $competency = mysqli_real_escape_string($conn, $updatedData["competency"]);
    $eligibility = mysqli_real_escape_string($conn, $updatedData["eligibility"]);
    $dutiesAndResponsibilities = mysqli_real_escape_string($conn, $updatedData["dutres"]);
    $hiringStatus = mysqli_real_escape_string($conn, $updatedData["hiringstatus"]);

    $updateSql = "UPDATE tbjobs SET 
        jobtitle = ?,
        departmentname = ?,
        quantity = ?,
        education = ?,
        experience = ?,
        expertise = ?,
        competency = ?,
        eligibility = ?,
        dutres = ?,
        hiringstatus = ?
        WHERE jobid = ?";

    $stmt = $conn->prepare($updateSql);
    $jobId = mysqli_real_escape_string($conn, $updatedData["jobid"]);
    $stmt->bind_param("sssssssssss", $jobTitle, $deptName, $quantity, $education, $experience, $expertise, $competency, $eligibility, $dutiesAndResponsibilities, $hiringStatus, $jobId);

    if ($stmt->execute()) {
        echo json_encode(array("status" => "success", "message" => "Record updated successfully"));
    } else {
        echo json_encode(array("status" => "error", "message" => "Error updating record: " . $stmt->error));
    }

    $stmt->close();
} else {
    echo json_encode(array("status" => "error", "message" => "Invalid request"));
}

$conn->close();
?>

