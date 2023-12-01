<?php
session_start();
include "db.php";

function validate($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if(isset($_POST['appno']) && isset($_POST['emailadd'])) {
    $applicationNo = validate($_POST['appno']);
    $emailAdd = validate($_POST['emailadd']);

    if(empty($applicationNo)) {
        header("Location: check_status.php?error=Application Number is required");
        exit();
    }
    else if(empty($emailAdd)) {
        header("Location: check_status.php?error=Email Address is required");
        exit();
    }

    $sql = "SELECT * FROM tbjobapplication WHERE appno = ? AND emailadd = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $applicationNo, $emailAdd);
    $stmt->execute();
    $result = $stmt->get_result();

    if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        if($row['appno'] == $applicationNo && $row['emailadd'] == $emailAdd){
            $_SESSION['appno'] = $row['appno'];
            $_SESSION['emailadd'] = $row['emailadd'];
            $_SESSION['successful'] = "Login Successful!";
            echo '<script>alert("Login Successful!"); window.location.href = "applicant_status_view.php";</script>';
            exit();
        }
        else {
            $_SESSION['error_message'] = "Incorrect Application Number or Email";
            header("Location: check_status.php");
            exit();
        }
    }
    else {
        $_SESSION['error_message'] = "Incorrect Application Number or Email";
        header("Location: check_status.php");
        exit();
    }

    $stmt->close();
}

$conn->close();
?>
