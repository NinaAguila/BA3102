<?php

include("db.php");

header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["appno"])) {
    
    $applicationNo = mysqli_real_escape_string($conn, $_POST["appno"]);

    $sql = "SELECT * FROM tbjobapplication WHERE appno = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("s", $applicationNo);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            echo json_encode($row);
        } else {

            echo json_encode(array("status" => "error", "message" => "Record not found"));
        }


        $stmt->close();
    } else {

        echo json_encode(array("status" => "error", "message" => "Error preparing statement"));
    }
} else {

    echo json_encode(array("status" => "error", "message" => "Invalid request"));
}


$conn->close();

?>
