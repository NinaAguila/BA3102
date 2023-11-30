<?php
// Include the connection.php file
include('connection.php');
?>

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
        /* Reset default styles and set font family */
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-family: 'Poppins';
        }

        /* Styling for the first section with a background image */
        .section-1 {
            width: 100%;
            height: 100vh;
            position: relative;
        }

        body{
            background: #0047ab;
        }

        /* Styling for the header/navigation bar */
        header {
            position: absolute;
            top: 0;
            width: 100%;
            background-color: #03045e;
            z-index: 2;
            display: flex;
            justify-content: flex-end;
            transition: 500ms;
            box-shadow: 0px 15px 20px rgba(0, 0, 0, 0.2);
            border-radius: 25px;
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
            color: #03045e;
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

        .main-content {
            position: relative;
            min-height: 100vh;
            top: 0;
            left: 80px; /* Adjust to match the sidebar width */
            transition: all 0.5s ease;
            width: calc(100% - 80px); /* Adjust to match the sidebar width */
            padding: 1rem;
        }

        .content{
            position: relative;
            min-height: 90vh;

            
        }
        .content .cards{
            padding: 20px 15px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            
            
        }

        .content .cards .card{
            width: 325px;
            height: 150px;
            background: linear-gradient(to right bottom, rgb(219, 234, 254), rgb(147, 197, 253), rgb(59, 130, 246));
            display: flex;
            align-items: center;
            justify-content: space-around;
            /*box-shadow: ;*/
            box-shadow: 0px 15px 20px rgba(0, 0, 0, 0.2);
            border-radius: 25px;
        }

        .content .content-2{
            min-height: 60vh;
            display: flex;
            justify-content: space-around;
            align-items: flex-start;
            flex-wrap: wrap;
        }

        .content-2 .equipments {
        min-height: 65vh;
        flex: 5;
        background: linear-gradient(rgb(219, 234, 254), rgb(147, 197, 253), rgb(59, 130, 246));
        margin: 0 25px 25px 25px;
        overflow: auto; /* Add overflow to enable scrolling if the content is too large */
        padding: 20px; /* Add padding for better spacing */
        box-shadow: 0px 15px 20px rgba(0, 0, 0, 0.2);
        border-radius: 25px;
    }

    .content-2 table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px; /* Add margin for separation from the cards */
    }

    .content-2 table, .content-2 th, .content-2 td {
        border: 1px solid black;
    }

    .content-2 th, .content-2 td {
        padding: 10px;
        text-align: left;
    }

    .icon-case i {
            font-size: 4.5em; /* Adjust the font size as needed */
            color: #03045e;
        }

        h1{
            font-size: 50px;
            color: #02023e;
        }
        h3{
            font-size: 20px;
            color: #023e8a;
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
    
<br><br><br>
        <header>            
            <nav class="right-nav">
                <a href="index.php" class="active">Home</a>
                <a href="#">Contact</a>
                <a href="#" onclick="confirmLogout()">Logout</a>

            </nav>
                    <!-- SweetAlert2 JS -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script>
        function confirmLogout() {
            Swal.fire({
                title: 'Are you sure?',
                text: 'You will be logged out!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, logout!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    // If the user confirms, follow the link to logout.php
                    window.location.href = 'logout.php';
                }
            });
        }
        </script>
        </header>

        <div class="content">
        <div class="cards">
            <!-- Insert PHP code to fetch and display the number of categories from tbl categories -->
            <?php
            $result = mysqli_query($conn, "SELECT COUNT(*) as count FROM equipmentcategories");
            $row = mysqli_fetch_assoc($result);
            $categoryCount = $row['count'];

            echo '<div class="card">
                    <div class="box">
                        <h1>' . $categoryCount . '</h1>
                        <h3>Categories</h3>
                    </div>
                    <div class="icon-case">
                    <i class="bx bx-category"></i>
                    </div>
                </div>';
            ?>

            <!-- Insert PHP code to fetch and display the number of locations from tbl locations -->
            <?php
            $result = mysqli_query($conn, "SELECT COUNT(*) as count FROM locations");
            $row = mysqli_fetch_assoc($result);
            $locationCount = $row['count'];

            echo '<div class="card">
                    <div class="box">
                        <h1>' . $locationCount . '</h1>
                        <h3>Locations</h3>
                    </div>
                    <div class="icon-case">
                    <i class="bx bx-location-plus"></i>
                    </div>
                </div>';
            ?>

            <!-- Insert PHP code to fetch and display the number of equipments from tbl equipments -->
            <?php
            $result = mysqli_query($conn, "SELECT COUNT(*) as count FROM equipment");
            $row = mysqli_fetch_assoc($result);
            $equipmentCount = $row['count'];

            echo '<div class="card">
                    <div class="box">
                        <h1>' . $equipmentCount . '</h1>
                        <h3> Registered</h3>
                    </div>
                    <div class="icon-case">
                    <i class="bx bx-basketball"></i>
                    </div>
                </div>';
            ?>

            <!-- Insert PHP code to fetch and display the number of users from tbl users -->
            <?php
            $result = mysqli_query($conn, "SELECT COUNT(*) as count FROM users");
            $row = mysqli_fetch_assoc($result);
            $userCount = $row['count'];

            echo '<div class="card">
                    <div class="box">
                        <h1>' . $userCount . '</h1>
                        <h3>Users</h3>
                    </div>
                    <div class="icon-case">
                    <i class="bx bx-user"></i>
                    </div>
                </div>';
            ?>
        </div>

        <div class="content-2">

    <div class="equipments">
        <!-- Insert PHP code to fetch and display the list of equipments from table equipments -->
        <?php
$equipmentResult = mysqli_query($conn, "SELECT 
    e.equipmentName,
    ec.categoryName,
    e.brand,
    a.quantity,
    e.description,
    a.purchaseDate,
    a.equipmentCondition,
    l.locationName,
    ei.empid
    FROM equipment e
    JOIN equipmentcategories ec ON e.equipmentCategoryId = ec.categoryID
    JOIN locations l ON e.locationId = l.locationID
    JOIN addquantity a ON e.equipmentId = a.equipmentId
    JOIN tbempinfo ei ON e.empid = ei.empid"); // Adjust the join condition based on your actual database schema

echo '<table border="1">';
echo '<tr>
        <th>Equipment Name</th>
        <th>Category</th>
        <th>Brand</th>
        <th>Quantity</th>
        <th>Description</th>
        <th>Purchase Date</th>
        <th>Condition</th>
        <th>Location</th>
        <th>Employee ID</th> <!-- New column for empid -->
        <!-- Add more table headers as needed -->
      </tr>';

while ($equipmentRow = mysqli_fetch_assoc($equipmentResult)) {
    // Output each equipment data in a table row
    echo '<tr>';
    echo '<td>' . $equipmentRow['equipmentName'] . '</td>';
    echo '<td>' . $equipmentRow['categoryName'] . '</td>';
    echo '<td>' . $equipmentRow['brand'] . '</td>';
    echo '<td>' . $equipmentRow['quantity'] . '</td>';
    echo '<td>' . $equipmentRow['description'] . '</td>';
    echo '<td>' . $equipmentRow['purchaseDate'] . '</td>';
    echo '<td>' . $equipmentRow['equipmentCondition'] . '</td>';
    echo '<td>' . $equipmentRow['locationName'] . '</td>';
    echo '<td>' . $equipmentRow['empid'] . '</td>'; // Display empid
    // Add more table cells as needed

    echo '</tr>';
}

echo '</table>';
?>


    </div>
</div>
</section>


    <script>
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