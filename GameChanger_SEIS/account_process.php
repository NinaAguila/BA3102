<?php
// Include your database connection code here
include 'connection.php';

// Function to add a new user account
function addUser($firstName, $lastName, $userName, $userRole, $password, $userImage, $empid) {
    global $conn;

    // Hash the password
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    // Check if the empid already exists
    $sqlCheckEmpid = "SELECT COUNT(*) FROM users WHERE empid = ?";
    $stmtCheckEmpid = mysqli_prepare($conn, $sqlCheckEmpid);

    if (!$stmtCheckEmpid) {
        die("Prepare failed: " . mysqli_error($conn));
    }

    mysqli_stmt_bind_param($stmtCheckEmpid, "i", $empid);
    mysqli_stmt_execute($stmtCheckEmpid);
    mysqli_stmt_bind_result($stmtCheckEmpid, $count);
    mysqli_stmt_fetch($stmtCheckEmpid);
    mysqli_stmt_close($stmtCheckEmpid);

    if ($count > 0) {
        echo "<script>alert('Error: Employee ID $empid already exists. Please use a different Employee ID.');</script>";
        return;
    }

    // Prepare the SQL statement to insert a new user into the 'users' table
    $sql = "INSERT INTO users (firstName, lastName, userName, userRole, passwordHash, userImage, empid) VALUES (?, ?, ?, ?, ?, ?, ?)";
    
    $stmt = mysqli_prepare($conn, $sql);

    if (!$stmt) {
        die("Prepare failed: " . mysqli_error($conn));
    }

    // Bind parameters and execute the statement
    mysqli_stmt_bind_param($stmt, "ssssssi", $firstName, $lastName, $userName, $userRole, $passwordHash, $userImage, $empid);

    if (mysqli_stmt_execute($stmt)) {
        // Insert data into equipmentremovalrequests table
        $insertRequestQuery = "INSERT INTO equipmentremovalrequests (equipmentId, requestDate, removalReason, quantityToRemove, empid)
                              VALUES (?, NOW(), 'User added', 1, ?)";
        $stmtInsertRequest = mysqli_prepare($conn, $insertRequestQuery);
        mysqli_stmt_bind_param($stmtInsertRequest, 'si', $userName, $empid);

        if (mysqli_stmt_execute($stmtInsertRequest)) {
            echo "<script>alert('User added successfully.');</script>";
        } else {
            echo "<script>alert('Error inserting into equipmentremovalrequests: " . mysqli_error($conn) . "');</script>";
        }
    } else {
        echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
    }

    mysqli_stmt_close($stmt);
    mysqli_stmt_close($stmtInsertRequest);
}


// Example usage:
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['addUser'])) {
        // Handle adding a user account
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $userName = $_POST['userName'];
        $userRole = $_POST['userRole'];
        $password = $_POST['password'];

        // File upload handling for user image
        $targetDir = "user_images/";
        $targetFile = $targetDir . basename($_FILES["userImage"]["name"]);
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
        $check = getimagesize($_FILES["userImage"]["tmp_name"]);

        if ($check !== false) {
            $allowedFileTypes = array("jpg", "jpeg", "png", "gif", "webp");

            if (in_array($imageFileType, $allowedFileTypes)) {
                move_uploaded_file($_FILES["userImage"]["tmp_name"], $targetFile);
                $userImage = $targetFile;

                // Call the addUser function with the user image parameter
                addUser($firstName, $lastName, $userName, $userRole, $password, $userImage);
            } else {
                echo "<script>alert('Error: Invalid file type. Allowed types are JPG, JPEG, PNG, GIF, and WEBP.');</script>";
            }
        } else {
            echo "<script>alert('Error: File is not an image.');</script>";
        }
    } elseif (isset($_POST['removeUser'])) {
        // Handle removing a user account
        $userId = $_POST['userId'];

        removeUser($userId);
    }
}

?>