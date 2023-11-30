<?php
// Include your database connection file
include 'connection.php'; // Replace with your actual file name

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $empid = $_POST['empid'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $userRole = isset($_POST['userRole']) ? $_POST['userRole'] : '';
    $userName = $_POST['userName'];
    $password = $_POST['password'];

    // Check if any of the fields are empty
    if (empty($empid) || empty($firstname) || empty($lastname) || empty($userRole) || empty($userName) || empty($password)) {
        echo "All fields are required.";
    } else {
        // Hash the password (you should use a stronger hashing method)
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Process image upload
        $targetDir = "user_images/"; // Change this to your actual upload directory
        $targetFile = $targetDir . uniqid() . "_" . basename($_FILES["userImage"]["name"]);

        // Check if the image file is a valid image
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
        $validExtensions = ["jpg", "jpeg", "png", "gif"];

        if (in_array($imageFileType, $validExtensions)) {
            // Move the uploaded file to the specified directory
            if (move_uploaded_file($_FILES["userImage"]["tmp_name"], $targetFile)) {
                // Insert data into the users table
                $sql = "INSERT INTO users (empid, firstName, lastName, userRole, userName, passwordHash, userImage) 
                        VALUES (?, ?, ?, ?, ?, ?, ?)";

                // Use prepared statements to prevent SQL injection
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("sssssss", $empid, $firstname, $lastname, $userRole, $userName, $hashedPassword, $targetFile);

                // Execute the statement
                if ($stmt->execute()) {
                    // Successful insertion
                    echo "User added successfully!";
                } else {
                    // Error in insertion
                    echo "Error adding user: " . $stmt->error;
                }

                // Close the statement
                $stmt->close();
            } else {
                // Error moving uploaded file
                echo "Error uploading image.";
            }
        } else {
            // Invalid image file type
            echo "Invalid file type. Please upload a valid image.";
        }
    }
}

// Close the database connection
$conn->close();
?>
