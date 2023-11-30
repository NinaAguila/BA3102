<?php
session_start();
include "db.php";

function validate($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = validate($_POST['username']);
    $password = validate($_POST['password']);

    if (empty($username)) {
        header("Location: admin_login_page.php?error=Email is required");
        exit();
    } elseif (empty($password)) {
        header("Location: admin_login_page.php?error=Password is required");
        exit();
    }

    $sql = "SELECT * FROM tbhrstaff WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $dbPassword = $row['password'];

        if ($password == $dbPassword) {
            $_SESSION['username'] = $row['username'];
            $_SESSION['successful'] = "Login Successful!";
            header("Location: admin_home_page.php");
            exit();
        } else {
            $_SESSION['error_message'] = "Incorrect Email or Password";
            header("Location: admin_login_page.php");
            exit();
        }
        
    } else {
        $_SESSION['error_message'] = "Incorrect Email or Password";
        header("Location: admin_login_page.php");
        exit();
    }

    $stmt->close();
    $conn->close();
}
?>
