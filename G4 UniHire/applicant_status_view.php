<?php
session_start();
include "db.php";

if (isset($_SESSION['appno'])) {
    $applicationNo = $_SESSION['appno'];


    $stmt = $conn->prepare("SELECT fname, lname, jobtitle, emailadd, appno, statusdate, appstatus FROM tbjobapplication WHERE appno = ?");
    $stmt->bind_param("s", $applicationNo);

    if ($stmt->execute()) {
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $fullName = $row['fname'] . ' ' . $row['lname'];
            $jobTitle = $row['jobtitle'];
            $emailAdd = $row['emailadd'];
            $applicationNo = $row['appno'];
            $statusDate = $row['statusdate'];
            $appStatus = $row['appstatus'];
        }
    }

    $stmt->close();
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Application Status</title>

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
            background-color: #f0f0f0;
            color: #fff;
            text-align: center;
            margin-top: 20px;
        }

        h1 {
            margin: 10px;
            position: absolute;
            top: 40px;
            left: 30px;
            text-align: center;
        }

        nav {
            background-color: #cfcfcf;
            padding: 20px;
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
            font-size: 20px;
            font-weight: bold;
            font-family: 'Segoe UI', sans-serif;
        }

        .nav-item:hover {
            background-color: #FFFFFF;
            color: #02232F;
        }

        main {
            max-width: 900px;
            margin: 100px auto; 
            background: #fafeff;
            padding: 10px;
            border-radius: 55px;
            text-align: center;
        }

        .container {
            margin-left: 40px;
            margin-right: 0;
        }

        h2 {
            text-align: center;
        }

        .table {
            white-space: nowrap;
        }

        .btn-row {
            display: flex;
            justify-content: space-around;
        }

        .btn-row button {
            margin: 10px;
        }

        .btn-remove {
            cursor: pointer;
        }
    </style>
</head>
<body>

<nav>
    <ul>
        <li><a class="nav-item" href="check_status.php">Sign Out</a></li>
    </ul>
</nav>



<main>
    <div class="container">
        <h2>Application Details</h2>
 
    <?php
if (!empty($applicationNo) && !empty($appStatus)) :
?>
    <p style="text-align: left; font-size: 22px;">Hello, <strong><?= $fullName ?></strong>. Greetings!</p>
    <br>
    <p style="text-align: left; font-size: 20px;"><strong>Job Title:</strong> <?= $jobTitle ?></p>
    <p style="text-align: left; font-size: 20px;"><strong>Applicant Name:</strong> <?= $fullName ?></p>
    <p style="text-align: left; font-size: 20px;"><strong>Email Address:</strong> <?= $emailAdd ?></p>
    <p style="text-align: left; font-size: 20px;"><strong>Application Number:</strong> <strong><?= $applicationNo ?></strong></p>
    <p style="text-align: left; font-size: 20px;"><strong>Last Update:</strong> <?= $statusDate ?></p>
    <br>
    <div id="status-message" style="color: red; margin-top: 10px; text-align: left; font-size: 22px;"><strong><?= $appStatus ?></strong></div>
    <br>
<?php else : ?>
    <p id="not-found-message" style="text-align: left; font-size: 22px;">Please standby. Your application is under process.</p>
<?php endif; ?>


    </div>
</main>

</body>
</html>



