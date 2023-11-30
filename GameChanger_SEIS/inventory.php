<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sports Equipment Management System</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-family: 'Poppins';
        }
        body{
            background:linear-gradient(rgb(219, 234, 254), rgb(147, 197, 253), rgb(59, 130, 246));
        }

        /* Styling for the first section with a background image */
        .section-1 {
            width: 100%;
            height: 100vh;
            position: relative;
            
        }

        .image {
            width: 100%; /* Set the width to 100% to make the image responsive */
            height: 100%; /* Set the height to 100% to make the image responsive */
            object-fit: cover; /* Maintain aspect ratio and cover the entire container */
            
        }

        .card-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            
        }

        .card {
            width:160x;
            height: 300px;
            border-radius: 25% 10%;
            overflow: hidden;
            border: 6px solid #03045e;
            margin: 30px; /* Add some spacing between cards */
            position: relative;
            transition: 2s;
            box-shadow: 0px 15px 20px rgba(0, 0, 0, 0.2);
            
        }

        .card-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 20% 10%;
            
            
        }

        .card-body {
            width: 100%;
            height: 100%;
            top: 0;
            right: -100%;
            position: absolute;
            background: #1f3d4738;
            backdrop-filter: blur(5px);
            border-radius: 15px;
            color: #fff;
            padding: 10px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            transition: 2s;
        }

        .card-title {
            text-transform: uppercase;
            font-size: 40px;
            font-weight: 300;
            
        }

        .card-subtitle {
            text-transform: capitalize;
            font-size: 20px;
            font-weight: 200;
            
        }

        .info {
            font-size: 14px;
            line-height: 22px;
            margin: 35px 0;
            font-weight: 300;
            
        }

        .card:hover .card-body {
            right: 0;
        }

        .btn{
          width: 100%;
          height: 50px;
          text-align: center;
          color: #fff;
          font-size: 20px;
          text-transform: uppercase;
          text-decoration: none;
          font-family:Arial, Helvetica, sans-serif;
          box-sizing: border-box;
          background: linear-gradient(90deg, rgba(0, 0, 128, 1) 0%, rgba(0, 0, 255, 1) 50%, rgba(135, 206, 250, 1) 100%);
          background-size: 400%;
          
          border: none;
          letter-spacing: 6px;
        }
        .btn:hover{
          animation: animate 8s linear infinite;
        }

        @keyframes animate{
          0%{
            background-position: 0%;
          }
          100%{
            background-position: 400%;
          }
        }


        /* Media query for smaller screens */
        @media (max-width: 769px) {
            header {
                flex-direction: column;
                padding: 15px 0;
            }
            .right-nav {
                margin-top: 10px;
                text-align: center;
            }
        }



        /* Add these styles to your existing CSS */

/* Style for the table */
table {
    width: 100%;
    border-collapse: collapse; /* Combine table borders into a single border */
    margin-top: 20px; /* Add some margin to separate the table from other elements */
}

/* Style for table headers (th) */
th {
    background-color: #023e8a;
    color: #fff;
    border: 1px solid black; /* Border color for th cells */
    padding: 10px;
    font-weight: lighter;
}

/* Style for table cells (td) */
td {
    border: 1px solid black; /* Border color for td cells */
    padding: 10px;
}

/* Hover effect for table rows */
tr:hover {
    background-color: #f5f5f5;
}


.sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            width: 80px;
            background-color: #03045e;
            padding: .4rem .8rem;
            transition: all 0.5s ease;
        }

        .sidebar.active ~ .main-content {
            left: 250px;
            width: calc(100% - 250px);
        }

        .sidebar.active {
            width: 250px;
        }

        .sidebar #btn {
            position: relative;
            color: white;
            top: .4rem;
            left: 50%;
            font-size: 1.5rem;
            line-height: 50px;
            transform: translate(-50%);
            cursor: pointer;
            padding-top: 20px;
        }

        .sidebar.active #btn {
            left: 90%;
        }

        .sidebar .top .logo {
            color: #fff;
            display: flex;
            height: 50px;
            width: 100%;
            align-items: center;
            pointer-events: none;
            opacity: 0;
        }

        .sidebar.active .top .logo {
            opacity: 1;
        }


        .user {
            display: flex;
            align-items: center;
            margin: 1rem 0;
        }

        .user p {
            color: #fff;
            opacity: 1;
            margin-left: 1rem;
            font-size: 14px; /* Adjust the font size as needed */
        }

        .user .role .bold{
            font-weight: 600;
            font-size: 15px;
            color: rgb(255, 255, 255);
        }


        .sidebar p {
            opacity: 0;
        }

        .sidebar.active p {
            opacity: 1;
        }

        .sidebar ul li {
            position: relative;
            list-style-type: none;
            height: 50px;
            width: 90%;
            margin: 0.8rem auto;
            line-height: 50px;
        }

        .sidebar ul li a {
            color: #fff;
            display: flex;
            align-items: center;
            text-decoration: none;
            border-radius: 0.8rem;
        }

        .sidebar ul li a:hover {
            background-color: #caf0f8;
            color: #12171e;
        }

        .sidebar ul li a i {
            min-width: 50px;
            text-align: center;
            height: 50px;
            border-radius: 50%;
            line-height: 50px;
        }

        .sidebar .nav-item {
            opacity: 0;
        }

        .sidebar.active .nav-item {
            opacity: 1;
        }

        .sidebar ul li .tooltip {
            position: absolute;
            left: 125px;
            top: 50%;
            transform: translate(-50%, -50%);
            box-shadow: 0 0.05rem 0.7rem rgba(0, 0, 0, 0.2);
            border-radius: 0.6rem;
            padding: 0.4rem 1.2rem;
            line-height: 1.8rem;
            z-index: 20;
            opacity: 0;
        }

        .sidebar ul li:hover .tooltip {
            opacity: 1;
        }

        .sidebar.active ul li .tooltip {
            display: none;
        }

    </style>
    



</head>

<body>
    <section class="section-1">
    <button type="button" class="btn btn-primary" id="viewToggleButton" onclick="toggleView()">View as List</button>
        

        

    <div id="cardContainer" class="card-container">
    <?php
    include("connection.php"); // Include the database connection file

    // Fetch all equipment items along with empid from the database
    $sql = "SELECT eq.equipmentId, eq.equipmentName, eq.equipmentCategoryId, eq.brand, aq.quantity, eq.description, aq.purchaseDate, aq.equipmentCondition, eq.equipmentImage, ei.empid
        FROM equipment eq
        JOIN addquantity aq ON eq.equipmentId = aq.equipmentId
        JOIN tbempinfo ei ON eq.empid = ei.empid"; // Adjust the join condition based on your actual database schema

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $equipmentId = $row["equipmentId"];
            $equipmentName = $row["equipmentName"];
            $equipmentCategoryId = $row["equipmentCategoryId"];
            $brand = $row["brand"];
            $quantity = $row["quantity"];
            $description = $row["description"];
            $purchaseDate = $row["purchaseDate"];
            $equipmentCondition = $row["equipmentCondition"];
            $equipmentImage = $row["equipmentImage"];
            $empid = $row["empid"]; // New field

            // Fetch the equipment category name from the database
            $sqlCategory = "SELECT categoryName FROM equipmentcategories WHERE categoryId = $equipmentCategoryId";
            $resultCategory = $conn->query($sqlCategory);

            if ($resultCategory->num_rows > 0) {
                $rowCategory = $resultCategory->fetch_assoc();
                $equipmentCategory = $rowCategory["categoryName"];
            }

            // Display each equipment item in a card
            echo '<div class="card">';
            echo '<img src="' . $equipmentImage . '" class="card-img" alt="' . $equipmentName . '">';
            echo '<div class="card-body">';
            echo '<h1 class="card-title">' . $equipmentName . '</h1>';
            echo '<p class="card-subtitle">' . $equipmentCategory . '</p>';
            echo '<p class="info">';
            echo '<strong>Employee ID:</strong> ' . $empid . '<br>';
            echo '<strong>Brand:</strong> ' . $brand . '<br>';
            echo '<strong>Quantity:</strong> ' . $quantity . '<br>';
            echo '<strong>Description:</strong> ' . $description . '<br>';
            echo '<strong>Purchase Date:</strong> ' . $purchaseDate . '<br>';
            echo '<strong>Condition:</strong> ' . $equipmentCondition;
            echo '</p>';
            echo '</div>';
            echo '</div>';
        }
    } else {
        echo "No equipment items found in the database.";
    }

    ?>
