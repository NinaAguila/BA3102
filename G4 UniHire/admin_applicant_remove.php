<?php
include("db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['appno'])) {
    $applicationNo = mysqli_real_escape_string($conn, $_POST['appno']);
    

    $delete = mysqli_query($conn, "DELETE FROM tbjobapplication WHERE appno = '$applicationNo'");
    
    if ($delete) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request";
}
?>