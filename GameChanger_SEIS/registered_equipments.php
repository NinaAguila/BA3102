<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registered Equipments</title>
    <style>
        body{
            background: linear-gradient(rgb(219, 234, 254), rgb(147, 197, 253), rgb(59, 130, 246));
        }
        table {
            border-collapse: collapse;
            width: 100%;
            background: linear-gradient(rgb(219, 234, 254), rgb(147, 197, 253), rgb(59, 130, 246));
        }
        th, td {
            border: 1px solid black;
            text-align: left;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #023e8a;
            color: #f2f2f2;
        }
        img {
            max-width: 100px;
            max-height: 100px;
        }
    </style>
</head>
<body>

<div id="tableContainer">

<?php
include("connection.php");

$sql = "SELECT e.*, c.categoryName, l.locationName, CONCAT(lastname, ', ', firstname) AS name
        FROM equipment e
        INNER JOIN equipmentcategories c ON e.equipmentCategoryId = c.categoryId
        INNER JOIN locations l ON e.locationId = l.locationId
        INNER JOIN tbempinfo m ON e.empid = m.empid";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo '<table>';
    echo '<tr>';
    echo '<th>Equipment ID</th>';
    echo '<th>Equipment Name</th>';
    echo '<th>Category Name</th>';
    echo '<th>Brand</th>';
    echo '<th>Description</th>';
    echo '<th>Location Name</th>';
    echo '<th>Employee Id</th>';
    echo '<th>Employee</th>';
    echo '<th>Equipment Image</th>';
    echo '</tr>';

    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $row["equipmentId"] . '</td>';
        echo '<td>' . $row["equipmentName"] . '</td>';
        echo '<td>' . $row["categoryName"] . '</td>';
        echo '<td>' . $row["brand"] . '</td>';
        echo '<td>' . $row["description"] . '</td>';
        echo '<td>' . $row["locationName"] . '</td>';
        echo '<td>' . $row["empid"] . '</td>';
        echo '<td>' . $row["name"] . '</td>';
        echo '<td><img src="' . $row["equipmentImage"] . '" alt="Equipment Image"></td>';
        echo '</tr>';
    }

    echo '</table>';
} else {
    echo "No equipment items found in the database.";
}

$conn->close();
?>


</div>

</body>
</html>
