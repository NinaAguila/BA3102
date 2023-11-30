<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sports Equipment Management System</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <link rel="stylesheet" href="style.css">

    
    <style>
        /* Reset default styles and set font family */
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-family: sans-serif;
        }

        /* Styling for the first section with a background image */
        .section-1 {
            width: 100%;
            height: 100vh;
            position: relative;
            background-color: #c8abae;
        }

        /* Styling for the header/navigation bar */
        header {
            position: absolute;
            top: 0;
            width: 100%;
            
            z-index: 2;
            display: flex;
            justify-content: flex-end;
            transition: 500ms;
        }

        body{
          background-color: #c8abae;
        }
        
        .right-nav {
            display: flex;
            align-items: center;
            padding: 30px;
        }

        /* Styling for the navigation links */
        .right-nav a {
            text-decoration: none;
            color: #eee;
            text-transform: uppercase;
            margin-left: 20px;
            transition: color 0.2s;
        }

        .right-nav a:hover {
            color: #5c050e;
        }

        /* Additional styling to maintain header layout */
        .logo {
            font-size: 30px;
            color: #fff;
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
            border: 6px double #5c050e;
            
            margin: 30px; /* Add some spacing between cards */
            position: relative;
            transition: 2s;
            
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
            font-size: 35px;
            font-weight: 300;
        }

        .card-subtitle {
            text-transform: capitalize;
            font-size: 10px;
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
          background: linear-gradient(90deg, rgba(92,5,14,1) 0%, rgba(128,0,0,1) 50%, rgba(146,88,94,1) 100%);
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
    </style>

</head>

<body>
    <section class="section-1">
        <header>            
            <nav class="right-nav">
                <a href="index.php" class="active">Home</a>
                <a href="">Contact</a>
                <a href="logout.php">Logout</a>
    
            </nav>
            
        </header>
        <br><br><br>
        
        <br><br>
        
        <button type="button" class="btn btn-primary" id="viewToggleButton" onclick="toggleView()">View as List</button>
        

        

        <div id="cardContainer" class="card-container">
        <?php
        include("/wamp64/www/SEIS/connection.php"); // Include the database connection file

        // Fetch all equipment items from the database
        $sql = "SELECT equipmentId, equipmentName, equipmentCategoryId, brand, quantity, description, purchaseDate, equipmentCondition, equipmentImage FROM equipment";
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
            // Your PHP code for displaying the table
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
        </div>

       <br><br>
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
