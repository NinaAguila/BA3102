<?php

include("db.php");

function generateJobID($conn) {
    $sql = "SELECT MAX(jobId) AS maxJobId FROM tbjobs";
    $result = $conn->query($sql);

    if ($result === false) {
        die("Error: " . $conn->error);
    }

    $row = $result->fetch_assoc();
    $latestJobID = $row['maxJobId'];

    $numericPart = (int)substr($latestJobID, 2);
    $newNumericPart = $numericPart + 1;

    $newJobID = "JI" . str_pad($newNumericPart, 4, '0', STR_PAD_LEFT);

    return $newJobID;
}
?>
