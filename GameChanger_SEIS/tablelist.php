<!DOCTYPE html>
<html>
<head>
<style>
table, th, td {
  border: 1px solid #ddd;
  border-collapse: collapse;
  padding: 10px;
  text-align: left;
}
</style>
</head>
<body>

<?php
include("/wamp64/www/SEIS/connection.php"); // Include the database connection file

// Fetch all equipment items from the database
$sql = "SELECT equipmentId, equipmentName, equipmentCategoryId, brand, quantity, description, purchaseDate, equipmentCondition, equipmentImage FROM equipment";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo '<table>';
    echo '<tr>';
    echo '<th>equipmentId</th>';
    echo '<th>equipmentName</th>';
    echo '<th>equipmentCategoryId</th>';
    echo '<th>brand</th>';
    echo '<th>quantity</th>';
    echo '<th>description</th>';
    echo '<th>purchaseDate</th>';
    echo '<th>equipmentCondition</th>';
    echo '<th>equipmentImage</th>';
    echo '</tr>';

    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $row["equipmentId"] . '</td>';
        echo '<td>' . $row["equipmentName"] . '</td>';
        echo '<td>' . $row["equipmentCategoryId"] . '</td>';
        echo '<td>' . $row["brand"] . '</td>';
        echo '<td>' . $row["quantity"] . '</td>';
        echo '<td>' . $row["description"] . '</td>';
        echo '<td>' . $row["purchaseDate"] . '</td>';
        echo '<td>' . $row["equipmentCondition"] . '</td>';
        echo '<td>' . $row["equipmentImage"] . '</td>';
        echo '</tr>';
    }

    echo '</table>';
} else {
    echo "No equipment items found in the database.";
}
?>


</body>
</html>
