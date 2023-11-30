<?php
require_once 'connection.php'; // Include your database connection script.

// Query to retrieve login and logout events with user details
$query = "SELECT ll.empid, ll.username, u.empid AS user_empid, u.firstName, u.lastName, ll.userRole, ll.event_type, ll.timestamp 
          FROM login_logout_log ll
          JOIN users u ON ll.username = u.username
          ORDER BY ll.timestamp DESC";


$result = mysqli_query($conn, $query);

// Check for errors in the query execution
if (!$result) {
    die("Error in SQL query: " . mysqli_error($conn));
}
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
            border-radius: 15px;
        }

        body{
            background: white;
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

        .main-content {
            position: relative;
            min-height: 100vh;
            top: 0;
            left: 80px; /* Adjust to match the sidebar width */
            transition: all 0.5s ease;
            width: calc(100% - 80px); /* Adjust to match the sidebar width */
            padding: 1rem;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            border-color: black;
            background: linear-gradient(rgb(219, 234, 254), rgb(147, 197, 253), rgb(59, 130, 246));
        }

        th, td {
            padding: 12px;
            text-align: center;
            border-bottom: 1px solid #ddd; /* Add a bottom border to table cells */
        }

        tr:hover {
            background-color: #f5f5f5; /* Change background color on hover */
        }

        th {
            background-color: black;
            color: #fff;
            background: #023e8a;
           border-color: black;
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

        <br><br><br>
        

        <div>
            <table>
                <tr>
                <th>Employee ID</th>
                    <th>Username</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>User Role</th>
                    <th>Event Type</th>
                    <th>Timestamp</th>
                </tr>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['user_empid'] . "</td>";
                    echo "<td>" . $row['username'] . "</td>";
                    echo "<td>" . $row['firstName'] . "</td>"; // Add this line
                    echo "<td>" . $row['lastName'] . "</td>"; // Add this line
                    echo "<td>" . $row['userRole'] . "</td>";
                    echo "<td>" . $row['event_type'] . "</td>";
                    echo "<td>" . $row['timestamp'] . "</td>";
                    echo "</tr>";
                }
                ?>
            </table>
        </div>
       
    </section>

    <script src="script.js"></script>
</body>
</html>
