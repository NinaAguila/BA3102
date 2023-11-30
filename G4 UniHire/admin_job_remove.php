<?php
include("db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['jobid'])) {
    $jobId = mysqli_real_escape_string($conn, $_POST['jobid']);
    
    $delete = mysqli_query($conn, "DELETE FROM tbjobs WHERE jobid = '$jobId'");
    
    if ($delete) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request";
}
?>