</div>




        <div id="tableContainer" style="display: none;">

        <?php
include("connection.php");

$sql = "SELECT eq.equipmentId, eq.equipmentName, eq.equipmentCategoryId, eq.brand, aq.quantity, eq.description, aq.purchaseDate, aq.equipmentCondition, eq.equipmentImage, ei.empid
    FROM equipment eq
    JOIN addquantity aq ON eq.equipmentId = aq.equipmentId
    JOIN tbempinfo ei ON eq.empid = ei.empid"; // Adjust the join condition based on your actual database schema

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo '<table>';
    echo '<tr>';
    echo '<th>Equipment ID</th>';
    echo '<th>Equipment Name</th>';
    echo '<th>Equipment Category</th>'; // Updated header for equipmentCategory
    echo '<th>Brand</th>';
    echo '<th>Quantity</th>';
    echo '<th>Description</th>';
    echo '<th>Purchase Date</th>';
    echo '<th>Equipment Condition</th>';
    echo '<th>Employee ID</th>'; // Added column for empid
    echo '<th>Equipment Image</th>';
    echo '</tr>';

    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $row["equipmentId"] . '</td>';
        echo '<td>' . $row["equipmentName"] . '</td>';

        // Fetch and display equipment category
        $sqlCategory = "SELECT categoryName FROM equipmentcategories WHERE categoryId = " . $row["equipmentCategoryId"];
        $resultCategory = $conn->query($sqlCategory);

        if ($resultCategory->num_rows > 0) {
            $rowCategory = $resultCategory->fetch_assoc();
            $equipmentCategory = $rowCategory["categoryName"];
        } else {
            // Handle the case where the category is not found
            $equipmentCategory = "Unknown Category";
        }

        echo '<td>' . $equipmentCategory . '</td>';

        // Continue with the rest of the columns
        echo '<td>' . $row["brand"] . '</td>';
        echo '<td>' . $row["quantity"] . '</td>';
        echo '<td>' . $row["description"] . '</td>';
        echo '<td>' . $row["purchaseDate"] . '</td>';
        echo '<td>' . $row["equipmentCondition"] . '</td>';
        echo '<td>' . $row["empid"] . '</td>'; // Display empid
        // Display the image using the file path from the database
        echo '<td><img src="' . $row["equipmentImage"] . '" width="100" height="100"></td>';
        echo '</tr>';
    }

    echo '</table>';
} else {
    echo "No equipment items found in the database.";
}

$conn->close();
?>


        </div>

    </section>


    
    <script >
            function toggleView() {
            const cardContainer = document.getElementById("cardContainer");
            const tableContainer = document.getElementById("tableContainer");
            const viewToggleButton = document.getElementById("viewToggleButton");

            if (tableContainer.style.display === "none") {
                // Switch to table view
                cardContainer.style.display = "none";
                tableContainer.style.display = "block";
                viewToggleButton.textContent = "View as Cards";
            } else {
                // Switch back to card view
                cardContainer.style.display = "flex";
                tableContainer.style.display = "none";
                viewToggleButton.textContent = "View as List";
            }
        }

    </script>
</body>
</html>
