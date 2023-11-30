<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body{
            background: linear-gradient(to top, rgb(219, 234, 254), rgb(147, 197, 253), rgb(59, 130, 246));
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
            text-align: center;
        }

        th {
            background-color: #023e8a;
            color: white;
            text-align: center;
        }
    </style>
    <title>Employee Records</title>
</head>
<body>

<?php
// Include the database connection file
include('connection.php');

// SQL query to retrieve records from the table
$sql = "SELECT * FROM tbempinfo";
$result = mysqli_query($conn, $sql);

// Display records in a table
echo "<table>
        <tr>
            <th>Employee ID</th>
            <th>Last Name</th>
            <th>First Name</th>
            <th>Department</th>
        </tr>";

if (mysqli_num_rows($result) > 0) {
    // Output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>" . $row["empid"] . "</td>
                <td>" . $row["lastname"] . "</td>
                <td>" . $row["firstname"] . "</td>
                <td>" . $row["department"] . "</td>
            </tr>";
    }
} else {
    echo "<tr><td colspan='4'>No records found</td></tr>";
}

echo "</table>";

// Close the result set
mysqli_free_result($result);

// Close the database connection
mysqli_close($conn);
?>

</body>
</html>
