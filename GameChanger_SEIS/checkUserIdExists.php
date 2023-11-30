<?php
// Include your database connection file
include 'connection.php'; // Replace with your actual file name

// Check if the user ID is provided
if (isset($_POST['userId'])) {
    $userId = $_POST['userId'];

    // Prepare and execute a query to check if the user ID exists
    $checkUserIdQuery = "SELECT COUNT(*) as count FROM users WHERE userId = ?";
    $stmt = $conn->prepare($checkUserIdQuery);
    $stmt->bind_param("s", $userId);
    $stmt->execute();
    $result = $stmt->get_result();
    $rowCount = $result->fetch_assoc()['count'];

    // Return 'exists' if the user ID exists, 'not exists' otherwise
    echo ($rowCount > 0) ? 'exists' : 'not exists';

    // Close the statement
    $stmt->close();
} else {
    // If userId is not provided in the POST data
    echo 'error';
}

// Close the database connection
$conn->close();
?>
