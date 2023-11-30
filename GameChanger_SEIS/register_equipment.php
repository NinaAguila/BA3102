<?php
session_start();
include 'connection.php';

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$equipmentName = mysqli_real_escape_string($conn, $_POST['equipmentName']);
$equipmentCategoryId = mysqli_real_escape_string($conn, $_POST['equipmentCategoryId']);
$brand = mysqli_real_escape_string($conn, $_POST['brand']);
$description = mysqli_real_escape_string($conn, $_POST['description']);
$locationId = mysqli_real_escape_string($conn, $_POST['locationId']);

$targetDir = "images/";
$targetFile = $targetDir . basename($_FILES["equipmentImage"]["name"]);
$imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

$check = getimagesize($_FILES["equipmentImage"]["tmp_name"]);

if ($check !== false) {
    $allowedFileTypes = array("jpg", "jpeg", "png", "gif", "webp");

    if (in_array($imageFileType, $allowedFileTypes)) {
        move_uploaded_file($_FILES["equipmentImage"]["tmp_name"], $targetFile);
        $imagePath = $targetFile;

        $sql = "INSERT INTO equipment (equipmentName, equipmentCategoryId, brand, description, locationId, equipmentImage, empid) 
                VALUES (?, ?, ?, ?, ?, ?, ?)";

        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "sississ", $equipmentName, $equipmentCategoryId, $brand, $description, $locationId, $imagePath, $_SESSION['empid']);

        if (mysqli_stmt_execute($stmt)) {
            echo '<script>alert("Equipment registered successfully!");</script>';
        } else {
            // Log the error instead of exposing it
            echo '<script>alert("Error registering equipment. ' . $conn->error . '");</script>';
        }
    }
}

mysqli_close($conn);
?>
