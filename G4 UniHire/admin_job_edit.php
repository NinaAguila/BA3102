<?php

include("db.php");

header('Content-Type: application/json'); 

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["jobid"])) {

    $jobId = mysqli_real_escape_string($conn, $_POST["jobid"]);

    
    $sql = "SELECT * FROM tbjobs WHERE jobid = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $jobId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo json_encode($row);
    } else {
        echo json_encode(array("status" => "error", "message" => "Record not found"));
    }
} else {
    echo json_encode(array("status" => "error", "message" => "Invalid request"));
}

$conn->close();
?>



