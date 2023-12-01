<!DOCTYPE html>
<html lang="en">

<head>
    <title>Apply Form</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Aclonica">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans">
    <link rel="icon" href="https://batstate-u.edu.ph/wp-content/uploads/2022/05/BatStateU-NEU-Logo.png" type="image/x-icon">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>


    <style>
        html, body {
            margin: 0;
            padding: 0;
            background: url('https://batstate-u.edu.ph/wp-content/uploads/2020/10/lipa-slider-1-scaled.jpg');
            background-size: cover;
            background-position: center;
            height: 100%;
            opacity: 0.95;
            background-attachment: fixed;
        }

        main {
            max-width: 900px;
            margin: 40px auto;
            background-color: rgba(255, 255, 255, 1);
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
            text-align: center;
            font-size: 18px;
        }

        header {
            background-color: #f0f0f0;
            color: #333;
            text-align: center;
            margin-top: 20px;
            padding: 10px;
            border-radius: 5px;
        }

        nav {
            background: linear-gradient(#420810, #D20808, #AA0808);
            padding: 20px;
            margin-top: 20px;
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
            font-size: 20px;
            font-weight: bold;
            font-family: 'Segoe UI', sans-serif;
        }

        .nav-item:hover {
            background-color: #FFFFFF;
            color: #02232F;
        }

        .nav-item.profile,
        .nav-item.sign-out {
            float: right;
        }

        .form-container {
            margin-top: 20px;
            text-align: left;
        }

        .form-group {
            margin-bottom: 10px;
            display: flex;
            flex-direction: column;
        }

        .form-group-resume {
            margin-left: 5px;
            font-size: 10px;
            margin-bottom: 20px;
          
            flex-direction: row;
            justify-content: space-between;
            border-radius: 20px;
            align-items: center;
        }
        .form-group-cover-letter {
            font-size: 10px;
            margin-top: -55px;
            margin-left: 140px;
            flex-direction: row;
            justify-content: space-between;
            border-radius: 20px;
            align-items: center;
        }

        .form-group-diploma {
            font-size: 10px;
            margin-top: -10px;
            margin-left: 0px;
            flex-direction: row;
            justify-content: space-between;
            border-radius: 20px;
            align-items: center;
        }
        
        .form-group-coe{
            font-size: 1px;
            margin-top: -37px;
            margin-left: 249px;
            flex-direction: row;
            justify-content: space-between;
            border-radius: 20px;
            align-items: center;
        }

        .form-group label {
            font-size: 22px;
        }

        .form-group input {
            width: 100%;
            height: 25px;
            margin-top: 5px;
        }

        .gender-options {
        justify-content: left;
        }

        .gender-options-label{

        margin-left: 40px;
        margin-top: -30px;
        }


        .gender-options input[type="radio"] {
            margin-left: -280px; 
        }


        .form-control,
        .form-control2 {
            font-color: black;
        }

        .file-upload,
        .file-upload2 {
            font-size: 10px;
            background-color: #D20808;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 5px 5px;
          
            cursor: pointer;
            transition: background-color 0.3s, color 0.3s;
            display: inline-block;
            flex: 1;
        }

        .file-upload:hover,
        .file-upload2:hover {
            background-color: #073141;
        }

        .apply-button {
            background-color: #D20808;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s, color 0.3s;
        }

        .apply-button:hover {
            background-color: #073141;
        }

    </style>
</head>

<body>
    <nav>
        <ul>
            <li><a class="nav-item" href="homepage.php">Home</a></li>
            <li style="text-align: center; color: white; font-family: 'Aclonica'; font-size: 30px;">UniHire Job Portal</li>
            <li><a class="nav-item" href="job_board.php">Find jobs</a></li>
        </ul>
    </nav>

    <?php
    include("db.php");

    if (isset($_GET['jobtitle']) && isset($_GET['departmentname']) && isset($_GET['dateposted'])) {
        $jobTitle = $_GET['jobtitle'];
        $departmentName = $_GET['departmentname'];
        $datePosted = $_GET['dateposted'];

        $sql = "SELECT * FROM tbjobs WHERE jobtitle = '" . $jobTitle . "' AND departmentname = '" . $departmentName . "' AND dateposted = '" . $datePosted . "'";
        $result = $conn->query($sql);

        if ($result && $row = $result->fetch_assoc()) {
            echo '<div class="job-details" style="text-align: center; margin: 0 auto; width: 40%; background-color: #f9f9f9; padding: 10px; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);">';
            echo "<p class='job-title' style='font-size: 30px; font-weight: bold; color: #D20808;'>{$row['jobtitle']}</p>";
            echo "<p class='job-detail' style='font-weight: bold; font-size: 20px; color: #333; margin-top: -10px;'>Department: " . $row['departmentname'] . "</p>";
            echo "<p class='job-detail' style='font-weight: bold; font-size: 20px; color: #333;'>Date Posted: " . $row['dateposted'] . "</p>";

            echo '</div>';
        } else {
            echo "No job details found for the provided information.";
        }
    } else {
        echo "Job details not found.";
    }

    $conn->close();
    ?>

<main>
        <form method="post" enctype="multipart/form-data" action="Upload.php" class="form-container">
            <?php 
                echo '<input type="hidden" name="jobtitle" value="' . (isset($row['jobtitle']) ? htmlspecialchars($row['jobtitle']) : '') . '">';
            ?>

            <div class="form-group">
                <label for="fname" style="font-weight: bold;">First Name:</label>
                <input type="text" name="fname" id="fname" style="width: 894px; border: 1px solid red;" required>
            </div>

            <div class="form-group">
                <label for="mname" style="font-weight: bold;">Middle Name:</label>
                <input type="text" name="mname" id="mname" style="width: 894px; border: 1px solid red;" required>
            </div>

            <div class="form-group">
                <label for="lname" style="font-weight: bold;">Last Name:</label>
                <input type="text" name="lname" id="lname" style="width: 894px; border: 1px solid red;" required>
            </div>

            <div class="form-group">
                <label for="birthday" style="font-weight: bold;">Birthday:</label>
                <input type="date" name="birthday" id="birthday" style="width: 105px; border: 1px solid red;" required>
            </div>

            <div class="form-group">
            <label for="gender" style="font-weight: bold;">Gender:</label>
            <div class="gender-options">
                <input type="radio" name="gender" value="Male" id="male" style="border: 1px solid red;" required>
                <div class="gender-options-label">
                <label for="male" >Male</label>
            </div>
                <input type="radio" name="gender" value="Female" id="female" style="border: 1px solid red;" required>
                <div class="gender-options-label">
                <label for="female">Female</label>
            </div>
            </div>

            <div class="form-group">
                <label for="contactno" style="font-weight: bold; margin-top: 10px;">Contact Number:</label >
                <input type="text" name="contactno" id="contactno" style="width: 300px; border: 1px solid red;" required>
            </div>

            <div class="form-group">
                <label for="emailadd" style="font-weight: bold;">Email Address:</label>
                <input type="text" name="emailadd" id="emailadd" style="width: 300px; border: 1px solid red;" required>
            </div>

            <div class="form-group">
                <label for="appadd" style="font-weight: bold;">Complete Address:</label>
                <input type="text" name="appadd" id="appadd" style="width: 894px; border: 1px solid red;" required>
            </div>

            <div class="form-group">
                <label for="education" style="font-weight: bold;">Educational Background:</label>
                <input type="text" name="education" id="education" style="width: 894px; height: 100px; border: 1px solid red;" required>
            </div>

            <div class="form-group">
                <label for="eligibility" style="font-weight: bold;">Eligibility:</label>
                <input type="text" name="eligibility" id="eligibility" style="width: 894px; height: 100px; border: 1px solid red;" required>
            </div>

            <div class="form-group">
                <label for="workExp" style="font-weight: bold;">Work Experience:</label>
                <input type="text" name="workExp" id="workExp" style="width: 894px; height: 100px; margin-bottom: 18px; border: 1px solid red;" required>
            </div>


            <div class="form-group">
                <label for="pdfFile1" style="color: red; font-size: 21px;">Resume</label>
                <input type="file" name="pdfFile1" id="pdfFile1" class="form-control"/ required>
            </div>

            <div class="form-group">
                <label for="pdfFile2" style="color: red; font-size: 21px;">Cover Letter</label>
                <input type="file" name="pdfFile2" id="pdfFile2" class="form-control"/ required>
            </div>

            <div class="form-group">
                <label for="pdfFile3" style="color: red; font-size: 21px;">Diploma</label>
                <input type="file" name="pdfFile3" id="pdfFile3" class="form-control"/ required>
            </div>

            <div class="form-group">
                <label for="pdfFile4" style="color: red; font-size: 21px;">Certificate Of Employment</label>
                <input type="file" name="pdfFile4" id="pdfFile4" class="form-control"/ required>
            </div>

            <section style="text-align: center; padding: 20px; margin-top: 40px;">
                <button class="apply-button type1" type="submit">
                    <span class="btn-txt" style="font-weight: bold; font-size: 22px;">Apply Now</span>
                </button>
            </section>
        </form>
    </main>




</body>
</html>
