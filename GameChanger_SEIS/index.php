<?php
session_start();
include 'connection.php';


if (!isset($_SESSION["userName"]) || !isset($_SESSION["userRole"])) {
    // Redirect to the login page if the user is not logged in
    header("location: login.php");
    exit();
}

$userRole = $_SESSION["userRole"];

// Define functions to get user-specific logo and name
function getUserLogo($userName) {
    global $conn;

    $query = "SELECT userImage FROM users WHERE userName = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $userName);
    $stmt->execute();
    $stmt->bind_result($userImage);

    if ($stmt->fetch()) {
        return $userImage;
    } else {
        return "user_images/default_image.jpg"; // Provide a default image path if needed
    }
}

function getUserName($userName) {
    global $conn;

    $query = "SELECT firstName, lastName FROM users WHERE userName = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $userName);
    $stmt->execute();
    $stmt->bind_result($firstName, $lastName);

    if ($stmt->fetch()) {
        return $firstName . " " . $lastName;
    } else {
        return "Guest";
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sports Equipment Management System</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>




    <link rel="stylesheet" href="style.css">


    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');
        /* Reset default styles and set font family */
        *{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-family: 'Poppins';
        }

        /* Styling for the first section with a background image */
        .section-1 {
            width: 100%;
            height: 100vh;
        }

         /* Styling for the header/navigation bar */
            header {
            position: relative;
            top: 0;
            width: 100%;           
            background-color: #023e8a;
            transition: 500ms; /* Transition effect for smooth changes */
            z-index: 2; /* Ensure the header is above section-1 */
            display: flex;
            justify-content: flex-end; /* Align navigation links to the right */
            box-shadow: 0px 15px 20px rgba(0, 0, 0, 0.2);
            border-radius: 15px;
        }

        /* Styling for the navigation links on the right side */
        .right-nav {
            display: flex;
            align-items: center;
            padding: 30px;
        }

        .right-nav a {
            text-decoration: none;
            font-family: sans-serif;
            color: #eee;
            text-transform: uppercase;
            margin-left: 20px; /* Add spacing between links */
            transition: 200ms; /* Transition effect for link hover */
        }

        .right-nav a:hover {
            border-bottom: 3px solid #03045e; /* Link hover style */
        }

        /* Additional styling to maintain header layout */
        .bgc {
            background: #eee;
            padding: 10px;
        }
        .bgc .logo {
            font-size: 30px;
            color: #000;
        }
        .bgc .right-nav a {
            color: #222;
        }

        /* Media query for smaller screens */
        @media (max-width: 769px) {
            .right-nav {
                padding: 15px;
            }
            .right-nav a {
                margin-left: 10px; /* Adjust spacing for smaller screens */
            }
        }


        /* Target the user's logo specifically */
        .user .logo {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            border: 1px solid #fff;
        }

        .title{
            font-size: 21px;
            padding-top: 40px;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            padding-left: 10px;
            transition: opacity 0.3s;
        }

        .i{
            width: 50px;
            float: left;
            padding-top: 40px;
        }

        .top{
            align-items: center;
        }

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            width: 80px;
            background: #03045e;
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

        /* Existing styles for .main-content */
        .main-content {
            position: relative;
            min-height: 100vh;
            top: 0;
            left: 80px; /* Adjust to match the sidebar width */
            transition: all 0.5s ease;
            width: calc(100% - 80px); /* Adjust to match the sidebar width */
            padding: 1rem;
            /* Remove or update the background properties here */
            
        }

        .lorem{
            font-size: xx-large;
        }

        .home{
            display: flex;
            height: 85vh;
            justify-content: center;
            align-items: center;
            background-image: url(login_home_img/sports\ equipment\ inventory\ system_home.gif);
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
    
            transition: all 0.5s ease;
            width: 100%; /* Adjust to match the sidebar width */
            padding: 1rem;
            border-radius: 10px;
        }


    </style>

</head>

<body>

<div class="sidebar">
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    
    <!-- Sidebar content goes here -->
    <div class="top">
        <div class="logo">
            <img class="i" src="images/bsulogo.png" alt="">
            <p class="title">Sports Equipment Inventory System</p>
        </div>
        <i class="bx bx-menu" id="btn"></i>
    </div>

    <div class="user">
    <?php
    $userName = $_SESSION["userName"];
    $userLogo = getUserLogo($userName);
    $userName = getUserName($userName);
    ?>
    <img src="<?php echo $userLogo; ?>" alt="me" class="logo">
    <div class="role">
        <p><?php echo $userName; ?></p>
        <p class="bold"><?php echo strtoupper($_SESSION["userRole"]); ?></p>
    </div>
</div>




    <ul>
        <li id="dashboard">
            <a >
                <i class="bx bxs-dashboard"></i>
                <span class="nav-item">Dashboard</span>
            </a>
            <span class="tooltip">Dashboard</span>
        </li>

        <li id="inventory">
            <a>
                <i class="bx bx-archive"></i>
                <span class="nav-item">Inventory</span>
            </a>
            <span class="tooltip">Inventory</span>
        </li>

        <li id="registeredV2">
            <a>
                <i class="bx bxs-customize"></i>
                <span class="nav-item">Registered</span>
            </a>
            <span class="tooltip">Registered</span>
        </li>


        <?php
        if ($userRole === "admin") {
            
            // Admin can access all functions
            echo '
           
            <li id="registrationMenuItem">
            <a>
                <i class="bx bx-registered"></i>
                <span class="nav-item">Registration</span>
            </a>
            <span class="tooltip">Registration</span>
        </li>

        <li id="addV2">
            <a>
                <i class="bx bx-message-add"></i>
                <span class="nav-item">Stock in</span>
            </a>
            <span class="tooltip">Stock in</span>
        </li>
            
                <li id="account">
                   <a>
                        <i class="bx bx-user"></i>
                        <span class="nav-item">Account</span>
                    </a>
                    <span class="tooltip">Account</span>
                </li>

                <li id="employeesV2">
                   <a>
                        <i class="bx bx-male-female"></i>
                        <span class="nav-item">Employees</span>
                    </a>
                    <span class="tooltip">Employees</span>
                </li>

                <li>
                    <a href="login_logout_history.php">
                        <i class="bx bx-user-pin"></i>
                        <span class="nav-item">User Login</span>
                    </a>
                    <span class="tooltip">User Login</span>
                </li>

            <li>
                    <a href="aboutus.php">
                        <i class="bx bx-question-mark"></i>
                        <span class="nav-item">About Us</span>
                    </a>
                    <span class="tooltip">User Login</span>
                </li>


            ';
        } elseif ($userRole === "equipment adder") {
            // Equipment Adder can access specific functions
            echo '
                <li id="updateV2">
                    <a>
                        <i class="bx bx-menu-alt-left"></i>
                        <span class="nav-item">Update</span>
                    </a>
                    <span class="tooltip">Update</span>
                </li>

            ';
        } elseif ($userRole === "equipment remover") {
            // Equipment Remover can access specific functions
            echo '
                <li id="remove">
                    <a>
                        <i class="bx bx-trash"></i>
                        <span class="nav-item">Removal</span>
                    </a>
                    <span class="tooltip">Removal Request</span>
                </li>

                <li id="archive">
                    <a>
                        <i class="bx bx-trash"></i>
                        <span class="nav-item">Archived</span>
                    </a>
                    <span class="tooltip">Removal Request</span>
                </li>
            ';
        }
        ?>
    </ul>
</div>

    <div class="main-content">
    <section class="section-1">
    <header>
    <nav class="right-nav">
        <a href="index.php" class="active">Home</a>
        <a href="#" onclick="showContactImage()">Contact</a>
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

        function showContactImage() {
            Swal.fire({
                imageUrl: 'about_us_img/contacts.png',
                imageHeight: 1500,
                imageAlt: 'A tall image'
            });
        }
    </script>
</header>

        <br>
        <div class="home">

        
       
        </div>

    </section> 

    
    </div>
    <!-- JavaScript to handle the click event and load registration.php content -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
    $(document).ready(function() {
        function loadContent(url) {
            $.ajax({
                url: url,
                type: "GET",
                success: function(data) {
                    $(".main-content").html(data);
                },
                error: function() {
                    alert("Error loading content.");
                }
            });
        }

        $("#registrationMenuItem").click(function() {
            loadContent("registration.php");
        });

        $("#updateV2").click(function() {
            loadContent("updateV2.php");
        });

        $("#dashboard").click(function() {
            loadContent("dashboard.php");
        });

        $("#inventory").click(function() {
            loadContent("inventory.php");
        });

        $("#account").click(function() {
            loadContent("account2.php");
        });

        $("#remove").click(function() {
            loadContent("removal_request.php");
        });

        $("#archive").click(function() {
            loadContent("archive.php");
        });

        $("#addV2").click(function() {
            loadContent("add_quantity.php");
        });

        $("#registeredV2").click(function() {
            loadContent("registered_equipments.php");
        });

        $("#employeesV2").click(function() {
            loadContent("employees.php");
        });
    });
</script>



    <script src="script.js"></script>
    <script>
        $(document).ready(function(){
    $(window).on('scroll', function(){
        if ($(window).scrollTop()) {
            $("header").addClass('bgc'); // Add 'bgc' class to header on scroll
        } else {
            $("header").removeClass('bgc'); // Remove 'bgc' class from header when not scrolled
                }
            });
        });
    </script>
</body>
</html>
