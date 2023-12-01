<?php
session_start();
include "db.php";

if(isset($_SESSION['username'])) {
    if (isset($_SESSION['successful'])) {
        echo '<script>alert("' . $_SESSION['successful'] . '");</script>';
        unset($_SESSION['successful']);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Homepage</title>
    <link rel="icon" href="https://batstate-u.edu.ph/wp-content/uploads/2022/05/BatStateU-NEU-Logo.png" type="image/x-icon">


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Aclonica">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> 
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        html, body {
            margin: 0;
            padding: 0;
            background: url('https://batstate-u.edu.ph/wp-content/uploads/2020/10/lipa-slider-1-scaled.jpg');
            background-size: cover;  
            background-position: center;  
            height: 100%;
            opacity: 0.9;
            background-attachment: fixed;
        }

        header {
            background-color: #ffffff;
            color: #fff;
            text-align: left;
            margin-top: 20px;
        }

        h1 {
            margin: 10px;
            position: absolute;
            top: 30px;
            left: 30px;
            text-align: center;
        }

        nav {
            background-color: #cfcfcf;
            padding: 40px;
            background: linear-gradient(#420810, #D20808, #AA0808);
        }

        nav ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
            text-align: center;
        }

        nav li {
            display: inline;
            margin: 0 10px;
        }

        .nav-item {
            display: inline-block;
            padding: 10px;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color .3s; 
            color: #FFFFFF; 
            margin-left: 20px; 
            font-size: 16px; 
            font-weight: bold;
            font-family: 'OpenSans', sans-serif;
        }

        .nav-item:hover {
            background-color: #FFFFFF;
            color: #02232F;
        }

        .fa-user-group, .fa-briefcase {
            border-radius: 50%;
            height: 50px;
            width: 50px;
            background-color: #840808;
            padding: 8px;
            color: #ffffff;
            position: absolute;
        }

        h3 {
            font-size: 40px;
            margin-left: 535px;
            margin-top: 140px;
        }

        h4 {
            font-size: 40px;
            margin-left: 1225px;
            margin-top: -87px;
        }

        .fa-user-group {
            font-size: 41px;
            margin-left: 450px;
            margin-top: 130px;
        }

        .fa-briefcase {
            font-size: 49px;
            margin-left:1120px;
            margin-top: 130px;
        }

        main {
            margin-left: 120px;
            margin-top: 50px;
            background-color: #ffffff;
            width: 800px;
            height: 600px;
            padding: 100px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            text-align: center;
            border: 1px solid rgb(0, 0, 0);
        }

        p {
            margin-top: -840px;
            margin-right: 90px;
            text-align: right;
        }

        #sign-out-button {
            background-color: #cfcfcf;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color .3s;
            color: #000; 
            font-size: 16px;
            font-weight: bold;
            font-family: 'OpenSans', sans-serif;
            float: right; 
            margin-right: 20px; 
        }

        #sign-out-button:hover {
            background-color: #FFFFFF;
            color: #02232F;
        }

        #first-main {
            margin-top: 10px;
            margin-left: 400px;
            background-color: #ffffff;
            width: 400px;
            height: 400px;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            text-align: center;
            border: 1px solid rgb(0, 0, 0);
        }

        #second-main {
            margin-left: 1030px;
            background-color: #ffffff;
            width: 400px;
            height: 400px;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            text-align: center;
            border: 1px solid rgb(0, 0, 0);
            margin-top: -442px;
        }
    </style>
</head>

<body>
    <header>
        <h1 style="color: #ffffff; font-family: 'Aclonica', sans-serif; margin-left: 50px; margin-top: 13px;">UniHire</h1>
        <h1 style="color: #ffffff;">
            <span style="font-family: 'Aclonica', sans-serif; margin-left: 215px; margin-top: 10px;">HR</span> Admin
        </h1>
        <h1 style="color: #ffffff; margin-left: 183px; margin-top: 3px;">⃒</h1>
    </header>

    <nav>
        <a href="admin_signout.php" id="sign-out-button" class="nav-item" style="background-color: black; color: white; margin-top: -21px; margin-right: 52px;">Sign Out</a>
    </nav>

    <a href="admin_applicant_control_page.php" class="icon-link">
        <i class="fas fa-user-group"></i>
    </a>

    <a href="admin_job_control_page.php" class="icon-link">
        <i class="fas fa-briefcase"></i>
    </a>
    
    <h3>Applicant List</h3>
    <h4>Job List</h4>
    
    <main id="first-main">
    <img src="users-between-lines-solid.svg" alt="User Icon" width="400" height="400">
    </main>

    <main id="second-main">  
    <img src="https://static.vecteezy.com/system/resources/previews/005/133/261/non_2x/folder-on-white-background-vector.jpg" alt="User Icon" width="400" height="400">
    </main>

 <?php
}
 ?>

 
</body>
</html>
    